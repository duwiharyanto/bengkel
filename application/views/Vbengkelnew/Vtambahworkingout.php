<!DOCTYPE html>
<html>
<head>
  <title>Data Sparepart</title>
  <link rel="stylesheet" href="<?php  echo base_url();?>asset/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="<?php  echo base_url();?>asset/plugins/datatables/dataTables.bootstrap.css">
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
        Form Working Out
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('index.php/Cbengkelnew/Cworkingout')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Form Working Out</a></li>
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
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form action="<?php echo site_url('Cbengkelnew/Cworkingout/simpandata');?>" name="modal_popup" enctype="multipart/form-data" method="POST">
                   <div class="row">
                      <div class="col-sm-3 col-sm-offset-9">
                        <h3>Nomor WO : <?php echo $kode;?> </h3>
                        <h3>Tanggal : <?php echo date('d-m-Y');?></h3>
                        <div class="form-group hide">
                            <label for="kodewo">Nomor WO</label>       
                            <input type="text" name="kodewo"  class="form-control" readonly value="" />
                        </div>
                        <div class="form-group hide">
                            <label for="tgl">Tgl</label>       
                            <input type="text" name="tgl"  class="form-control" readonly value="<?php echo date('d-m-Y');?>" />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                       <div class="col-sm-3">
                        <div class="form-group">
                        <label for="kepada">Kepada</label>      
                            <input type="text" name="kepada"  placeholder="Kepada" readonly class="form-control" value="Bengkel" />
                        </div>
                        <div class="form-group">
                            <label for="kode">Dari</label>       
                            <select class="form-control select2" name="dari" style="width: 100%;">
                              <?php
                                  foreach($divisi as $master){
                              ?>
                                  <option value="<?php echo $master->id;?>"><?php echo strtoupper($master->kode)." - ".strtoupper($master->nama);?></option>
                              <?php
                                  }
                              ?>
                                
                          </select>
                        </div>                        
                        <div class="form-group">
                            <label for="kode">Kode Inventaris</label>       
                            <select class="form-control select2" name="idasset" style="width: 100%;">
                              <?php
                                  foreach($asset as $master){
                              ?>
                                  <option value="<?php echo $master->no_inventaris;?>"><?php echo strtoupper($master->no_inventaris)." - ".strtoupper($master->jenis);?></option>
                              <?php
                                  }
                              ?>
                               <option value="checking">Checking</option>
                               <option value="proses">On Proses</option> 
                               <option value="finish">Finish</option>
                               <option value="pending">Pending</option>  
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="hal">Hal</label>       
                            <select class="form-control" name="hal">
                                  <option value="perawatan">Perawatan</option>
                                  <option value="perbaikan">Perbaikan</option>
                             </select>
                        </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">  
                          <div class="form-group">
                               <label for="kepada">Nama DES/JIG/DLL</label>      
                               <input type="text" name="des"  class="form-control" value="" />
                          </div>
                          <div class="form-group">
                              <label for="masalah">Masalah</label>       
                              <textarea class="form-control capitalize" rows="3" name="masalah" placeholder="Enter ..."></textarea>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="kode">Proses</label>       
                              <select class="form-control select2" name="proses" style="width: 100%;">
                                 <option value="checking">Checking</option>
                                 <option value="proses">On Proses</option> 
                                 <option value="finish">Finish</option>
                                 <option value="pending">Pending</option>  
                            </select>
                          </div>                          
                          <div class="form-group">
                              <label for="tindakan">Keterangan</label>       
                              <textarea class="form-control" rows="3" name="keterangan" placeholder="Enter ..."></textarea>
                          </div>  
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label for="tglpembelian">Target</label>       
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" name="target" class="form-control pull-right datepicker">
                            </div>
                        </div>
                        </div>                        
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label for="tglpembelian">Finish</label>       
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" name="finish" class="form-control pull-right datepicker">
                            </div>
                        </div>
                        </div>                         
                      </div>
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
</div>
</body>
<script src="<?php echo base_url();?>asset/bootstrap/js/jquery.js"></script>
<script src="<?php echo base_url();?>asset/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php  echo base_url();?>asset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php  echo base_url();?>asset/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php  echo base_url();?>asset/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Select2 -->
<script src="<?php  echo base_url();?>asset/plugins/select2/select2.full.min.js"></script>
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
    $('.datepicker').datepicker({
      format: "dd-mm-yyyy",
      autoclose: true,
      todayHighlight: true
    });
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
  $(".select2").select2();

</script>
