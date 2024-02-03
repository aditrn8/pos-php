<!-- begin breadcrumb -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
<ol class="breadcrumb pull-right">
    <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Dashboard</a></li>
    <li class="breadcrumb-item">Cuti Employee</li>
</ol>
<br>
<br>
<br>
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- BEGIN ADMIN -->
        <?php if ($this->session->flashdata('msg')) { ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Danger!</strong> <?php echo $this->session->flashdata('msg') ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php } ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <?= form_open('dashboard_cuti/filter'); ?>
                                <div class="input-group mb-3">
                                    <select name="divisi" id="" class="form-control selectpicker" data-size="5" data-live-search="true" required>
                                        <option value="">-- Atur Divisi --</option>
                                        <?php foreach ($division->result() as $row) {
                                            $selected = ($this->session->userdata('sesDiv') == $row->Division) ? 'selected' : '';
                                            ?>

                                            <option value="<?= $row->Division ?>" <?= $selected ?>><?= $row->Division ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Filter <i class="fa fa-filter"></i></button>
                                        <a href="<?= site_url('dashboard_cuti/unsetSession') ?>" class="btn btn-warning">Refresh <i class="fa fa-refresh"></i></a>
                                    </div>
                                </div>
                            <?= form_close(); ?>
                        </div>
                        ||
                        <div class="col-md-4">
                            <?= form_open('dashboard_cuti/export') ?>
                                <div class="input-group mb-3">
                                    <input type="hidden" name="f_divisi" value="<?= $this->session->userdata('sesDiv'); ?>">
                                    <button type="submit" class="btn btn-success">Export <i class="fa fa-file-export"></i></button>
                                </div>
                            <?= form_close(); ?>
                        </div>
                    </div>
                    <table id="tableDcuti" class="table table-striped table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th rowspan="2" style='text-align:center'>No</th>
                                <th rowspan="2" style='text-align:center'>Staff</th>
                                <th rowspan="2" style='text-align:center'>Status</th>
                                <th rowspan="2" style='text-align:center'>Status Cuti</th>
                                <th rowspan="2" style='text-align:center'>Tanggal Resign</th>
                                <th colspan="6" style='text-align:center'>Total</th>
                                <th rowspan="2" style='text-align:center'>Tanggal Kontrak</th>
                            </tr>
                            <tr>
                                <th style='text-align:center'>Cuti Tahunan</th>
                                <th style='text-align:center'>Cuti Khusus</th>
                                <th style='text-align:center'>Cuti Bersama</th>
                                <th style='text-align:center'>Cuti Pakai</th>
                                <th style='text-align:center'>Cuti Request</th>
                                <th style='text-align:center'>Sisa Cuti</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- END ADMIN -->
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

<script type="text/javascript">
    var table;
    var session = "<?= $this->session->userdata('sesDiv') ?>";

    table = $('#tableDcuti').DataTable({

        // dom: 'Bfrtip',
        // buttons: [{
        //     extend: 'excel',
        //     className: 'btn btn-primary',
        //     text: 'Export Excel',
        //     title: 'Data Cuti Divisi ' + session,
        // }],

        initComplete: function() {
            var url;
            url = "<?= site_url('Dashboard_cuti/') ?>";
            var input = $('#tableDcuti_filter input').unbind(),
                self = this.api(),
                searchButton = $('<span id="btnSearch" class="btn btn-primary" style="pull-rigth"><i class="fa fa-search"></i></span>')
                .click(function() {
                    self.search(input.val()).draw();
                });
            $(document).keypress(function(event) {
                if (event.which == 13) {
                    searchButton.click();
                }
            });
            var coba = $('#btnSearch').unbind(),
                self = this.api(),
                refresh = $('<span id="btnRefresh" class="btn btn-warning"><i class="fa fa-history"></i></span>')
                .click(function() {
                    // self.search(input.val()).draw();
                    window.location.href = url;
                });
            $('#tableDcuti_filter').append(searchButton);
            $('#tableDcuti_filter').append(refresh);
        },

        "processing": true,
        "serverSide": true,
        "responsive": false,
        "ordering": false,
        "order": [],

        "ajax": {
            "url": "<?php echo site_url('Dashboard_cuti/getDataDashboardCuti') ?>",
            "type": "POST",
            "data": function(data) {

            }
        },

        "columnDefs": [{
            "targets": [0],
            "orderable": true,
        }, ],


    });

    $('#btn-filter').click(function() {
        table.ajax.reload();
    });

    $('#btn-reset').click(function() {
        $('#form-filter')[0].reset();
        table.ajax.reload();
    });

    if (session) {
        table.buttons().container().appendTo('#tableDcuti_wrapper .dataTables_filter');
    } else {
        table.buttons().container().hide();
    }
</script>