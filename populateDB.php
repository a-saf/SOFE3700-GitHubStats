<?php

set_time_limit(86400);

$servername = "localhost";
$username = "root";
$password = "";

$userNames = array();
$userRepos = array();
$counter = 0;

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . "<br>");
}
echo "Connected successfully<br>";

$opts = [
    'http' => [
            'method' => 'GET',
            'header' => [
                    "User-Agent: PHP" .
                    "Authorization: token c204f10758ea4cc693e3237ab9daf8fb93c71b47"
            ]
    ]
];

//Populate user table

$url = "https://api.github.com/search/users?q=location:ontario&per_page=30";

$context = stream_context_create($opts);
$json = file_get_contents($url, false, $context);
$json = json_decode($json, true);

foreach($json["items"] as $item) {

    $userID = $item["id"];
    $login = $item["login"];
    $repo_url = $item["repos_url"];

    $urlUserProfile = $item["url"];

    $jsonUser = file_get_contents($urlUserProfile, false, $context);
    $jsonUser = json_decode($jsonUser, true);

    if(sizeof(explode(" ", $jsonUser["name"])) == 2) {
        $fname = explode(" ", $jsonUser["name"])[0];
        $lname = explode(" ", $jsonUser["name"])[1];
    } else {
        $fname = $jsonUser["name"];
        $lname = NULL;
    }

    $company = $jsonUser["company"];

    $city = explode(",", $jsonUser["location"])[0];
    $no_of_repos = $jsonUser["public_repos"];
    $followers = $jsonUser["followers"];
    $followings = $jsonUser["following"];

    $date_created = explode("T", $jsonUser["created_at"])[0];
    $date_updated = explode("T",$jsonUser["updated_at"])[0];


    $sql = "INSERT INTO githubstats.user (user_id, login_name, fname, lname, 
    repo_url, company, city, no_of_repos, followers, followings, date_created, date_updated) 
    VALUES ('$userID', '$login', '$fname', '$lname', '$repo_url', '$company', '$city', '$no_of_repos', '$followers',
    '$followings', '$date_created', '$date_updated')";

    if ($conn->query($sql) === TRUE) {
        echo "New record in User table created successfully<br>";
        array_push($userNames, $login);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

sleep(3610);

//Populate repositories table
 
for ($x = 0; $x < sizeof($userNames); $x++) {
    
    $urlRepo = "https://api.github.com/users/" . $userNames[$x] . "/repos";

    $counter++;
    if ($counter >= 59) {
        $counter = 0;
        sleep(3610);
    }

    $context = stream_context_create($opts);
    $json = file_get_contents($urlRepo, false, $context);
    $json = json_decode($json, true);

    foreach($json as $item) {

        $repositoryID = $item["id"];
        $repo_size = $item["size"];
        $repo_name = $item["name"];
        $repo_owner = $item["owner"]["login"];
        $no_of_forks = $item["forks"];
        $languages = $item["language"];
        $date_created = explode("T", $item["created_at"])[0];
        $date_updated = explode("T", $item["updated_at"])[0];


        $sql = "INSERT INTO githubstats.repositories (repositoryID, repo_size, repo_name, repo_owner, 
        no_of_forks, languages, date_created, date_updated) 
        VALUES ('$repositoryID', '$repo_size', '$repo_name', '$repo_owner', '$no_of_forks', '$languages', 
        '$date_created', '$date_updated')";

        if ($conn->query($sql) === TRUE) {
            echo "New record in Repositories table created successfully<br>";
            $userRepos[$repo_name] = $repo_owner;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

//Populate pull request table

foreach($userRepos as $key => $value) {

    $urlRepo = "https://api.github.com/repos/" . $value . "/" . $key . "/pulls";

    $counter++;
    if ($counter >= 59) {
        $counter = 0;
        sleep(3610);
    }

    $context = stream_context_create($opts);
    $json = file_get_contents($urlRepo, false, $context);
    $json = json_decode($json, true);

    if (empty($json)) continue;
    else {
        foreach ($json as $item) {

            $userID = $item["user"]["id"];
            $pr_id = $item["id"];
            $pr_num = $item["number"];
            $pr_state = $item["state"];
            $repo_id = $item["base"]["repo"]["id"];
            $created_at = explode("T", $item["created_at"])[0];
            $closed_at = explode("T", $item["closed_at"])[0];
            $merged_at = explode("T", $item["merged_at"])[0];


            $sql = "INSERT INTO githubstats.pull_request (userID, pr_id, pr_num, pr_state, repo_id, 
            created_at, closed_at, merged_at) 
            VALUES ('$userID', '$pr_id', '$pr_num', '$pr_state', '$repo_id', '$created_at', 
            '$closed_at', '$merged_at')";

            if ($conn->query($sql) === TRUE) {
                echo "New record in Pull Request table created successfully<br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

    }
}

//Populate issues table

foreach($userRepos as $key => $value) {

    $urlIssue = "https://api.github.com/repos/" . $value . "/" . $key . "/issues";

    $counter++;
    if ($counter >= 59) {
        $counter = 0;
        sleep(3610);
    }

    $context = stream_context_create($opts);
    $json = file_get_contents($urlIssue, false, $context);
    $json = json_decode($json, true);

    if (empty($json)) continue;
    else {
        foreach ($json as $item) {

            $urlRepository = $item["repository_url"];

            $counter++;
            if ($counter >= 59) {
                $counter = 0;
                sleep(3610);
            }

            $context = stream_context_create($opts);
            $jsonRepository = file_get_contents($urlIssue, false, $context);
            $jsonRepository = json_decode($jsonRepository, true);

            $repo_id = $jsonRepository["id"];
            $issue_id = $item["id"];
            $issue_num = $item["number"];
            $issue_state = $item["state"];
            $created_at = explode("T", $item["created_at"])[0];
            $closed_at = explode("T", $item["closed_at"])[0];

            $sql = "INSERT INTO githubstats.issues (repo_id, issue_id, issue_num, issue_state, 
            created_at, closed_at) 
            VALUES ('$repo_id', '$issue_id', '$issue_num', '$issue_state', '$created_at', 
            '$closed_at')";

            if ($conn->query($sql) === TRUE) {
                echo "New record in Issues table created successfully<br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

    }
}

//Populate commits table

foreach($userRepos as $key => $value) {

    $urlCommitActivity = "https://api.github.com/repos/" . $value . "/" . $key . "/stats/commit_activity";

    $counter++;
    if ($counter >= 59) {
        $counter = 0;
        sleep(3610);
    }

    $context = stream_context_create($opts);
    $json = file_get_contents($urlCommitActivity, false, $context);
    $json = json_decode($json, true);

    if (empty($json)) continue;
    else {
        foreach ($json as $item) {

            $urlRepository = "https://api.github.com/repos/" . $value . "/" . $key;

            $counter++;
            if ($counter >= 59) {
                $counter = 0;
                sleep(3610);
            }

            $context = stream_context_create($opts);
            $jsonRepository = file_get_contents($urlIssue, false, $context);
            $jsonRepository = json_decode($jsonRepository, true);

            $repo_id = $jsonRepository["id"];
            $total_per_week = $item["total"];
            $week = $item["week"];
            $Sun = $item["days"][0];
            $Mon = $item["days"][1];
            $Tue = $item["days"][2];
            $Wed = $item["days"][3];
            $Thurs = $item["days"][4];
            $Fri = $item["days"][5];
            $Sat = $item["days"][6];
            $repo_name = $value;

            $sql = "INSERT INTO githubstats.commits (repo_id, total_per_week, week, Sun, 
            repo_name, Mon, Tue, Wed, Thurs, Fri, Sat) 
            VALUES ('$repo_id', '$total_per_week', '$week', '$Sun', '$repo_name', 
            '$Mon', '$Tue', '$Wed', '$Thurs', '$Fri')";

            if ($conn->query($sql) === TRUE) {
                echo "New record in Commits table created successfully<br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

$conn->close();

?>