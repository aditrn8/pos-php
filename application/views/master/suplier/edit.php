<?php
$name        = $rowSuplier->name;
$address     = $rowSuplier->address;
$city        = $rowSuplier->city;
$province    = $rowSuplier->province;
?>
<ol class="breadcrumb pull-right">
    <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?= base_url('master/suplier') ?>">Data Suplier</a></li>
    <li class="breadcrumb-item">Edit Suplier</li>
</ol>

<div class='row'>
    <div class="col-md-12">
        <h1 class="page-header">
            Form Edit Suplier
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
                    <label for="">Alamat : <code>*</code></label>
                    <textarea name="address" class="form-control" cols="30" rows="10"><?= $address ?></textarea>
                    <?= form_error('address', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="form-group">
                    <label for="">Kota : <code>*</code></label>
                    <input type="text" name="city" id="city" class="form-control" value="<?= $city ?>" autocomplete="off">
                    <?= form_error('city', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="form-group">
                    <label for="">Provinsi : <code>*</code></label>
                    <input type="text" name="province" id="province" class="form-control" value="<?= $province ?>" autocomplete="off">
                    <?= form_error('province', '<small class="text-danger">', '</small>') ?>
                </div>


                <button type="submit" class="btn btn-warning">Update</button>
                <a href="<?= site_url('master/suplier') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>