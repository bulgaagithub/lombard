<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
        $this->load->helper('url');
		$this->load->library('bcrypt');
		$this->load->helper('form');
    	$this->load->library('form_validation');
 
	}
	public function index()
	{
		$this->load->view('user/login');
	}

	public function login() {

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE)
		{
		    redirect('/');
		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
		    $this->user_model->login($username,$password);
		}
	}

	public function sign_up() {
		$this->load->view('user/signup');
	}

	public function save() {

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE)
		{
		    redirect('user/sign_up');
		}
		else
		{
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = $this->bcrypt->hash_password($this->input->post('password'));
		    $this->user_model->register($username,$email,$password);
		    redirect('/');
		}
	}
}
