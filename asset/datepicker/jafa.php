<?php
  include 'session.php';
  include '../core/enkripsi.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Jabatan Fungsional</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/styleku.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap-datepicker.standalone.css">
    <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/js/bootstrap-datepicker.js"></script>
  <script src="../bootstrap/js/bootstrap-filestyle.min.js"></script>
</head>
<body>
<?php
  include 'menu.php';
  include '../core/koneksidb.php';
  include '../core/Objjafa.php';
  $jafafrm=new Corejafa();
  $nik=decrypt($_GET['id']);
  $nama=decrypt($_GET['nm']);
?>
<div class="ribbon"></div>
<div class="container-fluid">
<div class="tagline">
  <h3><span class="glyphicon glyphicon-tasks"></span> Jabatan Fungsional</h3>
</div>
<button type="button" class="btn btn-primary pull-left" data-toggle="modal" data-target="#modaljaffa"><span class="glyphicon glyphicon-plus"></span> Tambah</button>
<!-- Modal -->
<div id="modaljaffa" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Input Jabatan Fungsional</h4>
      </div>
      <div class="modal-body">
  <form class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF']?>?aksi=simpan" method="POST">
  <div class="form-group">
    <label class="control-label col-sm-2" for="nik">NIK</label>
    <div class="col-sm-10">
      <input list="nik" class="form-control" id="nik" placeholder="NIK" name="nik" value="<?php echo trim($nik);?>">
               <datalist id="nik">
                 <?php
                  $arraydata=$jafafrm->nik();
                  if($arraydata){
                    foreach ($arraydata as $data) {
                      echo "
                        <option value='".$data['nik']."'>
                      ";
                    }
                  }
                  ?>
              </datalist>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="nama">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control kapital" id="nama" placeholder="nama" name="nama" value="<?php echo trim($nama);?>">
    </div>
  </div>
  <div class="form-group">
     <label class="control-label col-sm-2" for="tanggal">Tanggal</label>
    <div class="col-sm-10">
      <div class="input-group date" data-date="" data-date-format="mm-dd-yyyy">
        <input required placeholder="Tanggal ditetapkan" type="text" class="form-control input-sm" name="tanggal" >
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
          </span>
    </div>
    </div>
  </div>
  <div class="form-group">
     <label class="control-label col-sm-2" for="keterangan">Jabatan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="keterangan" placeholder="jabatan" name="jabatan" >
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">simpan</button>
    </div>
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
 </div>
</div>
</div>
<?php
  if(isset($_GET['aksi'])){
    if($_GET['aksi']=='simpan'){
      $nik=trim($_POST['nik']);
      $nama=$_POST['nama'];
      $tanggal=$_POST['tanggal'];
      $jabatan=$_POST['jabatan'];
      $jafafrm->simpan(
          $nik,
          $nama,
          $tanggal,
          $jabatan
        );
    //echo "$jabatan <br> $tanggal";
        ?>
          <meta http-equiv="REFRESH" content="0;url=jafa.php?id=<?php echo encrypt($nik);?>&nm=<?php echo encrypt($nama)?>">  

        <?php
    }elseif($_GET['aksi']=='hapus'){
      $id=decrypt($_GET['id']);
      $nik=decrypt($_GET['nik']);
      $nama=decrypt($_GET['nm']);
      $jafafrm->hapus($id);
      
      ?>
      <meta http-equiv="REFRESH" content="0;url=jafa.php?id=<?php echo encrypt($nik);?>&nm=<?php echo encrypt($nama)?>">  

      <?php
    }elseif($_GET['aksi']=='edit'){
        $id=decrypt($_GET['id']);
        $nik=decrypt($_GET['nik']);
      ?>
      
      <form class="form-horizontal hideshow" role="form" action="<?php $_SERVER['PHP_SELF']?>?aksi=update" method="POST">
        <div class="form-group">
          <label class="control-label col-sm-2" for="nik">NIK</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="nik" placeholder="NIK" name="nik" value="<?php echo trim($jafafrm->read('nik',$id))?>">
            <input type="hidden" class="form-control"  name="id" value="<?php echo trim($id)?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="nama">Nama</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="nama" placeholder="nama" name="nama" value="<?php echo trim($jafafrm->read('nama',$id))?>">
          </div>
        </div>
        <div class="form-group">
           <label class="control-label col-sm-2" for="tanggal">Tanggal</label>
          <div class="col-sm-3">
            <div class="input-group date" data-date="" data-date-format="mm-dd-yyyy">
              <input required placeholder="Tanggal ditetapkan" type="text" class="form-control input-sm" name="tanggal" value="<?php echo trim($jafafrm->read('tanggal',$id))?>" >
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
          </div>
          </div>
        </div>
        <div class="form-group">
           <label class="control-label col-sm-2" for="keterangan">Jabatan</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="keterangan" placeholder="jabatan" name="jabatan" value="<?php echo trim($jafafrm->read('jabatan',$id))?>">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">update</button>
          </div>
        </div>
      </form>     
      <?php
    }elseif($_GET['aksi']=='update'){
      $id=$_POST['id'];
      $nik=$_POST['nik'];
      $nama=$_POST['nama'];
      $tanggal=$_POST['tanggal'];
      $jabatan=$_POST['jabatan'];
      $index=$jafafrm->index($nik);
      foreach ($index as $data){
       $index=trim($data['idpeg']);
      }
      $jafafrm->update($id,$index,$nik,$nama,$tanggal,$jabatan);
      ?>
         <meta http-equiv="REFRESH" content="0;url=jafa.php?id=<?php echo encrypt($nik);?>&nm=<?php echo encrypt($nama)?>">  
      <?php
    }
  }
