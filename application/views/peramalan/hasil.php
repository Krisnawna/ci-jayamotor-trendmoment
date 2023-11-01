<!DOCTYPE html>
<html>
<head>

	<title>Hasil</title>
	<script type="text/javascript" src="../asset/jquery.min.js"></script>
	<script>
      function konfirmasi()
      {
        tanya = confirm("Anda Yakin Akan Menghapus Data ?");
        if (tanya == true) return true;
        else return false;
      };
  </script>
</head>
<section id="main-content">
  <section class="wrapper ">
   <div class="row mt">
   <div class="col-lg-12">
      <div class="form-panel">
         <label><b><th1>TOKO. JAYA MOTOR</th1></label><br>
          <label><b>Jl.SumberTempur Lor RT.02 RW.02</label><br>
          <label><b>MALANG</label><br>
          <hr>

<?php

//notifikasi pesan data berhasil disimpan
if ($this->session->flashdata('pesan')) {
    echo '<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';

    echo $this->session->flashdata('pesan');
    echo '</div>';    
}
 //notifikasi pesan data berhasil dihapus
 if ($this->session->flashdata('hapus')) {
  echo '<div class="alert alert-danger">';
  echo $this->session->flashdata('hapus'); 
  echo '</div>'; 
}
?>

<br>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Forcasting</th>
                <th>Action</th>
            </tr>
            
        </thead>
        <tbody>
            <?php $no=1; foreach ($hasil as $key => $value) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $value->nama_barang?></td>
                <td><?= number_format($value->forcasting)?></td>
                <td>
                    <a href="<?= base_url('DataPeramalan/delete_hasil/'.$value->id_hasil) ?>" class="btn btn-sm btn-danger"
                    onClick="return confirm('Apakah Data Ingin Dihapus  ???')">Hapus</a>
                </td>
            </tr>
            <?php }?>
        </tbody>   
    </table>

<?php   echo form_close() ?>

<!-- <div class="row ">
        <div class="col-lg-12">
        <div class="showback">    
<?php echo form_open('DataPeramalan/cetakhasil'); ?> 
<button type='submit' class='btn btn-success' formtarget="_blank">Cetak</button>
<?php echo form_close(); ?>  <br><br>
</div>
</div>
</div>
</div>
</div>
</div> -->
</section>
</section>