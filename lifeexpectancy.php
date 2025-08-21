<?php
$sql = "SELECT name, birthrate, lifeexpectancy FROM countrydata_final";
$res = $conn->query($sql);

if ($res === false) {
    echo '<p>Query failed: ' . htmlspecialchars($conn->error) . '</p>';
} elseif ($res->num_rows > 0) {
    echo '<table>';
    echo '<tr><th>Country</th><th>Birth Rate</th><th>Life Expectancy</th></tr>';
    while ($row = $res->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['name']) . '</td>';
        echo '<td>' . htmlspecialchars($row['birthrate']) . '</td>';
        echo '<td>' . htmlspecialchars($row['lifeexpectancy']) . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    $res->free();
} else {
    echo '<p>No rows returned.</p>';
}
