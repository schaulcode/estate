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
                                $prop_price = $_POST['price'];
                                $prop_sale_price = $_POST['sale_price'];
                                $prop_image = $_FILES['image']['name'];
                                $prop_image_temp = $_FILES['image']['tmp_name'];
                                move_uploaded_file($prop_image_temp,"../image/$prop_image");
                                $query = "INSERT INTO properties_buy (prop_title, prop_location, prop_content, prop_image, prop_price, prop_sale_price ) VALUES ('{$prop_title}', '{$prop_location}', '{$prop_content}', '{$prop_image}', {$prop_price}, {$prop_sale_price})";
                                $result = mysqli_query($connection, $query);
                                if(!$result){
                                    die("Failed".mysqli_error($connection));
                                }
                            }


                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="col-xs-6">
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
                                        <label for="price">Property Price</label>
                                        <input type="number" class="form-control" name="price" value="100" min="100" step="100">
                                    </div>
                                    <div class="form-group">
                                        <label for="sale_price">Property Sale Price</label>
                                        <input type="number" class="form-control" name="sale_price" value="100" min="100" step="100">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="image">Property Image</label>
                                        <input type="file" name="image">
                                    </div>
                                    <input type="submit" class="btn btn-primary" name="add_property" value="Add Property">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                  <label class="control-label" for="sqm">Sqaure meter:</label>
                                  <input class="pull-right" type="number" id="sqm" name="sqm" value="10" min="10" step="10">
                                </div>
                                <div class="form-group">
                                  <label class="control-label" for="floor">Floor:</label>
                                  <input class="pull-right" type="number" id="floor" name="floor" value="1" min="1">
                                </div>
                                <div class="form-group">
                                  <label class="control-label" for="bedrooms">Bedrooms:</label>
                                  <input class="pull-right" type="number" id="bedrooms" name="bedrooms" value="1" min="1">
                                </div>
                                <div class="form-group">
                                  <label class="control-label" for="bathrooms">Bathrooms:</label>
                                  <input class="pull-right" type="number" id="bathrooms" name="bathrooms" value="1" min="1">
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
