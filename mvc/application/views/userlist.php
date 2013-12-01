<div class="list-page-content large-8 small-12 columns">
    <h3 class="list-page-header">Current Registered Users</h3>

    <?php echo '<ul>'; ?>

    <?php foreach ($users as $user) {
        echo '<li>' . $user->usr_username . ' -- ' . $user->usr_firstname . ' ' . $user->usr_lastname . '</li>';
    } ?>

    <?php echo '</ul>'; ?>

</div>
</div>