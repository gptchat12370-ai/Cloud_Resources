<?php
// get-parameters.php — reads SSM Parameter Store and exposes $ep, $un, $pw, $db
// Requires aws.phar in the same folder and an instance role that can GetParameter (and KMS decrypt).

ini_set('display_errors', 1);
error_reporting(E_ALL);

$ep = $un = $pw = $db = '';

try {
  require_once __DIR__ . '/aws.phar';

  // Region from IMDS, then env, default us-east-1
  $az = @file_get_contents('http://169.254.169.254/latest/meta-data/placement/availability-zone', false, stream_context_create(['http'=>['timeout'=>1]]));
  $region = $az ? substr(trim($az), 0, -1) : (getenv('AWS_DEFAULT_REGION') ?: 'us-east-1');

  $ssm = new Aws\Ssm\SsmClient(['version'=>'latest','region'=>$region]);
  $resp = $ssm->getParameters([
    'Names' => ['/example/endpoint','/example/username','/example/password','/example/database'],
    'WithDecryption' => true
  ]);

  $vals = [];
  foreach ($resp['Parameters'] as $p) $vals[$p['Name']] = $p['Value'];

  $ep = $vals['/example/endpoint']  ?? '';
  $un = $vals['/example/username']  ?? '';
  $pw = $vals['/example/password']  ?? '';
  $db = $vals['/example/database']  ?? '';

  if (!$ep || !$un || !$pw || !$db) {
    throw new RuntimeException('Missing one or more SSM parameters (/example/*).');
  }
} catch (Throwable $e) {
  // Show a friendly message in dev; check /var/log/httpd/error_log for details.
  echo '<p style="color:#b91c1c"><strong>Config error:</strong> '.$e->getMessage().'</p>';
  error_log('get-parameters.php error: '.$e->getMessage());
  exit;
}
