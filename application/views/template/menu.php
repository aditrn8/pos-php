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
            <li><a href="<?php echo site_url(); ?>master/user">User</a></li>
            <li><a href="<?php echo site_url(); ?>master/suplier">Suplier</a></li>
            <li><a href="<?php echo site_url(); ?>master/produk">Produk</a></li>
        </ul>
    </li>


    <li>
        <a href="<?php echo base_url(); ?>logout">
            <i class="fa fa-power-off"></i>
            <span>Logout</span>
        </a>

    </li>

    <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
</ul>