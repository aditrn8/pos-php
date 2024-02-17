<script src="https://youthsforum.com/wp-content/uploads/2021/05/html5-qrcode.min_.js"></script>
<style>
    .result {
        background-color: green;
        color: #fff;
        padding: 20px;
    }

    .row {
        display: flex;
    }
</style>
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
                <!-- <div class="form-group">
                    <div id="reader"></div>

                </div> -->

                <div class="form-group">
                    <h4>Masukan Kode Barcode / Scan</h4>
                    <input type="text" class="form-control" id="barcode" onchange="cariDetailBarang('<?= $id ?>',this.value)">
                </div>

                <?= form_close() ?>




                <!-- <div class="row">
                    <?php
                    foreach ($barangJual->result() as $bj) { ?>
                        <div class="col-md-2">
                            <div class="card">
                                <img class="card-img-top" src="<?= base_url('upload/4b18d737f6393e25e15df337c8709b4f.png') ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $bj->product_name ?></h5>
                                    <p class="card-text">Rp. <?= number_format($bj->price, 0, '.', '.') ?></p>
                                    <a href="<?= site_url('kasir/transaksi/inputBarangTemp/' . $id . '/' . $bj->product_name . '/' . $bj->price . '/' . $bj->stock) ?>" class="btn btn-success">Tambah ke keranjang <i class="fas fa-shopping-cart"></i></a>
                                </div>
                            </div>
                            <hr>
                        </div>
                    <?php } ?>
                </div> -->
                <!-- <?= form_open('kasir/transaksi/inputBarangTemp/' . $id) ?>
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

                <?= form_close() ?> -->
            </div>
        </div>
    </div>

    <script>

    </script>

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
    <?php if (count($barangTemp->result()) > 0) : ?>
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Form Pembayaran</h4>
                </div>

                <div class="panel-body">
                    <?= form_open_multipart('kasir/transaksi/inputPembayaran/' . $id) ?>
                    <div class="form-group">
                        <label for="">TOTAL :</label>
                        <input type="hidden" name="Bill" value="<?= $totalBelanja ?>">
                        <input type="text" class="form-control" value="Rp. <?= number_format($totalBelanja, 0, '.', '.') ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Metode Pembayaran</label>
                        <select name="paidType" id="paidType" class="form-control" required onchange="paidTypeJs(this.value)">
                            <option value="">-- Pilih --</option>
                            <option value="Tunai">Tunai</option>
                            <option value="Transfer">Transfer</option>
                        </select>
                    </div>

                    <script>

                    </script>

                    <div id="paidTransfer">
                        <label for="">Bukti Transfer : </label>
                        <input type="file" name="buktiTf" id="buktiTf" class="form-control" onchange="validateFile(event)">
                        <div id="previewContainer" style="position: relative;">
                            <img id="preview" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGrwXwU3LiaAHTbVPr3EX679rdj3OKpePN40Tb4B9S4g&s" alt="Preview Image" style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                            <div id="zoomButtons" style="position: absolute; bottom: 10px; right: 10px;">
                                <button onclick="zoomIn()">Zoom In</button>
                                <button onclick="zoomOut()">Zoom Out</button>
                            </div>
                        </div>
                    </div>

                    <div id="paidTunai">
                        <label for="">Bayar : </label>
                        <input type="text" name="Paid" class="form-control">
                    </div>

                    <button class="btn btn-primary btn-block">Bayar <i class="fa fa-dollar"></i></button>

                    <?= form_close() ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
    function reload_page() {
        window.location.reload();
    }

    function cariDetailBarang(id, barcode_id) {
        $.ajax({
            url: "<?= site_url('kasir/transaksi/cariDetailBarang/') ?>" + barcode_id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                if (data == null) {
                    alert('Data tidak ditemukan!')
                    $("#barcode").val("")
                    $("#product_name").val("")
                    $("#price").val("")
                    $("#stock").val("")
                } else {

                    $.ajax({
                        url: "<?= site_url('kasir/transaksi/inputBarangTemp/') ?>" + id + "/" + data.product_name + "/" + data.price,
                        type: "GET",
                        dataType: "JSON",
                        success: function(data) {
                            console.log(data);
                            if (data == false) {
                                alert('Barang sudah pernah di input!')
                                $("#barcode").val("")
                            } else {
                                reload_page();
                            }
                        }
                    });
                }
            }
        });
    }

    function kalkulasi(val, idPenjualan, id) {
        $.ajax({
            url: "<?= site_url('kasir/transaksi/kalkulasi/') ?>" + id + "/" + idPenjualan + "/" + val,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data)
                if (data.data == false) {
                    alert('Gagal!');
                    reload_page();
                } else {
                    alert('Berhasil');
                    reload_page();
                }
            }
        });
    }
