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
        Daftar Pengguna
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('index.php/Cbengkelnew/Cuser')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Daftar Pengguna</a></li>
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
              <div class="row">
                <div class="col-sm-2">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Tambah Data</button>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                <tr>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Level</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
               	<?php
               
               	foreach ($data as $data) {
               	?>
               	<tr>
                  <td><?php echo $data->username?></td>
               		<td><?php echo $data->password?></td>
                  <td><?php echo ucwords($data->level)?></td>
               		<td><a href="#" class='open_modal' id='<?php echo  $data->id; ?>'><span class="label label-success">Edit</span></a> 
               			 <a href="#" onclick="confirm_modal('<?php echo site_url('Cbengkelnew/Cuser/hapus/').'/'.$data->id ?>')"><span class="label label-danger">Delete</span></a>
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
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Input Data</h4>
      </div>
      <div class="modal-body">
          <form action="<?php echo site_url('Cbengkelnew/Cuser/simpandata');?>" name="modal_popup" enctype="multipart/form-data" method="POST">
                <div class="form-group">
                    <label for="noinventaris">Username</label>       
                    <input type="text" name="username"  class="form-control" value="" />
                </div>
                <div class="form-group">
                    <label for="noinventaris">Password</label>       
                    <input type="password" name="password"  class="form-control" value="" />
                </div>
                <div class="form-group">
                    <label for="kode">Level Pengguna</label>       
                    <select class="form-control" name="level">
                          <option value="adminstrator">Administrator</option>
                          <option value="operator gudang">Operator Gudang</option>
                          <option value="operator bengkel">Operator Bengkel</option>
                          <option value="user">User</option>
                     </select>
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
    </div>

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
    			   url:"<?php echo site_url('Cbengkelnew/Cuser/edit_data/')?>/"+m,
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
