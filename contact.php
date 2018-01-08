<?php include("include/db.php"); ?>

    <!--  HEADER  -->
<?php include("include/header.php"); ?>

      <!-- NAVIGATION -->
      <?php include("include/navigation.php"); ?>


<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact</h1>
                   <?php
                  /*  use PHPMailer\PHPMailer\PHPMailer;
                    use PHPMailer\PHPMailer\Exception;
                    require("./vendor/autoload.php");

                    if(isset($_POST['submit'])){
                        $to      = "scholimimi@gmail.com";
                        $header  = $_POST['email'];
                        $subject = $_POST['subject'];
                        $body    = wordwrap($_POST['body'],70);

                        $mail = new PHPMailer;

                        $mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->Host = Config::SMTP_HOST;  // Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                        $mail->Username = Config::SMTP_USERNAME;                 // SMTP username
                        $mail->Password = Config::SMTP_PASSWORD;                           // SMTP password
                        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                        $mail->Port = Config::SMTP_PORT;                     // TCP port to connect to

                        $mail->setFrom('scholimimi@gmail.com', 'Scholi');
                        $mail->addAddress($header);     // Add a recipient
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = $subject;
                        $mail->Body    = $body;
                        $mail->CharSet = 'UTF-8';

                        if($mail->send()){
                            echo "<h1>Email was sent succesfully</h1>";
                        }
                    } */
                    ?>
                    <form role="form" action="contact.php" method="post" id="login-form" autocomplete="off">
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email" value="">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter a Subject" value="">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <textarea class="form-control" name="body" id="" cols="30" rows="10"></textarea>
                        </div>
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                    </form>

                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


    <!--   FOOTER   -->
   <?php include("include/footer.php"); ?>
