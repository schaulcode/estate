<?php include("include/admin-header.php");?>
    <div class="wrapper">
        <?php include("include/navigation.php");?>
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <h1>Edit Properties</h1>
                        <?php
                            if(isset($_GET['edit'])){
                                $prop_id = $_GET['edit'];
                                $query = "SELECT * FROM properties_buy WHERE prop_id = {$prop_id} ";
                                $result = mysqli_query($connection, $query);
                                $row = mysqli_fetch_assoc($result);
                            }

                            if(isset($_POST['update'])){
                                $prop_title = $_POST['title'];
                                $prop_location = $_POST['location'];
                                $prop_content = $_POST['content'];
                                $prop_price = $_POST['price'];
                                $prop_sale_price = $_POST['sale_price'];
                                $prop_image = $_FILES['image']['name'];
                                $prop_image_temp = $_FILES['image']['tmp_name'];
                                $prop_sqm = $_POST['sqm'];
                                $prop_floor = $_POST['floor'];
                                $prop_bedrooms = $_POST['bedrooms'];
                                $prop_bathrooms = $_POST['bathrooms'];
                                $prop_balcony = (isset($_POST['balcony'])) ? $_POST['balcony'] : 0 ;
                                $prop_elevator = (isset($_POST['elevator'])) ? $_POST['elevator'] : 0;
                                $prop_garage = (isset($_POST['garage'])) ? $_POST['garage'] : 0;
                                $prop_garden = (isset($_POST['garden'])) ? $_POST['garden'] : 0;
                                $prop_renovated = (isset($_POST['renovated'])) ? $_POST['renovated'] : 0;
                                move_uploaded_file($prop_image_temp,"../image/$prop_image");

                                $stmt = mysqli_prepare($connection,"UPDATE properties_buy SET prop_title =?, prop_location =?, prop_content =?, prop_image =?, prop_price =?, prop_sale_price =?, prop_sqm =?, prop_floor =?, prop_bedrooms =?, prop_bathrooms =?,prop_balcony =?, prop_elevator =?, prop_garage =? ,prop_garden =?, prop_renovated =? WHERE prop_id = ?");
                                mysqli_stmt_bind_param($stmt, "ssssiiiiiisssssi", $prop_title,$prop_location, $prop_content, $prop_image, $prop_price, $prop_sale_price, $prop_sqm, $prop_floor, $prop_bedrooms, $prop_bathrooms, $prop_balcony, $prop_elevator, $prop_garage, $prop_garden, $prop_renovated, $prop_id);
                                mysqli_stmt_execute($stmt);

                                // checkQuery($stmt);
                            }


                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="col-xs-6">
                                 <div class="form-group">
                                    <label for="title">Property Title</label>
                                    <input type="text" class="form-control" name="title" value="<?php echo $row['prop_title']?>">
                                </div>
                                <div class="form-group">
                                    <label for="location">Property Location</label>
                                    <input type="text" class="form-control" name="location" value="<?php echo $row['prop_location']?>">
                                </div>
                                <div class="form-group">
                                    <label for="content">Property Content</label>
                                    <textarea class="form-control" name="content" cols="30" rows="10"><?php echo $row['prop_content']?>"</textarea>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="price">Property Price</label>
                                        <input type="number" class="form-control" name="price" value="<?php echo $row['prop_price']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="sale_price">Property Sale Price</label>
                                        <input type="number" class="form-control" name="sale_price" value="<?php echo $row['prop_sale_price']?>">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="image">Property Image</label>
                                        <img src="../Image/<?php echo $row['prop_image']?>" alt="" width=100>
                                        <input type="file" name="image" value="<?php echo $row['prop_image']?>">
                                    </div>
                                    <input type="submit" class="btn btn-primary" name="update" value="Update Property">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                  <label class="control-label" for="sqm">Sqaure meter:</label>
                                  <input class="pull-right" type="number" id="sqm" name="sqm">
                                </div>
                                <div class="form-group">
                                  <label class="control-label" for="floor">Floor:</label>
                                  <input class="pull-right" type="number" id="floor" name="floor">
                                </div>
                                <div class="form-group">
                                  <label class="control-label" for="bedrooms">Bedrooms:</label>
                                  <input class="pull-right" type="number" id="bedrooms" name="bedrooms">
                                </div>
                                <div class="form-group">
                                  <label class="control-label" for="bathrooms">Bathrooms:</label>
                                  <input class="pull-right" type="number" id="bathrooms" name="bathrooms">
                                </div>
                                <div class="panel panel-default">
                                  <div class="panel-body">
                                    <div class="checkbox">
                                      <label>
                                      <input type="checkbox" name="balcony" value="1">Balcony
                                    </label>
                                  </div>
                                    <div class="checkbox">
                                      <label>
                                      <input type="checkbox" name="elevator" value="1">Elevator
                                    </label>
                                    </div>
                                    <div class="checkbox">
                                      <label>
                                      <input type="checkbox" name="garage" value="1">Garage space
                                    </label>
                                    </div>
                                    <div class="checkbox">
                                      <label>
                                      <input type="checkbox" name="garden" value="1">Garden
                                    </label>
                                    </div>
                                    <div class="checkbox">
                                      <label>
                                      <input type="checkbox" name="renovated" value="1">Renovated
                                    </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include("include/admin-footer.php");?>
