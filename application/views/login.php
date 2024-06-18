<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Satria Nugget</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>new_assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>new_assets/plugins/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>new_assets/plugins/font-awesome/5.3/css/all.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>new_assets/plugins/animate/animate.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>new_assets/css/default/style.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>new_assets/css/default/style-responsive.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>new_assets/css/default/theme/default.css" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?php echo base_url(); ?>new_assets/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
</head>

<body class="pace-top">
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade show"><span class="spinner"></span></div>
    <!-- end #page-loader -->

    <!-- begin login-cover -->
    <div class="login-cover">
        <div class="login-cover-image" style="background-image: url(<?php echo base_url(); ?>new_assets/img/login-bg/login-bg-17.jpg)" data-id="login-cover-image"></div>
        <div class="login-cover-bg"></div>
    </div>
    <!-- end login-cover -->

    <!-- begin #page-container -->
    <div id="page-container" class="fade">
        <!-- begin login -->
        <div class="login login-v2" data-pageload-addclass="animated fadeIn">
            <?php if ($this->session->flashdata('message')) { ?>
                <small style="color:#FA5858;"><?php echo $this->session->flashdata('message'); ?></small>
            <?php } ?>

            <?php
            // just for info
            if (isset($login_info)) {
                echo "<div class='alert alert-danger alert-dismissable'>";
                echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
                echo $login_info;
                echo "</div>";
            }
            ?>
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand">
                    <span class="logo"></span> <b>Satria Nugget</b>
                    <small>Login menggunakan <b style="color: #00acac">Username & Password</b></small>
                </div>
                <div class="icon">
                    <i class="fa fa-lock"></i>
                </div>
            </div>
            <!-- end brand -->
            <!-- begin login-content -->
            <div class="login-content">
                <form role="form" action="" method="post" class="margin-bottom-0">
                    <div class="form-group m-b-20">
                        <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required autofocus />
                        <?php echo "<p>" . form_error('username') . "</p>"; ?>
                    </div>
                    <div class="form-group m-b-20">
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required />
                        <?php echo "<p>" . form_error('password') . "</p>"; ?>
                    </div>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-success btn-block btn-lg">Login</button>
                    </div>
                </form>
            </div>
            <!-- end login-content -->
        </div>
        <!-- end login -->
    </div>
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?php echo base_url(); ?>new_assets/plugins/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>new_assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>new_assets/plugins/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <!--[if lt IE 9]>
		<script src="../assets/crossbrowserjs/html5shiv.js"></script>
		<script src="../assets/crossbrowserjs/respond.min.js"></script>
		<script src="../assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
    <script src="<?php echo base_url(); ?>new_assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url(); ?>new_assets/plugins/js-cookie/js.cookie.js"></script>
    <script src="<?php echo base_url(); ?>new_assets/js/theme/default.min.js"></script>
    <script src="<?php echo base_url(); ?>new_assets/js/apps.min.js"></script>
    <!-- ================== END BASE JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="<?php echo base_url(); ?>new_assets/js/demo/login-v2.demo.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <script>
        $(document).ready(function() {
            App.init();
            LoginV2.init();
        });
    </script>
</body>

</html>