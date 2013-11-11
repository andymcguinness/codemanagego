<?php
require_once('header.php');
require_once('functions.php');
include_once('models/user.class.php');
require_once('db/UserMapper.php');

// Error array
$errors = array();

// User Mapper
$mapper = new UserMapper();

if (count($_POST) > 0) {

    // Validation fun
    
    // First Name
    $isValid = allowedCharactersTest($_POST['usr_firstname']); // Characters test
    if ($isValid === false) {
        $errors[] = "The first name contains some invalid characters. Please try again.";
    }
    
    $isValid = maxLengthTest($_POST['usr_firstname']);
    if ($isValid === false) {
        $errors[] = "The first name is too long. Enter a new (or abbreviated) first name under 75 characters.";
    }
    
    $isValid = minLengthTest($_POST['usr_firstname']);
    if ($isValid === false) {
        $errors[] = "The first name is too short. (First initials are not allowed.) Please enter the first name again.";
    }
    
    // Last Name
    $isValid = allowedCharactersTest($_POST['usr_lastname']);
    if ($isValid === false) {
        $errors[] = "The last name contains some invalid characters. Please try again.";
    }
    
    $isValid = maxLengthTest($_POST['usr_lastname']);
    if ($isValid === false) {
        $errors[] = "The last name is too long. Enter a new (or abbreviated) last name under 75 characters.";
    }
    
    $isValid = minLengthTest($_POST['usr_lastname']);
    if ($isValid === false) {
        $errors[] = "The last name is too short. (Last initials are not allowed.) Please enter the last name again.";
    }
    
    // Username
    $isValid = allowedCharactersTest($_POST['usr_username']);
    if ($isValid === false) {
        $errors[] = "The username contains some invalid characters. Please try again.";
    }
    
    $isValid = maxLengthTest($_POST['usr_username'], 151); // 151 = 75 (first name) + . or space + 75 (last name); users might want their username to be their name, since this is a business environment (think google)
    if ($isValid === false) {
        $errors[] = "The username is too long. Please pick a different one and try again.";
    }
    
    $isValid = minLengthTest($_POST['usr_username']); // default is fine here
    if ($isValid === false) {
        $errors[] = "The username is too short. (One-character usernames are not allowed.) Please pick a different one and try again.";
    }
    
    // Password
    $isValid = allowedCharactersTest($_POST['usr_password']);
    if ($isValid === false) {
        $errors[] = "The password contains one or more invalid characters. Please try again.";
    }
    
    $isValid = maxLengthTest($_POST['usr_password'], 50);
    if ($isValid === false) {
        $errors[] = "The password is too long. Please pick a different one.";
    }
    
    $isValid = minLengthTest($_POST['usr_password'], 8);
    if ($isValid === false) {
        $errors[] = "The password is too short. Please pick a different one.";
    }
    
    // Email
    $isValid = allowedCharactersTest($_POST['usr_email']);
    if ($isValid === false) {
        $errors[] = "The email contains one or more invalid characters. Please try again.";
    }
    
    $isValid = maxLengthTest($_POST['usr_email'], 91); // some emails can be names + period or space + long url
    if ($isValid === false) {
        $errors[] = "The email is too long. Please enter a different one.";
    }
    
    $isValid = minLengthTest($_POST['usr_email'], 8); // the smallest email I can really think should exist
    if ($isValid === false) {
        $errors[] = "The email is too short. Please enter a different one.";
    }
    
    if (count($errors) == 0) {
        $newUser = new User($_POST['usr_username'], $_POST['usr_password'], $_POST['usr_lastname'], $_POST['usr_firstname'], $_POST['usr_email']);
		
		$result = $mapper->createUser($newUser);
		
		// Creating a multi-line message
		$success[] = "<p>New user created successfully!</p>";
		$success[] = "<p>Username: " . $newUser->__get(usr_username) . ".<br />";
		$success[] = "Name: " . $newUser->__get(usr_firstname) . " " . $newUser->__get(usr_lastname) . ". <br />";
		$success[] = "Email: " . $newUser->__get(usr_email) . ".</p>";
    }
}

if (isset($success)) {
    foreach ($success as $msg) {
        echo $msg;
    }
}
else {
    
        echo "<ol>";
        foreach($errors as $error){
            echo "     <li class='error'>" . $error . "</li>";
        }
        echo "</ol>";
?>

        <div class="row">
            <div class="small-10 small-centered columns signup">
                <h1>Sign up for this sweet service!</h1>
                
                <form action="sign-up.php" method="post">
                    <div class="row">
                        <div class="small-4 push-2 columns">
                            <label>First Name: <input name="usr_firstname" type="text" /></label>
                        </div>
                        <div class="small-4 pull-2 columns">
                            <label>Last Name: <input name="usr_lastname" type="text" /></label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="small-8 small-centered columns">
                            <label>Username: <input name="usr_username" type="text" /></label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="small-8 small-centered columns">
                            <label>Password: <input name="usr_password" type="text" /></label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="small-8 small-centered columns">
                            <label>Email: <input name="usr_email" type="text" /></label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="small-3 small-centered columns">
                            <button class="cmg-btn-large" type="submit">Sign Up</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
<?php
}

require_once('footer.php'); ?>