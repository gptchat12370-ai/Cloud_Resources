<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>MSRI Demo App</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <div class="container">
    <h1>MSRI Demo App</h1>
    <p>This is a minimal PHP app configured to read database settings from <code>get-parameters.php</code> (written during EC2 boot) via <code>getAppParameters.php</code>.</p>
    <ul>
      <li><a href="query.php">Query demo</a> — try <code>?country=Mal</code> or <code>?country=U</code></li>
      <li><a href="health.txt">Health check</a></li>
    </ul>
    <p class="note">Note: Remove any legacy <code>aws.phar</code> includes in your project. This app does not require the AWS SDK at request time.</p>
  </div>
</body>
</html>
