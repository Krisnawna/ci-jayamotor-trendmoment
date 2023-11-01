    <!-- content -->
<section id="main-content">
  <section class="wrapper site-min-height">
   <div class="row mt">
   <div class="col-lg-12">
      <div class="form-panel">
          <h5>Ubah Data</h5>
          <hr>
          <form class="form mb-2" action="<?php echo base_url('DataBarang') ?>/ubah/<?php echo $ubah['id_barang'] ?>" method="post">
            <div class="form-group">
              <label>Nama Barang</label>
              <input type="text" name="nama_barang" class="form-control" value="<?php echo $ubah['nama_barang'] ?>">
              <small class="form-text text-danger"><?php echo form_error('nama_barang'); ?></small>
            </div>

            <div class="form-group">
              <label>Nama Barang</label>
              <input type="text" name="nama_barang" class="form-control" value="<?php echo $ubah['nama_barang'] ?>">
              <small class="form-text text-danger"><?php echo form_error('nama_barang'); ?></small>
            </div>
            
            <input class="btn btn-primary float-right mb-3" type="submit" name="submit" value="Simpan">
            
          </form>
        </div>
      </div>     
    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->
</div>
<!-- /.container -->

</div>
</div>
</section>
</section>