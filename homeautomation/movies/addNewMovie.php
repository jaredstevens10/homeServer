<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');


//require('../Apps/AppsConfig.php'); 
//require('/var/www/html/Apps/AppsConfig.php');

require('/var/www/html/config.php'); 

//$dbname = "Stevens_PartyTraits";
$dbname = "Home_Automation";
// /*
//include config
//uncomment below
//require_once('../PartyTraits/includes/config.php');

//check if already logged in move to home page
//uncomment below

//if( $adminuser->is_logged_in() ){ header('Location: ../PartyTraits/NewReviewTable.php'); } 

//process login form if submitted
if(isset($_POST['submit'])){

	$adminusername = $_POST['username'];
	$adminpassword = $_POST['password'];

if(
$adminusername == "jared" && $adminpassword == "jared"
){
$_SESSION['username'] = $username;
		header('Location: ../PartyTraits/addnewtrait.php');
		exit;
}
else
{
		$error[] = 'Wrong username or password.';
	}	
	
//if($adminuser->adminlogin($adminusername,$adminpassword)){ 
//		$_SESSION['adminusername'] = $adminusername;
//		header('Location: ../JobTracker/NewReviewTable.php');
//		exit;
	
//	} else {
//		$error[] = 'Wrong username or password.';
//	}

}//end if submit

//define page title
$title = 'Admin Login';

//include header template
require('../PartyTraits/layout/header.php'); 
?>

	
<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="" autocomplete="off">
				<h2>Administrator Login</h2>
				<p><a href='../PartyTraits/index.php'>Back to home page</a></p>
				<hr>

				<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}

				if(isset($_GET['action'])){

					//check the action
					switch ($_GET['action']) {
						case 'active':
							echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
							break;
						case 'reset':
							echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
							break;
						case 'resetAccount':
							echo "<h2 class='bg-success'>Password changed, you may now login.</h2>";
							break;
					}

				}

				
				?>

				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
				</div>

				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
				</div>
				<!--
				<div class="row">
					<div class="col-xs-9 col-sm-9 col-md-9">
						 <a href='reset.php'>Forgot your Password?</a>
					</div>
				</div>
				-->
				<hr>
				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Login" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
				</div>
			</form>
		</div>
	</div>



</div>


<?php 
//include header template
require('../PartyTraits/layout/footer.php'); 
?>

