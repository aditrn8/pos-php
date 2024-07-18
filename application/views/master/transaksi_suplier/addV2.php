<ol class="breadcrumb pull-right">
   <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Dashboard</a></li>
   <li class="breadcrumb-item"><a href="<?= base_url('master/transaksi_suplier') ?>">Data Suplier</a></li>
   <li class="breadcrumb-item">Tambah Transaksi Suplier</li>
</ol>

<div class='row'>
   <div class="col-md-12">
      <h1 class="page-header">
         Form Tambah Transaksi Suplier
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

            <input type="hidden" name="id">

            <div class="form-group">
               <label for="">Nama Supplier : <code>*</code></label>
               <select name="n_suplier" id="n_suplier" class="form-control" required>
                  <option value="">-- Pilih --</option>
                  <?php
                  foreach ($suplier as $key => $value) { ?>
                     <option value="<?= $value->name ?>"><?= $value->name . " - " . $value->name_company . " - " . $value->jenis_supplier ?></option>
                  <?php } ?>
               </select>
            </div>

            <div class="form-group">
               <label for="">Nama Produk : <code>*</code></label>
               <select name="product_name" id="product_name" class="form-control" required>
                  <option value="">-- Pilih --</option>
                  <?php
                  foreach ($product as $key => $value) { ?>
                     <option value="<?= $value->product_name ?>"><?= $value->product_name ?></option>
                  <?php } ?>
               </select>
            </div>

            <div class="form-group">
               <label for="">Harga : <code>*</code></label>
               <input type="text" name="h_product" id="h_product" class="form-control" value="<?= set_value('h_product') ?>" autocomplete="off" readonly>
               <?= form_error('h_product', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="form-group">
               <label for="">QTY : <code>*</code></label>
               <input type="number" name="qty" id="qty" class="form-control" value="<?= set_value('qty') ?>" autocomplete="off">
               <?= form_error('qty', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="form-group">
               <label for="">Total : <code>*</code></label>
               <input type="text" name="t_harga" id="t_harga" class="form-control" value="<?= set_value('t_harga') ?>" autocomplete="off" readonly>
               <?= form_error('t_harga', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="form-group">
               <label for="">Bayar : <code>*</code></label>
               <input type="number" name="bayar" id="bayar" class="form-control" value="<?= set_value('bayar') ?>" autocomplete="off">
               <?= form_error('bayar', '<small class="text-danger">', '</small>') ?>
            </div>

            <!-- <input type="hidden" name="id_transaksi" id="id_transaksi"> -->
            <input type="hidden" name="created_at" value="<?= date('Y-m-d H:i:s') ?>">

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= site_url('master/transaksi_suplier') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>

            <?= form_close() ?>

         </div>
      </div>
   </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
      $('#product_name').change(function() {
         var product_name = $(this).val();
         if (product_name != '') {
            $.ajax({
               url: "<?= site_url('master/transaksi_suplier/getProductDetail') ?>",
               method: "POST",
               data: {
                  product_name: product_name
               },
               dataType: "json",
               success: function(data) {
                  if (data.status == 'success') {
                     $('#h_product').val(data.data.price);
                     calculateTotal();
                  } else {
                     $('#h_product').val('');
                  }
               },
               error: function(jqXHR, textStatus, errorThrown) {
                  console.log("error jqXHR : ", jqXHR)
                  console.log("error textStatus : ", textStatus)
                  console.log("error errorThrown : ", errorThrown)
               }
            });
         } else {
            $('#h_product').val('');
         }
      });

      $('#qty').on('input', function() {
         calculateTotal();
      });

      function calculateTotal() {
         var h_product = parseFloat($('#h_product').val());
         var qty = parseFloat($('#qty').val());
         if (!isNaN(h_product) && !isNaN(qty)) {
            var total = h_product * qty;
            $('#t_harga').val(total);
         } else {
            $('#t_harga').val('');
         }
      }
   });
</script>