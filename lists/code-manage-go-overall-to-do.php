<?php
include('../header-logged-in.php');
include('http://localhost/lis4368/models/tasklist.class.php');
include('http://localhost/lis4368/models/task.class.php');

// Creating the Code, Manage, Go! to do list
//$tD = new TaskList('Code, Manage, Go! Overall To-Do');

// Sticking some tasks in an array
$toDoTasks = array();

$toDoTasks[] = new Task('Create all pages');
$toDoTasks[] = new Task('Link all pages');
$toDoTasks[] = new Task('Update a color');

// Making the tasks
//$toDo->defineTasks($toDoTasks);

?>

        <div class="row">
            <?php require_once('../sidebar.php'); ?>
            
            <div class="list-page-content large-8 small-12 columns">
                <h3 class="list-page-header"><?php echo $toDo->title; ?></h3>
                
                <?php // Let's output the tasks, shall we?
                
                $i = 1; // initialize counter
                foreach ($toDoTasks as $task) {
                    echo '<div class="checklist">';
                    echo '    <form class="custom">';
                    echo '        <label for="checkbox' . $i .'">';
                    echo '             <input type="checkbox" id="checkbox' . $i . '" style="display: none;">';
                    echo '             <span class="custom checkbox"></span>' . $task->title;
                    echo '        </label>';
                    echo '    </form>';
                    echo '</div>';
                    
                    $i++; // increment
                }
                
                ?>
                
            </div>
        </div>

<?php require_once('../footer.php'); ?>