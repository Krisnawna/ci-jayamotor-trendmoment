<?php 

/**
 * 
 */
class Penjualan_Model extends CI_Model
{
	public function getAllData()
	{
		return $this->db->get('penjualan')->result();
	}
	public function getAllDataKhusus()
	{
		return $this->db->get('penjualan')->result_array();
	}

	public function getLastId()
	{
		$this->db->order_by('id_penjualan', 'DESC');
		return $this->db->get('penjualan')->row();
	}
	public function tambah_data()
	{

		$data = array(
			'id_penjualan' => $this->input->post('id_penjualan', true),
			'nama_barang' => $this->input->post('id_barang',true),
			'tahun' => $this->input->post('tahun', true),
			'bulan' => $this->input->post('bulan', true),
			'harga' => $this->input->post('harga', true),
			'hasil_penjualan' => $this->input->post('jumlah',true),
			'pendapatan' => $this->input->post('harga',true) * $this->input->post('jumlah',true)

		);
		$this->db->insert('penjualan', $data);
	}

	public function ubah_data($kd) 
	{
		$data = array(
			'nama_barang' => $this->input->post('nama_barang',true),
			'tahun' => $this->input->post('tahun', true),
			'bulan' => $this->input->post('bulan', true),
			'harga' => $this->input->post('harga', true),
			'hasil_penjualan' => $this->input->post('hasil_penjualan',true),
			'pendapatan' => $this->input->post('harga',true) * $this->input->post('hasil_penjualan',true),
		);
		$this->db->where('id_penjualan', $kd);
		$this->db->update('penjualan', $data);
	}

	public function hapus_data($kode)
	{
		$this->db->delete('penjualan', ['id_penjualan' => $kode]);
		$this->db->delete('detail_penjualan', ['id_penjualan' => $kode]);
	}

	public function detail_data($kode)
	{
		return $this->db->get_where('penjualan', ['id_penjualan' => $kode]) ->row_array(); 
	}

	public function detail_dataPenjualan($kd)
	{
		$this->db->select("*");
		$this->db->from("detail_penjualan");
		$this->db->join("barang", "detail_penjualan.id_barang = barang.id_barang");
		$this->db->where('detail_penjualan.id_penjualan', $kd);
		return $this->db->get()->result(); 
	}

	public function hitung(){
		// $this->db->query("SELECT tahun, bulan, SUM(hasil_penjualan) FROM penjualan GROUP BY tahun, bulan ORDER BY tahun, bulan ASC");
		if(isset($_POST['id_barang'])) {
		$brg = $_POST['id_barang'];
		} else {
			$brg = 'Bella Square Abu Abu';
		}
		$this->db->select("tahun, bulan,nama_barang, sum(hasil_penjualan) as hasil");
		$this->db->from("penjualan");
		$this->db->where("nama_barang = '$brg'");
		$this->db->order_by('tahun', 'ASC');
		$this->db->order_by('bulan', 'ASC');
		$this->db->group_by(array('tahun', 'bulan'));
		// $this->db->group_by('bulan', 'ASC');

		return $this->db->get()->result();
	}

	public function hitung2(){
		// $this->db->query("SELECT tahun, bulan, SUM(hasil_penjualan) FROM penjualan GROUP BY tahun, bulan ORDER BY tahun, bulan ASC");
		if(isset($_POST['id_barang'])) {
			$brg = $_POST['id_barang'];
			// $bulan = $_POST['bulan'];
			// $tahun = $_POST['tahun'];
		} else {
			$brg = 'Bella Square Abu Abu';
		}
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$this->db->select("tahun, bulan,nama_barang, sum(hasil_penjualan) as hasil");
		$this->db->from("penjualan");
		$this->db->where("nama_barang = '$brg'");
		$this->db->where("bulan = '$bulan'");
		$this->db->where("tahun = '$tahun'");
		// $this->db->group_by('bulan', 'ASC');

		return $this->db->get()->result();
	}





}
?>