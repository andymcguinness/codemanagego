<?php require_once('header-logged-in.php'); ?>

        <div class="row">
            <?php require_once('sidebar.php'); ?>
            
            <div class="profile-main large-8 small-12 columns">
                <section class="profile-content">
                    
                    <!-- Teams -->
                    <h3 class="team-header">Your Teams</h3>
                    <ul class="teams">
                        <li>Code, Manage, Go!</li>
                    </ul>
                    
                    <!-- Projects -->
                    <h3 class="project-header">Your Projects</h3>
                    <ul class="projects">
                        <li>Code, Manage, Go!
                            <ul class="project-content">
                                <li>Tasks</li>
                                    <ul class="project-sub-content">
                                        <li>Implement fonts</li>
                                        <li>Implment functionality</li>
                                    </ul>
                                <li>Files</li>
                                    <ul class="project-sub-content">
                                        <li>header.php</li>
                                        <li>footer.php</li>
                                        <li>sidebar.php</li>
                                        <li>index.php</li>
                                        <li>profile.php</li>
                                        <li>upload.php</li>
                                        <li>files.php</li>
                                        <li>lists.php</li>
                                        <li>lists/list-name.php</li>
                                        <li>main.css</li>
                                    </ul>
                                <li>Members</li>
                                    <ul class="project-sub-content">
                                        <li>Cat McGuinness</li>
                                    </ul>
                            </ul>
                        </li>
                    </ul>
                    
                    <!-- Tasks -->
                    <h3 class="task-header">Your Tasks</h3>
                    <ul class="tasks">
                        <li>Implement fonts</li>
                        <li>Implement functionality</li>
                    </ul>
                    
                    <!-- Files -->
                    <h3 class="file-header">Your Files</h3>
                    <ul class="files">
                        <li>header.php</li>
                        <li>footer.php</li>
                        <li>sidebar.php</li>
                        <li>main.css</li>
                    </ul>
                </section>
            </div>
        </div>
        
<?php require_once('footer.php'); ?>
