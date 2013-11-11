<?php
require_once('../header-second-level.php');
require_once('../models/task.class.php');
require_once('../models/tasklist.class.php');
require_once('../db/TaskMapper.php');

// Creating a task list
$list1 = new TaskList('Code, Manage, Go! Overall To-Do');

// Connecting to the database
$mapper = new TaskMapper();
// Getting an overall task list
$tasks = $mapper->retrieveTasks();
?>

        <div class="row">
            <?php require_once('../sidebar-second-level.php'); ?>
            
            <div class="list-page-content large-8 small-12 columns">
                <h3 class="list-page-header"><?php echo $list1->__get(title); ?></h3>
                
                <?php
                    
                    $i = 1;
                    
                    foreach ($tasks as $task) {
                        echo '<div class="checklist">';
                        echo '    <form class="custom">';
                        echo '        <label for="checkbox' . $i .'">';
                        echo '             <input type="checkbox" id="checkbox' . $i . '" style="display: none;">';
                        echo '             <span class="custom checkbox"></span> ' . $task->__get(tsk_name);
                        echo '        </label>';
                        echo '    </form>';
                        echo '</div>';
                        
                        $i++; // increment
                    }
                    
                ?>
                
            </div>
        </div>

<?php require_once('../footer-second-level.php'); ?>