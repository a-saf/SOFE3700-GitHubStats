<?php
//Connection Code
$host="127.0.0.1";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="githubstats";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
    }

    li {
      float: left;
    }

    li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    li a:hover {
      background-color: #111;
    }
    </style>
</head>
    
<body>

<!-- Top Bar for naviagtion  -->
<ul>
  <li><a class="active" href="GITHUB_API.html">HOME</a></li>
  <li><a href="users.php">USERS</a></li>
  <li><a href="REPOSITORIES.php">REPOSITORIES</a></li>
  <li><a href="COMMITS.php">COMMITS</a></li>
  <li><a href="PULLREQUEST.php">PULLREQUEST</a></li>
  <li><a href="ISSUES.php">ISSUES</a></li>
  <li><a href="View1.php">View1</a></li>
  <li><a href="View2.php">View2</a></li>
  <li><a href="View3.php">View3</a></li>
  <li><a href="View4.php">View4</a></li>
  <li><a href="View5.php">View5</a></li>
  <li><a href="View6.php">View6</a></li>
  <li><a href="View7.php">View7</a></li>
  <li><a href="View8.php">View8</a></li>
  <li><a href="View9.php">View9</a></li>
  <li><a href="View10.php">View10</a></li> 
  <li><a href="CityView.php">City View</a></li>
  <li><a href="LanguageView.php">Language View</a></li>
  <li><a href="IssueStatusView.php">Issue Status View</a></li> 
</ul>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>USERS</title>
<!--    favicon-->
<link rel="shortcut icon" href="image/fav-icon.png" type="image/x-icon">
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/themify-icons.css">
<link rel="stylesheet" href="css/animate.css">
<!--css-->
<link rel="stylesheet" href="css/style.css">
    
<style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {background-color: #f2f2f2;}

      h1.hero-text {
      color: black;
      text-align: left;
      width: 100% !important;
    }
</style> 

<br>
<div>
    <h1 class="hero-text">VIEW 3</h1>
</div>

<br><br>
<p> Description: A correlated nested query </p>
<p> Showing users who have more followers then user with login name Pahimar </p>
<br>
    
<!--Giving Table ID to use with Javascript to parse it and use it for the Pie Chart-->
<table style="width:50%" class="table" id="dataTable" >
    
    <tr style="font-weight:bold"><td>First Name</td><td>Last Name</td></tr>
    <!--Using PHP to connect to database and fill up the table-->
    <?php

        //The Query Statement
        $sql = "SELECT u.fname, u.lname
                FROM user as u
                WHERE u.followers >
                    ( SELECT followers
                    FROM user
                    WHERE login_name = 'Pahimar');";
    
        $result = mysqli_query($con, $sql) or die("Bad Query: $sql");

        //Using a While loop to fill the rows of the html from each data entry from the query
        while ($row = mysqli_fetch_assoc($result)){

            echo"<tr><td>{$row['fname']}</td><td>{$row['lname']}</td></tr>";
        }
    ?>  
</table>
<br> 
    
    
<meta name="viewport" content="width=device-width, initial-scale=1">
    
<style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 20px;
    }

    #myBtn {
      display: none;
      position: fixed;
      bottom: 20px;
      right: 30px;
      z-index: 99;
      font-size: 18px;
      border: none;
      outline: none;
      background-color: red;
      color: white;
      cursor: pointer;
      padding: 15px;
      border-radius: 4px;
    }

    #myBtn:hover {
      background-color: #555;
    }
</style>

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<!--Script for Button-->
<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
    
    
</body>

<section class="product-landing pro_d" data-scroll-index="1">
    <div class="container"></div>
</section>

<footer class="footer-area">
    <div class="container">
        <div class="row text-center">
            <p class="copyright">
                <a>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | by Priya</a>
            </p>
        </div>
    </div>
</footer>
   
</html>
