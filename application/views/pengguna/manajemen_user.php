<!DOCTYPE html>
<html>
<head>
	<title>Manajemen User</title>
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
  <section class="wrapper site-min-height">
   <div class="row mt">
   <div class="col-lg-12">
      <div class="form-panel">
          <h5>Pengguna</h5>
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

<div class="col-3 text-left">
<?php echo anchor('Home/input_user','Tambah User', 'class="btn btn-primary"'); ?>
</div>
<br>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Username</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
            
        </thead>
        <tbody>
            <?php $no=1; foreach ($user as $key => $value) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $value->nama_user?></td>
                <td><?= $value->username?></td>
                <td><?= $value->password?></td>
                <td>
                    <a href="<?= base_url('Home/edit_user/'.$value->id_user) ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?= base_url('Home/delete_user/'.$value->id_user) ?>" class="btn btn-sm btn-danger"
                    onClick="return confirm('Apakah Data Ingin Dihapus  ???')">Hapus</a>
                </td>
            </tr>
            <?php }?>
        </tbody>   
    </table>
</div>
      </div>
    </div>
</div>
 </section>
</section>