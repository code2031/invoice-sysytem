 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url') ;
		$this->load->helper('form') ;
		$this->load->library('form_validation') ; 
		$this->load->library('encrypt');
		$this->load->library('session');
		$this->load->model('admin_model');

	}
	
	function index()
	{
		$data['title'] = "OT and T Invoice " ;
		$data['company_name'] = "OT and T" ;
		$data['footprint'] = "©2017 All Rights Reserved. OAK Telecoms and Technoloy Consulting" ;
		$this->load->view('partials/header',$data);
		$this->load->view('contents/login',$data);
		$this->load->view('partials/footer',$data);
		
	}

	function validate_login_details()
	{
			
		$query = $this->admin_model->check_user_details() ;
		if ($query) 
		{
			return true ;
		}

		else
		{
		
			$data['title'] = "OT and T Invoice " ;
			$data['company_name'] = "OT and T" ;
			$data['footprint'] = "©2017 All Rights Reserved. OAK Telecoms and Technoloy Consulting" ;
			$data['feedback']= "Access Denied !";
			$data['home']='current-menu-item';
			$this->load->view('partials/header',$data);
			$this->load->view('contents/login',$data);
			$this->load->view('partials/footer',$data);
		}
		
	}

	function register()
	{  
		$this->form_validation->set_error_delimiters('<div class="error" style="color: red">', '</div>');
		$this->form_validation->set_message('matches', 'Passwords do not match');
		$this->form_validation->set_message('is_unique', 'User with this %s already exists');
		$this->form_validation->set_message('required', 'The %s field must be filled');

		$this->form_validation->set_rules('uname','username','trim|required|is_unique[users.username]');
		$this->form_validation->set_rules('pwd1','Password','trim|required');
		$this->form_validation->set_rules('pwd2','Repeat Password','trim|required|matches[pwd1]'); 
		$this->form_validation->set_rules('email','email','trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('phone','phone number','trim|required|numeric|min_length[11]|max_length[11]|is_unique[users.phone]');
		
		if ($this->form_validation->run() == FALSE) 
		{
			$data['title'] = "OT and T Invoice " ;
			$data['company_name'] = "OT and T" ;
			$data['footprint'] = "©2017 All Rights Reserved. OAK Telecoms and Technoloy Consulting" ;
			$this->load->view('partials/header',$data);
			$this->load->view('contents/register',$data);
			$this->load->view('partials/footer',$data);
			
		}
	
	 else
	 {
	 	$insert = $this->admin_model->create_user_externally();
	 	if ($insert == true) 
	 	{
			$data['success_message'] = 'Registration Successfull, but you need to be <b>enabled</b> by an admin before you can be able to login';

			$data['title'] = "OT and T Invoice " ;
			$data['company_name'] = "OT and T" ;
			$data['footprint'] = "©2017 All Rights Reserved. OAK Telecoms and Technoloy Consulting" ;
			$this->load->view('partials/header',$data);
			$this->load->view('contents/register',$data);
			$this->load->view('partials/footer',$data);
		} 
		
	 }

	}

		function recoverpwd()
	{
		$data['title'] = "OT and T Invoice " ;
		$data['company_name'] = "OT and T" ;
		$data['footprint'] = "©2017 All Rights Reserved. OAK Telecoms and Technoloy Consulting" ;
		$this->load->view('partials/header',$data);
		$this->load->view('contents/recoverpwd',$data);
		$this->load->view('partials/footer',$data);
		
	}

	 public function logout()
	{
		$this->session->sess_destroy();
		redirect('Home') ;
	}
}
