<div class="row">
    <div class="large-12 large-uncentered small-10 small-centered columns full-width-wrapper signup">
        <h3>Sign up for this sweet service!</h3>

        <?php echo validation_errors(); ?>

        <?php echo form_open('register') ?>
            <div class="row">
                <div class="large-4 large-push-2 small-12 columns">
                    <label>First Name: <input name="usr_firstname" type="text" value="<?php echo set_value('usr_firstname'); ?>" /></label>
                </div>
                <div class="large-4 large-pull-2 small-12 columns">
                    <label>Last Name: <input name="usr_lastname" type="text" value="<?php echo set_value('usr_lastname'); ?>" /></label>
                </div>
            </div>

            <div class="row">
                <div class=" large-8 large-centered small-12 small-centered columns">
                    <label>Username: <input name="usr_username" type="text" value="<?php echo set_value('usr_username'); ?>" /></label>
                </div>
            </div>

            <div class="row">
                <div class="large-8 large-centered small-12 small-centered columns">
                    <label>Password: <input name="usr_password" type="text" value="<?php echo set_value('usr_password'); ?>" /></label>
                </div>
            </div>

            <div class="row">
                <div class="large-8 large-centered small-12 small-centered columns">
                    <label>Email: <input name="usr_email" type="text" value="<?php echo set_value('usr_email'); ?>" /></label>
                </div>
            </div>

            <div class="row">
                <div class="large-2 large-centered medium-2 medium-centered small-5 small-centered columns">
                    <button class="cmg-btn-large" type="submit">Sign Up</button>
                </div>
            </div>
        </form>
    </div>
</div>