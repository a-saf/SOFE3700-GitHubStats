<?php
//Connection Code
$host="127.0.0.1";
$port=3307;
$socket="";
$user="root";
$password="";
$dbname="Project2";

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
    <h1 class="hero-text">Issue Status</h1>
</div>

<br><br>
<p>Description: Compares and shows how many issues are open and closed in the issue table</p>
<br>

<!-- Making a div and assigning area to place Pie Chart -->
<div class="chart" align="center" style="position: relative; height:40vh; width:80vw">
  <canvas id="myChart"></canvas>
</div>
<br>
    
<!--Giving Table ID to use with Javascript to parse it and use it for the Pie Chart-->
<table style="width:50%" class="table" id="dataTable" >
    
    <tr style="font-weight:bold"><td>issue_state</td><td>total</td></tr>
    <!--Using PHP to connect to database and fill up the table-->
    <?php

        //The Query Statement
        $sql = "SELECT issue_state, FORMAT(count(issue_state), 'D3') AS total 
                FROM issues 
                GROUP by issue_state;";
    
        $result = mysqli_query($con, $sql) or die("Bad Query: $sql");

        //Using a WHile loop to fill the rows of the html from each data entry from the query
        while ($row = mysqli_fetch_assoc($result)){

            echo"<tr><td>{$row['issue_state']}</td><td>{$row['total']}</td></tr>";
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

   
    
<!--Script for Parsing HTML Table and Creating Chart using Chart.js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
    
<script>

    function BuildChart(labels, values, chartTitle) {
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels, // Our labels
                datasets: [{
                    label: chartTitle, // Name the series
                    data: values, // Our values
                    backgroundColor: [ // Specify custom colors
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [ // Add custom color borders
                      'rgba(255,99,132,1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1 // Specify bar border width
                  }]
                },
                options: {
                  responsive: true, // Instruct chart js to respond nicely.
                  maintainAspectRatio: false, // Add to prevent default behavior of full-width/height 
                    
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                    
                }
              });
              return myChart;
            }


    //PARSING HTML TABLE TO JSON
    //Buildchart will use the Json data
    //Connecting to Table with matching id
    var table = document.getElementById('dataTable');
    var json = []; // First row needs to be headers 
    var headers = [];
    for (var i=0; i < table.rows[0].cells.length; i++){
         headers[i] = table.rows[0].cells[i].innerHTML.toLowerCase().replace(/ /gi, '');
         }

    //Go through cells
    for (var i=1; i < table.rows.length; i++){
        var tableRow = table.rows[i];
        var rowData = {};
        for (var j=0; j < tableRow.cells.length; j++) {
            rowData[headers[j]] = tableRow.cells[j].innerHTML;
        }

        json.push(rowData)
    }

    console.log(json);


    // Map JSON values back to label array
    var labels = json.map(function (e) {
        //City is the header in the table, each piece of data from the column will be returned (used in buildchart)
        return e.issue_state;
    });
    console.log(labels);

    //Map JSON values back to values array
    var values = json.map(function (e) {
        //total is the header in the table, each piece of data from the column will be returned (used in buildchart)
        return e.total;
    });

    console.log(values); 
    
    //Call BuildChart funtion to draw chart
    var chart = BuildChart(labels, values, "BLANK");

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
