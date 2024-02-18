<?php
header("Content-type: application/ms-excel");
header("Content-Disposition: attachment; filename=List Transaksi.xls");
header("Pragma: no-cache");
header("Expires: 0");
$no = 0;
?>

<table border="10" width="100%">
    <tr>
        <th>No.</th>
        <th>Nomor Invoice</th>
        <th>Status</th>
        <th>Pembayaran Via</th>
        <th>Tanggal Transaksi</th>
        <th>Pendapatan</th>
    </tr>
    <?php foreach ($query->result() as $q) {
        $no++; ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $q->Nomor_Invoice ?></td>
            <td>
                Sudah Bayar
            </td>
            <td>
                <?= $q->Paid_Type ?>
            </td>
            <td><?= convertDateFormat($q->Created_Date) ?></td>
            <td>Rp. <?= number_format($q->Bill, 0, '.', '.') ?> <button class="btn btn-warning btn-icon btn-circle btn-sm lihat-detail-btn" data-toggle="modal" data-target="#detailModal" title="Detail Transaksi" data-id="<?= $q->ID_Transaksi ?>" data-noInvoice="<?= $q->Nomor_Invoice ?>"><i class="fa fa-eye"></i></button></td>
        </tr>
    <?php } ?>
    <tr>
        <td colspan="5" align="center">Total Pendapatan</td>
        <td>Rp. <?= number_format($totalPendapatan, 0, '.', '.') ?></td>
    </tr>
</table>