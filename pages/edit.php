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

    <title>Sports Admin - Editing</title>

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
                    <h1 class="page-header">Editing Record</h1>
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
                    

                //edit sport 
                if ($_GET['editRecord']  == 'sport'  && ($db->getRole($_SESSION['username'])  == 1)){
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <div class="form-group">
                                                <label>Sport:</label>
                                                    <input class="form-control" value="'.$db->getSportEdit($_GET['var']).'" name="sportName" type="text">
                                                </div>
                                                <input name="submit" type="submit" value="Edit Record" class="btn btn-lg btn-success btn-block">
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
                            $sportId = $_GET['var'];
                            echo $db->insert("UPDATE server_sport SET name='$sportName' WHERE id = $sportId");
                        }
                    } else{
                        echo $form;
                    }
                }//end edit sport 

                //edit user 
                if ($_GET['editRecord']  == 'username'  && ($db->getRole($_SESSION['username'])  == 1 )){
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>User Name:</label>
                                                    <input class="form-control" value="'.$_GET['var'].'" name="username" type="text">
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
                                                    <input class="form-control" value="'.$db->getTeam($_GET['var']).'" name="userteam" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>League (ID):</label>
                                                    <input class="form-control" value="'.$db->getLeague($_GET['var']).'" name="userleague" type="text">
                                                </div>
                                                <input name="submit" type="submit" value="Edit Record" class="btn btn-lg btn-success btn-block">
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
                            $oguser = $_GET['var'];
                            $role = $_POST["userrole"];
                            $password =  hash('sha256', $_POST["password"]);
                            $username = $_POST["username"];
                            $userteam = $_POST["userteam"];
                            $userleague = $_POST["userleague"];
                            echo $db->insert("UPDATE server_user SET username='$username', role=$role, password='$password', team=$userteam, league=$userleague WHERE username='$oguser'");
                        }
                    } else{
                        echo $form;
                    }
                }//end edit user 

                //edit season 
                if ($_GET['editRecord']  == 'season'  && ($db->getRole($_SESSION['username'])  == 1 || $db->getRole($_SESSION['username'])  == 2)){
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Sport:</label>
                                                    <input class="form-control" value="'.$db->getSeasonDesc($_GET['var']).'" name="seasondesc" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Year:</label>
                                                    <input class="form-control" value="'.$db->getSeasonYear($_GET['var']).'" name="seasonyear" type="text">
                                                </div>
                                                <input name="submit" type="submit" value="Edit Record" class="btn btn-lg btn-success btn-block">
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
                            $seasonid = $_GET['var'];
                            $seasondesc = $_POST["seasondesc"];
                            $seasonyear = $_POST["seasonyear"];
                            echo $db->insert("UPDATE server_season SET year=$seasonyear, description='$seasondesc' WHERE id=$seasonid");
                        }
                    } else{
                        echo $form;
                    }
                }//end edit season 

                
                //edit sls 
                if ($_GET['editRecord']  == 'sls' && ($db->getRole($_SESSION['username'])  == 1 || $db->getRole($_SESSION['username'])  == 2)){
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Sport ID:</label>
                                                    <input class="form-control" value="'.$_GET['sport'].'" name="sportid" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>League ID:</label>
                                                    <input class="form-control" value="'.$_GET['league'].'" name="leagueid" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Season ID:</label>
                                                    <input class="form-control" value="'.$_GET['season'].'" name="seasonid" type="text">
                                                </div>
                                                <input name="submit" type="submit" value="Edit Record" class="btn btn-lg btn-success btn-block">
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
                            $ogsport = $_GET['sport'];
                            $ogleague = $_GET['league'];
                            $ogseason = $_GET['season'];
                            $sportid = $_POST["sportid"];
                            $leagueid = $_POST["leagueid"];
                            $seasonid = $_POST["seasonid"];
                            echo $db->insert("UPDATE server_slseason SET sport=$sportid, league=$leagueid, season=$seasonid WHERE sport=$ogsport AND season=$ogseason AND league=$ogleague");
                        }
                    } else{
                        echo $form;
                    }
                }//end edit sls 

                
                //edit TEAM 
                if (($_GET['editRecord']  == 'team') && ($db->getRole($_SESSION['username'])  == 1)){
                    $row = $db->getTeamInfo($_GET['var']);
                    $form = '<div class="container">
                    <div class="row">
                        <div class="col-md-12 ">
                                <div class="panel-body">
                                    <form   method="post">
                                        <fieldset>
                                            <div class="form-group">
                                                <label>Team Name:</label>
                                                <input class="form-control" value="'.$row["name"].'" name="teamname" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Mascot:</label>
                                                <input class="form-control" value="'.$row["mascot"].'" name="teammascot" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Picture:</label>
                                                <input class="form-control" value="'.$row["picture"].'" name="teampicture" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Home Color:</label>
                                                <input class="form-control" value="'.$row["homecolor"].'" name="teamhomecolor" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Away Color:</label>
                                                <input class="form-control" value="'.$row["awaycolor"].'" name="teamawaycolor" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Max Players:</label>
                                                <input class="form-control" value="'.$row["maxplayers"].'" name="teamplayers" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>League ID:</label>
                                                <input class="form-control" value="'.$row["league"].'" name="teamleague" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Season ID:</label>
                                                <input class="form-control" value="'.$row["season"].'" name="teamseason" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Sport ID:</label>
                                                <input class="form-control" value="'.$row["sport"].'" name="teamsport" type="text">
                                            </div>
                                            <input name="submit" type="submit" value="Edit Record" class="btn btn-lg btn-success btn-block">
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
                            $teamId = $_GET['var'];
                            $teamname = $_POST["teamname"];
                            $teammascot = $_POST["teammascot"];
                            $teampicture = $_POST["teampicture"];
                            $teamhomecolor = $_POST["teamhomecolor"];
                            $teamawaycolor = $_POST["teamawaycolor"];
                            $teamplayers = $_POST["teamplayers"];
                            $teamleague = $_POST["teamleague"];
                            $teamseason = $_POST["teamseason"];
                            $teamsport = $_POST["teamsport"];
                            echo $db->insert("UPDATE server_team SET name='$teamname', mascot='$teammascot', league=$teamleague, season=$teamseason, sport=$teamsport, picture='$teampicture', homecolor='$teamhomecolor', awaycolor='$teamawaycolor', maxplayers=$teamplayers WHERE id=$teamId");
                        }
                    } else{
                        echo $form;
                    }
                }//end edit team 

                //edit TEAM as league user
                if (($_GET['editRecord']  == 'team') && ($db->getRole($_SESSION['username'])  == 2)){
                    $row = $db->getTeamInfo($_GET['var']);
                    $form = '<div class="container">
                    <div class="row">
                        <div class="col-md-12 ">
                                <div class="panel-body">
                                    <form   method="post">
                                        <fieldset>
                                            <div class="form-group">
                                                <label>Team Name:</label>
                                                <input class="form-control" value="'.$row["name"].'" name="teamname" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Mascot:</label>
                                                <input class="form-control" value="'.$row["mascot"].'" name="teammascot" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Picture:</label>
                                                <input class="form-control" value="'.$row["picture"].'" name="teampicture" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Home Color:</label>
                                                <input class="form-control" value="'.$row["homecolor"].'" name="teamhomecolor" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Away Color:</label>
                                                <input class="form-control" value="'.$row["awaycolor"].'" name="teamawaycolor" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Max Players:</label>
                                                <input class="form-control" value="'.$row["maxplayers"].'" name="teamplayers" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Season ID:</label>
                                                <input class="form-control" value="'.$row["season"].'" name="teamseason" type="text">
                                            </div>
                                            <input name="submit" type="submit" value="Edit Record" class="btn btn-lg btn-success btn-block">
                                        </fieldset>
                                    </form>
                            </div>
                        </div>
                    </div>
                    </div>';

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(empty($_POST["teamname"]) || empty($_POST["teammascot"]) || empty($_POST["teampicture"]) || empty($_POST["teamhomecolor"]) || empty($_POST["teamawaycolor"]) || empty($_POST["teamplayers"]) || empty($_POST["teamseason"])) {
                            echo $alert;
                            echo $form;
                        } else {
                            $teamId = $_GET['var'];
                            $teamname = $_POST["teamname"];
                            $teammascot = $_POST["teammascot"];
                            $teampicture = $_POST["teampicture"];
                            $teamhomecolor = $_POST["teamhomecolor"];
                            $teamawaycolor = $_POST["teamawaycolor"];
                            $teamplayers = $_POST["teamplayers"];
                            $teamseason = $_POST["teamseason"];
                            echo $db->insert("UPDATE server_team SET name='$teamname', mascot='$teammascot',  season=$teamseason, picture='$teampicture', homecolor='$teamhomecolor', awaycolor='$teamawaycolor', maxplayers=$teamplayers WHERE id=$teamId");
                        }
                    } else{
                        echo $form;
                    }
                }//end edit team for league users

                //edit schedule
                if (($_GET['editRecord']  == 'schedule') && ($db->getRole($_SESSION['username'])  == 1 || $db->getRole($_SESSION['username'])  == 2)){
                    $row = $db->getScheduleInfo($_GET['var']);
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Sport ID:</label>
                                                    <input class="form-control" value="'.$row["sport"].'" name="sport" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>League ID:</label>
                                                    <input class="form-control" value="'.$row["league"].'" name="league" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Season ID:</label>
                                                    <input class="form-control" value="'.$row["season"].'" name="season" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Home Team ID:</label>
                                                    <input class="form-control" value="'.$row["hometeam"].'" name="hometeam" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Away Team ID:</label>
                                                    <input class="form-control" value="'.$row["awayteam"].'" name="awayteam" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Home Score:</label>
                                                    <input class="form-control" value="'.$row["homescore"].'" name="homescore" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Away Score:</label>
                                                    <input class="form-control" value="'.$row["awayscore"].'" name="awayscore" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Scheduled Date (yyyy-mm-dd HR:MN:SC):</label>
                                                    <input class="form-control" value="'.$row["scheduled"].'" name="datetime" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Completion Status:</label>
                                                    <select class="form-control" name="complete">
                                                        <option value="1">Completed</option>
                                                        <option value="0">Not Completed</option>
                                                    </select>
                                                </div>
                                                <input name="submit" type="submit" value="Edit Record" class="btn btn-lg btn-success btn-block">
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
                            $ogdate = $_GET["var"];
                            $sport = $_POST["sport"];
                            $league = $_POST["league"];
                            $season = $_POST["season"];
                            $hometeam = $_POST["hometeam"];
                            $awayteam = $_POST["awayteam"];
                            $homescore = $_POST["homescore"];
                            $awayscore = $_POST["awayscore"];
                            $datetime = $_POST["datetime"];
                            $complete = $_POST["complete"];
                            echo $db->insert("UPDATE server_schedule SET sport=$sport, league=$league, season=$season, hometeam=$hometeam, awayteam=$awayteam, homescore=$homescore, awayscore=$awayscore, scheduled='$datetime', completed=$complete WHERE scheduled='$ogdate'");
                        }
                    } else{
                        echo $form;
                    }
                }//end edit schedule 

                //edit coach mgr 
                if (($_GET['editRecord']  == 'user')  && ($db->getRole($_SESSION['username'])  == 1 || $db->getRole($_SESSION['username'])  == 2 )){
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>User Name:</label>
                                                    <input class="form-control" value="'.$_GET['var'].'" name="username" type="text">
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
                                                <div class="form-group">
                                                    <label>Team (ID):</label>
                                                    <input class="form-control" value="'.$db->getTeam($_GET['var']).'" name="userteam" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>League (ID):</label>
                                                    <input class="form-control" value="'.$db->getLeague($_GET['var']).'" name="userleague" type="text">
                                                </div>
                                                <input name="submit" type="submit" value="Edit Record" class="btn btn-lg btn-success btn-block">
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
                            $oguser = $_GET['var'];
                            $role = $_POST["userrole"];
                            $password =  hash('sha256', $_POST["password"]);
                            $username = $_POST["username"];
                            $userteam = $_POST["userteam"];
                            $userleague = $_POST["userleague"];
                            echo $db->insert("UPDATE server_user SET username='$username', role=$role, password='$password', team=$userteam, league=$userleague WHERE username='$oguser'");
                        }
                    } else{
                        echo $form;
                    }
                }//end edit coach mgr 

                //edit position 
                if ($_GET['editRecord']  == 'position'  && ($db->getRole($_SESSION['username'])  == 1 || $db->getRole($_SESSION['username'])  == 3 || $db->getRole($_SESSION['username'])  == 4)){
                    $position = $db->getPositionId($_GET["var"]);
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <div class="form-group">
                                                <label>Position:</label>
                                                    <input class="form-control" value="'.$position.'" name="position" type="text">
                                                </div>
                                                <input name="submit" type="submit" value="Edit Record" class="btn btn-lg btn-success btn-block">
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
                            $ogposition = $_GET["var"];
                            $position = $_POST["position"];
                            echo $db->insert("UPDATE server_position set name='$position' WHERE id=$ogposition");
                        }
                    } else{
                        echo $form;
                    }
                }//end add position   

                //edit coach mgr 
                if (($_GET['editRecord']  == 'user') && ($db->getRole($_SESSION['username'])  == 3 || $db->getRole($_SESSION['username'])  == 4 )){
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>User Name:</label>
                                                    <input class="form-control" value="'.$_GET['var'].'" name="username" type="text">
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
                                                <input name="submit" type="submit" value="Edit Record" class="btn btn-lg btn-success btn-block">
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
                            $oguser = $_GET['var'];
                            $role = $_POST["userrole"];
                            $password =  hash('sha256', $_POST["password"]);
                            $username = $_POST["username"];
                            $userteam = $db->getTeam($_SESSION['username']);
                            $userleague = $db->getLeague($_SESSION['username']);
                            echo $db->insert("UPDATE server_user SET username='$username', role=$role, password='$password', team=$userteam, league=$userleague WHERE username='$oguser'");
                        }
                    } else{
                        echo $form;
                    }
                }//end edit coach mgr    

                //edit player
                if (($_GET['editRecord']  == 'player') && ($db->getRole($_SESSION['username'])  == 3 || $db->getRole($_SESSION['username'])  == 4 )){
                    $row = $db->getPlayerInfo($_GET['var']);

                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>First Name:</label>
                                                    <input class="form-control" value="'.$row["firstname"].'" name="firstname" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Last Name:</label>
                                                    <input class="form-control" value="'.$row["lastname"].'" name="lastname" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Date of birth:</label>
                                                    <input class="form-control" value="'.$row["dateofbirth"].'" name="dob" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Jersey Number:</label>
                                                    <input class="form-control" value="'.$row["jerseynumber"].'" name="jerseynumber" type="text">
                                                </div>
                                                <input name="submit" type="submit" value="Edit Record" class="btn btn-lg btn-success btn-block">
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
                            $playerId = $_GET['var'];
                            $firstname = $_POST["firstname"];
                            $lastname = $_POST["lastname"];
                            $dob = $_POST["dob"];
                            $jerseynumber = $_POST["jerseynumber"];
                            $teamid = $db->getTeam($_SESSION['username']);
                            echo $db->insert("UPDATE server_player SET firstname='$firstname', lastname='$lastname', dateofbirth='$dob', jerseynumber=$jerseynumber, team=$teamid WHERE id=$playerId");
                        }
                    } else{
                        echo $form;
                    }
                }//end edit player    

                //edit player ADMIN ver
                if (($_GET['editRecord']  == 'player') && ($db->getRole($_SESSION['username'])  == 1)){
                    $row = $db->getPlayerInfo($_GET['var']);

                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>First Name:</label>
                                                    <input class="form-control" value="'.$row["firstname"].'" name="firstname" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Last Name:</label>
                                                    <input class="form-control" value="'.$row["lastname"].'" name="lastname" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Date of birth:</label>
                                                    <input class="form-control" value="'.$row["dateofbirth"].'" name="dob" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Jersey Number:</label>
                                                    <input class="form-control" value="'.$row["jerseynumber"].'" name="jerseynumber" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Team ID:</label>
                                                    <input class="form-control" value="'.$row["team"].'" name="teamid" type="text">
                                                </div>
                                                <input name="submit" type="submit" value="Edit Record" class="btn btn-lg btn-success btn-block">
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
                            $playerId = $_GET['var'];
                            $firstname = $_POST["firstname"];
                            $lastname = $_POST["lastname"];
                            $dob = $_POST["dob"];
                            $jerseynumber = $_POST["jerseynumber"];
                            $teamid = $_POST["teamid"];
                            echo $db->insert("UPDATE server_player SET firstname='$firstname', lastname='$lastname', dateofbirth='$dob', jerseynumber=$jerseynumber, team=$teamid WHERE id=$playerId");
                        }
                    } else{
                        echo $form;
                    }
                }//end edit player

                //edit player position
                if (($_GET['editRecord']  == 'playerpos') && ($db->getRole($_SESSION['username'])  == 1 || ($db->getRole($_SESSION['username'])  == 3 || $db->getRole($_SESSION['username'])  == 4 ))){

                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Player ID:</label>
                                                    <input class="form-control" value="'.$_GET['var'].'" name="playerid" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Position ID:</label>
                                                    <input class="form-control" value="'.$db->getPositionPlayer($_GET['var']).'" name="posid" type="text">
                                                </div>
                                                <input name="submit" type="submit" value="Add Record" class="btn btn-lg btn-success btn-block">
                                            </fieldset>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>';

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(($_POST["posid"] <0) || ($_POST["playerid"] <0)) {
                            echo $alert;
                            echo $form;
                        } else {
                            $posid = $_POST["posid"];
                            $playerid = $_POST["playerid"];
                            echo $db->insert("UPDATE server_playerpos SET player=$playerid, position=$posid)");
                        }
                    } else{
                        echo $form;
                    }
                }//end edit player pos
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
