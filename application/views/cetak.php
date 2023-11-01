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
          <label><b>Jl. SumberTempur Lor RT.02 RW.02</label><br>
          <label><b>MALANG</label><br>

          <!--<p></p>
          <p>/p>-->
      </center>
      <span>Tanggal : <?= date('d F Y') ?></span>
          <hr>


          <table class="mt-2 table tabel-bordered table-hover">
            <thead>
              <tr>
                <th >Barang</th>
                <th>Tahun</th>
                <th>Bulan</th>
                <th>Penjualan(y)</th>
                <th>Waktu(x)</th>
                <th>x*y</th>
                <th>x^2</th>

              </tr>
            </thead>
            <tbody>		
             <?php
             error_reporting(0);
              $x = 0;
              $jumlahx = 0;
              $jumlahy = 0;
              $jumlahxy = 0;
              $jumlahx2 = 0;						
				foreach ($tampil_hitung as $key => $value): 
                
                $jumlahy += $value->hasil;
                $jumlahx += $x;
                $jumlahxy += ($value->hasil)*$x;
                $jumlahx2 += pow($x,2);?>

                <tr>
                  <td style="text-align: left;"><?php echo $value->nama_barang ?></td>
                  <td><?php echo $value->tahun ?></td>
                  <td><?php echo $value->bulan ?></td>
                  <td><?php echo $value->hasil ?></td>
                  <td><?php echo $x++ ?></td>
                  <td><?php echo ($value->hasil)*$x ?></td>
                  <td><?php echo pow($x,2) ?></td>
                </tr>
              <?php endforeach ?>

              <tr>
                <th colspan="2">Jumlah</th>
                <td></td>
                <td><?php echo $jumlahy ?></td>
                <td><?php echo $jumlahx ?></td>
                <td><?php echo $jumlahxy ?></td>
                <td><?php echo $jumlahx2 ?></td>
              </tr>
              <tr>
                <th colspan="2">Rata-rata</th>
                <td><?php echo  number_format($jumlahy/$x,2) ?> </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
                <?php 
                $nilai_a = $jumlahx / $x ;
                $nilai_b = $jumlahx2 / $jumlahx ;

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


