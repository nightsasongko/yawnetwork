<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('home_model');
		$this->load->model('akun_model');

	}	 


	public function index()
	{
		if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
            $data['title'] = "Login Distributor";
            $this->load->view('public/header', $data);
            $this->load->view('public/login');
			$this->load->view('public/footer');
			

		}
	}
	
	public function login()
	{
		if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{	
			// cek distributor sedang login atau tidak
			if (isset($_SESSION[$this->config->item('sess_prefix_distributor').'loggedinSession'])) 
			{
				redirect(base_url().'dashboard');
			}
			else {
				// judul di header
				$data['title'] = "Login Distributor";

				$this->load->view('public/header', $data);
				$this->load->view('public/login');
				$this->load->view('public/footer');
			}
			
		}
	}

	public function logmein() 
	{
		if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			// membuat session untuk sess_prefix_distributor
			if ($this->akun_model->cekloginmemeber($email,$password)) {
				$detail = $this->dasar_model->getDetailOnField('member','email', $email);
				$idmember = $detail['id_member'];
				$sessdata = array(
					$this->config->item('sess_prefix_distributor').'UsernameSession'  => $email,
					$this->config->item('sess_prefix_distributor').'loggedinSession' => TRUE,
					$this->config->item('sess_prefix_distributor').'IDSession' => $idmember,

				);
				$this->session->set_userdata($sessdata);
				redirect(base_url().'dashboard');
			}
			else {
				echo "salah login";exit;
			}
		}
	}

	public function dologout()
	{
		if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
			$this->session->sess_destroy();
			$data['msg'] = "You are logged out";
			redirect(base_url());
			//$this->login($data);
		}
	}
    
    public function lupapassword()
    {
        if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
            $data['title'] = "Lupa Password";
            $this->load->view('public/header', $data);
            $this->load->view('public/lupapassword');
            $this->load->view('public/footer');
		}
    }

}
