<!DOCTYPE html>
<html>
<head>

	<title>Tambah User</title>
	<script type="text/javascript" src="../asset/jquery.min.js"></script>

  <!-- Bootstrap -->
  <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>asset/font-awesome/css/font-awesome.min.css" rel="stylesheet">    
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>asset/css/custom.min.css" rel="stylesheet">
</head>
  <section id="main-content">
  <section class="wrapper site-min-height">
   <div class="row mt">
   <div class="col-lg-12">
      <div class="form-panel">
          <h5>Tambah Pengguna</h5>
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
            echo form_open('Home/input_user');
        ?>

                <div class="form-group">
                    <label>Nama User </label>
                    <input name="fullname" placeholder="Nama User" class="form-control">
                </div>

                <div class="form-group">
                    <label>Username </label>
                    <input name="username" placeholder="Username" class="form-control">
                </div>

                <div class="form-group">
                    <label>Password </label>
                    <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
             
                <br>
            
                <div class="form-group">
                    <label></label>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button class="btn btn-warning" type="reset">Reset</button>
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
  </section>
</section>
