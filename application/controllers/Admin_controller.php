<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','file','string')) ;
		$this->load->library(array('form_validation','upload','session','encrypt') ) ;
		$this->load->model('admin_model');

		$user_id = $this->session->userdata('user_id');
		if (!isset($user_id))
		{
			redirect('home/logout') ;
		}

	}

	function display_dashboard()
	{

		$data['client_detail'] = $this->admin_model->display_all_clients();

		$data['title'] = "OT and T Invoice " ;
		$data['company_name'] = "OT and T" ;
		$data['page_title'] = "Dashboard" ;
		$data['footprint'] = "©2017 All Rights Reserved. Invoice Application. Privacy and Terms" ;

		$this->load->view('partials/header.php',$data) ;
		$this->load->view('partials/sidebar_menu.php') ;
		$this->load->view('partials/top_bar.php',$data) ;
		$this->load->view('contents/dashboard',$data) ;
		$this->load->view('partials/footer.php') ;
	}

	function create_user()
	{
		$this->form_validation->set_error_delimiters('<div class="error" style="color: red">', '</div>');
		$this->form_validation->set_message('matches', 'Passwords do not match');
		$this->form_validation->set_message('is_unique', 'User with this %s already exists');
		$this->form_validation->set_message('required', 'The %s field must be filled');

		$this->form_validation->set_rules('names','names','trim|required|max_length[50]');
		$this->form_validation->set_rules('designation','designation','trim|required|max_length[50]');
		$this->form_validation->set_rules('uname','username','trim|required|is_unique[users.username]');
		$this->form_validation->set_rules('pwd1','password','trim|required');
		$this->form_validation->set_rules('pwd2','Repeat Password','trim|required|matches[pwd1]');
		$this->form_validation->set_rules('email','email','trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('phone','phone number','trim|required|numeric|min_length[11]|max_length[11]|is_unique[users.phone]');

		if ($this->form_validation->run() == FALSE)
		{
			$data['title'] = "OT and T Invoice " ;
			$data['company_name'] = "OT and T" ;
			$data['page_title'] = "Create New User" ;
			$data['footprint'] = "©2017 All Rights Reserved. Invoice Application. Privacy and Terms" ;

			$this->load->view('partials/header.php',$data) ;
			$this->load->view('partials/sidebar_menu.php') ;
			$this->load->view('partials/top_bar.php',$data) ;
			$this->load->view('contents/user_form',$data) ;
			$this->load->view('partials/footer.php',$data) ;

		}

		 else
		 {
		 	$insert = $this->admin_model->create_user_internally();
		 	if ($insert == true)
		 	{
				$data['success_message'] = 'New user has been successfully created !';

				$data['title'] = "OT and T Invoice " ;
				$data['company_name'] = "OT and T" ;
				$data['page_title'] = "Create New User" ;
				$data['footprint'] = "©2017 All Rights Reserved. Invoice Application. Privacy and Terms" ;

				$this->load->view('partials/header.php',$data) ;
				$this->load->view('partials/sidebar_menu.php') ;
				$this->load->view('partials/top_bar.php',$data) ;
				$this->load->view('contents/user_form',$data) ;
				$this->load->view('partials/footer.php',$data) ;
			}

		 }

	}

	function create_client()
	{
		$this->form_validation->set_error_delimiters('<div class="error" style="color: red">', '</div>');
		$this->form_validation->set_message('matches', 'Passwords do not match');
		$this->form_validation->set_message('is_unique', 'Client with this %s already exists');
		$this->form_validation->set_message('required', 'The %s field must be filled');

		$this->form_validation->set_rules('names','names','trim|required|max_length[50]');
		$this->form_validation->set_rules('company_name','company name','trim|required|max_length[50]|is_unique[clients.company_name]');
		$this->form_validation->set_rules('address','address','trim|required|max_length[500]');
		$this->form_validation->set_rules('email','email','trim|required|valid_email|is_unique[clients.email]');
		$this->form_validation->set_rules('phone','phone number','trim|required|numeric|min_length[11]|max_length[11]|is_unique[clients.phone]');

		if ($this->form_validation->run() == FALSE)
		{
			$data['title'] = "OT and T Invoice " ;
			$data['company_name'] = "OT and T" ;
			$data['page_title'] = "Create New Client" ;
			$data['footprint'] = "©2017 All Rights Reserved. Invoice Application. Privacy and Terms" ;

			$this->load->view('partials/header.php',$data) ;
			$this->load->view('partials/sidebar_menu.php') ;
			$this->load->view('partials/top_bar.php',$data) ;
			$this->load->view('contents/client_form',$data) ;
			$this->load->view('partials/footer.php',$data) ;

		}

		 else
		 {
		 	$insert = $this->admin_model->create_client();
		 	if ($insert == true)
		 	{
				$data['success_message'] = 'New client has been successfully created !';

				$data['title'] = "OT and T Invoice " ;
				$data['company_name'] = "OT and T" ;
				$data['page_title'] = "Create New Client" ;
				$data['footprint'] = "©2017 All Rights Reserved. Invoice Application. Privacy and Terms" ;

				$this->load->view('partials/header.php',$data) ;
				$this->load->view('partials/sidebar_menu.php') ;
				$this->load->view('partials/top_bar.php',$data) ;
				$this->load->view('contents/client_form',$data) ;
				$this->load->view('partials/footer.php',$data) ;
			}

		 }

	}


	function display_all_admins()
	{
		$data['user_detail'] = $this->admin_model->display_all_admins();

		$data['title'] = "OT and T Invoice " ;
		$data['company_name'] = "OT and T" ;
		$data['page_title'] = "Create New User" ;
		$data['footprint'] = "©2017 All Rights Reserved. Invoice Application. Privacy and Terms" ;

		$this->load->view('partials/header.php',$data) ;
		$this->load->view('partials/sidebar_menu.php') ;
		$this->load->view('partials/top_bar.php',$data) ;
		$this->load->view('contents/view_all_users',$data) ;
		$this->load->view('partials/footer.php',$data) ;
	}

	function display_all_invoices()
	{
		$data['invoice_detail'] = $this->admin_model->display_all_invoices();

		$data['title'] = "OT and T Invoice " ;
		$data['company_name'] = "OT and T" ;
		$data['page_title'] = "View Invoice" ;
		$data['footprint'] = "©2017 All Rights Reserved. Invoice Application. Privacy and Terms" ;

		$this->load->view('partials/header.php',$data) ;
		$this->load->view('partials/sidebar_menu.php') ;
		$this->load->view('partials/top_bar.php',$data) ;
		$this->load->view('contents/view_all_invoices',$data) ;
		$this->load->view('partials/footer.php',$data) ;
	}

	function display_single_invoice()
	{
		 $invoice_id = $this->uri->segment(3) ;
		 $data['single_invoice_detail'] = $this->admin_model->display_single_invoice($invoice_id);

		 $data['title'] = "OT and T Invoice " ;
		 $data['company_name'] = "OT and T" ;
		 $data['page_title'] = "Profile Page" ;
		 $data['footprint'] = "©2017 All Rights Reserved. Invoice Application. Privacy and Terms" ;

		 $this->load->view('partials/header.php',$data) ;
		 $this->load->view('partials/sidebar_menu.php') ;
		 $this->load->view('partials/top.php',$data) ;
		 $this->load->view('contents/view_single_invoice',$data) ;
		 $this->load->view('partials/footer.php') ;

	}

	function delete_admin()
	{
		$user_id = $this->uri->segment(3);
		$this->admin_model->delete_admin($user_id) ;
	}

	function enable_admin()
	{
		$user_id = $this->uri->segment(3);
		$this->admin_model->enable_admin($user_id) ;
	}

	function disable_admin()
	{
		$user_id = $this->uri->segment(3);
		$this->admin_model->disable_admin($user_id) ;
	}


	function delete_client()
	{
		$client_id = $this->uri->segment(3);
		$this->admin_model->delete_client($client_id) ;
	}

	function display_single_client()
	{
		 $client_id = $this->uri->segment(3) ;
		 $data['single_client_detail'] = $this->admin_model->display_single_client($client_id);

		 $data['title'] = "OT and T Invoice " ;
		 $data['company_name'] = "OT and T" ;
		 $data['page_title'] = "Profile Page" ;
		 $data['footprint'] = "©2017 All Rights Reserved. Invoice Application. Privacy and Terms" ;

		 $this->load->view('partials/header.php',$data) ;
		 $this->load->view('partials/sidebar_menu.php') ;
		 $this->load->view('partials/top_bar.php',$data) ;
		 $this->load->view('contents/single_client_page',$data) ;
		 $this->load->view('partials/footer.php') ;

	}


	function display_single_client_invoice()
	{
		 $client_id = $this->uri->segment(3) ;
		 $data['single_client_invoice_detail'] = $this->admin_model->display_single_client_invoice($client_id);

		 $data['title'] = "OT and T Invoice " ;
		 $data['company_name'] = "OT and T" ;
		 $data['page_title'] = "Profile Page" ;
		 $data['footprint'] = "©2017 All Rights Reserved. Invoice Application. Privacy and Terms" ;

		 $this->load->view('partials/header.php',$data) ;
		 $this->load->view('partials/sidebar_menu.php') ;
		 $this->load->view('partials/top_bar.php',$data) ;
		 $this->load->view('contents/view_single_client_invoice',$data) ;
		 $this->load->view('partials/footer.php') ;

	}

	function profile_page()
	{
		$data['profile'] = $this->admin_model->profile_page();

		$data['title'] = "OT and T Invoice " ;
		$data['company_name'] = "OT and T" ;
		$data['page_title'] = "Profile Page" ;
		$data['footprint'] = "©2017 All Rights Reserved. Invoice Application. Privacy and Terms" ;

		$this->load->view('partials/header.php',$data) ;
		$this->load->view('partials/sidebar_menu.php') ;
		$this->load->view('partials/top_bar.php',$data) ;
		$this->load->view('contents/profile_page',$data) ;
		$this->load->view('partials/footer.php') ;
	}

	function update_profile()
	{
		$user_id = $this->session->userdata('user_id') ;
		if($_FILES['pix']['name'])
		{
            if ($_FILES['pix']['name'] <= 1024000)
            {
               $pics = $_FILES['pix'];
		       $file_type = $pics['type'];
		       $temp_file = $pics['tmp_name'];
		       $name = $pics['name'];
		       $array = explode('.', $name);
		       $pix_name = $array[0];
		       $pix_ext = $array[1];
		       $converted = $pix_name."_".time().".".$pix_ext ;
		       $destination = "assets/uploads/".$converted ;
		       move_uploaded_file($temp_file, $destination);
        	}

		    $this->session->set_userdata('destination', $destination) ;
        }
        if (empty($_FILES['pix']['name']))
        {
        	$get = $this->db->query("SELECT * FROM users WHERE user_id = '$user_id' ") ;
        	if ($get->num_rows()== 1)
        	{
        		foreach ($get->result() as $value)
        		{
        			$destination = $value->pix ;
        		}
        	}

        	$this->session->set_userdata('destination', $destination) ;
        }

        $this->form_validation->set_error_delimiters('<div class="error" style="color: red">', '</div>');
		$this->form_validation->set_message('matches', 'Passwords do not match');
		$this->form_validation->set_message('is_unique', 'User with this %s already exists');
		$this->form_validation->set_message('required', 'The %s field must be filled');

		$this->form_validation->set_rules('names','names','trim|required|max_length[50]');
		$this->form_validation->set_rules('designation','designation','trim|required|max_length[50]');
		$this->form_validation->set_rules('uname','username','trim|required');
		$this->form_validation->set_rules('email','email','trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('phone','phone number','trim|required|numeric|min_length[11]|max_length[11]');

		if ($this->form_validation->run() == FALSE)
		{
			$data['profile'] = $this->admin_model->profile_page();

			$data['title'] = "OT and T Invoice " ;
			$data['company_name'] = "OT and T" ;
			$data['page_title'] = "Profile Page" ;
			$data['footprint'] = "©2017 All Rights Reserved. Invoice Application. Privacy and Terms" ;

			$this->load->view('partials/header.php',$data) ;
			$this->load->view('partials/sidebar_menu.php') ;
			$this->load->view('partials/top_bar.php',$data) ;
			$this->load->view('contents/profile_page',$data) ;
			$this->load->view('partials/footer.php') ;
		}
		else
		{
			$this->admin_model->update_profile($user_id) ;
			redirect('admin_controller/profile_page') ;
		}

	}

	function create_invoice()
	{
		$this->form_validation->set_error_delimiters('<div class="error" style="color: red">', '</div>');
		$this->form_validation->set_message('required', 'The %s  must be filled');
		$this->form_validation->set_message('is_unique', 'This %s already exists');

		$this->form_validation->set_rules('client_id',' Select Client','trim|required|numeric');
		$this->form_validation->set_rules('amount_paid','amount paid','trim|required|numeric');
		$this->form_validation->set_rules('start','From','trim|required');
		$this->form_validation->set_rules('end','To','trim|required');
		$this->form_validation->set_rules('project_name','project name','trim|required|is_unique[invoice.project_name]');

		if ($this->form_validation->run() == FALSE)
		{
			$data['client_detail'] = $this->admin_model->display_all_clients();

			$data['title'] = "OT and T Invoice " ;
			$data['company_name'] = "OT and T" ;
			$data['page_title'] = "Create Invoice" ;
			$data['footprint'] = "©2017 All Rights Reserved. Invoice Application. Privacy and Terms" ;

			$this->load->view('partials/header.php',$data) ;
			$this->load->view('partials/sidebar_menu.php') ;
			$this->load->view('partials/top_bar.php',$data) ;
			$this->load->view('contents/invoice_form',$data) ;
			$this->load->view('partials/footer.php') ;
			$this->load->view('partials/invoice_form_scripts.php');
		}

		else
		{
		 	$insert = $this->admin_model->create_invoice() ;

		 	if ($insert == true)
		 	{
		 		$data['client_detail'] = $this->admin_model->display_all_clients();
				$data['success_message'] = 'Invoice Created Successfully';
				$data['title'] = "OT and T Invoice " ;
				$data['company_name'] = "OT and T" ;
				$data['page_title'] = "Profile Page" ;
				$data['footprint'] = "©2017 All Rights Reserved. Invoice Application. Privacy and Terms" ;

				$this->load->view('partials/header.php',$data) ;
				$this->load->view('partials/sidebar_menu.php') ;
				$this->load->view('partials/top_bar.php',$data) ;
				$this->load->view('contents/invoice_form',$data) ;
				$this->load->view('partials/footer.php');
			}

		}

	}





}
?>
