<?php require_once('../header-logged-in.php'); ?>

        <div class="row">
            <?php require_once('../sidebar.php'); ?>
            
            <div class="list-page-content large-8 small-12 columns">
                <h3 class="list-page-header">Code, Manage, Go! Overall To-Do</h3>
                
                <div class="checklist">
                    <form class="custom">
                        <label for="checkbox1">
                            <input type="checkbox" id="checkbox1" style="display: none;">
                            <span class="custom checkbox"></span> Create all pages
                        </label>
                    </form>
                </div>
                
                <div class="checklist">
                    <form class="custom">
                        <label for="checkbox2">
                            <input type="checkbox" id="checkbox2" style="display: none;">
                            <span class="custom checkbox"></span> Link all pages
                        </label>
                    </form>
                </div>
                
                <div class="checklist">
                    <form class="custom">
                        <label for="checkbox3">
                            <input type="checkbox" id="checkbox3" style="display: none;">
                            <span class="custom checkbox"></span> Update a color
                        </label>
                    </form>
                </div>
                
            </div>
        </div>

<?php require_once('../footer.php'); ?>