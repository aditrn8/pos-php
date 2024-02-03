<div class="page-wrapper">
    <div class="container-fluid">
        <a href="<?= site_url('dashboard'); ?>" class="btn btn-danger"><span class="fa fa-arrow-left"></span> Back</a>
        <br>
        <br>
        <h1>Validator 2 : <?= $v2 ?></h1>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <?php if ($this->session->userdata('tglFilter1') && $this->session->userdata('tglFilter2')) { ?>
                            Data Pending Shifting Validator 2 Periode <?= $this->session->userdata('tglFilter1') ?> sampai <?= $this->session->userdata('tglFilter2') ?>
                        <?php } else { ?>
                            Data Pending Shifting Validator 2 Periode <?= date('Y-m') ?>-01 sampai <?= date('Y-m-d') ?>
                        <?php } ?>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dtb" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama</td>
                                        <td>Unit</td>
                                        <td>Posisi</td>
                                        <td>Tgl Shifting</td>
                                        <td>Tgl Request</td>
                                        <td>Status</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($data_total->result() as $d) { ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $d->Name; ?></td>
                                            <td><?= $d->unit; ?></td>
                                            <td><?= $d->Position; ?></td>
                                            <td><?= $d->Created_date; ?></td>
                                            <td><?= $d->Created_date2; ?></td>
                                            <td><span class="badge badge-warning">Waiting Approval</span></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#dtb').DataTable({
            paging: true,
            // scrollX: true,
            // lengthChange: true,
            searching: true,
            ordering: true
        });
    })
</script>