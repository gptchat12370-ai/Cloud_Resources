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
      include 'get-parameters.php';

      // Open DB connection
      $conn = @new mysqli($ep, $un, $pw, $db);
      if ($conn->connect_errno) {
          echo '<p><strong>Database connection failed:</strong> ' . htmlspecialchars($conn->connect_error) . '</p>';
          exit;
      }

      $_pick = $_POST['selection'] ?? '';

      switch ($_pick) {
        case "Q1": include 'mobile.php';        break;
        case "Q2": include 'population.php';    break;
        case "Q3": include 'lifeexpectancy.php';break;
        case "Q4": include 'gdp.php';           break;
        case "Q5": include 'mortality.php';     break;
        default:   echo '<p>No query selected.</p>';
      }

      $conn->close();
    ?>
  </div>

  <div id="Copyright" class="center">
    <h5>&copy; 2020, Amazon Web Services, Inc. or its Affiliates. All rights reserved.</h5>
  </div>
</body>
</html>
