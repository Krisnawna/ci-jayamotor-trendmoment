<section id="main-content">
  <section class="wrapper ">
   <div class="row mt">
   <div class="col-lg-4">
      <div class="form-panel">
          <h5>Tambah Data Barang</h5>
          <hr>
          <form class="form mb-2" action="<?php echo base_url('DataBarang') ?>/validation_form" method="post">
            <div class="form-group">
              <label>Nama Barang</label>
              <input type="text" name="nama_barang" class="form-control">
              <small class="form-text text-danger"><?php echo form_error('nama_barang'); ?></small>
            </div>

            <div class="form-group">
              <label>Merek Barang</label>
              <select name="merek_barang" class="form-control">
                <option value="Pertamina Mesran Super">Pertamina Mesran Super</option>
                <option value="Pertamina Meditran S40">Pertamina Meditran S40</option>
                <option value="Pertamina Enduro Matic">Pertamina Enduro Matic</option>
                <option value="Castrol Power One 1L">Castrol Power One 1L</option>
                <option value="Kvp Castrol Activ">Kvp Castrol Activ</option>
                <option value="Sinj Yamalube Silver">Sinj Yamalube Silver</option>
                <option value="Pho Yamalube Sport 1L">Pho Yamalube Sport 1L</option>
                <option value="Ultratech 1L">Ultratech 1L</option>
                <option value="Evalube 2T">Evalube 2T</option>
              </select>
              <small class="form-text text-danger"><?php echo form_error('merek_barang'); ?></small>
            </div>

             <div class="form-group">
            <input class="btn btn-primary float-right mb-3" type="submit" name="submit" value="Simpan">
            </div>
          </form>
    </div>
  </div>

   <div class="col-lg-8">
      <div class="form-panel">
          <h5>List Data Barang</h5>
          <hr>
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              if (empty($barang)) { ?>
                <tr>
                  <td colspan="6" style="text-align: center;"><b> TIDAK ADA DATA</b></td>
                </tr>
                <?php
              }
              foreach ($barang as $key => $value): ?>
                <tr>
                  <td><?php echo ++$no ?></td>
                  <td><?php echo $value->nama_barang ?></td>
                  

                  <td>
                    <a class="btn btn-sm btn-danger" href="<?php echo base_url('DataBarang') ?>/hapus/<?php echo $value->id_barang ?>" >Hapus</a>
                    <a class="btn btn-sm btn-warning" href="<?php echo base_url('DataBarang') ?>/ubah/<?php echo $value->id_barang ?>" >Update</a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>     
    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->
</div>
</div>
</section>
</section>

 