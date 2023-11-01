<?php 

class User_login
{
	protected $ci;
	public function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->model('home_model');
	}

	public function login($username,$password)
	{
		$check=$this->ci->home_model->login($username,$password);
		if ($check){
			$nama_user		=$check->nama_user;
			$username		=$check->username;
			$password 		=$check->password;

			//membuat session
			$this->ci->session->set_userdata('nama_user',$nama_user);
			$this->ci->session->set_userdata('username',$username);
			 redirect('Home');
		}else{
			$this->ci->session->set_flashdata('pesan','Username atau Password Salah');
			redirect('home/index');
		}


	}
	public function cek_login()
	{
		if ($this->ci->session->userdata('username')==""){
			$this->ci->session->set_flashdata('pesan','Anda Belum Login');
			redirect('home/index');
		}
	}
	public function logout()
	{
		$this->ci->session->unset_userdata('nama_user');
		$this->ci->session->unset_userdata('username');
		$this->ci->session->set_flashdata('pesan','Anda berhasil logout');
		redirect('Home');
	}
}

 