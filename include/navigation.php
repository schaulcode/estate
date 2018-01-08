<?php include("include/db.php"); ?>
       <nav class="row ">
        <div class="container">
          <div class="navbar" role="navigation">

            <div class="navbar-header">
            <button type="button" class="navbar-toggle"  data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                <li <?php if(basename($_SERVER['PHP_SELF']) == "index.php") echo"class='active'" ?>><a href="/Activity/index">HOME</a></li>
                <li <?php if(basename($_SERVER['PHP_SELF']) == "to_buy.php") echo"class='active'" ?>><a href="/Activity/to_buy">TO BUY</a></li>
                <li <?php if(basename($_SERVER['PHP_SELF']) == "to_rent.php") echo"class='active'" ?>><a href="/Activity/to_rent">TO RENT</a></li>
                <li <?php if(basename($_SERVER['PHP_SELF']) == "services.php") echo"class='active'" ?>><a href="#">SERVICES</a></li>
                <li <?php if(basename($_SERVER['PHP_SELF']) == "contact.php") echo"class='active'" ?>><a href="/Activity/contact">CONTACT</a></li>
                <li <?php if(basename($_SERVER['PHP_SELF']) == "about_us.php") echo"class='active'" ?>><a href="#">ABOUT US</a></li>
              </ul>
            </div>

          </div>
        </div>
      </nav>
