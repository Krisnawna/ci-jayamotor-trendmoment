<!DOCTYPE html>
<html>
<head>

	<title>Edit User</title>
</head>
  <section id="main-content">
  <section class="wrapper site-min-height">
   <div class="row mt">
   <div class="col-lg-12">
      <div class="form-panel">
          <h5>Edit Pengguna</h5>
          <hr>
                                               
        <div class="panel-body">
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
            echo form_open('Home/edit_user/'.$user->id_user); 
            ?>

                <div class="form-group">
                    <label>Nama User </label>
                    <input name="fullname" placeholder="Nama User" value="<?= $user->nama_user ?>"  class="form-control">
                </div>

                <div class="form-group">
                    <label>Username </label>
                    <input name="username" placeholder="Username" value="<?= $user->username ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label>Password </label>
                    <input name="password" placeholder="Password" value="<?= $user->password ?>" class="form-control">
                </div>        
                <br>
            
                <div class="form-group">
                    <label></label>
                    <button type="submit" class="bn btn-sm btn-primary">Ubah Data</button>
                </div>


            <?php echo form_close() ?>
            </div>

        </div>                       
    </div>
</div>
        <!-- /footer content -->
      </div>
    </div>
</div>
    <!-- jQuery -->
   </section>
</section>
