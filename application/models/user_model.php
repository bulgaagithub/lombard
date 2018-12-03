<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

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
		$this->load->database();
		$this->load->helper('url');
	}

	public function login($username,$password) {

		$this->db->select();
        $this->db->where('username', $username);

        $query = $this->db->get('fos_user');

        if($query->num_rows() > 0) {
            $result = $query->row();

            if($this->bcrypt->check_password($password,$result->password)) {
                return redirect(base_url('welcome'));
            } else {
                return redirect(base_url());
            }
        } else {
            // return redirect(base_url());
            echo "Hello";
        }
	}

	public function register($username,$email,$password) {
		$data = array(
	        'username' 				=> $username,
	        'username_canonical' 	=> $username,	
	        'email' 				=> $email,
	        'email_canonical'		=> $email,
	        'password' 				=> $password 
	    );
    	return $this->db->insert('fos_user', $data);
	}
}
