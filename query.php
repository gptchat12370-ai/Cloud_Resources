<?php
require __DIR__ . '/db.php';

$country = isset($_GET['country']) ? $_GET['country'] : '';
$country = substr($country, 0, 100); // basic limit

$sql = "SELECT name, capital, population FROM countrydata_final WHERE name LIKE CONCAT(?, '%') ORDER BY name LIMIT 50";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $country);
$stmt->execute();
$res = $stmt->get_result();

header('Content-Type: text/html; charset=utf-8');
echo "<!doctype html><html><head><meta charset=\"utf-8\"><title>Query</title><link rel=\"stylesheet\" href=\"css/styles.css\"></head><body><div class='container'>";
echo "<h1>Country Query</h1>";
echo "<form method='get'><label>Starts with:&nbsp;<input name='country' value='".htmlspecialchars($country, ENT_QUOTES, 'UTF-8')."'></label> <button type='submit'>Search</button></form>";
echo "<table><thead><tr><th>Name</th><th>Capital</th><th>Population</th></tr></thead><tbody>";
while ($row = $res->fetch_assoc()) {
    $name = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');
    $capital = htmlspecialchars($row['capital'], ENT_QUOTES, 'UTF-8');
    $pop = (int)$row['population'];
    echo "<tr><td>{$name}</td><td>{$capital}</td><td>{$pop}</td></tr>";
}
echo "</tbody></table>";
echo "<p><a href='index.php'>&larr; Back</a></p></div></body></html>";
