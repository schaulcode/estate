<?php  include "include/db.php"; ?>
<?php  include "include/header.php"; ?>

<?php
    if(!isset($_GET['email']) && !isset($_GET['token'])){
        redirect("index");
    }
    $stmt = mysqli_prepare($connection, "SELECT email, token FROM users WHERE token = ?");

    mysqli_stmt_bind_param($stmt, "s", $_GET['token']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $email, $token);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if($_GET['email'] != $email){
        redirect("index");
    }else{
        if(ifMethodSet('post')){
            if(confirmPassword($_POST['password'], $_POST['confirmPassword'])){
                $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT, array('cost' => 12));
                $stmt = mysqli_prepare($connection, "UPDATE users SET token ='', password = '$hashedPassword' WHERE email = ?");

                mysqli_stmt_bind_param($stmt, "s", $_GET['email']);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                redirect("login");
            }else{
                $error = "The passwords are not identical";
            }
        }
    }




?>
<!-- Navigation -->

<?php  include "include/navigation.php"; ?>

<div class="container">



    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">


                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Reset Password</h2>
                            <p><?php echo isset($error) ? $error : "You can reset your password here."; ?></p>
                            <div class="panel-body">

                                <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
                                            <input id="password" name="password" placeholder="Enter password" class="form-control"  type="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok color-blue"></i></span>
                                            <input id="confirmPassword" name="confirmPassword" placeholder="Confirm password" class="form-control"  type="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input name="resetPassword" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                    </div>

                                    <input type="hidden" class="hide" name="token" id="token" value="">
                                </form>

                            </div><!-- Body-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<hr>

<?php include "include/footer.php";?>

</div> <!-- /.container -->
