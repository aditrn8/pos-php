<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code and Barcode Scanner</title>
    <!-- Include html5-qrcode library -->
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
</head>

<body>
    <div class="row">
        <div class="col">
            <!-- Tambahkan elemen div untuk menampilkan hasil pemindaian -->
            <div style="width:500px;" id="reader"></div>
        </div>
        <div class="col" style="padding:30px;">
            <h4>SCAN RESULT</h4>
            <!-- Tambahkan elemen div untuk menampilkan hasil pemindaian -->
            <div id="result">Result Here</div>
        </div>
    </div>
    <script type="text/javascript">
        // Fungsi untuk menangani hasil pemindaian QR code atau barcode yang berhasil
        function onScanSuccess(qrCodeMessage) {
            document.getElementById('result').innerHTML = '<span class="result">' + qrCodeMessage + '</span>';
        }
        // Fungsi untuk menangani kesalahan saat pemindaian
        function onScanError(errorMessage) {
            // Tangani kesalahan pemindaian di sini
            console.error(errorMessage);
        }
        // Inisialisasi scanner QR code dan barcode saat halaman dimuat
        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", // ID elemen tempat scanner akan ditampilkan
            {
                fps: 10,
                qrbox: 250
            } // Konfigurasi tambahan seperti kecepatan pemindaian (fps) dan ukuran kotak pemindaian (qrbox)
        );
        // Memulai pemindaian QR code dan barcode secara otomatis saat halaman dimuat
        html5QrcodeScanner.render(onScanSuccess, onScanError);
    </script>
</body>

</html>