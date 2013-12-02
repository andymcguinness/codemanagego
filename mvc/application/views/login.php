<div class="row">
    <div class="small-10 small-centered columns signin">
        <h1>Sign in to access your account.</h1>

        <?php if(isset($error)) {
            echo '<div class="error">' . $error . '</div>';
        } ?>

        <?php if (isset($message)) {
            echo '<div class="message">' . $message . '</div>';
        } ?>

        <?php echo form_open('login') ?>

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
                <div class="small-3 small-centered columns">
                    <button class="cmg-btn-large" type="submit">Sign In</button>
                </div>
            </div>
        </form>
    </div>
</div>