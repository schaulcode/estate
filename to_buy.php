<?php include("include/db.php"); ?>

    <!--  HEADER  -->
<?php include("include/header.php"); ?>

      <!-- NAVIGATION -->
      <?php include("include/navigation.php"); ?>

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <?php
        $query = "SELECT * FROM properties_buy";
        $result = mysqli_query($connection,$query);
        if(!$result){
            echo "querry failed";
        }
        while($row = mysqli_fetch_assoc($result)){

        ?>

      <div class="panel panel-default text-center">
        <div class="panel-body">
          <div class="col-xs-6">
            <img src="Image/<?php echo $row['prop_image'];?>" alt="" class="img-responsive">
          </div>
        <div class="col-xs-6">
          <h2><a href="property.php?id=<?php echo $row['prop_id']?>&prop=buy"><?php echo $row['prop_title'];?></a></h2>
          <p>Location: <?php echo $row['prop_location'];?></p>
          <p><?php echo substr($row['prop_content'],0,65);?></p>
          <p class="price"><span>Price:</span><br>
          WAS: <span class="sale">£<?php echo $row['prop_price'];?></span><br>
          NOW: <span class="offer">£<?php echo $row['prop_sale_price'];?></span></p>
          <div><button class="btn btn-color" type="button" name="button">More details</button></div>
        </div>
        </div>
      </div>
      <?php } ?>
    </div>
    <aside class="col-md-4">
      <?php include("include/search_bar.php") ?>
    </aside>
  </div>
</div>








    <!--   FOOTER   -->
   <?php include("include/footer.php"); ?>
