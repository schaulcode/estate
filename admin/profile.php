<?php include("include/admin-header.php");?>

   <?php // GET USER INFORMATION FROM DATABASE ACCORDING TO USERNAME
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];

        $query = "SELECT * FROM users WHERE username = '{$username}'";
        $result = mysqli_query($connection, $query);
            confirmQuery($result);
        $row = mysqli_fetch_assoc($result);
    }
?>
<div class="wrapper">

<!-- Navigation -->
<?php include("include/navigation.php");?>

    <div class="main-content">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Users

                        </h1>
          <?php   // UPDATE PROFILE
            if(isset($_POST['update'])){
            $user_firstname = escape($_POST['firstname']);
            $user_lastname  = escape($_POST['lastname']);
            $user_role      = $row['user_role'];
            $new_username   = escape($_POST['username']);
        //    $post_image = $_FILES['image']['name'];
        //    $post_image_temp = $_FILES['image']['tmp_name'];
            $user_email     = escape($_POST['email']);
                // Update Password only when it was changed
              if(isset($_POST['password']) && $_POST['password'] !== ''){
                $user_password  = escape($_POST['password']);
                $password = password_hash($user_password, PASSWORD_DEFAULT, array('cost' => 12));  // Hash Paswword
              }else{
                  $password = $row['password'];
              }
        //    move_uploaded_file($post_image_temp,"../image/$post_image");

                user_update($user_firstname, $user_lastname, $user_role, $new_username, $user_email, $password, $username);
//            $query  = "UPDATE users SET ";
//            $query .= "user_firstname = '{$user_firstname}', ";
//            $query .= "user_lastname = '{$user_lastname}', ";
//            $query .= "user_role = '{$user_role}', ";
//            $query .= "username = '{$new_username}', ";
//            $query .= "user_email = '{$user_email}', ";
//            $query .= "user_password = '{$password}' ";
//            $query .= "WHERE username = '{$username}'";
//
//            $result = mysqli_query($connection, $query);
//            confirmQuery($result);

            echo "<h4 class='bg-success'>Profile updated</h4><p>";

        }
        ?>

                            <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Firstname</label>
                                <input type="text" class="form-control" name="firstname" value="<?php echo $row['firstname'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="title">Lastname</label>
                                <input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="author">Username</label>
                                <input type="text" class="form-control" name="username" value="<?php echo $row['username'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="status">Email</label>
                                <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="image">Password</label>
                                <input type="password" class="form-control" name="password" >
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="update" value="Update User">
                            </div>
                        </form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

          </div>

    </div>
    <!-- /#wrapper -->

<?php include("include/admin-footer.php");?>
