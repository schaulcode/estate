<?php include("include/admin-header.php");?>
    <div class="wrapper">
        <?php include("include/navigation.php");?>
        <div class="main-content">
            <div class="container">
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
                                move_uploaded_file($prop_image_temp,"../image/$prop_image");
                                $query = "UPDATE properties_buy SET prop_title = '{$prop_title}', prop_location = '{$prop_location}', prop_content = '{$prop_content}', prop_image = '{$prop_image}', prop_price = {$prop_price}, prop_sale_price = {$prop_sale_price} WHERE prop_id = {$prop_id}";
                                $result = mysqli_query($connection, $query);
                                if(!$result){
                                    die("Failed".mysqli_error($connection));
                                }
                                header("Location: all_properties_buy.php");
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include("include/admin-footer.php");?>
