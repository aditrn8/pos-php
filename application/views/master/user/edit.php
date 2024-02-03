<?php
$name         = $rowUser->name;
$username     = $rowUser->username;
$password     = $rowUser->password;
$phone        = $rowUser->phone;
$role         = $rowUser->role;
?>
<ol class="breadcrumb pull-right">
    <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?= base_url('master/user') ?>">Data User</a></li>
    <li class="breadcrumb-item">Edit User</li>
</ol>

<div class='row'>
    <div class="col-md-12">
        <h1 class="page-header">
            Form Edit User
        </h1>
    </div>
</div>

<?php if ($this->session->flashdata('msg')) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Gagal!</strong> <?php echo $this->session->flashdata('msg') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Form</h4>
            </div>
            <div class="panel-body">
                <?= form_open('') ?>

                <input type="hidden" name="id" value="<?= $id ?>">
                <div class="form-group">
                    <label for="">Nama : <code>*</code></label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= $name ?>" autocomplete="off">
                    <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="form-group">
                    <label for="">Username : <code>*</code></label>
                    <input type="text" name="username" id="username" class="form-control" value="<?= $username ?>" autocomplete="off">
                    <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="form-group">
                    <label for="">Password : <code>*</code></label>
                    <input type="text" name="password" id="password" class="form-control" value="<?= $password ?>" autocomplete="off">
                    <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="form-group">
                    <label for="">No Telepon : <code>*</code></label>
                    <input type="number" name="phone" id="phone" class="form-control" value="<?= $phone ?>" autocomplete="off">
                    <?= form_error('phone', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="form-group">
                    <label for="">Role : <code>*</code></label>
                    <select name="role" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($masterRole->result() as $mr) { ?>
                            <?php $selected = ($role == $mr->role_id) ? 'selected' : ''; ?>
                            <option value="<?= $mr->role_id ?>" <?= $selected ?>><?= $mr->role_description ?></option>
                        <?php } ?>
                    </select>
                    <?= form_error('role', '<small class="text-danger">', '</small>') ?>
                </div>


                <button type="submit" class="btn btn-warning">Update</button>
                <a href="<?= site_url('master/user') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>