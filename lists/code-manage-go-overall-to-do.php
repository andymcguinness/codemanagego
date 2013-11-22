<?php
require_once('../header-second-level.php');
require_once('../models/task.class.php');
require_once('../models/tasklist.class.php');
require_once('../db/TaskMapper.php');

// Connecting to the database
$mapper = new TaskMapper();
// Getting an overall task list
$tasks = $mapper->retrieveTasks();
?>

        <div class="list-page row">
            <?php require_once('../sidebar-second-level.php'); ?>
            
            <div class="list-page-content large-8 small-12 columns">
                <h3 class="list-page-header"><i class="icon-signup"></i> Code, Manage, Go! Overall To-Do</h3>
                
                <?php
                    
                    $i = 1;
                    
                    foreach ($tasks as $task) {
                        echo '<div class="checklist">';
                        echo '   <input type="checkbox" id="checkbox' . $i . '">';
                        echo '   <label for="checkbox' . $i .'">' . $task->__get(tsk_name) . '</label>';
                        echo '</div>';
                        
                        $i++; // increment
                    }
                    
                ?>
                
            </div>
        </div>

<?php require_once('../footer-second-level.php'); ?>