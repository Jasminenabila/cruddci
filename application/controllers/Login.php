<?php
class Login extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('CodeModel');
	}


	public function index(){
		$this->load->view('view_login');
	}

	public function process(){
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		// echo $user;
		// echo $pass;
		// die();
		$where = array(
			'user' => $user,
			'pass' => $pass
		);
		$cek = $this->CodeModel->validasilogin($user, $pass);
			if ($cek == true) {
				redirect('Code/index');
			
		  }
		   else {
			redirect('Login/index');
		  }

		// if ($user=='admin' && $pass=='admin123') 
		// {
		// 	// echo "sukses";
		// 	// die;
		// 	//declaring session
		// 	$this->session->set_userdata(array('user'=>$user));
		// 	redirect("Code/index");
		// }
		// else{
		// 	$data['error'] = 'Your Account is Invalid';
		// 	redirect("login");
		// }
	}

	public function logout()
	{
	    $this->session->sess_destroy();
    	redirect('Login/index');
	}
}


?>