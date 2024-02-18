<?php
$no = 0;
?>
<ol class="breadcrumb pull-right">
    <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a>Laporan Penjualan</a></li>
</ol>

<h1 class="page-header">
    <div class="alert alert-warning" role="alert">
        Laporan Penjualan Periode <?= $tgl1 ?> - <?= $tgl2 ?>
        <?php if ($this->session->userdata('filter')) { ?>
            <a href="<?= site_url('report/laporan_penjualan/reset_filter') ?>" class="btn btn-danger">Reset Filter</a>
        <?php } ?>
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

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Filter Tanggal <i class="fa fa-filter"></i></h4>
            </div>
            <?= form_open('report/laporan_penjualan/filter2') ?>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">From</label>
                            <input type="date" name="date1" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">To</label>
                            <input type="date" name="date2" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-success">Filter <i class="fa fa-filter"></i></button>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Data Transaksi</h4>
                <a href="<?= site_url('report/laporan_penjualan/export') ?>" class="btn btn-success">Download Data Transaksi <i class="fa fa-print"></i></a>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nomor Invoice</th>
                                <th>Status</th>
                                <th>Pembayaran Via</th>
                                <th>Tanggal Transaksi</th>
                                <th>Pendapatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($query->result() as $q) {
                                $no++; ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $q->Nomor_Invoice ?></td>
                                    <td>
                                        <p class="badge badge-success">Sudah Bayar</p>
                                    </td>
                                    <td>
                                        <?php if ($q->Paid_Type == "Tunai") { ?>
                                            <p class="badge badge-warning">Tunai</p>
                                        <?php } else { ?>
                                            <p class="badge badge-warning" onclick="detailBukti('<?= base_url('upload/' . $q->Bukti_Transfer) ?>')">Transfer</p>
                                        <?php } ?>
                                    </td>
                                    <td><?= convertDateFormat($q->Created_Date) ?></td>
                                    <td>Rp. <?= number_format($q->Bill, 0, '.', '.') ?> <button class="btn btn-info btn-icon btn-circle btn-sm lihat-detail-btn" data-toggle="modal" data-target="#detailModal" title="Detail Transaksi" data-id="<?= $q->ID_Transaksi ?>" data-noInvoice="<?= $q->Nomor_Invoice ?>"><i class="fa fa-eye"></i></button></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" align="center">Total Pendapatan</td>
                                <td>Rp. <?= number_format($totalPendapatan, 0, '.', '.') ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="detailModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Penjualan -> <b></b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="detailTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Harga Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Pendapatan</th>
                        </tr>
                    </thead>
                    <tbody id="detailTableBody">
                        <!-- Isi tabel akan ditambahkan melalui JavaScript -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" align="center">Total Pendapatan</td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="buktiTransferModal" tabindex="-1" role="dialog" aria-labelledby="buktiTransferModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="buktiTransferModalLabel">Bukti Transfer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="buktiTransferImage" src="" alt="Bukti Transfer" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#table').DataTable();

        $('.lihat-detail-btn').on('click', function() {
            var id_transaksi = $(this).data('id');
            var no_invoice = $(this).data('noinvoice');

            $('#detailModalLabel b').text(no_invoice);
            $.ajax({
                url: "<?= site_url('report/laporan_penjualan/get_data_detail_penjualan') ?>",
                type: 'GET',
                dataType: 'json',
                data: {
                    id_transaksi: id_transaksi
                },
                success: function(data) {

                    console.log(data);
                    $('#detailTableBody').empty();
                    var totalPendapatan = 0;

                    // Tambahkan data ke tabel detail
                    $.each(data, function(index, item) {
                        var row = '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + item.Nama_Barang + '</td>' +
                            '<td>' + formatRupiah(item.Harga_Barang) + '</td>' +
                            '<td>' + item.Jumlah_Barang + '</td>' +
                            '<td>' + formatRupiah(item.Jumlah_Transaksi_Barang) + '</td>' +
                            '</tr>';
                        $('#detailTableBody').append(row);
                        totalPendapatan += parseFloat(item.Jumlah_Transaksi_Barang);
                    });

                    $('#detailTable tfoot td:last-child').text(formatRupiah(totalPendapatan));


                }
            });
        });

        function formatRupiah(angka) {
            var reverse = angka.toString().split('').reverse().join(''),
                ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return 'Rp. ' + ribuan;
        }


    });

    function detailBukti(buktiTransferUrl) {
        $('#buktiTransferModal').modal('show'); // Menampilkan modal

        // Menampilkan gambar bukti transfer di dalam modal
        $('#buktiTransferImage').attr('src', buktiTransferUrl);
    }
</script>