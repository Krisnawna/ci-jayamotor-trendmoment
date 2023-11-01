<style type="text/css">
	table {
		align: center;
		padding: 10 10 10 50;
		width: 90%;
		text-align: center;		
	}
	th {
		background-color: #333;
    	color: white;
    	border: 1 ;
	}

	td {
		border: 1;
		background: #f5f5f5;
	}

	h2, h3, h4 {
		align : center;
	}

	tr:hover {background-color: #f5f5f5;}
</style>

 
   <div class="col-lg-9">
      <div class="card my-4">
        <div class="card-body">
        <center>
          <label><b><th1>TOKO. JAYA MOTOR</th1></label><br>
          <label><b>Jl. Sumbertempur Lor RT.02 RW.02</label><br>
          <label><b>MALANG</label><br>
      </center>
        <span>Tanggal : <?= date('d F Y') ?></span>
          <hr>
          <table class="mt-2 table tabel-bordered table-hover">
             <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Forcasting</th>
                
            </tr>
            
        </thead>
        <tbody>
            <?php $no=1; foreach ($cetak as $key => $value) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $value->nama_barang?></td>
                <td><?= $value->forcasting?></td>
            </tr>
            <?php }?>
        </tbody>   
          </table>
        </div>
      </div>    
    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->
</div>
<!-- /.container -->


