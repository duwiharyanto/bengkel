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
    <div class="col-sm-8">
        <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Working Out</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                      <tr>
                        <th>Kode Working Out</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php 
                        foreach ($data as $r) {
                         ?>
                         <tr>
                            <td><?php echo $r->kodewo;?></td>
                            <td><?php echo $r->tgl;?></td>
                            <td><span class="label label-success">Selesai</span></td>
                         </tr>
                         <?php
                        }
                      ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                  <a href="<?php echo base_url('index.php/Cbengkelnew/Cworkingout/vtambah');?>" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                  <a href="<?php echo base_url('index.php/Cbengkelnew/Cworkingout');?>" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!-- /.box -->
    </div>
    <div class="col-sm-4">
      <div class="row">
        <div class="col-sm-6">
             <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>150</h3>

                  <p>Data Inventaris</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
        </div>
        <div class="col-sm-6">
               <div class="small-box bg-red">
                <div class="inner">
                  <h3>2</h3>

                  <p>User Registrasi</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
        </div>
      </div>
            
            <div class="small-box bg-green">
                <div class="inner">
                  <h3>1500</h3>

                  <p>Part Ready</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
    </div>
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
   $(document).ready(function(){
   $(".open_modal").click(function(e) {
      var m =$(this).attr("id");
  		    $.ajax({
    			   //url: "modal_edit.php",
    			   url:"<?php echo site_url('Cbengkelnew/Casset/edit_data/')?>/"+m,
    			   //type: "GET",
    			   //datatype="JSON",
    			   data: {modal_id: m,},
    			   success: function(ajaxData){
      			   $("#ModalEdit").html(ajaxData);
      			   $("#ModalEdit").modal('show',{backdrop: 'true'});
      		   }
    		   });
      	});
  	});

  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
   //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
</script>
