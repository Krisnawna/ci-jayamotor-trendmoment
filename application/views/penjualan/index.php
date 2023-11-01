    <!-- content -->
    <section id="main-content">
      <section class="wrapper site-min-height">
       <div class="row mt">

          <div class="col-lg-4 mb">
           <div class="form-panel">
            <h5>Tambah Data Stok Barang</h5>
            <hr>
            <form class="form mb-2" action="<?php echo base_url('DataStok') ?>/validation_form" method="post">

              <div class="form-group">
                <label for="id">Id Stok</label>
                <input type="text" class="form-control" id="id" name="id_penjualan" value="<?= $data = (empty($lastId->id_penjualan))? 1 : $lastId->id_penjualan+1 ?>" readonly>
              </div>

              <div class="form-group">
                <label>Bulan</label>
                <select name="bulan" class="form-control" >
                  <?php 
                  $no = 1;
                  foreach ($bulan as $value): ?>
                    <option value="<?php echo $no++ ?>"><?php echo $value ?></option>}
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="text" class="form-control" id="tahun" name="tahun">
                <small class="form-text text-danger"><?php echo form_error('tahun'); ?></small>
              </div>
              <div class="form-inline mb">
                <div class="form-group">
                  <label>Barang yang Diorder</label>
                  <div class="barang">
                    <div class="form-group">
                      <select class="form-control " name="id_barang">
                        <option>Pilih</option>
                        <?php foreach ($barang as $key => $value): ?>
                          <option value="<?php echo $value->nama_barang ?>"><?php echo $value->nama_barang ?></option>
                        <?php endforeach ?>
                      </select>
                      <input class="ml-4 form-control col-3" type="number" name="harga" placeholder="Harga" >
                      
                    </div>
                  </div>
                </div>
              </div>
 <div class="form-group">
  <label>Jumlah Order</label>
              <input class="ml-4 form-control col-3" type="number" name="jumlah" placeholder="Jumlah">
            </div>
              <input class="btn btn-primary float-right mb-3" type="submit" name="submit" value="Simpan">
        
        </form>
      </div>
    </div>
    <div class="col-lg-8 mb">
      <div class="form-panel">
          <h5>List Data Stok</h5>
            <hr>
        <table class="mt-2 table tabel-bordered .table-hover"id="tabel">
          <thead>
            <tr>
              <th>No</th>
              <th>Barang</th>
              <th>Periode</th>
              <th>Harga</th>
              <th>Stok</th>
              <!--<th>Pendapatan</th>-->
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 0;
            if (empty($penjualan)) { ?>
              <tr>
                <td colspan="6" style="text-align: center;"><b> TIDAK ADA DATA</b></td>
              </tr>
              <?php
            }
            foreach ($penjualan as $key => $value): ?>
              <tr>
                <td><?php echo ++$no ?></td>
                <td><?php echo $value->nama_barang ?></td>
                <td><?php echo $bulan[$value->bulan-1] ?> <?php echo $value->tahun ?></td>
                <td><?php echo format_uang($value->harga) ?></td>
                <td><?php echo $value->hasil_penjualan ?></td>
                <!--<td><?php echo format_uang($value->pendapatan) ?></td>-->

                <td>
                  <a class="btn btn-sm btn-danger" href="<?php echo base_url('DataStok') ?>/hapus/<?php echo $value->id_penjualan ?>" >Hapus</a>
                  <!-- <a class="btn btn-sm btn-warning" href="<?php echo base_url('DataStok') ?>/ubah/<?php echo $value->id_penjualan ?>" >Update</a> -->
                  <a class="btn btn-sm btn-success" href="<?php echo base_url('DataStok') ?>/ubah/<?php echo $value->id_penjualan ?>" >Edit</a>
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
<!-- /.row -->
</div>
</div>
<!-- /.row -->
</div>
<!-- /.container -->
</section>
</section>

