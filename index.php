<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Example Social Research Organization</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body class="bodyStyle">
  <?php include 'getAppParameters.php'; ?>

  <div class="mainHeader">
    <div class="center"><h1>Example Social Research Organization</h1></div>
  </div>

  <div class="topnav">
    <a href="#aboutUs">About Us</a>
    <a href="#contactUs">Contact Us</a>
    <a href="query.php">Query</a>
  </div>

  <div class="container">
    <p>Welcome to our data query site. You can get data from countries all over the world to use in your research.</p>
    <div class="cursiveText">We provide data for a variety of areas including basic demographics and development statistics.</div>

    <hr>
    <div id="aboutUs" class="center">
      <h2>About Us</h2>
      <figure>
        <img src="Shirley.jpeg" onerror="this.onerror=null;this.src='Shirley.jpg';" alt="Shirley Rodriguez">
        <figcaption>Shirley Rodriguez</figcaption>
      </figure>
      <p>Our site got started when Maria Gondalaz found that she was frequently looking up data from a variety of databases.
         Shirley decided to start sharing some of this data with other social researchers.</p>
    </div>

    <hr>
    <div id="contactUs" class="center">
      <h2>Contact Us</h2>
      <img src="Logo.png" alt="MSRI Logo" width="120">
      <p>123 Any Street<br>Any Town, USA</p>
      <h3>Hours</h3>
      <div>Weekdays: 6:00am - 6:00pm<br>Saturday: 7:00am - 7:00pm<br>Closed on Sundays</div>
    </div>

    <div id="Copyright" class="center">
      <h5>&copy; 2020, Amazon Web Services, Inc. or its Affiliates. All rights reserved.</h5>
    </div>
  </div>
</body>
</html>
