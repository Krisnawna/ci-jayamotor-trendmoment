<?php
// error_reporting(0);
$namaBulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","
      September","Oktober","November","Desember");
?>
<section id="main-content">
  <section class="wrapper site-min-height">
   <div class="row mt">
     <div class="col-lg-12">
      <div class="form-panel">
        <h5>PERAMALAN</h5>
        <hr>
        <label>Filter Barang </label>
        <div class="barang">
          <form class="form-inline" action="<?php echo base_url('DataPeramalan') ?>" method="post">
            <div class="row mt-2 col-lg-4 mb">
             <div class="form-group">
              <select class="form-control" name="id_barang" required>
                <option value="">Pilih Barang</option>
                <?php foreach ($barang as $key => $value): ?>
                  <option value="<?php echo $value->nama_barang ?>"><?php echo $value->nama_barang ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <input class="btn btn-theme" type="submit" name="submit" value="Pilih">
          </div>

        </form>
      </div>

      <?php 
            //validasi data tidak boleh kosong
      echo validation_errors('<div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>'); 

      if ($this->session->flashdata('pesan'))
      {
        echo '<div class="alert alert-success">';
        echo $this->session->flashdata('pesan');
        echo '</div>';
      }
      echo form_open('DataPeramalan/validation_form');
      ?>


      <table class="mt-2 table tabel-bordered table-hover">
        <thead>
          <tr>
            <th>Merk Produk</th>
            <th>Tahun</th>
            <th>Bulan</th>
            <th>Penjualan(y)</th>
            <th>Waktu(x)</th>
            <th>x*y</th>
            <th>x^2</th>

          </tr >
        </thead>
        <?php
        if (isset($_POST['id_barang'])) {
          ?>
          <tbody>
            <?php
            $x = 0;

            $jumlahx = 0;
            $jumlahy = 0;
            $jumlahxy = 0;
            $jumlahx2 = 0;

            if (empty($tampil_hitung)) {
              echo "<script>alert('Data tidak ada!');</script>";
            }
            

            foreach ($tampil_hitung as $key => $value): 
              $jumlahy += $value->hasil;
              $jumlahx += $x;
              $jumlahxy += $x * $value->hasil;
              $jumlahx2 += pow($x,2);
              $nilai =  $x * ($value->hasil);
              $j = pow($x,2);

              ?>

              <tr>
                <td><?php echo $value->nama_barang ?></td>
                <td><?php echo $value->tahun ?></td>
                <td><?php echo $bulan[$value->bulan-1] ?></td>
                <td><?php echo $value->hasil ?></td>
                <td><?php echo $x++ ?></td>
                <td><?php echo $nilai ?></td>
                <td><?php echo $j ?></td>
              </tr>
            <?php endforeach ?>
            
          <tr>
            <th colspan="3">Jumlah</th>
            <td><?php echo $jumlahy ?></td>
            <td><?php echo $jumlahx ?></td>
            <td><?php echo $jumlahxy ?></td>
            <td><?php echo $jumlahx2 ?></td>
          </tr>
          <tr>
            <th colspan="2">Rata-rata</th>
            <!-- <td><b><?php echo  number_format($jumlahy/$x,2) ?> </b></td> -->
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>


            <?php 

            $nilai_a = $x ;
            $nilai_b = $jumlahx ;

            $na1 = $nilai_a * $x;
            $na2 = $nilai_a * $jumlahx ;
            $na3 = $nilai_a * $jumlahy ;

            $nb1 = $nilai_b * $jumlahx;
            $nb2 = $nilai_b * $jumlahx2;
            $nb3 = $nilai_b * $jumlahxy;

            $nc1 = $na1 - $nb1 ;
            $nc2 = $na2 - $nb2 ;
            $nc3 = $na3 - $nb3 ;




            $b=($x*($jumlahxy)-($jumlahx)*($jumlahy))/($x*($jumlahx2)-pow($jumlahx,2));

            $a=($jumlahy-($b*($jumlahx)))/$x ;
            $Y = $a + ($b*$x);


            $mad=abs(($jumlahy/$x) - $Y);
            $mape=($mad / ($jumlahy/$x)) * 100 ;


            ?>
        
          <tr>
           <input type="hidden" name="tahun" value="<?php echo $value->tahun ?>">
           <input type="hidden" name="bulan" value="<?php echo $value->bulan + 1 ?>">
           <input type="hidden" name="nama_barang" value="<?php echo $value->nama_barang ?>">
           <input type="hidden" name="forcast" value="<?php echo  number_format($Y,2) ?>">

           <th colspan="2">Forcast</th>
           <td><b><?php echo  number_format($Y) ?></b></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
         </tr>
         <tr>
          <th colspan="2">MAD</th>
          <td><b><?php echo  number_format($mad,2) ?></b></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <th colspan="2">MSE</th>
          <td><b><?php echo  number_format(pow($mad,2),2)?></b></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>

        <tr>
          <th colspan="2">MAPE</th>
          <td><b><?php echo  number_format($mape,2)?> %</b></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <?php
          }
          ?>
      </tbody>
    </table>
    <div class="row ">
      <div class="col-lg-12">

      </div>
    </div>


    <div class="row ">
      <div class="col-lg-12">
        <div class="showback">
          <?php
          if (isset($_POST['id_barang'])) {
            ?>
            <div class="showback" style="background-color: #4ECDC4; color: black">
              <h4>Hasil Peramalan Untuk  <?php echo $value->nama_barang ?> 
              <?php $bulan_baru= $value->bulan + 1 ?>
              <?php if ($bulan_baru>=13): ?>
                 Bulan <?php echo $namaBulan[$bulan_baru - 12]?> 
              <?php echo $value->tahun + 1 ?> Adalah 
              <?php else : ?>
                 Bulan <?php echo $namaBulan[$value->bulan + 1] ?> 
              <?php echo $value->tahun ?> Adalah 
              <?php endif ?>
             
              <span class="label label-danger"><?php echo  number_format($Y) ?>  </span>
            </h4>
            </div>
            <button type="submit" class="btn btn-theme02">Simpan</button><br><br>   
            <?php   echo form_close() ?>

            <!-- <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success mb-2">Cetak Berdasarkan Bulan</button> -->

            <?php echo form_open('DataPeramalan/cetakAll'); ?> 
            <?php if(isset($_POST['id_barang'])) {
              $brg = $_POST['id_barang'];
            } else {
              $brg = 'Oli Motor';
            } 
            echo "<button type='submit' name='id_barang' value='$brg' class='btn btn-theme03' formtarget='_blank'>Cetak</button>"
            ?>
            <?php echo form_close(); ?> 

            <!-- Modal -->
            <?php
          }
          ?>
        </div>       
      </div>
    </div>
  </div>
</div>
</div>
</section>
</section>
<!-- /.container -->

