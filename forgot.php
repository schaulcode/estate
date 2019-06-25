<?php  include "include/db.php"; ?>
<?php  include "include/header.php"; ?>

<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require("./vendor/autoload.php");

    if(!isset($_GET['forgot'])){
        redirect("/CMS/index");
    }

    if(ifMethodSet('post') && isset($_POST['email'])){
        $email = $_POST['email'];
        $token = bin2hex(openssl_random_pseudo_bytes(50));
        if(email_exist($email)){
        $stmt = mysqli_prepare($connection, "UPDATE users SET token = '{$token}' WHERE email =?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

            $mail = new PHPMailer;

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = Config::SMTP_HOST;  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = Config::SMTP_USERNAME;                 // SMTP username
            $mail->Password = Config::SMTP_PASSWORD;                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = Config::SMTP_PORT;                     // TCP port to connect to

            $mail->setFrom('scholimimi@gmail.com', 'Scholi');
            $mail->addAddress($email);     // Add a recipient
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = "Password reset";
            $mail->Body    = "<p>To reset Password <a href='http://localhost/Activity/reset?email=$email&token=$token'>click here</a></p>";
            $mail->CharSet = 'UTF-8';

            if($mail->send()){
                $sent = true;
            }
        }


    }



?>

<!-- Page Content -->
<div class="container">

    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                                <?php if(!isset($sent)): ?>
                                <h3><i class="fa fa-lock fa-4x"></i></h3>
                                <h2 class="text-center">Forgot Password?</h2>
                                <p>You can reset your password here.</p>
                                <div class="panel-body">

                                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                        </div>

                                        <input type="hidden" class="hide" name="token" id="token" value="">
                                    </form>

                                </div><!-- Body-->
                                <?php else: ?>
                                <h2 class="text-center">Check your emails</h2>
                                <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <hr>

    <?php include "include/footer.php";?>

</div> <!-- /.container -->
