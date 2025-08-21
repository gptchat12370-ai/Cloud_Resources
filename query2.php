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
      include __DIR__ . '/get-parameters.php';

      $mysqli = mysqli_init();
      mysqli_ssl_set($mysqli, NULL, NULL, '/etc/pki/tls/certs/rds-combined-ca-bundle.pem', NULL, NULL);
      if (!mysqli_real_connect($mysqli, $ep, $un, $pw, $db, 3306, NULL, MYSQLI_CLIENT_SSL)) {
          die('<p><strong>Database TLS connect failed:</strong> '.htmlspecialchars(mysqli_connect_error()).'</p>');
      }
      $conn = $mysqli; // existing pagelets use $conn->query(...)

      $_pick = $_POST['selection'] ?? '';

      switch ($_pick) {
        case "Q1": include __DIR__ . '/mobile.php';         break;
        case "Q2": include __DIR__ . '/population.php';     break;
        case "Q3": include __DIR__ . '/lifeexpectancy.php'; break;
        case "Q4": include __DIR__ . '/gdp.php';            break;
        case "Q5": include __DIR__ . '/mortality.php';      break;
        default:   echo '<p>No query selected.</p>';
      }

      $conn->close();
    ?>
  </div>
</body>
</html>
