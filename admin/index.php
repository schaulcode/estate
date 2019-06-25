<?php include("include/admin-header.php");?>
    <div class="wrapper">
        <?php include("include/navigation.php");?>
        <div class="main-content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1>Dashboard</h1>
                        <div class="col-md-6" id="donutchartProp" style="width: 500px; height: 500px;"></div>
                        <?php if (isAdmin()): ?>
                          <div class="col-md-6" id="donutchartUsers" style="width: 500px; height: 500px;"></div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include("include/admin-footer.php");?>
<?php
if(isAdmin()){
$to_buy_count = countChart("properties_buy");
$to_rent_count = countChart("properties_rent");
}else{
  $to_buy_count = countChartWhere("properties_buy", "prop_advertiser = '{$_SESSION['firstname']}'");
  $to_rent_count = countChartWhere("properties_rent","prop_advertiser = '{$_SESSION['firstname']}'");
}
$advertisers_count = countChartWhere("users", "user_role = 'Advertiser'");
$users_count = countChartWhere("users", "user_role = 'User'");


 ?>
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var dataProp = google.visualization.arrayToDataTable([
          ['Task', 'Amount'],
          <?php
          $element_title = ['Properties to Buy', 'Properties to Rent'];
          $element_count = [$to_buy_count, $to_rent_count,];

          for ($i=0; $i < 2; $i++) {
            echo "['{$element_title[$i]}'".","."{$element_count[$i]}],";
          }
           ?>
        ]);

        var optionsProp = {
          title: 'All properties',
          pieHole: 0.4,
        };

        var dataUsers = google.visualization.arrayToDataTable([
          ['Task', 'Amount'],
          <?php
          $element_title = [ 'Advertisers', 'Users'];
          $element_count = [ $advertisers_count, $users_count];

          for ($i=0; $i < 2; $i++) {
            echo "['{$element_title[$i]}'".","."{$element_count[$i]}],";
          }
           ?>
        ]);

        var optionsUsers= {
          title: 'Users',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchartProp'));
        chart.draw(dataProp, optionsProp);
        var chart = new google.visualization.PieChart(document.getElementById('donutchartUsers'));
        chart.draw(dataUsers, optionsUsers);
      }
    </script>
