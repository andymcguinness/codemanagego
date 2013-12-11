<div class="row">
    <div class="large-8 large-push-1 small-12 columns project-info">
        <h3 class="project-header"><i class="icon-folder"></i> <?php echo $project_info[0]["pjt_title"]; ?></h3>

        <h4 class="project-manager"><i class="icon-user"></i> Manager: <?php
                foreach ($manager as $pjt_manager) {
                    echo $pjt_manager[0]["usr_firstname"] . ' ' . $pjt_manager[0]["usr_lastname"];
                }
            ?></h4>

        <?php if ($list_info == "") {
            echo 'No matching tasklists found.';
        } else{
            ?>
        <h4 class="task-list-header"><i class="icon-signup"></i> <?php echo $list_info[0]["lst_title"]; ?></h4>
            <?php if ($tasks[0] == "") {
                echo '<p>No matching tasks found.</p>';
            } else {
                echo '<ul class="list-tasks">';

                $i = 1;
                foreach ($tasks[0] as $task) {
                    echo '<li><input id="task' . $i . '" type="checkbox"><label for="task' . $i . '">' . $task["tsk_name"] . '</label></li>';
                    $i++;
                }
                echo '</ul>';
            }
        } ?>

        <h4 class="file-list-header"><i class="icon-library"></i> <?php echo $project_info[0]["pjt_title"]; ?></h4>

        <?php if ($files[0] == "") {
            echo '<p>No matching files found.</p>';
        } else {
            echo '<ul class="file-list">';

            foreach ($files[0] as $file) {
                echo '<li>' . $file["fil_title"];
                echo '<ul class="file-info">';
                echo '<li>File Type: ' . $file["fil_type"] . '</li>';
                echo '<li>Upload Time: ' . $file["fil_upload_time"] . '</li>';
                echo '</ul></li>';
            }
        }?>
        </ul>
    </div>
</div>