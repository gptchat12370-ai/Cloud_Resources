<?php
// get-parameters.php — static DB config injected by user-data script
// No aws.phar required

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Hardcoded RDS endpoint
$ep = 'msricloud-database.cmhaqoq2usks.us-east-1.rds.amazonaws.com';

// These values are written into this file by your user-data script.
// You can also set them manually here if needed.
$un = '<?= htmlspecialchars($APP_USER ?? "appuser") ?>';
$pw = '<?= htmlspecialchars($APP_PASS ?? "apppass") ?>';
$db = '<?= htmlspecialchars($DB_NAME ?? "appdb") ?>';
?>
