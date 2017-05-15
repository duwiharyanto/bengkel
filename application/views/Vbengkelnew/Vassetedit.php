<div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
        </div>

        <div class="modal-body">
            <form action="<?php echo site_url('Cbengkelnew/Casset/update');?>" name="modal_popup" enctype="multipart/form-data" method="POST">
             
                 <div class="form-group hide">      
                    <input type="text" name="id"  class="form-control" value="<?php echo $daftar->idasset ?>" />
                </div>
                <div class="form-group">
                    <label for="kode">Kode Asset</label>       
                    <input type="text" name="kodeasset"  class="form-control" value="<?php echo $daftar->kode ?>" />
                </div>
                <div class="form-group">
                    <label for="jeniskendaraan">Jenis Kendaraan</label>       
                    <input type="text" name="jeniskendaraan" required class="form-control" value="<?php echo $daftar->jenisasset ?>" />
                </div>
                <div class="form-group">
                    <label for="tglpembelian">Tanggal Pembelian</label>       
                    <input type="text" name="tglpembelian"  class="form-control" value="<?php echo $daftar->tgl_pembelian ?>" />
                </div>
                 <div class="form-group">
                    <label for="merk">Merk</label>       
                    <input type="text" name="merk"  class="form-control" value="<?php echo $daftar->merk ?>" />
                </div>
                <div class="form-group">
                    <label for="noinventaris">No Inventaris</label>       
                    <input type="text" name="noinventaris"  class="form-control" value="<?php echo $daftar->no_inventaris ?>" />
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