</script>

<script>
    $(document).ready(function() {
        // Mengatur event handler atau melakukan manipulasi DOM di sini
        $("#paidTransfer").hide();
        $("#paidTunai").hide();
    });
    var scale = 1; // Inisialisasi skala gambar

    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var imgElement = document.getElementById('preview');
            imgElement.src = reader.result;
            imgElement.style.display = 'block'; // Menampilkan gambar yang dipilih
            scale = 1; // Setel ulang skala ketika gambar baru dimuat
            imgElement.style.transform = 'scale(' + scale + ')'; // Setel skala gambar
        }
        reader.readAsDataURL(input.files[0]);
    }

    function zoomIn() {
        var imgElement = document.getElementById('preview');
        scale += 0.1; // Menambahkan skala sebesar 0.1
        imgElement.style.transform = 'scale(' + scale + ')'; // Setel skala gambar
    }

    function zoomOut() {
        var imgElement = document.getElementById('preview');
        scale -= 0.1; // Mengurangi skala sebesar 0.1
        if (scale < 0.1) {
            scale = 0.1; // Batasi skala minimum
        }
        imgElement.style.transform = 'scale(' + scale + ')'; // Setel skala gambar
    }

    function paidTypeJs(type) {
        // alert(type)
        if (type == "Transfer") {
            $("#paidTransfer").show();
            $("#paidTunai").hide();
        } else if (type == "Tunai") {
            $("#paidTransfer").hide();
            $("#paidTunai").show();
        } else {
            $("#paidTransfer").hide();
            $("#paidTunai").hide();
        }
    }

    function validateFile(event) {
        var fileInput = event.target;
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i; // Ekstensi file yang diperbolehkan

        if (!allowedExtensions.exec(filePath)) {
            // Jika ekstensi file tidak sesuai dengan yang diperbolehkan
            alert('Hanya diperbolehkan file dengan ekstensi JPG, JPEG, atau PNG.');
            fileInput.value = ''; // Menghapus nilai input
            document.getElementById('preview').src = ''; // Menghapus pratinjau gambar
        } else {
            // Jika ekstensi file sesuai dengan yang diperbolehkan
            previewImage(event); // Menampilkan pratinjau gambar
        }
    }
</script>


<!-- <script type="text/javascript">
    var isScanned = false; // Variabel penanda apakah sudah berhasil memindai atau belum

    function onScanSuccess(qrCodeMessage) {
        // if (!isScanned) {
        // isScanned = true; // Set variabel penanda menjadi true setelah berhasil memindai
        document.getElementById('barcode').value = qrCodeMessage;
        // $("#barcode").focus();
        // document.getElementById('result').innerHTML = '<span class="result">' + qrCodeMessage + '</span>';

        alert('hello');


        // setTimeout(function() {
        //     isScanned = false;
        // }, 3000);
        // }
    }

    function onScanError(errorMessage) {
        // Handle error jika diperlukan
    }

    var html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: 250
        });

    // Panggil render saat halaman dimuat ulang
    window.addEventListener('load', function() {
        html5QrcodeScanner.render(onScanSuccess, onScanError);
    });
</script> -->