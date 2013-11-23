<?php
 session_start();
 
 require_once('header.php'); ?>
 
        <div class="row sign-out">
            <?php require_once('sidebar.php'); ?>
            
            <div class="sign-out large-8 small-12 columns">
                <?php
                    if (isset($_SESSION['is_logged_in'])) {
                        unset($_SESSION['is_logged_in']);
                        header("Location: sign-in.php");
                    }
                    else {
                        echo "<p>You were never logged in. Log in now.</p>";
                    }
                    ?>
            </div>
        
        </div>