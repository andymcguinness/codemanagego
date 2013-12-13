<div class="row">
    <div class="two-columns-wrapper large-12 small-12 columns dashboard">
        <div class="row sub-content-wrapper">
            <h3>Hello, <?php echo $username; ?>!</h3>
        </div>

        <div class="row sub-content-wrapper">
            <div class="large-4 hide-for-small columns">
                <div class="row">
                    <div class="large-12 large-centered columns no-column-padding sub-sub-content">
                        <div class="sidebar-row">
                            <h3><i class="icon-folder"></i> Your Projects</h3>
                        </div>

                        <?php
                        if ($project_info == '') {
                            echo '<div class="sidebar-row">';
                            echo '<p>No projects here. You should make one!</p>';
                            echo '</div>';
                        } else {
                            foreach ($project_info as $project){
                                echo '<div class="sidebar-row">';
                                echo '<a href="' . base_url() . 'index.php/projects/project/' . $project[0]["pjt_slug"] . '">';
                                echo '<h4>' . $project[0]["pjt_title"] . '</h4>';
                                echo '</a>';
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="large-7 small-12 columns">
                <div class="row">
                    <div class="large-12 large-centered small-12 columns sub-sub-content">
                        <h3><i class="icon-signup"></i> Your Tasks</h3>

                        <?php if ($tasks[0] == '') {
                            echo '<p>No matching tasks found.</p>';
                        } else {
                            echo '<ul class="list-tasks">';

                            $i = 1;
                            foreach ($tasks[0] as $task) {
                                echo '<li><input id="task' . $i . '" type="checkbox"><label for="task' . $i . '">' . $task["tsk_name"] . '</label></li>';
                                $i++;
                            }
                            echo '</ul>';
                        } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row sub-content-wrapper">
            <div class="large-12 small-12 columns sub-content">
                <h3><i class="icon-newspaper"></i> Recent Activity</h3>

                <ul class="activity-list">
                    <li><a>Mary</a> updated the file <a>header.php</a>.</li>
                    <li><a>Joseph</a> added "Get user flows from James" to <a>Research Sites tasks</a>.</li>
                    <li><a>Chris</a> was added to <a>Code, Manage, Go!</a>. Say <a>hello</a>!</li>
                </ul>
            </div>
        </div>
    </div>
</div>