<?php
$no = 1;
?>
<ol class="breadcrumb pull-right">
    <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?= base_url('kasir/transaksi/') ?>">Data Transaksi</a></li>
    <li class="breadcrumb-item">Input Belanja</li>
</ol>

<div class='row'>
    <div class="col-md-12">
        <h1 class="page-header">
            Form Input Belanja
        </h1>
    </div>
</div>

<?php if ($this->session->flashdata('msg')) { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Info!</strong> <?php echo $this->session->flashdata('msg') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">List Barang</h4>
            </div>

            <div class="panel-body">
                <?= form_open('kasir/transaksi/inputBarangTemp/' . $id) ?>
                <div class="form-group">
                    <label for="">Barang :</label>
                    <select name="Barang" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <?php foreach ($barangJual->result() as $bj) : ?>
                            <option value="<?= $bj->product_name . '|' . $bj->price . '|' . $bj->stock ?>"><?= $bj->product_name . ' - Rp.' . number_format($bj->price, 0, '.', '.') ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <button type="submit" class="btn btn-success btn-block">Tambah ke keranjang <i class="fa fa-plus"></i></button>
                </div>

                <?= form_close() ?>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">List Belanjaan <i class="fas fa-shopping-cart"></i></h4>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>No</th>
                            <th>Barang</th>
                            <th>Harga</th>
                            <th>Jumlah Barang</th>
                            <th>Jumlah Transaksi Barang</th>
                            <th>#</th>
                        </tr>

                        <?php foreach ($barangTemp->result() as $bt) : ?>
                            <tr>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td>
                                    <?= $bt->Nama_Barang ?>
                                </td>
                                <td>
                                    <?= "Rp." . number_format($bt->Harga_Barang, 0, '.', '.') ?>
                                </td>
                                <td>
                                    <input type="number" class="form-control" value="<?= $bt->Jumlah_Barang ?>" min="1" onchange="kalkulasi(this.value,<?= $bt->ID_Penjualan ?>,<?= $id ?>)">
                                </td>
                                <td>
                                    <?= "Rp." . number_format($bt->Jumlah_Transaksi_Barang, 0, '.', '.') ?>
                                </td>
                                <td>
                                    <a href="<?= site_url('kasir/transaksi/hapusBarangTemp/' . $bt->ID_Penjualan . '/' . $id)  ?>" class="btn btn-icon btn-danger"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Form Pembayaran</h4>
            </div>

            <div class="panel-body">
                <?= form_open('kasir/transaksi/inputBarangTemp/' . $id) ?>
                <div class="form-group">
                    <label for="">TOTAL :</label>
                    <input type="text" class="form-control" value="Rp.<?= number_format($totalBelanja, 0, '.', '.') ?>" readonly>
                </div>

                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<script>
    function reload_page() {
        window.location.reload();
    }

    function kalkulasi(val, idPenjualan, id) {
        $.ajax({
            url: "<?= site_url('kasir/transaksi/kalkulasi/') ?>" + id + "/" + idPenjualan + "/" + val,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data)
                if (data.data == false) {
                    alert('Inputan melebihi stock!');
                    reload_page();
                } else {
                    alert('Berhasil');
                    reload_page();
                }
            }
        });
    }
</script>