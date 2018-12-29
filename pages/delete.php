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

    <title>Sports Admin - Deleting</title>

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
                    <h1 class="page-header">Deleting Record</h1>
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

                //delete sport 
                if ($_GET['delRecord']  == 'sport'  && ($db->getRole($_SESSION['username'])  == 1)){
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <input name="submit" type="submit" value="Confirm Delete Sport" class="btn btn-lg btn-outline btn-danger btn-block">
                                            </fieldset>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>';

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $sportId = $_GET['var'];
                            echo $db->insert("DELETE from server_sport where id = $sportId");
                    } else{
                        echo $form;
                    }
                }//end delete sport 

                //delete user 
                if ($_GET['delRecord']  == 'username'  && ($db->getRole($_SESSION['username'])  == 1)){
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <input name="submit" type="submit" value="Confirm Delete User" class="btn btn-lg btn-outline btn-danger btn-block">
                                            </fieldset>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>';

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $user = $_GET['var'];
                            echo $db->insert("DELETE from server_user where username = '$user'");
                    } else{
                        echo $form;
                    }
                }//end delete user 

                //delete season 
                if ($_GET['delRecord']  == 'season'  && ($db->getRole($_SESSION['username'])  == 1 || $db->getRole($_SESSION['username'])  == 2)){
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <input name="submit" type="submit" value="Confirm Delete Season" class="btn btn-lg btn-outline btn-danger btn-block">
                                            </fieldset>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>';

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $seasonid = $_GET['var'];
                            echo $db->insert("DELETE from server_season where id = '$seasonid'");
                    } else{
                        echo $form;
                    }
                }//end delete season 

                
                //delete sls 
                if ($_GET['delRecord']  == 'sls' && ($db->getRole($_SESSION['username'])  == 1 || $db->getRole($_SESSION['username'])  == 2)){
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <input name="submit" type="submit" value="Confirm Delete Season" class="btn btn-lg btn-outline btn-danger btn-block">
                                            </fieldset>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>';

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $seasonid = $_GET['season'];
                            $leagueid = $_GET['league'];
                            $sportid = $_GET['sport'];
                            echo $db->insert("DELETE from server_slseason where season = '$seasonid' AND league = '$leagueid' AND sport = '$sportid'");
                    } else{
                        echo $form;
                    }
                }//end delete sls

                //delete team 
                if ($_GET['delRecord']  == 'team'  && ($db->getRole($_SESSION['username'])  == 1)){
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <input name="submit" type="submit" value="Confirm Delete Team" class="btn btn-lg btn-outline btn-danger btn-block">
                                            </fieldset>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>';

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $teamId = $_GET['var'];
                            echo $db->insert("DELETE from server_team where id = $teamId");
                    } else{
                        echo $form;
                    }
                }//end delete team

                
                //delete schedule 
                if ($_GET['delRecord']  == 'schedule'  && ($db->getRole($_SESSION['username'])  == 1) || ($db->getRole($_SESSION['username'])  == 2)){
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <input name="submit" type="submit" value="Confirm Delete Game" class="btn btn-lg btn-outline btn-danger btn-block">
                                            </fieldset>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>';

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $datetime = $_GET['var'];
                            echo $db->insert("DELETE from server_schedule where scheduled = '$datetime'");
                    } else{
                        echo $form;
                    }
                }//end delete schedule     

                //delete position 
                if ($_GET['delRecord']  == 'position'  && ($db->getRole($_SESSION['username'])  == 1) || ($db->getRole($_SESSION['username'])  == 2)){
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <input name="submit" type="submit" value="Confirm Delete Position" class="btn btn-lg btn-outline btn-danger btn-block">
                                            </fieldset>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>';

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $posid = $_GET['var'];
                            echo $db->insert("DELETE from server_position where id = $posid");
                    } else{
                        echo $form;
                    }
                }//end delete position     

                //delete player 
                if ($_GET['delRecord']  == 'player'  && ($db->getRole($_SESSION['username'])  == 1) || ($db->getRole($_SESSION['username'])  == 2) || ($db->getRole($_SESSION['username'])  == 3) || ($db->getRole($_SESSION['username'])  == 4)){
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <input name="submit" type="submit" value="Confirm Delete Player" class="btn btn-lg btn-outline btn-danger btn-block">
                                            </fieldset>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>';

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $playid = $_GET['var'];
                            echo $db->insert("DELETE from server_player where id = $playid");
                    } else{
                        echo $form;
                    }
                }//end delete player     

                //delete player pos
                if ($_GET['delRecord']  == 'playerpos'  && ($db->getRole($_SESSION['username'])  == 1) || ($db->getRole($_SESSION['username'])  == 2) || ($db->getRole($_SESSION['username'])  == 3) || ($db->getRole($_SESSION['username'])  == 4)){
                    $form = '<div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                    <div class="panel-body">
                                        <form   method="post">
                                            <fieldset>
                                                <input name="submit" type="submit" value="Confirm Delete Player Position" class="btn btn-lg btn-outline btn-danger btn-block">
                                            </fieldset>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>';

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $playid = $_GET['var'];
                            echo $db->insert("DELETE from server_playerpos where player = $playid");
                    } else{
                        echo $form;
                    }
                }//end delete player pos
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