<?php
	include("db.php");
	
//backend for the admin page	
class AdminBackend {
	
	//set up a new DB class
	public function __construct(){
		$this->db = new DB();
		
	}
	//begin intializaiton on function call
	function paintAdmin(){
		switch ($_SESSION['userrole']){
			
			//Admin Role
			case 1:
				echo '<div class="row">';
				$this->paintUsers();
				$this->paintSports();
				echo '</div>';
				echo '<div class="row">';
                $this->paintSeasons();
                $this->paintCoachesMgr();
				echo '</div>';
				echo '<div class="row">';
                $this->paintSLS();
				echo '</div>';
				break;
				
			//League Manager Role
			case 2:
				echo '<div class="row">';
				$this->paintSeasons();
                $this->paintCoachesMgr();
                echo '</div>';
				echo '<div class="row">';
                $this->paintSLS();
                echo '</div>';
				break;
				
			//Team Manager Role
			case 3:
                echo '<div class="row">';
                $this->paintAffiliated();
                echo '</div>';
				break;
				
			//Coach Role
			case 4:
                echo '<div class="row">';
                $this->paintAffiliated();
                echo '</div>';
                break;
            //Parent role
            case 5:
                echo '<div class="row"><div class="panel panel-primary">';
                echo '<div class="panel-heading">Select the links on the left to browse</div>';
                echo '<div class="panel-body">For more content such as Schedule & Team</div>';
                echo '</div></div>';
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
                                                    <th>League</th>
                                                    <th>Team</th>
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