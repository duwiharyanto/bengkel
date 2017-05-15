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
        Daftar Parts Order
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
              <table id="example1" class="table table-bordered">
                <thead>
                <tr >
                  <th>Kode Order</th>
                  <th>Nama</th>
                  <th>Tanggal</th>
                  <th>QTY</th>
                  <th>Estimasi</th>
                  <th>Status</th>
                  <th style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                <tbody >
               	<?php
               
               	foreach ($data as $data) {
               	?>
               	<tr>
                  <td><?php echo $data->kodeorderreq?></td>
               		<td><?php echo ucwords($data->nama)?></td>
               		<td><?php echo date('d-m-Y', strtotime($data->tglorder))?></td>
                  <td><?php echo $data->qty?></td>
                  <td><?php echo $data->estimasi?></td>
                  <td><?php if($data->status==0){echo "<span class=\"label label-danger\">Pengiriman</span>";}else{echo "<span class=\"label label-success\">Terkirim</span>";}?></td>
               		<td align="center"><a href="Cpartorder/aktivasi/<?php echo $data->id ?>/<?php echo $data->status ?>" class='open_modal' id='<?php echo  $data->id; ?>'><span class="label <?php if($data->status==0){echo "label-primary";}else{echo "label-success";}?> ">Aktivasi</span></a> 
               			
               		</td>
               	<!--
               		<td><a href="#"  onclick="editdata($data->id)"><span class="label label-success">Edit</span></a> <a href="#"><span class="label label-danger">Hapus</span></a></td>
               			-->
               	</tr>
               	<?php
               		}
               	?>
                </tbody>
                <!--
                <tfoot>
           		  <tr>
                  <th>Kode</th>
                  <th>Nama Barang</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
                -->
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
     </div>
	</div>
</section>
<!-- Modal Popup untuk Edit--> 
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk delete--> 
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal INPUT -->


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
    			   url:"<?php echo site_url('Cbengkelnew/cpart/edit_data/')?>/"+m,
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
