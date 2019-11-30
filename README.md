## How To Install

### Populating Database

First create a database with the name "githubstats"

In the sql-data-export folder you will find a file named SQL_AllTables_Export.sql
Inside is sql code so run that file (or copy paste the contents) to create all tables with correct structure and data


### Installing Front End

First make sure xampp, wamp or any other similar service has Mysql on port 3306 and the directory of where it can run local php files is in the correct folder

```php
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
```

Above is the connection code found in the PHP files in this repo

As you can see there is no password set and we are a root user

Edit this code as needed to adjust to the setting you have on your computer

After setup is done run index.php with local host as shown below

http://localhost/index.php


------
------

## GitHubStats

At 40 million users across the world and 100 million repositories, GitHub is one of the most popular
version control and project management platforms. Although it provides some general statistics on
individual repository pages (new issues, closed issues, pull requests, languages used in the repository,
contributors, etc.), currently there is no convenient way to look at real-time commit statistics across
repositories of different users at a glance. GitHub does support a well-developed public API to extract
information across many repositories for further analysis. For this project, our group will use GitHub API
to extract useful statistics on commits for repositories of all public users located in Ontario, Canada as a
convenient tool to peek at current GitHub activity in this geographic region.  


### Goals and Motivations:  

The goal of this project is to create a simple database web application that will query, store, analyze and
render current GitHub commit statistics using GitHub public REST API. The application will focus on
sorting and pulling commit statistics from public repositories of users located in Ontario, Canada from the
past year. This data will be analyzed for the following metrics: which months and days of the week and
hours of the day have the most commits, most commonly used programming languages, and the
categories of software products these commits represent (web applications, system utilities, big data tools,
etc.).  

Our main motivation for this project is to develop a practical data-driven tool for quantifying trends in
software development that will be implemented using tools and technologies covered in this course, such
as a database management system, database design process, SQL query language, data flow in RESTful
web services etc. Through this, we hope to demonstrate our understanding of the course material and our
ability to apply it in a real small-scale solution.  
