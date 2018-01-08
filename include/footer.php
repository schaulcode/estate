   <!-- FOOTER -->
      <footer class="row">
        <div class="container">

          <div class="col-xs-3 col-sm-2">
            <dl class="">
              <dt>COMPANY</dt>
              <dd><a href="#">ABOUT US</a></dd>
              <dd><a href="#">SERVICES</a></dd>
              <dd><a href="#">PRESENTATION</a></dd>
              <dd><a href="#">CLIENTS</a></dd>
            </dl>
          </div>

          <div class="col-xs-3 col-sm-2">
            <dl class="">
              <dt>PROPERTIES</dt>
              <dd><a href="#">COMMERCIAL</a></dd>
              <dd><a href="#">RESIDENTIAL</a></dd>
              <dd><a href="#">LUXURY</a></dd>
            </dl>
          </div>

          <div class="col-xs-3 col-sm-2">
            <dl class="">
              <dt>FAQ</dt>
              <dd><a href="#">FAQ</a></dd>
              <dd><a href="#">SUPPORT</a></dd>
            </dl>
          </div>

          <div class="col-xs-3 col-sm-2">
            <dl class="">
              <dt>FOR CLIENTS</dt>
              <dd><a href="#">SING UP</a></dd>
              <dd><a href="#">FORUMS</a></dd>
              <dd><a href="#">PROMOTIONS</a></dd>
            </dl>
          </div>

          <div class="col-md-offset-2  col-md-2 col-sm-4 hidden-xs">
            <div id="social-media-footer" class="pull-right">
              <span>FOLLOW US ON</span></br>
              <div id="facebook" class="btn"><i class="fa fa-facebook" aria-hidden="true"></i></div>
              <div id="tumbir" class="btn"><i class="fa fa-tumblr"></i></div>
              <div id="linkedin" class="btn"><i class="fa fa-linkedin"></i></div>
            </div>
          </div>

        </div>
      </footer>

      <div id="copyright" class="row text-center">
        <span>COPYRIGHT&copy; M&amp;S ESTATE 2017, ALL RIGHTS RESERVED</span>
      </div>
    </div>

    <script
      src="https://code.jquery.com/jquery-3.2.1.min.js"
      integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
      crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">
  // JQUERY FOR THE NAVIGATION BAR
  $(document).ready(function() {

    $(window).scroll(function() {
      if($(window).scrollTop()>141){
        $('nav').addClass('navbar-fixed');
      }
      if ($(window).scrollTop()<140) {
        $('nav').removeClass('navbar-fixed')
      }
    });
  });
</script>

  </body>
</html>