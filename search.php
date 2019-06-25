<?php include("include/db.php"); ?>

    <!--  HEADER  -->
<?php include("include/header.php"); ?>

      <!-- NAVIGATION -->
      <?php include("include/navigation.php"); ?>

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <?php
        if (ifMethodSet("post")) {
          if(!empty($_POST['price-min'])){
            $where[] = "prop_sale_price >= ".$_POST['price-min'];
            $param = $_POST['price-min'];
            $params[] = &$param;

          }
          if(!empty($_POST['price-max'])){
            $where[] = "prop_sale_price <= ".$_POST['price-max'];
            $param = $_POST['price-max'];
            $params[] = &$param;

          }
          if (!empty($_POST['price-min']) && !empty($_POST['price-max'])) {
            $where[] = "prop_sale_price BETWEEN ".$_POST['price-min']." AND ".$_POST['price-max'];
            $param = $_POST['price-min'];
            $params[] = &$param;

            $param = $_POST['price-max'];
            $params[] = &$param;

          }
          if (!empty($_POST['location'])) {
            $where[] = "prop_location = '".$_POST['location']."'";
            echo $param = $_POST['location'] ;
            $params[] = &$param;

          }
          if (!empty($_POST['bedrooms'])) {
            $where[] = "prop_bedrooms >= ".$_POST['bedrooms'];
            $param = $_POST['bedrooms'];
            $params[] = &$param;

          }

          if (!empty($_POST['floor'])) {
            $where[] = "prop_floor <= ".$_POST['floor'];
            $param = $_POST['floor'] ;
            $params[] = &$param;

          }
          if (!empty($_POST['sqm'])) {
            $where[] = "prop_sqm >= " .$_POST['sqm'];
            $param = $_POST['sqm'];
            $params[] = &$param;

          }
          if (!empty($_POST['bathroom'])) {
            $where[] = "prop_bathroom > ?".$_POST['bathroom'];
            $param = $_POST['bathroom'];
            $params[] = &$param;

          }
          if (!empty($_POST['balcony'])) {
            $where[] = "prop_balcony = ".$_POST['balcony'];
            $param = $_POST['balcony'];
            $params[] = &$param;

          }
          if (!empty($_POST['elevator'])) {
            $where[] = "prop_elevator = ".$_POST['elevator'];
            $param = $_POST['elevator'];
            $params[] = &$param;

          }
          if (!empty($_POST['garage'])) {
            $where[] = "prop_garage = ".$_POST['garage'];
            $param = $_POST['garage'];
            $params[] = &$param;

          }
          if (!empty($_POST['garden'])) {
            $where[] = "prop_garden = ".$_POST['garden'];
            $param = $_POST['garden'];
            $params[] = &$param;

          }
          if (!empty($_POST['renovated'])) {
            $where[] = "prop_renovated= ".$_POST['renovated'];
            $param = $_POST['renovated'];
            $params[] = &$param;

          }
          if (!empty($_POST['furnished'])) {
            $where[] = "prop_furnished = ".$_POST['furnished'];
            $param = $_POST['furnished'];
            $params[] = &$param;

          }

          // TRIED TO DO IT WITH PREPARED STATEMENT DONT KNOW WHATS THE PROBLEM

        /*  $where_sql = " WHERE ". implode(' AND ', $where);
          $query = "SELECT * FROM properties_buy" . $where_sql;
          echo $query;
          $stmt = mysqli_prepare($connection, $query);
          $params = array_merge(array($stmt), array(str_repeat("s",count($params))), $params);
          call_user_func_array('mysqli_stmt_bind_param', $params);
          mysqli_execute($stmt);
          mysqli_stmt_bind_result($stmt, $id, $advertiser, $title, $location, $image, $content, $price, $sales_price,$sqm, $bedrooms, $bathrooms, $floor, $balcony, $elevator, $garage, $garden, $renovated);

        while(mysqli_stmt_fetch($stmt)){*/


        $location = $_POST['location'];
        $bedrooms = $_POST['bedrooms'];
        $query = "SELECT * FROM properties_buy WHERE ". implode(' AND ',$where);
        $result = mysqli_query($connection, $query);
        confirmQuery($result);
        echo mysqli_num_rows($result);
        while ($row = mysqli_fetch_assoc($result)) {
          $id= $row['prop_id'];
          $title = $row['prop_title'];
          $image = $row['prop_image'];
          $location = $row['prop_location'];
          $sqm = $row['prop_sqm'];
          $bedrooms = $row['prop_bedrooms'];
          $bathrooms = $row['prop_bathrooms'];
          $floor = $row['prop_floor'];
          $price = $row['prop_price'];
          $sales_price = $row['prop_sale_price'];


        ?>

      <div class="panel panel-default text-center">
        <div class="panel-body">
          <div class="col-xs-6">
            <img src="Image/<?php echo $image;?>" alt="" class="img-responsive">
          </div>
        <div class="col-xs-6">
          <h2><a href="property.php?id=<?php echo $id?>&prop=buy"><?php echo $title;?></a></h2>
          <p><i class="fa fa-map-marker"></i> <?php echo $location;?></p>
          <div class="col-xs-6">
            <p class="text-left"><i class="fa fa-arrows-alt"></i> <?php echo $sqm ?> sqm</p>
            <p class="text-left"><i class="fa fa-bed"></i> <?php echo $bedrooms ?></p>
          </div>
          <div class="col-xs-6">
            <p class="text-left"><i class="fa fa-bath"></i> <?php echo $bathrooms ?></p>
            <p class="text-left"><i class="fa fa-arrow-up"></i> <?php echo $floor ?></p>
          </div>
          <p class="price"><span>Price:</span><br>
          WAS: <span class="sale">£<?php echo $price;?></span><br>
          NOW: <span class="offer">£<?php echo $sales_price;?></span></p>
          <a href="property?id=<?php echo $id ?>&prop=buy" class="btn btn-color" type="button" name="button">More details</a>
        </div>
        </div>
      </div>
    <?php }} ?>
    </div>
    <aside class="col-md-4">
      <?php include("include/search_bar.php") ?>
    </aside>
  </div>
</div>








    <!--   FOOTER   -->
   <?php include("include/footer.php"); ?>
