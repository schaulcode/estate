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
                <h1>Register</h1>
                   <?php
                      /*  use PHPMailer\PHPMailer\PHPMailer;
                        use PHPMailer\PHPMailer\Exception;
                        require("./vendor/autoload.php");

                        if(isset($_POST['submit'])){
                            $firstname = escape($_POST['firstname']);
                            $lastname =  escape($_POST['lastname']);
                            $username = escape($_POST['username']);
                            $email    = escape($_POST['email']);
                            $password = escape($_POST['password']);
                            $user_role= 'Subscriber';
                            $token    = bin2hex(openssl_random_pseudo_bytes(50));
                            $verify   = "No";

                            if(empty($error = validateRegister($firstname, $lastname, $username, $email, $password, $user_role, $token, $verify))){
                                 $mail = new PHPMailer;

                            $mail->isSMTP();                                      // Set mailer to use SMTP
                            $mail->Host = Config::SMTP_HOST;                      // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;                               // Enable SMTP authentication
                            $mail->Username = Config::SMTP_USERNAME;              // SMTP username
                            $mail->Password = Config::SMTP_PASSWORD;              // SMTP password
                            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                            $mail->Port = Config::SMTP_PORT;                      // TCP port to connect to

                            $mail->setFrom('scholimimi@gmail.com', 'Scholi');
                            $mail->addAddress($email);                            // Add a recipient
                            $mail->isHTML(true);                                  // Set email format to HTML
                            $mail->Subject = "Verify you email adress";
                            $mail->Body    = "<p> <a href='http://localhost/CMS/verify?email=$email&token=$token'>click here to verify password</a></p>";
                            $mail->CharSet = 'UTF-8';

                                if($mail->send()){
                                    redirect("verify");
                                }
                                            }
                        } // End of ISSET */



                    ?>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="on">
                      <div class="form-group">
                        <label for="user_role">Select an option:</label>
                        <select name="user_role" id="user_role">
                          <option value="Advertiser">Advertiser</option>
                          <option selected value="User">User</option>
                        </select>
                      </div>
                      </select>
                      <div id="form-content">

                      </div>
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>

                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


    <!--   FOOTER   -->
   <?php include("include/footer.php"); ?>

   <script type="text/javascript">
   function get_form(){
     if($("#user_role").val() == "Advertiser"){
       $.get("advertiser_reg_form.html", function(respond){
         $("#form-content").html(respond);
       })
     }
     if($("#user_role").val() == "User"){
       $.get("user_reg_form.html", function(respond){
         $("#form-content").html(respond);
       })
     }
   }
   $("document").ready(function(){
      get_form();
      $("#user_role").on("change", function(){
        get_form();
      })
     })


   </script>
