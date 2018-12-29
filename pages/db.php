<?php

class DB {

    private $dbh;	
	
    function __construct(){
        try {
            //open a connection
            $this->dbh = new PDO("mysql:host={$_SERVER['DB_SERVER']};
            dbname={$_SERVER['DB']}", $_SERVER['DB_USER'], $_SERVER['DB_PASSWORD']);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die("Failed to connect to database");
        }
    }//constructor
	
	function clean($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	//login functionality
	function login($username, $password){
		$username = $this->clean($username);
		$password = $this->clean($password);
		$hashedPassword = hash('sha256', $password);
        try {
            $data = array();
            $stmt = $this->dbh->prepare("select * from server_user where username = :username and password= :hashedPassword");
            $stmt->execute(array("username"=>$username, "hashedPassword"=>$hashedPassword));
			$row = $stmt->fetch();
			if ($row >= 1){
				return true;
			}
			else {
				return false;
			}
        } catch (PDOException $e){
            echo $e->getMessage();
            die("Login attempt failed");
        }
	}
	
	//obtains role from an username
	function getRole($username){
		$username = $this->clean($username);
        try {
            $data = array();
            $stmt = $this->dbh->prepare("select role from server_user where username = :username");
            $stmt->execute(array("username"=>$username));
			$row = $stmt->fetch();
            return $row[0];
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get role failed");
        }
		
	}	
	
	//obtains team from an username
	function getTeam($username){
		$username = $this->clean($username);
        try {
            $data = array();
            $stmt = $this->dbh->prepare("select team from server_user where username = :username");
            $stmt->execute(array("username"=>$username));
			$row = $stmt->fetch();
            return $row[0];
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get team failed");
        }
		
	}
		
	//obtains league from an username
	function getLeague($username){
		$username = $this->clean($username);
        try {
            $data = array();
            $stmt = $this->dbh->prepare("select league from server_user where username = :username");
            $stmt->execute(array("username"=>$username));
			$row = $stmt->fetch();
            return $row[0];
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get league failed");
        }
		
	}
		
	//obtains season from league
	function getSeason($leagueId){
		$leagueId = $this->clean($leagueId);
        try {
            $data = array();
            $stmt = $this->dbh->prepare("select season from server_slseason where league = :leagueId");
            $stmt->execute(array("leagueId"=>$leagueId));
			$row = $stmt->fetch();
            return $row[0];
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get season failed");
        }
		
	}
		
	//obtains sport from league
	function getSport($leagueId){
		$leagueId = $this->clean($leagueId);
        try {
            $data = array();
            $stmt = $this->dbh->prepare("select sport from server_slseason where league = :leagueId");
            $stmt->execute(array("leagueId"=>$leagueId));
			$row = $stmt->fetch();
            return $row[0];
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get season failed");
        }
	}
	
	//obtains list of users
	function getUserList(){
        try {
            $data = array();
            $stmt = $this->dbh->prepare("select server_user.username, server_roles.name AS role, server_league.name AS league, server_team.name AS team FROM server_roles LEFT JOIN server_user ON server_roles.id = server_user.role LEFT JOIN server_team ON server_user.team = server_team.id LEFT JOIN server_league on server_user.league = server_league.id");
			
            $stmt->execute();
            while($row = $stmt->fetch()){
				echo '<tr>
						<td>'.$row["username"].'</td>
						<td>'.$row["role"].'</td>
						<td>'.$row["league"].'</td>
						<td>'.$row["team"].'</td>
						<td class="text-center"><a href="edit.php?editRecord=username&var='.$row["username"].'" class="btn btn-success">Edit</a></td>
						<td class="text-center"><a href="delete.php?delRecord=username&var='.$row["username"].'"  class="btn btn-danger">Delete</a></td>
				</tr>';
			}
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get users failed");
        }
    }
	
	//obtains list of sports
	function getSportList(){
        try {
            $data = array();
            $stmt = $this->dbh->prepare("select id, name from server_sport");
            $stmt->execute();
            while($row = $stmt->fetch()){
				echo '<tr>
						<td>'.$row["name"].'</td>
						<td class="text-center"><a href="edit.php?editRecord=sport&var='.$row["id"].'"  class="btn btn-success">Edit</a></td>
						<td class="text-center"><a href="delete.php?delRecord=sport&var='.$row["id"].'"  class="btn btn-danger">Delete</a></td>
					</tr>';
			}
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get sports failed");
        }
	}
	
	//obtains list of seasons
	function getSeasons(){
        try {
            $data = array();
            $stmt = $this->dbh->prepare("select id,year, description from server_season");
            $stmt->execute();
            while($row = $stmt->fetch()){
				echo '<tr>
						<td>'.$row["description"].'</td>
						<td>'.$row["year"].'</td>
						<td class="text-center"><a href="edit.php?editRecord=season&var='.$row["id"].'"  class="btn btn-success">Edit</a></td>
						<td class="text-center"><a href="delete.php?delRecord=season&var='.$row["id"].'"  class="btn btn-danger">Delete</a></td>
					</tr>';
			}
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get seasons failed");
        }
    }
    
    //obtains list of users
	function getSLS(){
        try {
            $data = array();
            $stmt = $this->dbh->prepare("select server_sport.name AS sport, server_league.name AS league, server_season.description AS season, server_slseason.sport AS sportid, server_slseason.league AS leagueid, server_slseason.season AS seasonid FROM server_slseason LEFT JOIN server_sport ON server_slseason.sport = server_sport.id LEFT JOIN server_league ON server_slseason.league = server_league.id LEFT JOIN server_season on server_slseason.season = server_season.id");
			
            $stmt->execute();
            while($row = $stmt->fetch()){
				echo '<tr>
						<td>'.$row["sport"].'</td>
						<td>'.$row["league"].'</td>
						<td>'.$row["season"].'</td>
						<td class="text-center"><a href="edit.php?editRecord=sls&sport='.$row["sportid"].'&league='.$row["leagueid"].'&season='.$row["seasonid"].'"  class="btn btn-success">Edit</a></td>
						<td class="text-center"><a href="delete.php?delRecord=sls&sport='.$row["sportid"].'&league='.$row["leagueid"].'&season='.$row["seasonid"].'"  class="btn btn-danger">Delete</a></td>
				</tr>';
			}
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get sls failed");
        }
    }
    
    //obtains list of all teams
	function getTeams(){
        try {
            $data = array();
            $stmt = $this->dbh->prepare("select server_team.id as teamId, server_team.name AS teamName, server_team.mascot, server_team.picture, server_team.homecolor, server_team.awaycolor, server_team.maxplayers, server_league.name AS leagueName, server_season.description AS season, server_sport.name as sport FROM server_team LEFT JOIN server_season ON server_team.season = server_season.id LEFT JOIN server_league ON server_team.league = server_league.id LEFT JOIN server_sport on server_team.sport = server_sport.id");
			
            $stmt->execute();
            while($row = $stmt->fetch()){
				echo '<tr>
						<td>'.$row["teamName"].'</td>
						<td>'.$row["mascot"].'</td>
						<td>'.$row["picture"].'</td>
						<td>'.$row["homecolor"].'</td>
						<td>'.$row["awaycolor"].'</td>
						<td>'.$row["maxplayers"].'</td>
						<td>'.$row["leagueName"].'</td>
						<td>'.$row["season"].'</td>
						<td>'.$row["sport"].'</td>
						<td class="text-center"><a href="edit.php?editRecord=team&var='.$row["teamId"].'"  class="btn btn-success">Edit</a></td>
						<td class="text-center"><a href="delete.php?delRecord=team&var='.$row["teamId"].'"  class="btn btn-danger">Delete</a></td>
				</tr>';
			}
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get teams failed");
        }
    }
    
    //obtains list of specific team
	function getTeamUser($username){
        try {
            $username = $this->clean($username);
            $teamId = $this->getTeam($username);
            $data = array();
            $stmt = $this->dbh->prepare("select server_team.id as teamId, server_team.name AS teamName, server_team.mascot, server_team.picture, server_team.homecolor, server_team.awaycolor, server_team.maxplayers, server_league.name AS leagueName, server_season.description AS season, server_sport.name as sport FROM server_team LEFT JOIN server_season ON server_team.season = server_season.id LEFT JOIN server_league ON server_team.league = server_league.id LEFT JOIN server_sport on server_team.sport = server_sport.id WHERE server_team.id = :teamId");
			
            $stmt->execute(array("teamId"=>$teamId));
            while($row = $stmt->fetch()){
				echo '<tr>
						<td>'.$row["teamName"].'</td>
						<td>'.$row["mascot"].'</td>
						<td>'.$row["picture"].'</td>
						<td>'.$row["homecolor"].'</td>
						<td>'.$row["awaycolor"].'</td>
						<td>'.$row["maxplayers"].'</td>
						<td>'.$row["leagueName"].'</td>
						<td>'.$row["season"].'</td>
						<td>'.$row["sport"].'</td>
						<td class="text-center"><a href="edit.php?editRecord=team&var='.$row["teamId"].'"  class="btn btn-success">Edit</a></td>
						<td class="text-center"><a href="delete.php?delRecord=team&var='.$row["teamId"].'"  class="btn btn-danger">Delete</a></td>
				</tr>';
			}
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get teams failed");
        }
    }
    
    //obtains list of teams in that league
	function getTeamLeague($username){
        try {
            $username = $this->clean($username);
            $leagueId = $this->getLeague($username);
            $data = array();
            $stmt = $this->dbh->prepare("select server_team.id as teamId, server_team.name AS teamName, server_team.mascot, server_team.picture, server_team.homecolor, server_team.awaycolor, server_team.maxplayers, server_league.name AS leagueName, server_season.description AS season, server_sport.name as sport FROM server_team LEFT JOIN server_season ON server_team.season = server_season.id LEFT JOIN server_league ON server_team.league = server_league.id LEFT JOIN server_sport on server_team.sport = server_sport.id WHERE server_league.id = :leagueId");
            $stmt->execute(array("leagueId"=>$leagueId));
            while($row = $stmt->fetch()){
				echo '<tr>
						<td>'.$row["teamName"].'</td>
						<td>'.$row["mascot"].'</td>
						<td>'.$row["picture"].'</td>
						<td>'.$row["homecolor"].'</td>
						<td>'.$row["awaycolor"].'</td>
						<td>'.$row["maxplayers"].'</td>
						<td>'.$row["leagueName"].'</td>
						<td>'.$row["season"].'</td>
						<td>'.$row["sport"].'</td>
						<td class="text-center"><a href="edit.php?editRecord=team&var='.$row["teamId"].'"  class="btn btn-success">Edit</a></td>
						<td class="text-center"><a href="delete.php?delRecord=team&var='.$row["teamId"].'"  class="btn btn-danger">Delete</a></td>
				</tr>';
			}
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get team league failed");
        }
    }
        
    //obtains list of schedule
	function getSchedule(){
        try {
            $data = array();
            $stmt = $this->dbh->prepare("select server_sport.name AS sportName, server_league.name AS leagueName, server_season.year, server_team.name AS homeTeam, server_team.name AS awayTeam,
            server_schedule.homescore, server_schedule.awayscore, server_schedule.scheduled AS dateTime, server_schedule.completed FROM server_schedule
            LEFT JOIN server_sport ON server_schedule.sport = server_sport.id LEFT JOIN server_league ON server_schedule.league = server_league.id LEFT JOIN server_season
            ON server_schedule.season = server_season.id LEFT JOIN server_team ON server_schedule.hometeam = server_team.id");
			
            $stmt->execute();
            while($row = $stmt->fetch()){
				echo '<tr>
						<td>'.$row["sportName"].'</td>
						<td>'.$row["leagueName"].'</td>
						<td>'.$row["year"].'</td>
						<td>'.$row["homeTeam"].'</td>
						<td>'.$row["awayTeam"].'</td>
						<td>'.$row["homescore"].'</td>
						<td>'.$row["awayscore"].'</td>
						<td>'.$row["dateTime"].'</td>
						<td>'.$row["completed"].'</td>
						<td class="text-center"><a href="edit.php?editRecord=schedule&var='.$row["dateTime"].'"  class="btn btn-success">Edit</a></td>
						<td class="text-center"><a href="delete.php?delRecord=schedule&var='.$row["dateTime"].'"  class="btn btn-danger">Delete</a></td>
				</tr>';
			}
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get schedule failed");
        }
    }
        
    //obtains list of schedule
	function getScheduleTeam($username){
        try {
            $username = $this->clean($username);
            $teamId = $this->getTeam($username);
            $data = array();
            $stmt = $this->dbh->prepare("select server_sport.name AS sportName, server_league.name AS leagueName, server_season.year, server_team.name AS homeTeam, server_team.name AS awayTeam,
            server_schedule.homescore, server_schedule.awayscore, server_schedule.scheduled AS dateTime, server_schedule.completed FROM server_schedule
            LEFT JOIN server_sport ON server_schedule.sport = server_sport.id LEFT JOIN server_league ON server_schedule.league = server_league.id LEFT JOIN server_season
            ON server_schedule.season = server_season.id LEFT JOIN server_team ON server_schedule.hometeam = server_team.id WHERE server_team.id = :teamId");
            $stmt->execute(array("teamId"=>$teamId));
            
            while($row = $stmt->fetch()){
				echo '<tr>
						<td>'.$row["sportName"].'</td>
						<td>'.$row["leagueName"].'</td>
						<td>'.$row["year"].'</td>
						<td>'.$row["homeTeam"].'</td>
						<td>'.$row["awayTeam"].'</td>
						<td>'.$row["homescore"].'</td>
						<td>'.$row["awayscore"].'</td>
						<td>'.$row["dateTime"].'</td>
						<td>'.$row["completed"].'</td>
						<td class="text-center"><a href="edit.php?editRecord=schedule&var='.$row["dateTime"].'"  class="btn btn-success">Edit</a></td>
						<td class="text-center"><a href="delete.php?delRecord=schedule&var='.$row["dateTime"].'"  class="btn btn-danger">Delete</a></td>
				</tr>';
			}
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get schedule team failed");
        }
    }
    
    //obtains list of coach & team mgers
	function getCoachesMgr(){
        try {
            $data = array();
            $stmt = $this->dbh->prepare("select server_user.username, server_roles.name AS role, server_league.name AS league, server_team.name AS team FROM server_roles LEFT JOIN server_user ON server_roles.id = server_user.role LEFT JOIN server_team ON server_user.team = server_team.id LEFT JOIN server_league on server_team.league = server_league.id WHERE server_user.role = 3 OR  server_user.role = 4");
			
            $stmt->execute();
            while($row = $stmt->fetch()){
				echo '<tr>
						<td>'.$row["username"].'</td>
						<td>'.$row["role"].'</td>
						<td>'.$row["league"].'</td>
						<td>'.$row["team"].'</td>
						<td class="text-center"><a href="edit.php?editRecord=user&var='.$row["username"].'"  class="btn btn-success">Edit</a></td>
						<td class="text-center"><a href="delete.php?delRecord=username&var='.$row["username"].'"  class="btn btn-danger">Delete</a></td>
				</tr>';
			}
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get coach mgr failed");
        }
    }
    
    //obtains list of coach & team mgers
	function getPositions(){
        try {
            $data = array();
            $stmt = $this->dbh->prepare("select name, id from server_position");
			
            $stmt->execute();
            while($row = $stmt->fetch()){
				echo '<tr>
						<td>'.$row["name"].'</td>
						<td class="text-center"><a href="edit.php?editRecord=position&var='.$row["id"].'"  class="btn btn-success">Edit</a></td>
						<td class="text-center"><a href="delete.php?delRecord=position&var='.$row["id"].'"  class="btn btn-danger">Delete</a></td>
				</tr>';
			}
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get position failed");
        }
    }
    
    //obtains list of coach & team mgers
	function getPlayerPositions(){
        try {
            $data = array();
            $stmt = $this->dbh->prepare("select server_player.firstname, server_player.lastname, server_position.name as posname, server_player.id from server_playerpos LEFT JOIN server_player ON server_playerpos.player = server_player.id LEFT JOIN server_position ON server_playerpos.position = server_position.id");
			
            $stmt->execute();
            while($row = $stmt->fetch()){
				echo '<tr>
						<td>'.$row["firstname"].'</td>
						<td>'.$row["lastname"].'</td>
						<td>'.$row["posname"].'</td>
						<td class="text-center"><a href="edit.php?editRecord=playerpos&var='.$row["id"].'"  class="btn btn-success">Edit</a></td>
						<td class="text-center"><a href="delete.php?delRecord=playerpos&var='.$row["id"].'"  class="btn btn-danger">Delete</a></td>
				</tr>';
			}
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get position failed");
        }
    }
    
    //obtains list of coach & team mgers
	function getPlayerPositionsTeam($teamid){
        try {
            $teamid = $this->clean($teamid);
            $data = array();
            $stmt = $this->dbh->prepare("select server_player.firstname, server_player.lastname, server_position.name as posname, server_player.id from server_playerpos LEFT JOIN server_player ON server_playerpos.player = server_player.id LEFT JOIN server_position ON server_playerpos.position = server_position.id WHERE server_player.team = :teamid");
			
            $stmt->execute(array("teamid"=>$teamid));
            while($row = $stmt->fetch()){
				echo '<tr>
						<td>'.$row["firstname"].'</td>
						<td>'.$row["lastname"].'</td>
						<td>'.$row["posname"].'</td>
						<td class="text-center"><a href="edit.php?editRecord=playerpos&var='.$row["id"].'"  class="btn btn-success">Edit</a></td>
						<td class="text-center"><a href="delete.php?delRecord=playerpos&var='.$row["id"].'"  class="btn btn-danger">Delete</a></td>
				</tr>';
			}
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get position failed");
        }
    }
    
    //obtains list of teams in that league
	function getPlayers(){
        try {
            $data = array();
            $stmt = $this->dbh->prepare("select server_player.id as playerid, server_player.firstname, server_player.lastname, server_player.dateofbirth, server_player.jerseynumber, server_player.id, server_position.name, server_team.name AS teamName FROM server_player LEFT JOIN server_playerpos ON server_player.id = server_playerpos.player LEFT JOIN server_position ON server_playerpos.position = server_position.id LEFT JOIN server_team ON server_player.team = server_team.id");

            $stmt->execute();
            while($row = $stmt->fetch()){
				echo '<tr>
						<td>'.$row["playerid"].'</td>
						<td>'.$row["firstname"].'</td>
						<td>'.$row["lastname"].'</td>
						<td>'.$row["dateofbirth"].'</td>
						<td>'.$row["jerseynumber"].'</td>
						<td>'.$row["name"].'</td>
						<td>'.$row["teamName"].'</td>
						<td class="text-center"><a href="edit.php?editRecord=player&var='.$row["id"].'"  class="btn btn-success">Edit</a></td>
						<td class="text-center"><a href="delete.php?delRecord=player&var='.$row["id"].'"  class="btn btn-danger">Delete</a></td>
				</tr>';
			}
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get players failed");
        }
    }
    
    //obtains list of players in that team
	function getPlayerTeam($username){
        try {
            $username = $this->clean($username);
            $teamId = $this->getTeam($username);
            $data = array();
            $stmt = $this->dbh->prepare("select server_player.id as playerid, server_player.firstname, server_player.lastname, server_player.dateofbirth, server_player.jerseynumber, server_player.id, server_position.name FROM server_player LEFT JOIN server_playerpos ON server_player.id = server_playerpos.player LEFT JOIN server_position ON server_playerpos.position = server_position.id WHERE team = :teamId");
            $stmt->execute(array("teamId"=>$teamId));

            while($row = $stmt->fetch()){
				echo '<tr>
						<td>'.$row["playerid"].'</td>
						<td>'.$row["firstname"].'</td>
						<td>'.$row["lastname"].'</td>
						<td>'.$row["dateofbirth"].'</td>
						<td>'.$row["jerseynumber"].'</td>
						<td>'.$row["name"].'</td>
						<td class="text-center"><a href="edit.php?editRecord=player&var='.$row["id"].'"  class="btn btn-success">Edit</a></td>
						<td class="text-center"><a href="delete.php?delRecord=player&var='.$row["id"].'"  class="btn btn-danger">Delete</a></td>
				</tr>';
			}
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get palyer of team failed");
        }
    }
    
    //obtains affiliated members
	function getAffiliated($username){
        try {
            $username = $this->clean($username);
            $teamId = $this->getTeam($username);
            $data = array();
            $stmt = $this->dbh->prepare("select server_user.username, server_roles.name AS role, server_league.name AS league, server_team.name AS team FROM server_roles LEFT JOIN server_user ON server_roles.id = server_user.role LEFT JOIN server_team ON server_user.team = server_team.id LEFT JOIN server_league on server_team.league = server_league.id
            WHERE server_user.team = :teamId");
            $stmt->execute(array("teamId"=>$teamId));

            while($row = $stmt->fetch()){
				echo '<tr>
						<td>'.$row["username"].'</td>
						<td>'.$row["role"].'</td>
						<td class="text-center"><a href="edit.php?editRecord=user&var='.$row["username"].'"  class="btn btn-success">Edit</a></td>
						<td class="text-center"><a href="delete.php?delRecord=username&var='.$row["username"].'"  class="btn btn-danger">Delete</a></td>
				</tr>';
			}
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get affiliated failed");
        }
    }

    //insert
    function insert($insertString){
        try {
            $insertString = $this->clean($insertString);
            $stmt = $this->dbh->prepare($insertString);
            $stmt->execute();
            $this->alert($stmt->rowCount() . " records MODIFIED successfully");
        } catch (PDOException $e){
            echo $e->getMessage();
            die("insert failed");
            return false;
        }
    }

    function alert($string){
        echo '<br><div class="alert alert-success">'.$string.'</div>';
    }

    //custom getters for edit forms
	//obtains sport from league
	function getSportEdit($sportId){
		$sportId = $this->clean($sportId);
        try {
            $data = array();
            $stmt = $this->dbh->prepare("select name from server_sport where id = :sportId");
            $stmt->execute(array("sportId"=>$sportId));
			$row = $stmt->fetch();
            return $row[0];
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get sport failed");
        }
    }
    
	//obtains season desc from id
	function getSeasonDesc($var){
		$var = $this->clean($var);
        try {
            $data = array();
            $stmt = $this->dbh->prepare("select description from server_season where id = :var");
            $stmt->execute(array("var"=>$var));
			$row = $stmt->fetch();
            return $row[0];
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get season desc failed");
        }
	}
    
    //obtain season year from id
	function getSeasonYear($var){
		$var = $this->clean($var);
        try {
            $data = array();
            $stmt = $this->dbh->prepare("select year from server_season where id = :var");
            $stmt->execute(array("var"=>$var));
			$row = $stmt->fetch();
            return $row[0];
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get season year failed");
        }
    }
    
    //obtain teams array
	function getTeamInfo($var){
		$var = $this->clean($var);
        try {
            $data = array();
            $stmt = $this->dbh->prepare("select * from server_team where id = :var");
            $stmt->execute(array("var"=>$var));
			return $stmt->fetch();
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get team info failed");
        }
    }
    
    //obtain schedule array
	function getScheduleInfo($scheduleds){
		$scheduleds = $this->clean($scheduleds);
        try {
            $data = array();
            $stmt = $this->dbh->prepare("select * from server_schedule where scheduled = :scheduleds");
            $stmt->execute(array("scheduleds"=>$scheduleds));
			return $stmt->fetch();
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get schedule array failed");
        }
    }
    
    //obtain player array
	function getPlayerInfo($playerid){
		$playerid = $this->clean($playerid);
        try {
            $data = array();
            $stmt = $this->dbh->prepare("select * from server_player where id = :playerid");
            $stmt->execute(array("playerid"=>$playerid));
			return $stmt->fetch();
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get player array failed");
        }
    }
    
    //obtain season year from id
	function getPositionId($var){
		$var = $this->clean($var);
        try {
            $data = array();
            $stmt = $this->dbh->prepare("select name from server_position where id = :var");
            $stmt->execute(array("var"=>$var));
			$row = $stmt->fetch();
            return $row[0];
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get position name failed");
        }
    }
    
    //obtain season year from id
	function getPositionPlayer($var){
		$var = $this->clean($var);
        try {
            $data = array();
            $stmt = $this->dbh->prepare("select position from server_playerpos where player = :var");
            $stmt->execute(array("var"=>$var));
			$row = $stmt->fetch();
            return $row[0];
        } catch (PDOException $e){
            echo $e->getMessage();
            die("get position name failed");
        }
    }
    
}
?>