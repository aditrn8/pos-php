<?php
$no = 0;
?>
<ol class="breadcrumb pull-right">
    <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a>Grafik Penjualan</a></li>
</ol>

<h1 class="page-header">
    <div class="alert alert-warning" role="alert">
        Grafik Penjualan
    </div>
</h1>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Filter Bulan & Tahun <i class="fa fa-filter"></i></h4>
            </div>
            <?= form_open('report/laporan_penjualan/filter1') ?>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <select name="GDMonth" class="form-control" required>
                            <option value="">-- Pilih Bulan --</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select name="GDYear" class="form-control" required>
                            <option value="">-- Pilih Tahun --</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="form_group">
                    <button class="btn btn-success">Filter <i class="fa fa-filter"></i></button>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<div style="width: 800px;">
    <canvas id="myChart"></canvas>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<!-- JavaScript untuk menampilkan grafik -->
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chartData = <?= json_encode($chartData) ?>;

    // Proses data dan tampilkan grafik di sini menggunakan Chart.js
    // ...
</script>