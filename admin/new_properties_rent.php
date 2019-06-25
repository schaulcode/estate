<?php include("include/admin-header.php");?>
    <div class="wrapper">
        <?php include("include/navigation.php");?>
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <h1>Add Properties</h1>
                        <?php
                            if(isset($_POST['add_property'])){
                                $prop_title = $_POST['title'];
                                $prop_location = $_POST['location'];
                                $prop_content = $_POST['content'];
                                $prop_price_monthly = $_POST['price'];
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
                                $prop_furnished = (isset($_POST['furnished'])) ? $_POST['furnished'] : 0;
                                $prop_advertiser = $_SESSION['firstname'];

                                move_uploaded_file($prop_image_temp,"../image/$prop_image");

                                $stmt = mysqli_prepare($connection,"INSERT INTO properties_rent (prop_advertiser, prop_title, prop_location, prop_content, prop_image, prop_price_monthly, prop_sqm, prop_floor, prop_bedrooms, prop_bathrooms, prop_balcony, prop_elevator, prop_garage, prop_garden, prop_renovated, prop_furnished ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                                mysqli_stmt_bind_param($stmt, "ssssiiiiiiiiiii", $prop_advertiser, $prop_title,$prop_location, $prop_content, $prop_image, $prop_price, $prop_sqm, $prop_floor, $prop_bedrooms, $prop_bathrooms, $prop_balcony, $prop_elevator, $prop_garage, $prop_garden, $prop_renovated, $prop_furnished);
                                mysqli_stmt_execute($stmt);

                                 confirmQuery($stmt);
                            }


                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Property Title</label>
                                    <input type="text" class="form-control" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="location">Property Location</label>
                                    <input type="text" class="form-control" name="location">
                                </div>
                                <div class="form-group">
                                    <label for="content">Property Content</label>
                                    <textarea class="form-control" name="content" cols="30" rows="10"></textarea>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="price">Property Price per Month</label>
                                        <input type="number" class="form-control" name="price">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="image">Property Image</label>
                                        <input type="file" name="image">
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group">
                                  <input type="submit" class="btn btn-primary" name="add_property" value="Add Property">
                                </div>
                            </div>
                            <div class="col-md-6">
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
                                      <input type="checkbox" name="balony" value="true">Balcony
                                    </label>
                                  </div>
                                    <div class="checkbox">
                                      <label>
                                      <input type="checkbox" name="elevator" value="true">Elevator
                                    </label>
                                    </div>
                                    <div class="checkbox">
                                      <label>
                                      <input type="checkbox" name="garden-space" value="true">Garage space
                                    </label>
                                    </div>
                                    <div class="checkbox">
                                      <label>
                                      <input type="checkbox" name="garden" value="true">Garden
                                    </label>
                                    </div>
                                    <div class="checkbox">
                                      <label>
                                      <input type="checkbox" name="renovated" value="true">Renovated
                                    </label>
                                  </div>
                                  <div class="checkbox">
                                    <label>
                                    <input type="checkbox" name="furnished" value="true">Furnished
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
