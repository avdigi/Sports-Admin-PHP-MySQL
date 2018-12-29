<?php
	include("db.php");
	
//backend for the admin page	
class TeamBackend {
	
	//set up a new DB class
	public function __construct(){
		$this->db = new DB();
		
	}
	//begin intializaiton on function call
	function paintTeamPage(){
		switch ($_SESSION['userrole']){
			
			//Admin Role
			case 1:
				echo '<div class="row">';
                $this->paintTeam();
				echo '</div>';
				echo '<div class="row">';
                $this->paintPositions();
                $this->paintPlayerPositions();
				echo '</div>';
				echo '<div class="row">';
                $this->paintPlayers();
				echo '</div>';
				break;
				
			//League Manager Role
			case 2:
				echo '<div class="row">';
                $this->paintTeamLeague();
                echo '</div>';
				break;
				
			//Team Manager Role
			case 3:
                echo '<div class="row">';
                $this->paintPositions();
                $this->paintPlayerPositionsTeam();
                echo '</div>';
                echo '<div class="row">';
                $this->paintPlayersTeam();
                echo '</div>';
				break;
				
			//Coach Role
			case 4:
                echo '<div class="row">';
                $this->paintPositions();
                $this->paintPlayerPositionsTeam();
                echo '</div>';
                echo '<div class="row">';
                $this->paintPlayersTeam();
                echo '</div>';
                break;
            //Parent role
            case 5:
                echo '<div class="row">';
                $this->paintTeamUser();
                echo '</div>';
                echo '<div class="row">';
                $this->paintPlayersParent();
                echo '</div>';
                break;
		}
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
    
    //Only for Parent/coach/league
	function paintTeamUser(){
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
											echo $this->db->getTeamUser($_SESSION['username']);
                                        echo '</tbody>
										</table>
                                    </div>
                                </div>
                            </div>
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
                                                    <th>Player ID</th>
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
						<a href="add.php?addRecord=player"  class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus fa-fw"></i> Add a Player</a>
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
                                                    <th>Player ID</th>
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
						<a href="add.php?addRecord=player"  class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus fa-fw"></i> Add a Player</a>
                        </div>
                    </div>
                </div>';
    }
    
    function paintPlayersParent(){
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
    
	function paintPlayerPositions(){
		echo ' <div class="col-lg-7">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-users fa-fw"></i> Player Positions
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
													<th>Position</th>
													<th>Edit</th>
													<th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
											echo $this->db->getPlayerPositions();
                                        echo '</tbody>
										</table>
                                    </div>
                                </div>
                            </div>
						<a href="add.php?addRecord=playerpos"  class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus fa-fw"></i> Add a Player Position</a>
                        </div>
                    </div>
                </div>';
	}
    
	function paintPlayerPositionsTeam(){
		echo ' <div class="col-lg-7">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-users fa-fw"></i> Player Positions
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
													<th>Position</th>
													<th>Edit</th>
													<th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
											echo $this->db->getPlayerPositionsTeam($this->db->getTeam($_SESSION['username']));
                                        echo '</tbody>
										</table>
                                    </div>
                                </div>
                            </div>
						<a href="add.php?addRecord=playerpos"  class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus fa-fw"></i> Add a Player Position</a>
                        </div>
                    </div>
                </div>';
	}
    
}
?>