?>

<div class="container-fluid">
<div style="height:20px;"></div>
<div class="table-responsive">
  <table class="table table-striped table-bordered kapital">
  <thead>
    <tr>
      <th>No</th>
      <th>Nik</th>
      <th>Pegawai</th>
      <th>Ditetapkan</th>
      <th>Jabatan</th>
      <th>Aksi</th>
    </tr>
  </thead>
    <tbody>
    <?php
        $per_hal=10;
        $jumlah_record=pg_query("select count(*) from db_jafa");
        $jum=pg_fetch_result($jumlah_record, 0);
        $halaman= ceil($jum/$per_hal);
        $page=(isset($_GET['page'])) ? (int)$_GET['page'] : 1;
        $start=($page-1)*$per_hal;
        $arraydata=$jafafrm->tampil($per_hal,$start,$nik);
        if($arraydata){
          $i=1;
          foreach ($arraydata as $data) {
            echo "
              <tr>
                <td>".$i."</td>
                <td>".$data['nik']."</td>
                <td>".$data['nama']."</td>
                <td>".date("d/F/Y", strtotime($data['tanggal']))."</td>
                <td>".$data['jabatan']."</td>
                <td style='text-align:center;'>
                <a class='edit-record' href='#' title='Edit' data-id='".$data['id']."'>
                <span class='glyphicon glyphicon-pencil'></span>
                </a> |  
                <a href='".$_SERVER['PHP_SELF']."?aksi=hapus&id=".encrypt($data['id'])."&nik=".encrypt($data['nik'])."&nm=".encrypt($data['nama'])."' data-toggle='tooltip' title='Hapus'>
                <span class='glyphicon glyphicon-remove'></span>
                </a>
                </td>
              </tr>

            ";
            $i++;
          }
        }else{
          echo "
            <tr style='text-align:center;'>
              <td colspan='6'><b>Belum ada riwayat Jafa</b></td>
            </tr>";
        }
        ?>
    </tbody>
  </table>
  <div class="pull-right">
  <ul class="pagination pagination-sm">
      <li><a href="jafa.php?page=<?php echo 0 ?>"> &laquo; </a></li>
    
    </ul>
  <?php
    for($x=1;$x<=$halaman;$x++){
      ?>
        <ul class="pagination pagination-sm">
          <li><a href="jafa.php?page=<?php echo $x ?>"><?php echo $x ?></a></li>
        </ul>
      <?php
    }
  ?>
  <ul class="pagination pagination-sm">
    <li><a href="jafa.php?page=<?php echo $halaman ?>"> &raquo; </a></li>
  </ul>
  </div>
</div>
<!--END DIV-->
</div>
<script type="text/javascript">
   $(function(){
            $(document).on('click','.edit-record',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('jafaedit.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
</script>
<!-- Modal EDIT -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">EDIT JAFA</h4>
      </div>
      <div class="modal-body">
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>

  </div>
</div>
<?php
	include 'footer.php';
?>
</body>
<script>
  $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
      });
  //options method for call datepicker
  $(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });   

 </script>
</html>