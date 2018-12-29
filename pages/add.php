<?php
	include("db.php");
	$db = new DB();
	
	include("auth.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sports Admin - Add</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Sports Admin Dashboard</a>
            </div>
            <!-- /.navbar-header -->
			<!-- Logout -->
            <ul class="nav navbar-top-links navbar-right">
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Admin</a>
                        </li>
                        <li>
                            <a href="schedule.php"><i class="fa fa-table fa-fw"></i> Schedule</a>
                        </li>
                        <li>
                            <a href="teams.php"><i class="fa fa-soccer-ball-o fa-fw"></i> Teams</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Adding Record</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-2">
						<a href="index.php" class="btn btn-danger btn-lg btn-block"><i class="fa fa-arrow-left fa-fw"></i>Go Back</a>
                </div>
            </div>
			<!-- actual function code-->
			<!-- actual function code-->
			<!-- actual function code-->
			<!-- actual function code-->
			<div class="row">
            <?php
                $alert = '<br><div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>You have not filled out the form completely, please try again.</div>';
                    

                //add sport 
                if ($_GET['addRecord']  == 'sport'  && ($db->getRole($_SESSION['username'])  == 1)){
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <div class="form-group">
                                                <label>Sport:</label>
                                                    <input class="form-control" placeholder="Sport" name="sportName" type="text">
                                                </div>
                                                <input name="submit" type="submit" value="Add Record" class="btn btn-lg btn-success btn-block"> 
                                            </fieldset>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>';

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(empty($_POST["sportName"])) {
                            echo $alert;
                            echo $form;
                        } else {
                            $sportName = $_POST["sportName"];
                            echo $db->insert("INSERT INTO server_sport VALUES(default, '$sportName')");
                        }
                    } else{
                        echo $form;
                    }
                }//end add sport 

                //add user 
                if ($_GET['addRecord']  == 'user'  && ($db->getRole($_SESSION['username'])  == 1 )){
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>User Name:</label>
                                                    <input class="form-control" placeholder="Username" name="username" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password:</label>
                                                    <input class="form-control" placeholder="password" name="password" type="password">
                                                </div>
                                                <div class="form-group">
                                                <label>Role:</label>
                                                <select class="form-control" name="userrole">
                                                    <option value="1">Admin</option>
                                                    <option value="2">League Manager</option>
                                                    <option value="3">Team Manager</option>
                                                    <option value="4">Coach</option>
                                                    <option value="5">Parent</option>
                                                </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Team (ID):</label>
                                                    <input class="form-control" placeholder="Team ID" name="userteam" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>League (ID):</label>
                                                    <input class="form-control" placeholder="League ID" name="userleague" type="text">
                                                </div>
                                                <input name="submit" type="submit" value="Add Record" class="btn btn-lg btn-success btn-block"> 
                                            </fieldset>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>';

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(empty($_POST["username"]) || empty($_POST["password"]) || ($_POST["userteam"] < 0) || ($_POST["userleague"] < 0)) {
                            echo $alert;
                            echo $form;
                        } else {
                            $role = $_POST["userrole"];
                            $password =  hash('sha256', $_POST["password"]);
                            $username = $_POST["username"];
                            $userteam = $_POST["userteam"];
                            $userleague = $_POST["userleague"];
                            echo $db->insert("INSERT INTO server_user VALUES('$username', $role, '$password', $userteam, $userleague)");
                        }
                    } else{
                        echo $form;
                    }
                }//end add user 

                //add season 
                if ($_GET['addRecord']  == 'season'  && ($db->getRole($_SESSION['username'])  == 1 || $db->getRole($_SESSION['username'])  == 2)){
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Sport:</label>
                                                    <input class="form-control" placeholder="Season Description" name="seasondesc" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Year:</label>
                                                    <input class="form-control" placeholder="Year" name="seasonyear" type="text">
                                                </div>
                                                <input name="submit" type="submit" value="Add Record" class="btn btn-lg btn-success btn-block"> 
                                            </fieldset>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>';

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(empty($_POST["seasondesc"]) || empty($_POST["seasonyear"])) {
                            echo $alert;
                            echo $form;
                        } else {
                            $seasondesc = $_POST["seasondesc"];
                            $seasonyear = $_POST["seasonyear"];
                            echo $db->insert("INSERT INTO server_season VALUES(default, $seasonyear, '$seasondesc')");
                        }
                    } else{
                        echo $form;
                    }
                }//end add season 

                
                //add sls 
                if ($_GET['addRecord']  == 'sls' && ($db->getRole($_SESSION['username'])  == 1 || $db->getRole($_SESSION['username'])  == 2)){
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Sport ID:</label>
                                                    <input class="form-control" placeholder="ID" name="sportid" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>League ID:</label>
                                                    <input class="form-control" placeholder="ID" name="leagueid" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Season ID:</label>
                                                    <input class="form-control" placeholder="ID" name="seasonid" type="text">
                                                </div>
                                                <input name="submit" type="submit" value="Add Record" class="btn btn-lg btn-success btn-block"> 
                                            </fieldset>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>';

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(empty($_POST["sportid"]) || empty($_POST["leagueid"]) || empty($_POST["seasonid"])) {
                            echo $alert;
                            echo $form;
                        } else {
                            $sportid = $_POST["sportid"];
                            $leagueid = $_POST["leagueid"];
                            $seasonid = $_POST["seasonid"];
                            echo $db->insert("INSERT INTO server_slseason VALUES($sportid, $leagueid, $seasonid)");
                        }
                    } else{
                        echo $form;
                    }
                }//end add sls 

                
                //add TEAM 
                if (($_GET['addRecord']  == 'team') && ($db->getRole($_SESSION['username'])  == 1)){
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Team Name:</label>
                                                    <input class="form-control" placeholder="Team Name" name="teamname" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Mascot:</label>
                                                    <input class="form-control" placeholder="Mascot" name="teammascot" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Picture:</label>
                                                    <input class="form-control" placeholder="Picture" name="teampicture" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Home Color:</label>
                                                    <input class="form-control" placeholder="Home Color" name="teamhomecolor" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Away Color:</label>
                                                    <input class="form-control" placeholder="Away Color" name="teamawaycolor" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Max Players:</label>
                                                    <input class="form-control" placeholder="Max Players" name="teamplayers" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>League ID:</label>
                                                    <input class="form-control" placeholder="ID" name="teamleague" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Season ID:</label>
                                                    <input class="form-control" placeholder="ID" name="teamseason" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Sport ID:</label>
                                                    <input class="form-control" placeholder="ID" name="teamsport" type="text">
                                                </div>
                                                <input name="submit" type="submit" value="Add Record" class="btn btn-lg btn-success btn-block"> 
                                            </fieldset>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>';

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(empty($_POST["teamname"]) || empty($_POST["teammascot"]) || empty($_POST["teampicture"]) || empty($_POST["teamhomecolor"]) || empty($_POST["teamawaycolor"]) || empty($_POST["teamplayers"]) || empty($_POST["teamleague"]) || empty($_POST["teamseason"]) || empty($_POST["teamsport"])) {
                            echo $alert;
                            echo $form;
                        } else {
                            $teamname = $_POST["teamname"];
                            $teammascot = $_POST["teammascot"];
                            $teampicture = $_POST["teampicture"];
                            $teamhomecolor = $_POST["teamhomecolor"];
                            $teamawaycolor = $_POST["teamawaycolor"];
                            $teamplayers = $_POST["teamplayers"];
                            $teamleague = $_POST["teamleague"];
                            $teamseason = $_POST["teamseason"];
                            $teamsport = $_POST["teamsport"];
                            echo $db->insert("INSERT INTO server_team VALUES(default, '$teamname', '$teammascot', $teamsport, $teamleague, $teamseason, '$teampicture', '$teamhomecolor', '$teamawaycolor', $teamplayers)");
                        }
                    } else{
                        echo $form;
                    }
                }//end add team 

                //add TEAM for league users
                if (($_GET['addRecord']  == 'team') && ($db->getRole($_SESSION['username'])  == 2)){
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Team Name:</label>
                                                    <input class="form-control" placeholder="Team Name" name="teamname" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Mascot:</label>
                                                    <input class="form-control" placeholder="Mascot" name="teammascot" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Picture:</label>
                                                    <input class="form-control" placeholder="Picture" name="teampicture" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Home Color:</label>
                                                    <input class="form-control" placeholder="Home Color" name="teamhomecolor" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Away Color:</label>
                                                    <input class="form-control" placeholder="Away Color" name="teamawaycolor" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Max Players:</label>
                                                    <input class="form-control" placeholder="Max Players" name="teamplayers" type="text">
                                                </div>
                                                <input name="submit" type="submit" value="Add Record" class="btn btn-lg btn-success btn-block"> 
                                            </fieldset>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>';

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(empty($_POST["teamname"]) || empty($_POST["teammascot"]) || empty($_POST["teampicture"]) || empty($_POST["teamhomecolor"]) || empty($_POST["teamawaycolor"]) || empty($_POST["teamplayers"])) {
                            echo $alert;
                            echo $form;
                        } else {
                            $teamname = $_POST["teamname"];
                            $teammascot = $_POST["teammascot"];
                            $teampicture = $_POST["teampicture"];
                            $teamhomecolor = $_POST["teamhomecolor"];
                            $teamawaycolor = $_POST["teamawaycolor"];
                            $teamplayers = $_POST["teamplayers"];
                            $teamleague = $db->getLeague($_GET['username']);
                            $teamseason = $db->getSeason($teamleague);
                            $teamsport = $db->getSport($teamleague);
                            echo $db->insert("INSERT INTO server_team VALUES(default, '$teamname', '$teammascot', $teamsport, $teamleague, $teamseason, '$teampicture', '$teamhomecolor', '$teamawaycolor', $teamplayers)");
                        }
                    } else{
                        echo $form;
                    }
                }//end add team 

                //add schedule
                if (($_GET['addRecord']  == 'game') && ($db->getRole($_SESSION['username'])  == 1 || $db->getRole($_SESSION['username'])  == 2)){
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Sport ID:</label>
                                                    <input class="form-control" placeholder="ID" name="sport" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>League ID:</label>
                                                    <input class="form-control" placeholder="ID" name="league" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Season ID:</label>
                                                    <input class="form-control" placeholder="ID" name="season" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Home Team ID:</label>
                                                    <input class="form-control" placeholder="Home Team ID" name="hometeam" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Away Team ID:</label>
                                                    <input class="form-control" placeholder="Away Team ID" name="awayteam" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Home Score:</label>
                                                    <input class="form-control" placeholder="Home Score" name="homescore" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Away Score:</label>
                                                    <input class="form-control" placeholder="Away Score" name="awayscore" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Scheduled Date (yyyy-mm-dd HR:MN:SC):</label>
                                                    <input class="form-control" placeholder="yyyy-mm-dd HR:MN:SC" name="datetime" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Completion Status:</label>
                                                    <select class="form-control" name="complete">
                                                        <option value="1">Completed</option>
                                                        <option value="0">Not Completed</option>
                                                    </select>
                                                </div>
                                                <input name="submit" type="submit" value="Add Record" class="btn btn-lg btn-success btn-block"> 
                                            </fieldset>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>';

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(empty($_POST["sport"]) || empty($_POST["league"]) || empty($_POST["season"]) || empty($_POST["hometeam"]) || empty($_POST["awayteam"]) || ($_POST["homescore"] < 0) || ($_POST["awayscore"] < 0) || empty($_POST["datetime"])) {
                            echo $alert;
                            echo $form;
                        } else {
                            $sport = $_POST["sport"];
                            $league = $_POST["league"];
                            $season = $_POST["season"];
                            $hometeam = $_POST["hometeam"];
                            $awayteam = $_POST["awayteam"];
                            $homescore = $_POST["homescore"];
                            $awayscore = $_POST["awayscore"];
                            $datetime = $_POST["datetime"];
                            $complete = $_POST["complete"];
                            echo $db->insert("INSERT INTO server_schedule VALUES($sport, $league, $season, $hometeam, $awayteam, $homescore, $awayscore, '$datetime', $complete)");
                        }
                    } else{
                        echo $form;
                    }
                }//end add schedule 

                //add coach manger 
                if ($_GET['addRecord']  == 'coach' && ($db->getRole($_SESSION['username'])  == 1 || $db->getRole($_SESSION['username'])  == 2)){
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>User Name:</label>
                                                    <input class="form-control" placeholder="Username" name="username" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password:</label>
                                                    <input class="form-control" placeholder="password" name="password" type="password">
                                                </div>
                                                <div class="form-group">
                                                <label>Role:</label>
                                                <select class="form-control" name="userrole">
                                                    <option value="3">Team Manager</option>
                                                    <option value="4">Coach</option>
                                                </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Team (ID):</label>
                                                    <input class="form-control" placeholder="Team ID" name="userteam" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>League (ID):</label>
                                                    <input class="form-control" placeholder="League ID" name="userleague" type="text">
                                                </div>
                                                <input name="submit" type="submit" value="Add Record" class="btn btn-lg btn-success btn-block"> 
                                            </fieldset>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>';

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["userteam"]) || empty($_POST["userleague"])) {
                            echo $alert;
                            echo $form;
                        } else {
                            $role = $_POST["userrole"];
                            $password =  hash('sha256', $_POST["password"]);
                            $username = $_POST["username"];
                            $userteam = $_POST["userteam"];
                            $userleague = $_POST["userleague"];
                            echo $db->insert("INSERT INTO server_user VALUES('$username', $role, '$password', $userteam, $userleague)");
                        }
                    } else{
                        echo $form;
                    }
                }//end add coach manger  

                //add position 
                if ($_GET['addRecord']  == 'position'  && ($db->getRole($_SESSION['username'])  == 1 || $db->getRole($_SESSION['username'])  == 3 || $db->getRole($_SESSION['username'])  == 4)){
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <div class="form-group">
                                                <label>Position:</label>
                                                    <input class="form-control" placeholder="Position" name="position" type="text">
                                                </div>
                                                <input name="submit" type="submit" value="Add Record" class="btn btn-lg btn-success btn-block"> 
                                            </fieldset>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>';

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(empty($_POST["position"])) {
                            echo $alert;
                            echo $form;
                        } else {
                            $position = $_POST["position"];
                            echo $db->insert("INSERT INTO server_position VALUES('$position', default)");
                        }
                    } else{
                        echo $form;
                    }
                }//end add position 

                //add coach manger parent
                if ($_GET['addRecord']  == 'coachparent' && ($db->getRole($_SESSION['username'])  == 1 || $db->getRole($_SESSION['username'])  == 3 || $db->getRole($_SESSION['username'])  == 4)){
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>User Name:</label>
                                                    <input class="form-control" placeholder="Username" name="username" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password:</label>
                                                    <input class="form-control" placeholder="password" name="password" type="password">
                                                </div>
                                                <div class="form-group">
                                                <label>Role:</label>
                                                <select class="form-control" name="userrole">
                                                    <option value="3">Team Manager</option>
                                                    <option value="4">Coach</option>
                                                    <option value="5">Parent</option>
                                                </select>
                                                </div>
                                                <input name="submit" type="submit" value="Add Record" class="btn btn-lg btn-success btn-block"> 
                                            </fieldset>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>';

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(empty($_POST["username"]) || empty($_POST["password"])) {
                            echo $alert;
                            echo $form;
                        } else {
                            $role = $_POST["userrole"];
                            $password =  hash('sha256', $_POST["password"]);
                            $username = $_POST["username"];
                            $userteam = $db->getTeam($_SESSION['username']);
                            $userleague = $db->getLeague($_SESSION['username']);
                            echo $db->insert("INSERT INTO server_user VALUES('$username', $role, '$password', $userteam, $userleague)");
                        }
                    } else{
                        echo $form;
                    }
                }//end add coach manger  

                //add player
                if (($_GET['addRecord']  == 'player') && ($db->getRole($_SESSION['username'])  == 1 || ($db->getRole($_SESSION['username'])  == 3 || $db->getRole($_SESSION['username'])  == 4 ))){

                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>First Name:</label>
                                                    <input class="form-control" placeholder="First Name" name="firstname" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Last Name:</label>
                                                    <input class="form-control" placeholder="Last Name" name="lastname" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Date of birth:</label>
                                                    <input class="form-control" placeholder="YYYY-MM-DD" name="dob" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Jersey Number:</label>
                                                    <input class="form-control" placeholder="Jersey Number" name="jerseynumber" type="text">
                                                </div>
                                                <input name="submit" type="submit" value="Add Record" class="btn btn-lg btn-success btn-block"> 
                                            </fieldset>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>';

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["dob"]) || ($_POST["jerseynumber"] <0)) {
                            echo $alert;
                            echo $form;
                        } else {
                            $firstname = $_POST["firstname"];
                            $lastname = $_POST["lastname"];
                            $dob = $_POST["dob"];
                            $jerseynumber = $_POST["jerseynumber"];
                            $teamid = $db->getTeam($_SESSION['username']);
                            echo $db->insert("INSERT INTO server_player VALUES(default, '$firstname', '$lastname', '$dob', $jerseynumber, $teamid)");
                        }
                    } else{
                        echo $form;
                    }
                }//end add player

                //add player position
                if (($_GET['addRecord']  == 'playerpos') && ($db->getRole($_SESSION['username'])  == 1 || ($db->getRole($_SESSION['username'])  == 3 || $db->getRole($_SESSION['username'])  == 4 ))){

                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Player ID:</label>
                                                    <input class="form-control" placeholder="ID" name="playerid" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Position ID:</label>
                                                    <input class="form-control" placeholder="ID" name="posid" type="text">
                                                </div>
                                                <input name="submit" type="submit" value="Add Record" class="btn btn-lg btn-success btn-block"> 
                                            </fieldset>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>';

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(($_POST["posid"] < 0) || ($_POST["playerid"] < 0)) {
                            echo $alert;
                            echo $form;
                        } else {
                            $posid = $_POST["posid"];
                            $playerid = $_POST["playerid"];
                            echo $db->insert("INSERT INTO server_playerpos VALUES($playerid, $posid)");
                        }
                    } else{
                        echo $form;
                    }
                }//end add player pos
                
            ?>
			</div>
			<!-- actual function code-->
			<!-- actual function code-->
			<!-- actual function code-->
			<!-- actual function code-->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
