<?php include("include/admin-header.php");?>
    <div class="wrapper">
        <?php include("include/navigation.php");?>
        <div class="main-content">
          <div class="container-fluid">
            <div class="row">
              <?php include 'include/delete_modal.php'; ?>
              <div class="col-xs-12">
                <h1>Users</h1>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Username</th>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Role</th>
                      <th>Email</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $query = "SELECT * FROM users";
                      $result = mysqli_query($connection, $query);
                      while ($row = mysqli_fetch_assoc($result)) {

                      echo "<tr>" ;
                      echo "<td>{$row['id']}</td>";
                      echo "<td>{$row['username']}</td>";
                      echo "<td>{$row['firstname']}</td>";
                      echo "<td>{$row['lastname']}</td>";
                      echo "<td>{$row['user_role']}</td>";
                      echo "<td>{$row['email']}</td>";
                      echo "<td><a rel='{$row['id']}' class='btn btn-danger delete-link' href='javascript: void(0)'>Delete</a></td>";
                      echo "</tr>";
                      }
                     ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
  <?php
        if(isset($_POST['delete'])){
        $user_delete = $_POST['delete_id'];
        $query = "DELETE FROM users WHERE id = {$user_delete}";
        $result = mysqli_query($connection, $query);
        confirmQuery($result);
        redirect("user.php");
    }
    ?>
<?php include("include/admin-footer.php");?>

<script>
   delete_rows();
</script>
