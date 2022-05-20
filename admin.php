<?php
    session_start();
    include("includes/functions.inc.php");
    include("includes/dbh.inc.php");
?>
hello
<?php authUsers($conn); ?>
<?php authUsersForm($conn); ?>
