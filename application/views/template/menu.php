<?php
$role = $this->session->userdata('role');
?>
<ul class="nav">
	<li class="nav-header">Navigation</li>

	<li>
		<a href="<?php echo base_url(); ?>">
			<i class="fa fa-home"></i>
			<span>Dashboard</span>
		</a>

	</li>

	<li class="has-sub">
		<a href="javascript:;">
			<b class="caret"></b>
			<i class="fa fa-folder"></i>
			<span>Master</span>
		</a>
		<ul class="sub-menu">
			<?php
			if ($role == 1) {
				?>
				<li><a href="<?php echo site_url(); ?>master/user">User</a></li>
				<li><a href="<?php echo site_url(); ?>master/suplier">Suplier</a></li>
			<?php
			}
			?>
			<li><a href="<?php echo site_url(); ?>master/produk">Produk</a></li>
		</ul>
	</li>

	<?php
	if (in_array($role, [1, 2])) {
		?>
		<li class="has-sub">
			<a href="javascript:;">
				<b class="caret"></b>
				<i class="fa fa-folder"></i>
				<span>Master</span>
			</a>
			<ul class="sub-menu">
				<?php if ($role == 1) { ?>
					<li><a href="<?php echo site_url(); ?>master/user">User</a></li>
					<li><a href="<?php echo site_url(); ?>master/suplier">Suplier</a></li>
					<li><a href="<?php echo site_url(); ?>master/produk">Produk</a></li>
				<?php } else { ?>
					<li><a href="<?php echo site_url(); ?>master/produk">Produk</a></li>
				<?php } ?>
			</ul>
		</li>
	<?php } ?>

	<?php if ($role == "2") { ?>
		<li class="has-sub">
			<a href="javascript:;">
				<b class="caret"></b>
				<i class="fas fa-shopping-cart"></i>
				<span>Transaksi</span>
			</a>
			<ul class="sub-menu">
				<li><a href="<?php echo site_url(); ?>kasir/transaksi">Input Transaksi</a></li>
			</ul>
		</li>
	<?php } ?>

	<?php if ($role == 1) { ?>
		<li class="has-sub">
			<a href="javascript:;">
				<b class="caret"></b>
				<i class="fas fa-file-excel"></i>
				<span>Report</span>
			</a>
			<ul class="sub-menu">
				<li><a href="<?php echo site_url(); ?>report/laporan_penjualan">Laporan Penjualan</a></li>
				<li><a href="<?php echo site_url(); ?>report/laporan_penjualan/grafik">Grafik</a></li>
			</ul>
		</li>
	<?php } ?>

	</li>

	<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
</ul>