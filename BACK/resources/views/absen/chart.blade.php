<div class="card bg-20 mt-4">
  <div class="card-body">
      <h3 class="color-white font-600 pt-3">Rekapitulasi Kehadiran Anda</h3>
      <p class="color-white opacity-70">
          Berikut adalah Data Rekap Kehadiran Terhitung dari {{date('01-m-Y')}}
      </p>
      <div class="card card-style ml-0 mr-0 bg-white">
        <div id="chart"></div>
      </div>
      <div class="card card-style ml-0 mr-0 bg-white">
        <div id="chart"></div>
          <div class="row mt-3 pt-1 mb-3">
            @foreach ($data['ct1'] as $item)
            <div class="col-6">
              <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-life-buoy float-left ml-3 mr-3" data-feather-line="1" data-feather-size="35" data-feather-color="blue2-dark" data-feather-bg="blue2-fade-light" style="width: 35px; height: 35px;"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle><line x1="4.93" y1="4.93" x2="9.17" y2="9.17"></line><line x1="14.83" y1="14.83" x2="19.07" y2="19.07"></line><line x1="14.83" y1="9.17" x2="19.07" y2="4.93"></line><line x1="14.83" y1="9.17" x2="18.36" y2="5.64"></line><line x1="4.93" y1="19.07" x2="9.17" y2="14.83"></line></svg>
              <h4 class="color-black float-left font-14 font-500 line-height-s">{{$item['label']}}<br>{{$item['data']}}</h4>
            </div>                
            @endforeach


          
          </div>
      </div>
  </div>
  <div class="card-overlay bg-highlight opacity-95"></div>
  <div class="card-overlay dark-mode-tint"></div>
</div>

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
    foreach ($data['ct1'] as $key => $value) {
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
</script>
