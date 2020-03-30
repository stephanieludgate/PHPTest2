<?php
require "inc/function.inc.php"; // configuration
connectDB(); // database connection

// check if user is already logged in
if (loggedIn()){
  header("Location: index.php");
  die();
}

// initial values
$pageTitle = "Login";
$data = array('id'=>"", 'access_code'=>"", 'password' =>"", 'login_time'=>"");

// CHECK FOR POST METHOD
if ( $_SERVER['REQUEST_METHOD'] == "POST"){
  if ( isFieldEmpty( $_POST['accessCode']) || isFieldEmpty( $_POST['password']) ){
    $errorMessage = "All fields are required";
  } else if (!ctype_digit($_POST['accessCode']) || strlen($_POST['accessCode'])!=5){
	  $errorMessage = "Access code must be numeric with length of 5";
  } else if(strlen($_POST['password'])<3 || strlen($_POST['password'])>6){
	$errorMessage = "Password must be between 3-6 characters long";
  }

	if ( $errorMessage == "" ){
		// no errors yet, query db to check if user exists
		$data =  DB::queryFirstRow("SELECT * FROM timing_users WHERE access_code=%i", $_POST['accessCode']);
		if (DB::count() != 0){ // user exists
			if ( !password_verify( $_POST['password'], $data['password']) ){
				$errorMessage = "Password does not match out records.";
			} else {
				//password matches, set our session variables
				$_SESSION['isLoggedIn'] = true;
				$_SESSION['accessCode'] = $data['access_code'];

				// save the current time to timing_user
				$data['login_time'] = time();
				
				DB::insertUpdate("timing_users", $data);

				// log notice before redirect
				logMsgWithParam("notice", "User Logged In", $_SESSION['accessCode']);

				// redirect user
				header("Location: index.php");
				die();
			}
		} else {
			// I realize we wouldn't normally state user not found, just using this for testing purposes
			$errorMessage = "User not found"; 
		}
	}

}

include "inc/header.inc.php"; 
?>
			<div class="card-header">
				<h3>Access to Test #2</h3>
			</div>
			<?= displayErrors() ?>
			<div class="card-body">
				<form action="login.php" method="POST">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-hashtag"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="access code" name="accessCode">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="password" name="password">
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
<?php include "inc/footer.inc.php"; ?>