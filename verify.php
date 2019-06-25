<?php  include "include/header.php"; ?>


<?php
    if(isset($_GET['email']) && isset($_GET['token'])){
        $stmt = mysqli_prepare($connection, "UPDATE users SET verify = 'Yes', token = '' WHERE token = ?");

        mysqli_stmt_bind_param($stmt, "s", $_GET['token']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $stmt = mysqli_prepare($connection, "SELECT username, firstname, lastname, user_role FROM users WHERE email = ?");

        mysqli_stmt_bind_param($stmt, "s", $_GET['email']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $username, $firstname, $lastname, $user_role);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        $_SESSION['username'] = $username;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['user_role'] = $user_role;
        redirect("/Activity/admin");
    }
?>

<div class="container">
     <h1 class="text-center">Thank you for register please verify your email adress, with the link send to you</h1>
</div>

<?php include "include/footer.php";?>
