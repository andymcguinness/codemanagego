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
                            foreach ($project_info as $project){
                                echo '<div class="sidebar-row">';
                                echo '<h4>' . $project[0]["pjt_title"] . '</h4>';
                                echo '</div>';
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div class="large-7 small-12 columns">
                <div class="row">
                    <div class="large-12 large-centered small-12 columns sub-sub-content">
                        <h3><i class="icon-signup"></i> Your Tasks</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row sub-content-wrapper">
            <div class="large-12 small-12 columns sub-content">
                <h3><i class="icon-newspaper"></i> Recent Activity</h3>
            </div>
        </div>
    </div>
</div>