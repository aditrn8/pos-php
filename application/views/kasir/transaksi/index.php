<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Scanner</title>
    <!-- Include Quagga library -->
    <script src="https://cdn.jsdelivr.net/npm/quagga/dist/quagga.min.js"></script>
</head>

<body>
    <h1>Barcode Scanner</h1>
    <div id="interactive" style="position: relative;"></div>
    <script>
        // Atur konfigurasi Quagga
        Quagga.init({
            inputStream: {
                name: "Live",
                type: "LiveStream",
                target: document.querySelector('#interactive'),
                constraints: {
                    width: 480,
                    height: 320,
                    facingMode: "environment" // atau "user" untuk kamera depan
                },
            },
            decoder: {
                readers: ["ean_reader", "upc_reader"]
            }
        }, function(err) {
            if (err) {
                console.error("Error initializing Quagga: ", err);
                return;
            }
            console.log("Quagga initialized successfully.");
            Quagga.start();
        });

        // Tambahkan event listener untuk hasil pemindaian barcode
        Quagga.onDetected(function(result) {
            console.log("Barcode detected and processed: ", result);
            // Lakukan sesuatu dengan hasil pemindaian di sini
        });
    </script>
</body>

</html>