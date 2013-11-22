<?php
require_once('header.php');
require_once('functions.php');
include_once('models/user.class.php');
require_once('db/UserMapper.php');

// Session init
session_start();

// User Mapper
$mapper = new UserMapper();

if (count($_POST) > 0) {
	$result = $mapper->checkCredentials($_POST['usr_username'], $_POST['usr_password']);
	
	if($result == true) {
		$_SESSION['is_logged_in'] = true;
        header("Location: http://localhost/lis4368/profile.php");
	} else {
		echo "Username or password entered incorrectly. Please try again.";
	}
}
?>

        <div class="row">
            <div class="small-10 small-centered columns signin">
                <h1>Sign in to access your account.</h1>
                
                <form action="sign-in.php" method="post">
					
                    <div class="row">
                        <div class="small-8 small-centered columns">
                            <label>Username: <input name="usr_username" type="text" <?php if (count($_POST) > 0) { echo 'value="' . $_POST['usr_username'] . '"'; } ?> /></label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="small-8 small-centered columns">
                            <label>Password: <input name="usr_password" type="text" <?php if (count($_POST) > 0) { echo 'value="' . $_POST['usr_password'] . '"'; } ?> /></label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="small-3 small-centered columns">
                            <button class="cmg-btn-large" type="submit">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
<?php

require_once('footer.php'); ?>