<?php 	

/**
 * 
 */
class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_Model');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	 
	function index()
	{ 
		if ($this->session->userdata('username')=="") {
			$this->form_validation->set_rules('username','username','required');
			if ($this->form_validation->run()){
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$this->user_login->login($username,$password);
			}
			$this->load->view('templates/header');
			$this->load->view('login');
			$this->load->view('templates/footer');
		}else {
			$this->load->view('templates/header');
			$this->load->view('beranda');
			$this->load->view('templates/footer');
		}
	}

	public function logout()
	{
		$this->user_login->logout();
	}

	public function manajemen_user()
	{
	    $this->load->model('Home_Model');
	    $data['user'] = $this->Home_Model->data_user()->result();
	    $this->load->view('templates/header');
	    $this->load->view('pengguna/manajemen_user',$data);
		$this->load->view('templates/footer');

	}
	
	public function input_user()
	{
		$this->form_validation->set_rules('fullname', 'Nama User', 'required',array(
            'required'=>'%s Harus Diisi !!!'
        ));
        
        $this->form_validation->set_rules('username', 'Username', 'required',array(
            'required'=>'%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required',array(
            'required'=>'%s Harus Diisi !!!'
        ));
       
        
        if ($this->form_validation->run() == FALSE) {
	    	$this->load->view('templates/header');
            $this->load->view('pengguna/tambah', FALSE);
			$this->load->view('templates/footer');

        } else {
            $data = array(
                'nama_user'  => $this->input->post('fullname'),
                'username'  => $this->input->post('username'),
                'password'  => $this->input->post('password'),
                          
			);
			
			$this->Home_Model->simpan($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan !!!');
            redirect('Home/manajemen_user','refresh');          
        }
	}  

	public function edit_user($id_user)
	{
		$this->form_validation->set_rules('fullname', 'Nama User', 'required',array(
            'required'=>'%s Harus Diisi !!!'
        ));
        
        $this->form_validation->set_rules('username', 'Username', 'required',array(
            'required'=>'%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required',array(
            'required'=>'%s Harus Diisi !!!'
        ));
        
        
        if ($this->form_validation->run() == FALSE) {
			$data = array(
				'user' => $this->Home_Model->detail($id_user),
			);
			$this->load->view('templates/header');
            $this->load->view('pengguna/edit',$data, FALSE);
			$this->load->view('templates/footer');
			
        } else {
            $data = array(
                'id_user'   => $id_user,
                'nama_user'  => $this->input->post('fullname'),
                'username'  => $this->input->post('username'),
                'password'  => $this->input->post('password'),
                           
			);
			
			$this->Home_Model->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit !!!');
            redirect('Home/manajemen_user','refresh');          
        }
	}

	public function delete_user($id_user)
    {
        $data = array('id_user' => $id_user);
        $this->Home_Model->delete($data);
        $this->session->set_flashdata('hapus','Data Berhasil Dihapus !!!');
        redirect('Home/manajemen_user');
	}
	
}
?>