<?php include("include/admin-header.php");?>
    <div class="wrapper">
        <?php include("include/navigation.php");?>
        <div class="main-content">
            <div class="container">
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
                                move_uploaded_file($prop_image_temp,"../image/$prop_image");
                                $query = "INSERT INTO properties_rent (prop_title, prop_location, prop_content, prop_image, prop_price_monthly) VALUES ('{$prop_title}', '{$prop_location}', '{$prop_content}', '{$prop_image}', {$prop_price_monthly})";
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include("include/admin-footer.php");?>
