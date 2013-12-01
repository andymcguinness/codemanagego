<div class="row">
    <div class="small-10 small-centered columns signup">
        <h1>Sign up for this sweet service!</h1>

        <?php echo validation_errors(); ?>

        <?php echo form_open('signup') ?>
            <div class="row">
                <div class="small-4 push-2 columns">
                    <label>First Name: <input name="usr_firstname" type="text" value="<?php echo set_value('usr_firstname'); ?>" /></label>
                </div>
                <div class="small-4 pull-2 columns">
                    <label>Last Name: <input name="usr_lastname" type="text" value="<?php echo set_value('usr_lastname'); ?>" /></label>
                </div>
            </div>

            <div class="row">
                <div class="small-8 small-centered columns">
                    <label>Username: <input name="usr_username" type="text" value="<?php echo set_value('usr_username'); ?>" /></label>
                </div>
            </div>

            <div class="row">
                <div class="small-8 small-centered columns">
                    <label>Password: <input name="usr_password" type="text" value="<?php echo set_value('usr_password'); ?>" /></label>
                </div>
            </div>

            <div class="row">
                <div class="small-8 small-centered columns">
                    <label>Email: <input name="usr_email" type="text" value="<?php echo set_value('usr_email'); ?>" /></label>
                </div>
            </div>

            <div class="row">
                <div class="small-3 small-centered columns">
                    <button class="cmg-btn-large" type="submit">Sign Up</button>
                </div>
            </div>
        </form>
    </div>
</div>