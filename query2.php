<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Query Results</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body class="bodyStyle">
  <div class="container">
    <h2>Results</h2>
    <p><a href="query.php">Pick another query</a></p>

<?php
  // show PHP errors while debugging
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  // DB creds from SSM
  require_once __DIR__ . '/get-parameters.php';

  // Connect to RDS using TLS
  $ca = '/etc/pki/tls/certs/rds-combined-ca-bundle.pem';
  if (!is_readable($ca)) {
    echo '<p><strong>RDS CA bundle not found:</strong> '.$ca.'</p>';
    exit;
  }
  $mysqli = mysqli_init();
  mysqli_ssl_set($mysqli, NULL, NULL, $ca, NULL, NULL);
  if (!mysqli_real_connect($mysqli, $ep, $un, $pw, $db, 3306, NULL, MYSQLI_CLIENT_SSL)) {
    die('<p><strong>Database TLS connect failed:</strong> '.htmlspecialchars(mysqli_connect_error()).'</p>');
  }
  $conn = $mysqli; // for the pagelets

  // Accept POST from the form and GET (?q=Q4) for quick testing
  $_pick = $_POST['selection'] ?? ($_GET['q'] ?? '');

  switch ($_pick) {
    case 'Q1': include __DIR__.'/mobile.php';         break;
    case 'Q2': include __DIR__.'/population.php';     break;
    case 'Q3': include __DIR__.'/lifeexpectancy.php'; break;
    case 'Q4': include __DIR__.'/gdp.php';            break;
    case 'Q5': include __DIR__.'/mortality.php';      break;
    default:
      echo '<p>No query selected. Go back and pick one.</p>';
  }

  $conn->close();
?>
  </div>
</body>
</html>
