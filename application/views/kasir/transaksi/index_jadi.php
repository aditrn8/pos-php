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

<div class="row">
    <div class="col">
        <div style="width:500px;" id="reader"></div>
    </div>
    <div class="col" style="padding:30px;">
        <h4>SCAN RESULT</h4>
        <input type="text" id="anjay">
        <div id="result">Result Here</div>
    </div>
</div>

<script type="text/javascript">
    function onScanSuccess(qrCodeMessage) {
        // $("#anjay").val(qrCodeMessage)

        document.getElementById('anjay').value = qrCodeMessage;
        document.getElementById('result').innerHTML = '<span class="result">' + qrCodeMessage + '</span>';
    }

    function onScanError(errorMessage) {
        //handle scan error
    }

    var html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: 250
        });
    html5QrcodeScanner.render(onScanSuccess, onScanError);

    // Tambahkan fungsi untuk menangani pemindaian barcode
    function onBarcodeScan(barcodeMessage) {
        document.getElementById('anjay').value = barcodeMessage;
        // document.getElementById('result').innerHTML = '<span class="result">' + barcodeMessage + '</span>';
    }

    // Mulai pemindaian barcode
    var html5BarcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: 250
        });
    html5BarcodeScanner.render(onBarcodeScan, onScanError);
</script>