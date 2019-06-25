<?php ob_start(); ?>
<?php include 'db.php'; ?>
<?php include 'admin/include/functions.php'; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Company name</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/Activity/css/style.css">
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
            <?php if(isLoggedIn()) :
              if(isAdmin() || isAdvertiser()) : ?>
              <div class="dropdown pull-right">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  Hi,  <?php echo $_SESSION['firstname'] ?>
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                  <li><a href="/Activity/admin">Admin</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="/Activity/admin/include/logout.php">Logout</a></li>
                </ul>
              </div>
            <?php else: ?>
              <div class="dropdown pull-right">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  Hi  <?php echo $_SESSION['firstname'] ?>
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                  <li><a href="/Activity/admin">Admin</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="/Activity/admin/include/logout.php">Logout</a></li>
                </ul>
            <?php endif; ?>
            <?php else: ?>
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
              <?php endif; ?>
            </div>
          </div>
        </div>
      </header>
