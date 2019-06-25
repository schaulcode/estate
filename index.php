<?php include("include/db.php"); ?>

    <!--  HEADER  -->
<?php include("include/header.php"); ?>

      <!-- NAVIGATION -->
      <?php include("include/navigation.php"); ?>

      <div id="main-contest" class="container">
        <!-- CAROUSEL -->
        <div class="row">
          <div id="banner" class="col-md-12 hidden-xs">
            <div id="carousel" class="carousel slide" data-ride="carousel" >
              <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
                <li data-target="#carousel" data-slide-to="3"></li>
                <li data-target="#carousel" data-slide-to="4"></li>
              </ol>
              <div class="carousel-inner listbox">
                <div id="banner-one" class="item active">
                  <img class="img-responsive" src="image/building.jpg" alt="building">
                </div>
                <div id="banner-two" class="item">
                  <img src="image/diningroom.jpg" alt="diningroom">
                </div>
                <div id="banner-three" class="item">
                  <img src="image/livingroom.jpg" alt="livingroom">
                </div>
                <div id="banner-four" class="item">
                  <img src="image/floor-plan.jpg" alt="floor plan">
                </div>
                <div id="banner-five" class="item">
                  <img src="image/wooden-staircase.jpg" alt="wooden staircase">
                </div>
              </div>
              <a class="left carousel-control btn btn-default" href="#carousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control btn btn-default" href="#carousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>

        <section class="row">
          <!-- WELCOME TEXT -->
          <article class="col-md-8">
            <div id="article-contex">
              <h2>Welcome to our Website</h2>
              <p>At M&amp;S Estate we know buying or selling properties can be hard work.
                That’s why we developed a set of tools to help with the heavy lifting.
                Don’t miss out on some of the most extraordinary properties available around London</p>
                <img class="img-responsive" src="image/keys.jpg" alt="keys">
            </div>
          </article>
          <!-- SEARCH FORM -->
          <aside class="col-md-4">
          <?php include("include/search_bar.php") ?>
          </aside>
        </section>
        <div class="clearfix"></div>
        <!-- ITEMS SECTION -->
        <section class="items-section row">
          <h3>Latest Properties to buy:</h3>

            <?php
              $query = "SELECT * FROM properties_buy ORDER BY prop_id DESC LIMIT 3";
              $result = mysqli_query($connection,$query);
              if(!$result){
                  echo "querry failed";
              }
              while($row = mysqli_fetch_assoc($result)){

              ?>

            <div class="col-sm-6 col-md-4 items">
              <img src="Image/<?php echo $row['prop_image'];?>" alt="" class="img-responsive">
              <h2><a href="property?id=<?php echo $row['prop_id'] ?>&prop=buy"><?php echo $row['prop_title'];?></a></h2>
              <p><i class="fa fa-map-marker"></i> <?php echo $row['prop_location'];?></p>
              <div class="col-xs-6">
                <p class="text-left"><i class="fa fa-arrows-alt"></i> <?php echo $row['prop_sqm'] ?></p>
                <p class="text-left"><i class="fa fa-bed"></i> <?php echo $row['prop_bedrooms'] ?></p>
              </div>
              <div class="col-xs-6">
                <p class="text-left"><i class="fa fa-bath"></i> <?php echo $row['prop_bathrooms'] ?></p>
                <p class="text-left"><i class="fa fa-arrow-up"></i> <?php echo $row['prop_floor'] ?></p>
              </div>
              <p class="price"><span>Price:</span><br>
              WAS: <span class="sale">£<?php echo $row['prop_price'];?></span><br>
              NOW: <span class="offer">£<?php echo $row['prop_sale_price'];?></span></p>
              <a href="property?id=<?php echo $row['prop_id'] ?>&prop=buy" class="btn btn-color" type="button" name="button">More details</a>
            </div>
            <?php } ?>

        </section>
        <section class="row items-section">
          <h3>Latest properies to rent:</h3>
          <?php
            $query = "SELECT * FROM properties_rent ORDER BY prop_id DESC LIMIT 3";
            $result = mysqli_query($connection,$query);
            if(!$result){
                echo "querry failed";
            }
            while($row = mysqli_fetch_assoc($result)){

            ?>
          <div class="col-sm-6 col-md-4 items">
            <div class="image">
            <img src="/Activity/Image/<?php echo $row['prop_image'];?>" alt="" class="img-responsive">
            </div>
            <h2><a href="property.php?id=<?php echo $row['prop_id'] ?>&prop=rent"><?php echo $row['prop_title'];?></a></h2>
            <p><i class="fa fa-map-marker"></i> <?php echo $row['prop_location'];?></p>
            <div class="col-xs-6">
              <p class="text-left"><i class="fa fa-arrows-alt"></i> <?php echo $row['prop_sqm'] ?></p>
              <p class="text-left"><i class="fa fa-bed"></i> <?php echo $row['prop_bedrooms'] ?></p>
            </div>
            <div class="col-xs-6">
              <p class="text-left"><i class="fa fa-bath"></i> <?php echo $row['prop_bathrooms'] ?></p>
              <p class="text-left"><i class="fa fa-arrow-up"></i> <?php echo $row['prop_floor'] ?></p>
            </div>
            <p class="price">Price: <?php echo  $row['prop_price_monthly']; ?>/m</p>
            <a href="property?id=<?php echo $row['prop_id'] ?>&prop=rent" class="btn btn-color" type="button" name="button">More details</a>
          </div>
        <?php } ?>
        </section>
      </div>

    <!--   FOOTER   -->
   <?php include("include/footer.php"); ?>
