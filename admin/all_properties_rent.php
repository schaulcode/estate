<?php include("include/admin-header.php");?>
    <div class="wrapper">
        <?php include("include/navigation.php");?>
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <h1>Properties to buy</h1>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ADVERTISER</th>
                                        <th>TITLE</th>
                                        <th>LOCATION</th>
                                        <th>IMAGE</th>
                                        <th>CONTENT</th>
                                        <th>PRICE PER MONTH</th>
                                        <th>EDIT</th>
                                        <th>DELETE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT * FROM properties_rent";
                                        $result = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($result)){
                                            $prop_id = $row['prop_id'];
                                            $prop_advertiser = $row['prop_advertiser'];
                                            $prop_title = $row['prop_title'];
                                            $prop_location = $row['prop_location'];
                                            $prop_image = $row['prop_image'];
                                            $prop_content = $row['prop_content'];
                                            $prop_price_monthly = $row['prop_price_monthly'];


                                            echo "<tr>";
                                            echo "<td>$prop_id</td>";
                                            echo "<td>$prop_advertiser</td>";
                                            echo "<td>$prop_title</td>";
                                            echo "<td>$prop_location</td>";
                                            echo "<td><img width=100 src='../image/$prop_image' alt='image' </td>";
                                            echo "<td>$prop_content</td>";
                                            echo "<td>$prop_price_monthly</td>";
                                            echo "<td><a class='btn btn-primary' href='edit_properties_rent.php?edit=$prop_id'>Edit</a></td>";
                                            echo "<td><a class='btn btn-danger' href='all_properties_rent.php?delete=$prop_id'>Delete</a></td>";
                                            echo "</tr>";
                                        }
                                    if(isset($_GET['delete'])){
                                        $delete_id = $_GET['delete'];
                                        $query = "DELETE FROM properties_rent WHERE prop_id LIKE {$delete_id}";
                                        $result = mysqli_query($connection,$query);
                                        header("Location: all_properties_rent.php");
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include("include/admin-footer.php");?>
