<?php 

/**
 * 
 */
class Barang_Model extends CI_Model
{
	public function getAllData()
	{
		return $this->db->get('barang')->result();
	}
	public function getAllDataKhusus()
	{
		return $this->db->get('barang')->result_array();
	}

	public function tambah_data( )
	{
		$nama_barang = $this->input->post('nama_barang', true);
		$merek_barang = $this->input->post('merek_barang', true);
    
		// Gabungkan nilai "nama_barang" dan "merek_barang" menjadi satu nilai
		$nama_barang_lengkap = $nama_barang . ' ' . $merek_barang;
	    // Simpan nilai yang sudah digabung ke dalam database
		
		$data = array(
			'nama_barang' => $nama_barang_lengkap
		);

    $this->db->insert('barang', $data);
	}

	public function ubah_data($kd)
	{
		$data = array(
			'nama_barang' => $this->input->post('nama_barang', true)		
	);
		$this->db->where('id_barang', $kd);
		$this->db->update('barang', $data);
	}

	public function hapus_data($kode)
	{
		$this->db->delete('barang', ['id_barang' => $kode]);
	}

	public function detail_data($kode)
	{
		return $this->db->get_where('barang', ['id_barang' => $kode]) ->row_array(); 
	}

}
?>