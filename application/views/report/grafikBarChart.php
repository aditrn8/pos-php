<ol class="breadcrumb pull-right">
   <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Dashboard</a></li>
   <li class="breadcrumb-item"><a>Grafik Penjualan</a></li>
</ol>

<h1 class="page-header">

   Grafik Penjualan

</h1>



<div class="row">
   <div class="col-lg-12">
      <div class="panel panel-inverse">
         <div class="panel-heading">
            <h4 class="panel-title">Laporan Penjualan</h4>
         </div>
         <div class="panel-body">
            <div class="table-responsive">
               <canvas id="barChart"></canvas>
            </div>
         </div>
      </div>
   </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
   var ctx = document.getElementById('barChart').getContext('2d');
   var data = {
      labels: [],
      datasets: [{
         label: 'Jumlah Pembayaran',
         backgroundColor: 'rgba(75, 192, 192, 0.2)',
         borderColor: 'rgba(75, 192, 192, 1)',
         borderWidth: 1,
         data: []
      }]
   };

   <?php
   // Data bulan dan jumlah pembayarannya
   $bulanData = [];
   foreach ($query->result() as $record) {
      $bulanData[$record->BulanPembayaran] = $record->jumlahPembayaran;
   }

   // Daftar nama bulan yang diurutkan
   $bulan = [
      'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
      'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
   ];

   // Memetakan jumlah pembayaran ke array data
   foreach ($bulan as $namaBulan) {
      $jumlah = isset($bulanData[$namaBulan]) ? $bulanData[$namaBulan] : 0;
      echo "data.labels.push('$namaBulan');";
      echo "data.datasets[0].data.push($jumlah);";
   }
   ?>

   var options = {
      scales: {
         yAxes: [{
            ticks: {
               beginAtZero: true
            }
         }]
      }
   };

   var myChart = new Chart(ctx, {
      type: 'bar',
      data: data,
      options: options
   });
</script>