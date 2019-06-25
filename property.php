<?php include("include/db.php"); ?>

    <!--  HEADER  -->
<?php include("include/header.php"); ?>

      <!-- NAVIGATION -->
      <?php include("include/navigation.php"); ?>

      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <?php
              if (isset($_GET['id']) && isset($_GET['prop'])) {
                $id = $_GET['id'];
                if ($_GET['prop'] == "buy") {
                  $stmt = mysqli_prepare($connection, "SELECT * FROM properties_buy WHERE prop_id = ?");
                } else {
                  $stmt = mysqli_prepare($connection, "SELECT * FROM properties_rent WHERE prop_id = ?");
                }
                mysqli_stmt_bind_param($stmt, "i", $id);
                mysqli_stmt_execute($stmt);
                if ($_GET['prop'] == "buy") {
                  mysqli_stmt_bind_result($stmt, $id, $advertiser, $title, $location, $image, $content, $price, $sales_price,$sqm, $bedrooms, $bathrooms, $floor, $balcony, $elevator, $garage, $garden, $renovated);
                } else {
                  mysqli_stmt_bind_result($stmt, $id, $advertiser, $title, $location, $image, $content, $price, $sqm, $bedrooms, $bathrooms, $floor, $balcony, $elevator, $garage, $garden, $renovated, $furnished);
                }

                mysqli_stmt_fetch($stmt);
                mysqli_stmt_close($stmt);
              }

             ?>
            <div class="panel panel-default text-center">
              <div class="panel-heading">
                <img src="Image/<?php echo $image;?>" alt="" class="img-responsive">
                <h2><?php echo $title;?></h2>
              </div>
              <div class="panel-body">
                <h4>Advertised by: <?php echo $advertiser ?></h4>
                <p><i class="fa fa-map-marker"></i> <?php echo $location;?></p>
                <p><?php echo $content;?></p>
                <?php if(isset($sales_price)): ?>
                <p class="price"><span>Price:</span><br>
                WAS: <span class="sale">£<?php echo $price;?></span><br>
                NOW: <span class="offer">£<?php echo $sales_price;?></span></p>
                <?php else: ?>
                <p class="price"><span>Price: <?php echo $price ?></span></p>
                <?php endif; ?>
                </div>
                  <div class="panel-body">
                    <div class="col-xs-6">
                      <dl class="dl-horizontal">
                        <dt>Property Id:</dt>
                        <dd><?php echo $id ?></dd>
                        <dt>Sqaure meters:</dt>
                        <dd><?php echo $sqm ?></dd>
                        <dt>Floor:</dt>
                        <dd><?php echo $floor ?></dd>
                        <dt>Bedrooms:</dt>
                        <dd><?php echo $bedrooms ?></dd>
                        <dt>Bathroom:</dt>
                        <dd><?php echo $bathrooms ?></dd>
                      </dl>
                    </div>
                    <div class="col-xs-6">
                      <dl class="dl-horizontal">
                        <dt>Balcony:</dt>
                        <dd><?php echo ($balcony == 1) ? "Yes" : "No" ; ?></dd>
                        <dt>Elevator:</dt>
                        <dd><?php echo ($elevator == 1) ? "Yes" : "No" ; ?></dd>
                        <dt>Garage space:</dt>
                        <dd><?php echo ($garage == 1) ? "Yes" : "No" ; ?></dd>
                        <dt>Garden:</dt>
                        <dd><?php echo ($garden == 1) ? "Yes" : "No" ; ?></dd>
                        <dt>Renovated</dt>
                        <dd><?php echo ($renovated == 1) ? "Yes" : "No" ; ?></dd>
                        <?php if (isset($furnished)): ?>
                        <dt>Furnished</dt>
                        <dd><?php echo ($furnished == 1) ? "Yes" : "No" ; ?></dd>
                        <?php endif; ?>
                      </dl>
                    </div>
                  </div>
            </div>


          </div>
          <aside class="col-md-4">
            <?php include 'include/search_bar.php'; ?>
          </aside>
        </div>
      </div>

      <!--   FOOTER   -->
<?php include("include/footer.php"); ?>
