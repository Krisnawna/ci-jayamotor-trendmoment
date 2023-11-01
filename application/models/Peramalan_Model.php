<?php 

/** 
 * 
 */
class Peramalan_Model extends CI_Model
{
	public function getAllData()
	{
		return $this->db->get('hasil')->result();
	}
	public function getAllDataKhusus()
	{
		return $this->db->get('peramalan')->result_array();
	}

	public function tambah_data($data	)
	{

		$this->db->insert('hasil', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_hasil',$data['id_hasil']);
        $this->db->delete('hasil', $data);
	}
	 public function detail($id_hasil)
    {
        $this->db->select('*');
        $this->db->from('hasil');
        $this->db->where('id_hasil', $id_hasil);
        return $this->db->get()->row();
    }
	public function ubah_data($nama_barang){
		$data = array(
			'nama_barang'=>$this->input->post('nama_barang',true),
			'tahun'=>$this->input->post('tahun',true),
			'bulan'=>$this->input->post('bulan',true),
			'forcasting'=>$this->input->post('forcast',true),
			);
		$this->db->where('nama_barang',$nama_barang);
		$this->db->update('hasil',$data);
	}

	public function detail_barang($nama_barang){
		$this->db->select('nama_barang');
        $this->db->where('nama_barang', $nama_barang);
        $query = $this->db->get('hasil');
        $row = $query->row();
        if ($query->num_row > 0){
        	return $row->nama_barang;
        }else{
        	return"";
        }
	}
	


}
?>