<div class="row">
    <div class="two-columns-wrapper large-12 small-12 columns project-info">
        <div class="row sub-content-wrapper ">

            <!-- Left column/sidebar area -->
            <div class="large-4 hide-for-small columns no-column-padding sub-content">
                <div class="sidebar-row">
                    <a href="#" id="project-general" class="accordion-tab"><h3 class="project-header"><i class="icon-folder"></i> <?php echo $project_info[0]["pjt_title"]; ?></h3></a>
                </div>

                <div class="sidebar-row">
                    <a href="#" id="project-files" class="accordion-tab"><h4><i class="icon-library"></i> Files</h4></a>
                </div>

                <div class="sidebar-row">
                    <a href="#" id="project-tasks" class="accordion-tab"><h4><i class="icon-signup"></i> Tasks</h4></a>
                </div>

                <div class="sidebar-row">
                    <a href="#" id="project-members" class="accordion-tab"><h4><i class="icon-users"></i> Members</h4></a>
                </div>

                <div class="sidebar-row">
                    <a href="<?php echo base_url(); ?>index.php/dashboard"><h5><i class="icon-code"></i> Back to Dashboard</h5></a>
                </div>
            </div>

            <!-- Right column/main area -->
            <div class="large-7 small-12 columns">
                <div class="row">
                    <div class="large-12 large-centered columns sub-sub-content">
                        <div class="accordion-panel project-general active">
                            <h4><i class="icon-user"></i> Manager: <?php
                                foreach ($manager as $pjt_manager) {
                                    echo $pjt_manager[0]["usr_firstname"] . ' ' . $pjt_manager[0]["usr_lastname"];
                                }
                                ?></h4>
                        </div>

                        <div class="accordion-panel project-general active">
                            <h4><i class="icon-newspaper"></i> Recent Activity</h4>
                        </div>

                        <div class="accordion-panel project-files">
                            <h4><i class="icon-library"></i> <?php echo $project_info[0]["pjt_title"]; ?></h4>

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

                                echo '</ul>';
                            }?>

                            <h3 class="page-header"><i class="icon-upload"></i> Upload a File</h3>

                            <?php echo form_open_multipart('files/do_upload');?>
                            <div class="row sub-content-wrapper">
                                <p>Select the file you want to upload:</p>
                                <input type="file" name="userfile" />
                            </div>

                            <div class="row sub-content-wrapper">
                                <button type="submit">Upload</button>
                            </div>
                            </form>
                        </div>

                        <div class="accordion-panel project-tasks">
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
                        </div>

                        <div class="accordion-panel project-members">
                            <h4><i class="icon-users"></i> Members</h4>
                            <?php if ($members[0] == "") {
                                echo '<p>No matching members found.</p>';
                            } else {
                                echo '<ul class="member-list">';

                                foreach ($members as $member) {
                                    echo '<li>' . $member[0]["usr_firstname"] . ' ' . $member[0]["usr_lastname"] . '</li>';
                                }

                                echo '</ul>';
                            }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>