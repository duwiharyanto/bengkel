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
<script src="<?php echo base_url();?>asset/bootstrap/js/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      var nomor = 0;
      $(".add-more").click(function(){ 
        nomor++;
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>
<body>
<div class="container-fluid" style="background-color=#ECF0F5">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Part Request
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('index.php/Cbengkelnew/Cpartrequest')?>"><i class="fa fa-dashboard"></i> Home</a></li>
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
          <div class="row">
            <div class="col-sm-2">
                <!--
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Tambah Data</button>
                -->
                  
            </div>
          </div>
        </div>
            <!-- /.box-header -->
        <div class="box-body">
          <form action="<?php echo site_url('Cbengkelnew/Cpartrequest/simpandata');?>" name="modal_popup" enctype="multipart/form-data" method="POST">
            <div class="row">
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Kode PartReq</label>
                  <input type="text" readonly value="<?php echo $kodepartreq;?>" class="form-control" name="kodepartreq" >
                </div>
                <div class="form-group">
                  <label for="kode">Kode Working Out</label>       
                    <select class="form-control" name="kodewo">
                      <?php
                        foreach($kodewo as $master){
                      ?>
                        <option value="<?php echo $master->kodewo;?>"><?php echo date('d-m-Y',strtotime($master->tgl))." - ".strtoupper($master->jenis);?></option>
                          <?php
                            }
                          ?>      
                    </select>
                </div>
                <div class="form-group">
                   <a class="btn btn-primary add-more">Add Part</a>                  
                </div>
                <div class="after-add-more">
                 
                </div>
                <div class="copy hide">
                  <div class="control-group">
                    <div class="form-group">
                      <label for="kode">Kode Part</label>       
                        <select class="form-control" name="kodepart[]">
                           <?php
                             foreach($kodepart as $master){
                            ?>
                              <option value="<?php echo $master->kodepart;?>"><?php echo strtoupper($master->kodepart)." - ".strtoupper($master->nama);?></option>
                            <?php
                              }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="dari">Qty</label>       
                        <input type="text" name="qty[]"  class="form-control" value="qty" />
                    </div>
                    <div class="form-group"> 
                      <a class="btn btn-danger remove">Hapus</a>
                    </div>
                  </div>  
                </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                      <label for="tglpembelian">Tanggal</label>       
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                            <input type="text" name="tgl" class="form-control pull-right" id="datepicker">
                        </div>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2">
                        <!--
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Tambah Data</button>
                        -->
             
                </div>
              </div>    
              <div class="row">
                <div class="col-sm-12">
                  <div class="konten">
                              
                  </div>
                </div>
              </div>
            </div>
          <!--END BODY-->
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

<script src="<?php echo base_url();?>asset/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php  echo base_url();?>asset/plugins/datepicker/bootstrap-datepicker.js"></script>
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
             url:"<?php echo site_url('Cbengkelnew/Cpartrequest/edit_data/')?>/"+m,
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
     //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
</script>
