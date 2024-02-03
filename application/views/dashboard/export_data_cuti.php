<?php
header("Content-type: application/ms-excel");
header("Content-Disposition: attachment; filename=data_export.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<?php

echo "<b>".$status_lembur."</b>";
echo "<br>";
echo "<br>";
?>

<table border="1" width="100%">
	<tr>
		<th align="center"><b>No</b></th>
		<th align="center"><b>NIK</b></th>
		<th align="center"><b>Nama</b></th>
		<th align="center"><b>Status</b></th>
		<th align="center"><b>Status Cuti</b></th>
		<th align="center"><b>Tanggal Resign</b></th>
		<th align="center"><b>Total Cuti Tahunan</b></th>
		<th align="center"><b>Total Cuti Khusus</b></th>
		<th align="center"><b>Total Cuti Bersama</b></th>
		<th align="center"><b>Total Cuti Pakai</b></th>
		<th align="center"><b>Total Cuti Request</b></th>
		<th align="center"><b>Sisa Cuti</b></th>
		<th align="center"><b>Tanggal Mulai Kontrak</b></th>
		<th align="center"><b>Tanggal Selesai Kontrak</b></th>
	</tr>
	<?php
		$id = 0;
		foreach ($data_query as $d) { 
	?>
		<tr>
			<td align="center"><?= ++$id; ?></td>
			<td align="center"><?= $d['nik'] ?></td>
			<td align="center"><?= $d['name']; ?></td>
			<td align="center"><?= $d['status']; ?></td>
			<td align="center"><?= $d['status_cuti']; ?></td>
			<td align="center"><?= $d['dates']; ?></td>
			<td align="center"><?= $d['total_cuti_tahunan'] ?></td>
			<td align="center"><?= $d['total_cuti_khusus'] ?></td>
			<td align="center"><?= $d['cuti_bersama']; ?></td>
			<td align="center"><?= $d['cuti_pakai']; ?></td>
			<td align="center"><?= $d['cuti_request']; ?></td>
			<td align="center"><?= $d['sisa_cuti']; ?></td>
			<td align="center"><?= $d['join_pkwt_date']; ?></td>
			<td align="center"><?= $d['contract_end_date'] ?></td>
		</tr>		
	<?php } ?>
</table>