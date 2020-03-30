<?php 

//start session
session_start();

//include composers autoloader
require_once("vendor/autoload.php");

//MEEKRO - database variables
DB::$user = 'ipd19';
DB::$password = 'ipdipd';
DB::$dbName = 'ipd19';

//MONOLOG - import library
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * Log information
 */
function logMsg($msgType, $msg){
	$log = new Logger("stephanie_ludgate");
	$log->pushHandler( new StreamHandler( "logs/timing.log", Logger::INFO ) );
	switch ($msgType){
		case "info" :
			$log->info($msg);
		  	break;
		case "notice" :
			$log->notice($msg);
            break;
        case "warning" :
            $log->warning($msg);
            break;
		case "alert" :
			$log->alert($msg);
		  	break;
	  }
}

/**
 * Log information, based on params sent
 */
function logMsgWithParam($msgType, $msg, $msgParam){
	$log = new Logger("stephanie_ludgate");
	$log->pushHandler( new StreamHandler( "logs/timing.log", Logger::INFO ) );
	switch ($msgType){
		case "info" :
			$log->info($msg, array($msgParam));
		  	break;
		case "notice" :
			$log->notice($msg, array($msgParam));
            break;
        case "warning" :
            $log->warning($msg, array($msgParam));
            break;
		case "alert" :
			$log->alert($msg, array($msgParam));
		  	break;
	  }
}

$errorMessage = ""; // variable to monitor errors
$db = null;	// variable for built-in database connection 

/**
 * Connect to mysqli database
 */
function connectDB(){
	global $db;

	// connect to database
	$db = new mysqli("localhost", "ipd19", "ipdipd","ipd19");

	// check connection successful
	if( $db->connect_errno > 0){
		die("Connection failed: " . $db->connect_error);
	}
}

/**
 * Verify if user is logged in using session variables.
 *
 * @return Boolean
 */
function loggedIn(){
	if ( isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true ){
		if ( !isset( $_SESSION['name'] ) ){
			$_SESSION['name'] = "Guest";
		}
		return true;
	}else{
		return false;
	}
}

/**
 * Validate if a given variable is empty
 *
 * @param [string] $field
 * @return boolean
 */
function isFieldEmpty( $field ){
	return ( !isset( $field ) || trim( $field ) == "" );
}

/**
 * Output error messages, only if there are any
 *
 * @return void
 */
function displayErrors(){
	
	global $errorMessage;

	if ($errorMessage != "") { ?>
		<div class="alert alert-danger" id="alert" role="alert">
            <?= $errorMessage ?>
        </div>
	<?php }
}
?>