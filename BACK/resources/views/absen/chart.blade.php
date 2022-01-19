
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div id="chart"></div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
var options = {
  chart: {
    width: 300,
    type: "pie"
  },
  dataLabels: {
    enabled: false
  },
  <?php
        $series='';
        $label='';
    foreach ($data as $key => $value) {
        $series=$series.$value['data'].',';
        $label=$label."'".$value['label']."'".',';
    }
    // dump($series,$label);
  ?>
  series: [{{$series}}],
  labels: [<?php echo $label ?>],
};

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();


var url = '{{url('/tesc')}}?pin=true';

// axios({
//   method: 'GET',
//   url: url,
// }).then(function(response) {
//   chart.updateSeries([{
//     name: 'Hari',
//     data: response.data
//   }])
// })
</script>
</body>
</html>