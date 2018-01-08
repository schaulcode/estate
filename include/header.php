<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Company name</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <div class="container-fluid">
      <!-- HEADER -->
      <header class="row">
        <div class="container">
          <div class="col-sm-3">
            <a href="index"><img  src="image/logo.png" alt="logo"></a>
          </div>
          <div class=" col-md-offset-6   col-md-3">
            <div class="">
               <h4>Login or <a href="registration">Register</a></h4>
                <form action="login.php" method="post">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control" placeholder="Enter your username">
                    </div>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" placeholder="Enter your password">
                        <span class="input-group-btn">
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                        </span>
                    </div>
                    <div class="form-group">
                        <p><a href="forgot?forgot=<?php echo uniqid(true); ?>">Forgot Password?</a></p>
                    </div>
                </form>
            </div>
            </div>
          </div>
        </div>
      </header>
