<?php
require_once __DIR__ . '/aws.phar';

$ep = $un = $pw = $db = '';
try {
  $az = @file_get_contents('http://169.254.169.254/latest/meta-data/placement/availability-zone');
  $region = $az ? substr(trim($az), 0, -1) : (getenv('AWS_DEFAULT_REGION') ?: 'us-east-1');

  $ssm = new Aws\Ssm\SsmClient(['version'=>'latest','region'=>$region]);
  $resp = $ssm->getParameters([
    'Names' => ['/example/endpoint','/example/username','/example/password','/example/database'],
    'WithDecryption' => true
  ]);
  foreach ($resp['Parameters'] as $p) { $vals[$p['Name']] = $p['Value']; }
  $ep = $vals['/example/endpoint'] ?? '';
  $un = $vals['/example/username'] ?? '';
  $pw = $vals['/example/password'] ?? '';
  $db = $vals['/example/database'] ?? '';
} catch (Throwable $e) {
  error_log('SSM error: '.$e->getMessage());
}
