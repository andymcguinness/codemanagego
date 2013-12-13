<div class="row">
    <div class="large-12 large-uncentered small-10 small-centered columns full-width-wrapper add-task">
        <h3>Add a task!</h3>

        <?php if(isset($error)) {
            echo '<div class="error">' . $error . '</div>';
        } ?>

        <?php if (isset($message)) {
            echo '<div class="message">' . $message . '</div>';
        } ?>

        <?php echo form_open('add_task') ?>

        <div class="row">
            <div class="large-8 large-centered small-12 small-centered columns">
                <label>Task Name: <input name="tsk_name" type="text" value="<?php echo set_value('tsk_name'); ?>" /></label>
            </div>
        </div>

        <div class="row">
            <div class="large-8 large-centered small-12 small-centered columns">
                <label>Task Content: <input name="tsk_content" type="text" value="<?php echo set_value('tsk_content'); ?>" /></label>
            </div>
        </div>

        <div class="row">
            <div class="large-2 large-centered medium-2 medium-centered small-5 small-centered columns">
                <button class="cmg-btn-large" type="submit">Add Task</button>
            </div>
        </div>
        </form>
    </div>
</div>