<?php
require_once('functions.php');
include_once('models/user.class.php');
require_once('db/UserMapper.php');

// Error array
$errors=array();

// Session init
session_start();

// User Mapper
$mapper = new UserMapper();

if (count($_POST) > 0) {
	$result = $mapper->checkCredentials($_POST['usr_username'], $_POST['usr_password']);
	
	if($result == true) {
		$_SESSION['is_logged_in'] = true;
		header("Location: profile.php");
	} else {
		$errors[] =  "Username or password entered incorrectly. Please try again.";
	}
}

require_once('header.php');
?>
        <div class="row">
            <div class="small-10 small-centered columns signin">
                <h1>Sign in to access your account.</h1>
		
		<?php
			foreach ($errors as $error) {
				echo '<div class="error">' . $error . '</div>';
			}
		?>
                
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
        
<?php require_once('footer.php'); ?>