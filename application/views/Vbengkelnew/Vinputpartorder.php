<!DOCTYPE html>
<html>
<head>
	<title>Data Sparepart</title>
	<link rel="stylesheet" href="<?php  echo base_url();?>asset/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php  echo base_url();?>asset/plugins/datepicker/datepicker3.css">
</head>
<style type="text/css">
  .capitalize{
    text-transform:capitalize;
  }
</style>
<body>
<div class="container-fluid" style="background-color=#ECF0F5">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Order Part
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('index.php/Cbengkelnew/cpart')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Data Parts</a></li>
        <!--
        <li class="active">Data tables</li>
        -->
      </ol>
    </section>
<section class="content">
    <div class="row">
     <div class="col-xs-12">
	 <div class="box">
            <div class="box-header">
            <!--
              <h3 class="box-title">Data Table With Full Features</h3>
              -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <form action="<?php echo site_url('Cbengkelnew/Cpartorder/simpandata');?>" name="modal_popup" enctype="multipart/form-data" method="POST">
                <div class="form-group">
                    <label for="noinventaris">No Order part</label>       
                    <input type="text" name="noorder"  class="form-control" readonly value="<?php echo $kodeorderreg;?>" />
                </div>
                <div class="form-group">
                    <label for="kode">Kode Part</label>
                     <input type="text" name="kodepart"  class="form-control" readonly value="<?php echo $orderid->kodepart;?>" />       
                </div>
                <div class="form-group">
                    <label for="kode">Nama</label>
                     <input type="text" name="namapart"  class="form-control" readonly value="<?php echo strtoupper($orderid->nama);?>" />       
                </div>
                <div class="form-group">
                    <label for="tglpembelian">Tanggal Order</label>       
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="tgl" class="form-control pull-right" id="datepicker">
                    </div>
                 </div>
                <div class="form-group">
                    <label for="merk">Estimasi</label>       
                    <input type="text" name="estimasi"  class="form-control capitalize"  value="" />
                </div>
                 <div class="form-group">
                    <label for="merk">qty</label>       
                    <input type="text" name="qty"  class="form-control capitalize"  value="" />
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">
                        Confirm
                    </button>

                    <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                        Cancel
                    </button>
                </div>

                </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
     </div>
	</div>
</section>
</div>
</body>
<script src="<?php echo base_url();?>asset/bootstrap/js/jquery.js"></script>
<script src="<?php echo base_url();?>asset/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php  echo base_url();?>asset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php  echo base_url();?>asset/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php  echo base_url();?>asset/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php  echo base_url();?>asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php  echo base_url();?>asset/plugins/fastclick/fastclick.js"></script>
<script src="<?php  echo base_url();?>asset/dist/js/app.min.js"></script>
</html>
<!-- Javascript untuk popup modal Delete--> 
<script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#modal_delete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>

<!-- Javascript untuk popup modal Edit--> 
<script type="text/javascript">
   //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
</script>
