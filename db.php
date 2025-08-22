<?php
// Database connector using TLS to Amazon RDS
// Requires getAppParameters.php -> get-parameters.php variables: $ep, $un, $pw, $db
require __DIR__ . '/getAppParameters.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$ca = '/etc/pki/tls/certs/rds-combined-ca-bundle.pem';

$conn = mysqli_init();
if (!$conn) { http_response_code(500); exit('MySQL init failed'); }

// Set SSL options and enforce server certificate verification when supported
mysqli_ssl_set($conn, null, null, $ca, null, null);
if (defined('MYSQLI_OPT_SSL_VERIFY_SERVER_CERT')) {
    mysqli_options($conn, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);
}

mysqli_real_connect($conn, $ep, $un, $pw, $db, 3306, null, MYSQLI_CLIENT_SSL);

if (!$conn) { http_response_code(500); exit('MySQL connection failed'); }
$conn->set_charset('utf8mb4');
?>
