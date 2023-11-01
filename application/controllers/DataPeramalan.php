<?php 	

/**
 * 
 */
class DataPeramalan extends CI_Controller
{
	public $namaBulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	public function __construct()
	{
		parent::__construct();
		require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
		$this->load->model('Peramalan_Model');
		$this->load->model('Penjualan_Model');
		$this->load->model('Barang_Model');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	
	function index()
	{
		$data['bulan'] = $this->namaBulan;
		$data['peramalan'] = $this->Peramalan_Model->getAllData();
		$data['barang'] = $this->Barang_Model->getAllData();		
		$data['tampil_hitung'] = $this->Penjualan_Model->hitung();
		
		$this->load->view('templates/header',$data);
		$this->load->view('peramalan/index', $data); 
		$this->load->view('templates/footer',$data);
	}

	public function validation_form(){
		
		$nama_barang = $this->input->post('nama_barang');
		$sql = $this->db->query("SELECT nama_barang FROM hasil where nama_barang='$nama_barang'");
		$cek_barang = $sql->num_rows();
		if ($cek_barang > 0){
			$this->Peramalan_Model->ubah_data($nama_barang);
			$this->session->set_flashdata('flash', 'Diupdate');
			redirect('DataPeramalan');
        } else {
            $data = array(
                'nama_barang'  => $this->input->post('nama_barang'),
                'tahun'  => $this->input->post('tahun'),
                'bulan'  => $this->input->post('bulan'),
                'forcasting'  => $this->input->post('forcast'),
          
			);
			
			$this->Peramalan_Model->tambah_data($data);
            $this->session->set_flashdata('flash', 'Data Berhasil Disimpan !!!');
            redirect('DataPeramalan');          
        }
	}

	public function hapus($kd)
	{
		$this->Peramalan_Model->hapus_data($kd);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('DataPeramalan');	
	}

	public function ubah($kd)
	{
		$this->form_validation->set_rules("tahun", "tahun", "required");
		$this->form_validation->set_rules("hasil_penjualan", "Hasil Penjualan", "required");

		if ($this->form_validation->run() == FALSE)
		{
			$data['bulan'] = $this->namaBulan;
			$data['ubah']= $this->Peramalan_Model->detail_data($kd);
			$this->load->view('templates/header');
			$this->load->view('peramalan/ubah', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->Peramalan_Model->ubah_data($kd);
			$this->session->set_flashdata('flash', 'DiUbah');
			redirect('DataPeramalan');
		}	
	}

	function cetakAll() //untuk mencetak ke pdf berdasarkan tahun
	{
		$dompdf = new Dompdf();
		
		$data['bulan'] = $this->namaBulan;
		$data['peramalan'] = $this->Peramalan_Model->getAllData();
		$data['barang'] = $this->Barang_Model->getAllData();		
		$data['tampil_hitung'] = $this->Penjualan_Model->hitung();
		$html = $this->load->view("cetak", $data, true);
		$dompdf->load_html($html);
		$dompdf->set_paper('A4', 'potrait');
		$dompdf->render();
		$pdf = $dompdf->output();
		$dompdf->stream('laporan.pdf', array("Attachment" => false)); 
	}

	function cetakBulan() //untuk mencetak ke pdf berdasarkan tahun
	{
		$dompdf = new Dompdf();
		
		$data['bulan'] = $this->namaBulan;
		$data['peramalan'] = $this->Peramalan_Model->getAllData();
		$data['barang'] = $this->Barang_Model->getAllData();		
		$data['tampil_hitung'] = $this->Penjualan_Model->hitung2();
		$html = $this->load->view("peramlan/index", $data, true);
		$dompdf->load_html($html);
		$dompdf->set_paper('A4', 'potrait');
		$dompdf->render();
		$pdf = $dompdf->output();
		$dompdf->stream('laporan.pdf', array("Attachment" => false)); 
	}

	function cetakhasil() //untuk mencetak ke pdf berdasarkan tahun
	{
		$dompdf = new Dompdf();
		$data['cetak'] = $this->Peramalan_Model->getAllData();
		$html = $this->load->view("cetak_hasil", $data, true);
		$dompdf->load_html($html);
		$dompdf->set_paper('A4', 'potrait');
		$dompdf->render();
		$pdf = $dompdf->output();
		$dompdf->stream('laporan_hasil.pdf', array("Attachment" => false)); 
	}



	
	public function perhitungan($tahun, $bulan){

		$x = 0;
		$jumlahx = 0;
		$jumlahy = 0;
		$jumlahxy = 0;
		$jumlahx2 = 0;

		foreach ($this->Penjualan_Model->hitung() as $key => $value):
			
			$jumlahy += $value->hasil ;
			$jumlahx += $x;
			$jumlahxy += $x * ($value->hasil) ;
			$jumlahx2 += pow($x,2);
			$x++;
			$rata_rata = $jumlahy/$x;
			$tahun_lama = $value->tahun;
			$bulan_lama = $value->bulan;
			$jarak = (($tahun - $tahun_lama)*12)+($bulan-$bulan_lama);
			$waktu_x = $jarak+($x-1);
			

		endforeach;

		echo "tahun lama: " .$tahun_lama."</br>";
		echo "bulan lama: " .$bulan_lama."</br>";
		echo "tahun baru: " .$tahun."</br>";
		echo "bulan baru: " .$bulan."</br>";
		echo "jumlah data(n): " .$x. "</br>";
		echo "X: " .$x."</br>";
		echo "jumlah y: " .$jumlahy."</br>";
		echo "jumlah x: " .$jumlahx."</br>";
		echo "jumlah xy: " .$jumlahxy."</br>";
		echo "jumlah x2: " .$jumlahx2."</br>";
		echo "jumlah rata: " .$rata_rata."</br>";
		echo "jarak: " .$jarak ."</br>" ;
		echo "waktu(X): " .$waktu_x ."</br>" ;


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

		$bc= $nc1 + $nc2;
		$b= $nc3 / $bc;
		echo "nilai b: " .$b ."</br>";

		$a=($jumlahx * $b) / $x ;
		echo "nilai a: " .$a ."</br>";
		
		$Y = $a + ($b*$x);
		echo $Y ;
		return $Y;

	}

	public function tampil_hasil()
	{
		$this->load->model('Peramalan_Model');
		$data['hasil']=$this->Peramalan_Model->getAllData();
		$this->load->view('templates/header');
		$this->load->view('peramalan/hasil', $data);
		$this->load->view('templates/footer');
	}
	public function delete_hasil($id_hasil)
	{
		$data= array('id_hasil' => $id_hasil,);
		$this->Peramalan_Model->delete($data);
		$this->session->set_flashdata('Hapus','Data Berhasil Dihapus');
		redirect('DataPeramalan/tampil_hasil');
	}


}






?>