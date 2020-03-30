<?php

require "inc/function.inc.php"; // configuration
connectDB(); // database connection

if ( !loggedIn() ){
  header("Location: login.php"); // redirect if not logged in
  die();
}

// initial values
$pageTitle = "Timing Quotes";
$data = array('quote'=>"", 'author'=>"", 'id'=>"");
// time permitting, make these numbers dynamic
$minId = 1;
$maxId = 17; 
$randomId = mt_rand($minId,$maxId);

// if GET method used
if ( $_SERVER['REQUEST_METHOD'] == "GET"){
	$data =  DB::queryFirstRow("SELECT * FROM timing_quotes WHERE id=%i", $randomId);

	// establish time limit
	$user = DB::queryFirstRow("SELECT * FROM timing_users WHERE access_code=%i", $_SESSION['accessCode']);
	$timeLimit = $user['login_time'] + 120;
	$secondsLeft = $timeLimit - time();

	if($secondsLeft < 0){
		logMsgWithParam("notice", "Time Expired", $_SESSION['accessCode']);
		header("Location: logout.php");
	} else {
		logMsgWithParam("info", "Quoted By", isset($data['author'])?$data['author']:"Unknown");
	}
}

include "inc/header.inc.php"; 
?>
			<div class="card-header">
				<h3>You have <?= $secondsLeft ?> seconds left!</h3>
			</div>

			<div class="card-body">
				<blockquote class="blockquote">
					<p class="mb-1"><?= $data['quote'] ?></p>
					<footer class="text-right blockquote-footer"><?= isset($data['author'])?$data['author']:"Unknown"; ?></footer>
				</blockquote>
				<!-- Added a button for myself to test -->
				<a href="index.php" class="btn float-right login_btn">Next</a>
			</div>
<?php include "inc/footer.inc.php"; ?>