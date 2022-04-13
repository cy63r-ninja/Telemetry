<?php 
  function getRandomArray($n, $min, $max) {
    $arr = [];
    
    for($i = 0; $i < $n; $i++) {
      $arr[$i] = array("x" => rand($min, $max), "y" => rand($min, $max));
    }

    return $arr;
  }

  $speedData = getRandomArray(20, 0, 1000);
  $fuelData = getRandomArray(10, 0, 100);
  $elevationData = getRandomArray(10, 0, 70);
?>

<html>
<head>
  <title>Platform Check</title>
  

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script>

    window.onload = function () {
    
      var speedChart = new CanvasJS.Chart("speedChart", {
        title: {
          text: "SPEED"
        },
        axisX: {
          title: "TIME",
          suffix: "s"
        },
        axisY: {
          title: "SPEED",
          suffix: " KMPH"
        },
        data: [{
          type: "area",
          markerSize: 0,
          xValueFormatString: "#,##0 s",
          yValueFormatString: "#,##0.000 KMPH",
          dataPoints: <?php echo json_encode($speedData, JSON_NUMERIC_CHECK); ?>
        }]
      });

      var fuelChart = new CanvasJS.Chart("fuelChart", {
        title: {
          text: "FUEL BURNED"
        },
        axisX: {
          title: "TIME",
          suffix: " s"
        },
        axisY: {
          title: "FUEL",
          suffix: " kg"
        },
        data: [{
          type: "area",
          markerSize: 0,
          xValueFormatString: "#,##0 s",
          yValueFormatString: "#,##0.000 KM",
          dataPoints: <?php echo json_encode($fuelData, JSON_NUMERIC_CHECK); ?>
        }]
      });
      var elevationChart = new CanvasJS.Chart("elevationChart", {
        title: {
          text: "ORBIT ALTITUDE"
        },
        axisX: {
          title: "TIME",
          suffix: " KM"
        },
        axisY: {
          title: "ELEVATION",
          suffix: " KM"
        },
        data: [{
          type: "area",
          markerSize: 0,
          xValueFormatString: "#,##0 s",
          yValueFormatString: "#,##0.000 KM",
          dataPoints: <?php echo json_encode($elevationData, JSON_NUMERIC_CHECK); ?>
        }]
      });

      speedChart.render();
      fuelChart.render();
      elevationChart.render();
    }
  </script>
</head> 
<body>
<h1> Rocket Telemetry Check</h1>
  <div>
  <form name="form" method="post" action="upload.php" enctype="multipart/form-data" >
    <label>Upload New Telemetry File:  </label>
  <input type="file" name="my_file" /><br /><br />
  <input type="submit" name="submit" value="Submit New Telemetry Data File"/>
  </form>
  </div>
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div id="speedChart"></div>
    </div>
    <div class="col-md-4">
      <div id="fuelChart"></div>
    </div>
    <div class="col-md-4">
      <div id="elevationChart"></div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</body>
</html>
