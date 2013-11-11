<?php
require_once('header.php');
require_once('models/user.class.php');
require_once('db/UserMapper.php');

// Connecting to the database
$mapper = new UserMapper();

// Getting a current list of users
$users = $mapper->retrieveUsers();
?>

        <div class="row">
            <?php require_once('sidebar.php'); ?>
            
            <div class="list-page-content large-8 small-12 columns">
                <h3 class="list-page-header">Current User Usernames</h3>
                
                <?php
                    
					echo '<ul>';
                    foreach ($users as $user) {
                        echo '<li>';
						echo $user->__get(usr_username);
                        echo '</li>';
                    }
					echo '</ul>';
                    
                ?>
                
            </div>
        </div>

<?php require_once('footer.php'); ?>