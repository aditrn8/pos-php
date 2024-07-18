<title>Laporan Transaksi Supplier (<?= $q1->id_transaksi ?>)</title>
<h2 align="center">Detail Transaksi Supplier (<?= $q1->id_transaksi ?>)</h2>

<!-- <?= print_r($q1) ?> -->
<h3 align="center">Toko Satria Nugget</h3>
<h4 align="center"> Jl Klambir V Ruko Janetti No 4, Medan</h4>
<h4 align="center">No Telp/Wa. 082168852450</h4>

<script>
    window.print();
</script>
<table align="center" border="1">
    <tr>
        <td>Nama Supplier</td>
        <td>:</td>
        <td><?= $q1->n_suplier ?></td>
    </tr>
    <tr>
        <td>Nama Produk</td>
        <td>:</td>
        <td><?= $q1->n_barang ?></td>
    </tr>
    <tr>
        <td>Harga</td>
        <td>:</td>
        <td>Rp. <?= number_format($q1->harga, 0, '.', '.') ?></td>

    </tr>
    <tr>
        <td>QTY</td>
        <td>:</td>
        <td><?= $q1->qty ?></td>
    </tr>
    <tr>
        <td>Total</td>
        <td>:</td>
        <td>Rp. <?= number_format($q1->total, 0, '.', '.') ?></td>
    </tr>
    <tr>
        <td>Bayar</td>
        <td>:</td>
        <td>Rp. <?= number_format($q1->bayar, 0, '.', '.') ?></td>

    </tr>
    <tr>
        <td>Kembalian</td>
        <td>:</td>
        <td>Rp. <?= number_format($q1->kembalian, 0, '.', '.') ?></td>
    </tr>


    <!-- <tr>
        <td colspan="4" align="right">Sub Total</td>
        <td>Rp. <?= number_format($q1->Bill, 0, '.', '.') ?></td>
    </tr> -->
</table>