<!DOCTYPE html>
<html>
<head>
	<title>Data Sparepart</title>
	<link rel="stylesheet" href="<?php  echo base_url();?>asset/plugins/datatables/dataTables.bootstrap.css">
</head>
<style type="text/css">
  .capitalize{
    text-transform:capitalize;
  }
</style>
<body>
<?php
$level=$this->session->userdata('level');
?>
<div class="container-fluid" style="background-color=#ECF0F5">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Working Out
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('index.php/Cbengkelnew/Cworkingout')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Working Out</a></li>
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
                <!--
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Tambah Data</button>
                -->
                  <a href="<?php echo base_url('index.php/Cbengkelnew/Cworkingout/vtambah');?>" class="btn btn-primary">Tambah Data</a>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered">
                    <thead>
                    <tr>
                      <th>Working Out</th>
                      <th>Inventaris</th>
                      <th>Dari</th>
                      <th>Perihal</th>
                      <th>Tanggal</th>
                      <th>Nomor DES/JIG/DLL</th>
                      
                      <th width="200px">Masalah</th>
                      <th>Keterangan</th>
                      <th>Proses</th>
                      <th>Target</th>
                      <th>Finish</th>
                      <th width="100px">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($data as $data) {
                    ?>
                    <tr>
                      <td><?php echo $data->kodewo?></td>
                      <td><?php echo ucwords($data->no_inventaris)?></td>
                      <td><?php echo ucwords($data->divisi)?></td>
                      <td><?php echo ucwords($data->hal)?></td>
                      <td><?php echo date('d-m-Y',strtotime($data->tgl))?></td>
                      <td><?php echo ucwords($data->des)?></td>
                      
                      <td><?php echo $data->masalah?></td>
                      <td><?php echo $data->keterangan?></td>
                      <?php
                      if($level=='operator bengkel'){
                        echo "<td><a href='".base_url('index.php/Cbengkelnew/Cworkingout/edit/'.$data->idwo)."' class='label label-success'>" .ucwords($data->proses) ."</a></td>";
                        
                      }else{
                        echo "<td>".ucwords($data->proses)."</td>";
                      }
                      ?>
                      <td><?php echo ucwords($data->target)?></td>
                      <td><?php echo ucwords($data->finish)?></td>                                    
                    
                      <td><a href="#" class='open_modal' id='<?php echo  $data->idwo; ?>'><span class="label label-success">Edit</span></a> 
                         <a href="#" onclick="confirm_modal('<?php echo site_url('Cbengkelnew/Cworkingout/hapus/').'/'.$data->idwo ?>')"><span class="label label-danger">Delete</span></a>
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
          <form action="<?php echo site_url('Cbengkelnew/Cworkingout/simpandata');?>" name="modal_popup" enctype="multipart/form-data" method="POST">
                <div class="form-group">
                    <label for="kode">Kode Working Out</label>       
                    <input type="text" name="kodewo"  class="form-control" readonly value="<?php echo $kode;?>" />
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>       
                    <input type="text" name="tgl" id="tanggal" required class="form-control" readonly value="<?php echo date("d-m-Y");?>" />
                </div>
                <div class="form-group">
                    <label for="kode">Kode Inventaris</label>       
                    <select class="form-control" name="idasset">
                      <?php
                          foreach($asset as $master){
                      ?>
                          <option value="<?php echo $master->no_inventaris;?>"><?php echo strtoupper($master->no_inventaris)." - ".strtoupper($master->jenis);?></option>
                      <?php
                          }
                      ?>
                        
                  </select>
                </div>
                <div class="form-group">
                    <label for="masalah">Masalah</label>       
                    <textarea class="form-control capitalize" rows="3" name="masalah"placeholder="Enter ..."></textarea>
                </div>
                 <div class="form-group">
                    <label for="penyebab">Penyebab</label>       
                    <textarea class="form-control" rows="3" name="penyebab" placeholder="Enter ..."></textarea>
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
    			   url:"<?php echo site_url('Cbengkelnew/Cworkingout/edit_data/')?>/"+m,
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
</script>

