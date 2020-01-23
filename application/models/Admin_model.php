<?php

class Admin_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	// Creating User from registration page //
	function create_user_externally()
	{
 		$pwd = $this->input->post('pwd1');
		$encrypted_password = $this->encrypt->encode($pwd);

		$user_data = array(
					'username' => $this->input->post('uname'),
					'password' => $encrypted_password,
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'status' => 'disabled',
					'role' => 'admin'
						   );
		$this->db->insert('users',$user_data ) ;
		return true ;

	}

	// Creating User from admin page //
	function create_user_internally()
	{
 		$pwd1 = $this->input->post('pwd1');
		$encrypted_password = $this->encrypt->encode($pwd1);

		$user_data = array(
					'names' => $this->input->post('names'),
					'username' => $this->input->post('uname'),
					'password' => $encrypted_password,
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'designation' => $this->input->post('designation'),
					'status' => 'enabled',
					'role' => 'admin'
						   );
		$this->db->insert('users',$user_data ) ;
		return true ;

	}

	// Creating User from admin page //
	function create_client()
	{
		$user_data = array(
					'names' => $this->input->post('names'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'address' => $this->input->post('address'),
					'company_name' => $this->input->post('company_name'),
						   );
		$this->db->insert('clients',$user_data ) ;
		return true ;

	}

		// Login process //
	function check_user_details()
	{
	 	$uname_fone = $this->input->post('uname_fone') ;
		$pwd = $this->input->post('pwd1') ;
		$get= $this->db->query("SELECT * FROM users WHERE  username ='$uname_fone' or phone='$uname_fone'");

		if($get->num_rows()== 1)
		{
			foreach ($get->result()as $value)
			{
				$user_id = $value->user_id ;
				$username = $value->username ;
				$names = $value->names ;
				$status = $value->status ;
				$decrypted_password = $this->encrypt->decode($value->password) ;
			}

			$this->session->set_userdata('user_id', $user_id);
			$this->session->set_userdata('username', $username);
			$this->session->set_userdata('names', $names);
			$this->session->set_userdata('status', $status);
			$this->session->set_userdata('password', $decrypted_password);

			if ($decrypted_password == $pwd && $status == 'enabled' )
			{
				redirect('admin_controller/display_dashboard') ;
			}

		}
	}

	function display_all_admins()
	{

		$get = $this->db->query("SELECT * FROM users") ;
		if ($get->num_rows() >= 0)
		{
			return $get->result() ;

		}

		else
		{
			return NULL ;
		}
	}


	function display_all_clients()
	{
		$get = $this->db->query("SELECT * FROM clients") ;
		if ($get->num_rows() >= 0)
		{
			return $get->result() ;

		}

		else
		{
			return NULL ;
		}
	}

	function display_single_client($client_id)
	{
		$get_single_client = $this->db->query("SELECT * FROM clients WHERE client_id = '$client_id'") ;
		if ($get_single_client->num_rows() == 1)
		{
			return $get_single_client->result() ;

		}

		else
		{
			return NULL ;
		}
	}

	function delete_admin($id)
	{
		$delete = $this->db->delete('users', array('user_id' => $id)) ;
		redirect('admin_controller/display_all_admins') ;
	}

	function enable_admin($id)
	{
		$data = array('status' => 'enabled');
		$enable = $this->db->update('users', $data , array('user_id' => $id));
		if ($enable)
		{
			redirect('admin_controller/display_all_admins') ;
		}
		else
		{
			return NULL ;
		}
	}

	function disable_admin($id)
	{
		$data = array( 'status' => 'disabled' );
		$disable = $this->db->update('users', $data , array('user_id' => $id));
		if ($disable)
		{
			redirect('admin_controller/display_all_admins') ;
		}
		else
		{
			return NULL ;
		}
	}

	function delete_client($id)
	{
		$delete = $this->db->delete('clients', array('client_id' => $id)) ;
		redirect('admin_controller/display_dashboard') ;
	}

	function profile_page()
	{
		$user_id = $this->session->userdata('user_id') ;
		$get = $this->db->query("SELECT * FROM users WHERE user_id = '$user_id'") ;
		if ($get->num_rows() == 1)
		{
			return $get->result() ;
		}
		else
		{
			return NULL ;
		}
	}

	function update_profile($user_id)
	{
		$user_id = $this->session->userdata('user_id') ;

		$destination = $this->session->userdata('destination') ;

		$user_data = array(
							'names' => $this->input->post('names'),
							'email' => $this->input->post('email'),
							'username' => $this->input->post('uname'),
							'phone' => $this->input->post('phone'),
							'designation' => $this->input->post('designation'),
							'pix' => $destination,
						   );
		$this->db->update('users', $user_data, array('user_id' => $user_id));

	}

	function create_invoice()
	{
		$user_id = $this->session->userdata('user_id') ;
		$get_user = $this->db->query("SELECT * FROM users WHERE user_id = '$user_id'") ;

		 if ($get_user->num_rows() == 1)
		  {
		    foreach ($get_user->result() as $value)
		           {
		            $names =  $value ->names ;
		           }
		  }

		  $order_number = random_string('numeric',6) ;
		  $project_name = ucwords(strtolower($this->input->post('project_name'))) ;
		  $price_charged =  $this->input->post('total') ;
		  $amount_paid =  $this->input->post('amount_paid') ;
		  $balance_due = $price_charged - $amount_paid ;

		  $data = array(
						'user_id' => $user_id ,
						'client_id' => $this->input->post('client_id'),
						'project_name' => $project_name ,
						'order_number' => $order_number,
						'timeline_start' => $this->input->post('start'),
						'timeline_end' => $this->input->post('end'),
						'price_charged' => $price_charged,
						'amount_paid' => $amount_paid,
						'balance_due' => $balance_due,
					   );

			$insert_invoice = $this->db->insert('invoice',$data ) ;


			if ($insert_invoice)
			{
				// Get last id //
		 	$invoice_id = $this->db->insert_id();

		    $project_description =  $this->input->post('project_description');
		    $amount =  $this->input->post('amount');


 			// count number of auto-populated text feilds and loop through //
 			$count = count($project_description) ;
		    $index = 0 ;
		    while ($index < $count)
		    {
		  	 $data = array(
		  	 				'invoice_id' => $invoice_id ,
		  	 				'project_description' => $project_description[$index] ,
		  	 				'amount' => $amount[$index] ,
		  	 			  ) ;
		  	  $this->db->insert('descriptions',$data );
		  	  $index++;
		    }

			}


		return true ;
	}

	function display_all_invoices()
	{
   $get=$this->db->query("SELECT * FROM invoice inner join clients on invoice.client_id = clients.client_id");
		if ($get->num_rows() >= 0)
		{
			return $get->result() ;

		}

		else
		{
			return NULL ;
		}
	}

	function display_single_invoice($invoice_id)
	{
$get = $this->db->query("SELECT * FROM descriptions inner join invoice on invoice.invoice_id = descriptions.invoice_id inner join clients on invoice.client_id = clients.client_id WHERE invoice.invoice_id = $invoice_id");
		if ($get->num_rows() >= 0)
		{
			return $get->result() ;

		}

		else
		{
			return NULL ;
		}
	}


	function display_single_client_invoice($client_id)
	{
	   $get=$this->db->query("SELECT * FROM invoice inner join clients on invoice.client_id = clients.client_id WHERE clients.client_id = $client_id");
			if ($get->num_rows() >= 0)
			{
				return $get->result() ;

			}

			else
			{
				return NULL ;
			}
	}


}

 ?>
