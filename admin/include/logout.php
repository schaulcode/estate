<?php session_start(); ?>
<?php include 'functions.php'; ?>
<!--    Unset SESSION       -->
<?php   $_SESSION['username'] = NULL;
        $_SESSION['firstname'] = NULL;
        $_SESSION['lastname'] = NULL;
        $_SESSION['user_role'] = NULL;

redirect("/Activity/index");
exit();
?>
