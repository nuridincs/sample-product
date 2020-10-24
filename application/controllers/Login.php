<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function index(){
		$this->sessionIn(); //check session
		$this->load->view('login_page');
	}

	public function loginProcess(){
		$this->load->model('Crud'); //load model
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$query = $this->Crud->read('app_users', array('email'=>$email, 'password'=>$password), null, null);
		if($query->num_rows()==0){
			redirect(base_url('').'?balasan=1');
		}else{
			$result = $query->row();
			$id_user = $result->id;
			$nama = $result->nama;
			$role = $result->role;

			$this->session->set_userdata('iduser', $id_user);
			$this->session->set_userdata('nama', $nama);
			$this->session->set_userdata('role', $role);

			redirect(base_url('main/home'), 'refresh');
		}
	}

	public function logoutProcess(){
		$this->session->unset_userdata('iduser');
		$this->session->unset_userdata('levelaks');
		redirect(base_url(''), 'refresh');
	}
}