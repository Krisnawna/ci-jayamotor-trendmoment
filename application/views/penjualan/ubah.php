    <!-- content -->
    <?php $namaBulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","
      September","Oktober","November","Desember"); ?>
    <section id="main-content">
  <section class="wrapper site-min-height">
   <div class="row mt">
   <div class="col-lg-12">
      <div class="form-panel">
          <h5>Ubah Data</h5>
          <hr>
          <form class="form mb-2" action="<?php echo base_url('DataStok') ?>/ubah/<?php echo $ubah['id_penjualan'] ?>" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Id Penjualan</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="tahun" value="<?php echo $ubah['id_penjualan'] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Barang</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="nama_barang" value="<?php echo $ubah['nama_barang'] ?>">
              <small class="form-text text-danger"><?php echo form_error('nama_barang'); ?></small>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Bulan</label>
              <select name="bulan" class="form-control" >
    <option value="<?php echo $ubah['bulan'] ?>" selected><?php echo $namaBulan[$ubah['bulan'] - 1] ?></option>
               
                <?php 
                $no = 1;
                foreach ($bulan as $value): ?>
                  <?php if ($ubah['bulan'] == $value){ ?>
                    <option value="<?php echo $no++ ?>" selected><?php echo $value ?></option>
                  <?php }else{ ?>
                    <option value="<?php echo $no++ ?>"><?php echo $value ?></option>
                  <?php } ?>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Tahun</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="tahun" value="<?php echo $ubah['tahun'] ?>">
              <small class="form-text text-danger"><?php echo form_error('tahun'); ?></small>
            </div>
              <div class="form-group">
              <label for="exampleInputEmail1">Harga</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="harga" value="<?php echo $ubah['harga'] ?>">
              <span class="error invalid-feedback"> </span>
              <small class="form-text text-danger"><?php echo form_error('hasil_penjualan'); ?></small>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Hasil Penjualan</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="hasil_penjualan" value="<?php echo $ubah['hasil_penjualan'] ?>">
              <span class="error invalid-feedback"> </span>
              <small class="form-text text-danger"><?php echo form_error('hasil_penjualan'); ?></small>
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
</section>
</section>

