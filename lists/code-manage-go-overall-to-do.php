<?php
include('../header-logged-in.php');
include('../models/task.class.php');
include('../models/tasklist.classs.php');

// Sticking some tasks in an array
$listTasks[] = new Task('Create pages');
$listTasks[] = new Task('Link pages');
$listTasks[] = new Task('Update a color');
$listTasks[] = new Task('Make a MySQL database');

?>

        <div class="row">
            <?php require_once('../sidebar.php'); ?>
            
            <div class="list-page-content large-8 small-12 columns">
                <h3 class="list-page-header">Code, Manage, Go! Overall To-Do</h3>
                
                <?php // Let's output the tasks, shall we?
                    
                    $i = 1;
                    
                    foreach ($listTasks as $task) {
                        echo '<div class="checklist">';
                        echo '    <form class="custom">';
                        echo '        <label for="checkbox' . $i .'">';
                        echo '             <input type="checkbox" id="checkbox' . $i . '" style="display: none;">';
                        echo '             <span class="custom checkbox"></span> ' . $task->__get(title);
                        echo '        </label>';
                        echo '    </form>';
                        echo '</div>';
                        
                        $i++; // increment
                    }
                    
                ?>
                
            </div>
        </div>

<?php require_once('../footer.php'); ?>