<?php require_once("header.php"); ?>
<?php

	// require another php file
	// ../../../ => 3 folders back
	require_once("../../config.php");
	$everything_was_okay = true;


	//*********************
	// TO field validation
	//*********************
	

	//check if there is variable in the URL
	if(isset($_GET["given_points"])){
		
		//only if there is given_points in the URL
		//echo "there is given_points";
		
		//if its empty
		if(empty($_GET["given_points"])){
			//it is empty
			echo "Please enter the given_points!";
		}else{
			//its not empty
			echo "given_points: ".$_GET["given_points"]."<br>";
		}
		
	}else{
        
		//echo "there is no such thing as given_points";
	}
	        
        if(isset($_GET["dance_couple_nr"])){
		
		//only if there is given points in the URL
		//echo "there is given points";
		
		//if its empty
		if(empty($_GET["dance_couple_nr"])){
			//it is empty
			echo "Please enter your dance_couple_nr!";
		}else{
			//its not empty
			echo "dance_couple_nr: ".$_GET["dance_couple_nr"]."<br>";
		}
		
	}else{
		//echo "there is no such thing as dance_couple_nr";
    }

         if(isset($_GET["judge"])){
		
		//only if there is given points in the URL
		//echo "there is given points";
		
		//if its empty
		if(empty($_GET["judge"])){
			//it is empty
			echo "Please enter judge!";
		}else{
			//its not empty
			echo "judge: ".$_GET["judge"]."<br>";
		}
		
	}else{
		//echo "there is no such thing as judge";
    }




	/***********************
	**** SAVE TO DB ********
	***********************/
	
	// ? was everything okay
	if($everything_was_okay == true){
		
		echo "Saving to database ... ";
		
		
		//connection with username and password
		//access username from config
		//echo $db_username;
		
		// 1 servername
		// 2 username
		// 3 password
		// 4 database
		$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_angcas");
		
		$stmt = $mysql->prepare("INSERT INTO dance_competition (dance_couple_nr, given_points, judge) VALUES (?,?,?)");
			
		//echo error
		echo $mysql->error;
		
		// we are replacing question marks with values
		// s - string, date or smth that is based on characters and numbers
		// i - integer, number
		// d - decimal, float
		
		//for each question mark its type with one letter
		$stmt->bind_param("iis", $_GET["dance_couple_nr"], $_GET["given_points"], $_GET["judge"]);
		
		//save
		if($stmt->execute()){
			echo "saved sucessfully";
		}else{
			echo $stmt->error;
		}
		
		
	}
	
	
?>

<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		    <a class="navbar-brand" href="#">Brand</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		
		  <ul class="nav navbar-nav">
			
			<li class="active">
				<a href="function.php">
					App page
				</a>
			</li>
			
			
			<li>
				<a href="table.php">
					Table
				</a>
			</li>
			
		  </ul> 
		  
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
<div class="container">


    <br>
    <h2> DANCE COMPETITION CONSTEST </h2>

    <a href="table.php">Link to table</a>

    <form method="get">
        <div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="form-group">
                        <label for="from">From:* </label>
                        <input type="text" name="from"
                        class="form-control">
                    </div>
				</div>
			</div>
        
        <div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="form-group">
                        <label for="dance_couple_nr">dance_couple_nr:* </label>
                        <input type="text" name="dance_couple_nr"
                            class="form-control">
                    </div>
				</div>
			</div>
    

    <br><br>

        <div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="form-group">
                      <label for="given_points">given_points:* </label>
                      <input type="text" name="given_points"
                      class="form-control">
                    </div>
				</div>
			</div>
        
    <br><br>

         <div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="form-group">
                      <label for="judge">judge:* </label>
                      <input type="text" name="judge"
                      class="form-control">
                    </div>
				</div>
			</div>

        <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <input class="btn btn-success hidden-xs" type="submit" value="Save data 1">
                        <input class="btn btn-success btn-block visible-xs-block" type="submit" value="Save data 2">
                    </div>
                </div>
            </form>

    </form>

</div>


