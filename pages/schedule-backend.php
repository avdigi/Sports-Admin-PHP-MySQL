<?php
	include("db.php");
	
//backend for the admin page	
class ScheduleBackend {
	
	//set up a new DB class
	public function __construct(){
		$this->db = new DB();
		
	}
	//begin intializaiton on function call
	function paintSchedulePage(){
		switch ($_SESSION['userrole']){
			
			//Admin Role
			case 1:
				echo '<div class="row">';
                $this->paintSchedule();
				echo '</div>';
				break;
				
			//League Manager Role
			case 2:
				echo '<div class="row">';
                $this->paintSchedule();
				echo '</div>';
				break;
				
			//Team Manager Role
			case 3:
                echo '<div class="row">';
                $this->paintScheduleTeam();
                echo '</div>';
				break;
				
			//Coach Role
			case 4:
                echo '<div class="row">';
                $this->paintScheduleTeam();
                echo '</div>';
                break;
            //Parent role
            case 5:
                echo '<div class="row">';
                $this->paintScheduleTeam();
                echo '</div>';
                break;
		}
	}
    
    //Only for admin
	function paintUsers(){
		echo ' <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-users fa-fw"></i> Users List
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Username</th>
                                                    <th>Role</th>
                                                    <th>Team</th>
                                                    <th>League</th>
													<th>Edit</th>
													<th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
											echo $this->db->getUserList();
                                        echo '</tbody>
										</table>
                                    </div>
                                </div>
                            </div>
						<a href="add.php?addRecord=user"  class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus fa-fw"></i> Add an User</a>
                        </div>
                    </div>
                </div>';
    }
    
    //Only for admin
	function paintSports(){
		echo ' <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-soccer-ball-o fa-fw"></i> Sports List
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sport</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
											echo $this->db->getSportList();
                                        echo '</tbody>
										</table>
                                    </div>
                                </div>
                            </div>
						<a href="add.php?addRecord=sport"  class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus fa-fw"></i> Add a Sport</a>
                        </div>
                    </div>
                </div>';
	}
    
    //Only for admin & league managers
	function paintSeasons(){
		echo ' <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-sun-o fa-fw"></i> Seasons List
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Season</th>
													<th>Year</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
											echo $this->db->getSeasons();
                                        echo '</tbody>
										</table>
                                    </div>
                                </div>
                            </div>
						<a href="add.php?addRecord=season"  class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus fa-fw"></i> Add a Season</a>
                        </div>
                    </div>
                </div>';
    }
    
    //Only for admin and league managers
	function paintSLS(){
		echo ' <div class="col-lg-7">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-th-list fa-fw"></i> Sport, League, Season List
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sport</th>
													<th>League</th>
                                                    <th>Season</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
											echo $this->db->getSLS();
                                        echo '</tbody>
										</table>
                                    </div>
                                </div>
                            </div>
						<a href="add.php?addRecord=sls"  class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus fa-fw"></i> Add a Season/League/Sport</a>
                        </div>
                    </div>
                </div>';
	}
    
    //Only for Admin
	function paintTeam(){
		echo ' <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-tasks fa-fw"></i> Team List
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Team Name</th>
                                                    <th>Mascot</th>
                                                    <th>Picture</th>
                                                    <th>Home Color</th>
                                                    <th>Away Color</th>
                                                    <th>Max Players</th>
                                                    <th>League</th>
                                                    <th>Season</th>
                                                    <th>Sport</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
											echo $this->db->getTeams();
                                        echo '</tbody>
										</table>
                                    </div>
                                </div>
                            </div>
						<a href="add.php?addRecord=team"  class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus fa-fw"></i> Add a Team</a>
                        </div>
                    </div>
                </div>';
    }
    
