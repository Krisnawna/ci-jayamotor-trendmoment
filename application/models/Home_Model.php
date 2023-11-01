<?php

class Home_Model extends CI_Model{
	
	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where(array('username'=>$username,'password'=>$password));
		return $this->db->get()->row();
	}

	public function tampil()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->order_by('id_user', 'desc');
        return $this->db->get()->result();
    }
    public function data_user()
	{
	   $user = $this->db->get('users');
	   return $user;
	}

	public function simpan($data)
    {
        $this->db->insert('users', $data);
    }

    public function detail($id_user)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id_user', $id_user);
        return $this->db->get()->row();
    }

    public function edit($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('users', $data); 
    }

    public function delete($data)
    {
        $this->db->where('id_user',$data['id_user']);
        $this->db->delete('users', $data);
        
    }

}