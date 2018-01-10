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
                  mysqli_stmt_bind_result($stmt, $id, $advertiser, $title, $location, $image, $content, $price, $sales_price);
                } else {
                  mysqli_stmt_bind_result($stmt, $id, $advertiser, $title, $location, $image, $content, $price);
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
                <p>Location: <?php echo $location;?></p>
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
                        <dd>48</dd>
                        <dt>Sqaure meters:</dt>
                        <dd>85</dd>
                        <dt>Floor:</dt>
                        <dd>2</dd>
                        <dt>Bedrooms:</dt>
                        <dd></dd>
                        <dt>Bathroom:</dt>
                        <dd></dd>
                      </dl>
                    </div>
                    <div class="col-xs-6">
                      <dl class="dl-horizontal">
                        <dt>Balcony:</dt>
                        <dd>48</dd>
                        <dt>Elevator:</dt>
                        <dd>85</dd>
                        <dt>Garage space:</dt>
                        <dd>2</dd>
                        <dt>Garden:</dt>
                        <dd></dd>
                        <dt>Renovated</dt>
                        <dd></dd>
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