    function paintTeamLeague(){
		echo ' <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Team List
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Team Name</th>
                                                    <th>Mascot</th>
                                                    <th>Picture</th>
                                                    <th>Home Color</th>
                                                    <th>Away Color</th>
                                                    <th>Max Players</th>
                                                    <th>League</th>
                                                    <th>Season</th>
                                                    <th>Sport</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
											echo $this->db->getTeamLeague($_SESSION['username']);
                                        echo '</tbody>
										</table>
                                    </div>
                                </div>
                            </div>
						<a href="add.php?addRecord=team"  class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus fa-fw"></i> Add a Team</a>
                        </div>
                    </div>
                </div>';
    }

    function paintSchedule(){
		echo ' <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-calendar fa-fw"></i> Schedule
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sport</th>
                                                    <th>League</th>
                                                    <th>Season</th>
                                                    <th>Home Team</th>
                                                    <th>Away Team</th>
                                                    <th>Home Score</th>
                                                    <th>Away Score</th>
                                                    <th>Date & Time</th>
                                                    <th>Completed</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
											echo $this->db->getSchedule();
                                        echo '</tbody>
										</table>
                                    </div>
                                </div>
                            </div>
						<a href="add.php?addRecord=game"  class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus fa-fw"></i> Add a Game</a>
                        </div>
                    </div>
                </div>';
    }

    function paintScheduleTeam(){
		echo ' <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-calendar fa-fw"></i> Schedule
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sport</th>
                                                    <th>League</th>
                                                    <th>Season</th>
                                                    <th>Home Team</th>
                                                    <th>Away Team</th>
                                                    <th>Home Score</th>
                                                    <th>Away Score</th>
                                                    <th>Date & Time</th>
                                                    <th>Completed</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
											echo $this->db->getScheduleTeam($_SESSION['username']);
                                        echo '</tbody>
										</table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
    }
    
	function paintCoachesMgr(){
		echo ' <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-users fa-fw"></i> Team Managers & Coaches
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Username</th>
                                                    <th>Role</th>
                                                    <th>Team</th>
                                                    <th>League</th>
													<th>Edit</th>
													<th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
											echo $this->db->getCoachesMgr();
                                        echo '</tbody>
										</table>
                                    </div>
                                </div>
                            </div>
						<a href="add.php?addRecord=coach"  class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus fa-fw"></i> Add an User</a>
                        </div>
                    </div>
                </div>';
	}
    
	function paintPositions(){
		echo ' <div class="col-lg-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-users fa-fw"></i> Positions
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Position</th>
													<th>Edit</th>
													<th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
											echo $this->db->getPositions();
                                        echo '</tbody>
										</table>
                                    </div>
                                </div>
                            </div>
						<a href="add.php?addRecord=position"  class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus fa-fw"></i> Add a Position</a>
                        </div>
                    </div>
                </div>';
	}
    
    function paintPlayers(){
		echo ' <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Player List
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Date of Birth</th>
                                                    <th>Jersey Number</th>
                                                    <th>Position</th>
                                                    <th>Team Name</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
											echo $this->db->getPlayers();
                                        echo '</tbody>
										</table>
                                    </div>
                                </div>
                            </div>
						<a href="add.php?addRecord=teamLeague"  class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus fa-fw"></i> Add a Player</a>
                        </div>
                    </div>
                </div>';
    }
    
    function paintPlayersTeam(){
		echo ' <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Player List
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Date of Birth</th>
                                                    <th>Jersey Number</th>
                                                    <th>Position</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
											echo $this->db->getPlayerTeam($_SESSION['username']);
                                        echo '</tbody>
										</table>
                                    </div>
                                </div>
                            </div>
						<a href="add.php?addRecord=teamLeague"  class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus fa-fw"></i> Add a Player</a>
                        </div>
                    </div>
                </div>';
    }
    
    function paintAffiliated(){
		echo ' <div class="col-lg-7">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Coaches, Team Managers, Parents List
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Username</th>
                                                    <th>Role</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
											echo $this->db->getAffiliated($_SESSION['username']);
                                        echo '</tbody>
										</table>
                                    </div>
                                </div>
                            </div>
						<a href="add.php?addRecord=coachparent"  class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus fa-fw"></i> Add an User</a>
                        </div>
                    </div>
                </div>';
    }
    
}
?>