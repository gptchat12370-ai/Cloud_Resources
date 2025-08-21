<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Query Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body class="bodyStyle">
  <div class="mainHeader">
    <div class="center"><h1>Example Social Research Organization</h1></div>
  </div>

  <div class="container">
    <h2>Country Data Query Page</h2>
    <p><a href="index.php">Home</a></p>
    <form id="form1" method="post" action="query2.php">
      <select name="selection" required>
        <option value="">Select...</option>
        <option value="Q1">Mobile phones</option>
        <option value="Q2">Population</option>
        <option value="Q3">Life Expectancy</option>
        <option value="Q4">GDP</option>
        <option value="Q5">Childhood Mortality</option>
      </select>
      <input type="submit" value="Submit">
    </form>
  </div>

  <div id="Copyright" class="center">
    <h5>&copy; 2020, Amazon Web Services, Inc. or its Affiliates. All rights reserved.</h5>
  </div>
</body>
</html>
