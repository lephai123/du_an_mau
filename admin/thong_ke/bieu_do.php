<div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  <?php
  $tongdm = count($list_thong_ke);
  $i=1;
    foreach ($list_thong_ke as $tk) {
        extract($tk);
        if($i == $tongdm){
            $dau_phay = "";
        }else{
            $dau_phay = ",";
        }
        echo "['".$tk['tenlh']."', ".$tk['countsp']."]".$dau_phay;
        $i+=1;
    }
  ?>

]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Thống kê hàng hóa theo loại', 'width':1000, 'height':1000};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>