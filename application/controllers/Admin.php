<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$data = $this->mymodel->getUser();
		$this->load->view('adminlogin',array('data'=>$data));
	}


	public function manageUser()
	{
		$username = $_POST['username'];
		$admin = $this->mymodel->getAdmin($username);
		$data = $this->mymodel->getUser();
		$this->load->view('adminpage',array('admin'=>$admin,'data'=>$data));
	}

	public function reloadHomePage($username)
	{
		$admin = $this->mymodel->getAdmin($username);
		$data = $this->mymodel->getUser();
		$this->load->view('adminpage',array('admin'=>$admin,'data'=>$data));
	}

	public function searchUser() {
		$key = $_POST['searchkey'];
		$username = $_POST['username'];
		$admin = $this->mymodel->getAdmin($username);
		$data = $this->mymodel->searchUsername($key);
		$this->load->view('adminpage',array('admin'=>$admin,'data'=>$data));
	}

	public function deleteUser($username,$admin) {
		$res = $this->mymodel->deleteData('registered_user',
		array('username' => $username));
		if ($res >= 1) {
			$string = 'admin/reloadHomePage/'.$admin;
			redirect($string);
		} else {
		}
	}

	public function settingUser($username,$administrator)
	{
		$admin = $this->mymodel->getAdmin($administrator);
		$data = $this->mymodel->getSpesificUser($username);
		$this->load->view('manageUser',array('admin'=>$admin,'data'=>$data));
	}

	public function updateUser($username,$admin){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fullname', 'Fullname', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$string = "index.php/admin/settingUser/".$username."/".$admin;
			print "<script type=\"text/javascript\">";
			print "alert('The email address is already registered');";
			echo "window.location.href = '" . base_url($string)."';";
			print "</script>"; 
		}
		else
		{
			$fullname = $_POST['fullname'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			$occupation = $_POST['occupation'];
			$birthdate = $_POST['birthdate'];
			if ($_POST['selectbasic'] == 1) {
				$status = "Single";
			} else if ($_POST['selectbasic'] == 2) {
				$status = "In a relationship";
			} else if ($_POST['selectbasic'] == 3) {
				$status = "Engaged";
			} else if ($_POST['selectbasic'] == 4) {
				$status = "Married";
			} else if ($_POST['selectbasic'] == 5) {
				$status = "In a civil union";
			} else if ($_POST['selectbasic'] == 6) {
				$status = "It is complicated";
			} else if ($_POST['selectbasic'] == 7) {
				$status = "Separated";
			} else if ($_POST['selectbasic'] == 8) {
				$status = "Divorced";
			} else if ($_POST['selectbasic'] == 9) {
				$status = "Widowed";
			} else if ($_POST['selectbasic'] == 10) {
				$status = "In a domestic partnership";
			}
			$data_insert = array(
				'fullname' => $fullname,
				'password' => $password,
				'email' => $email,
				'relationship' => $status,
				'occupation' => $occupation,
				'birthdate' => $birthdate,
					
			);
			$res = $this->mymodel->updateData('registered_user',$data_insert,array('username'=>$username));
			if($res>=1) {
				$string = 'admin/reloadHomePage/'.$admin;
				redirect($string);
			} else {
				//echo "insert gagal";
			}
		}
	}

	public function viewUserDetail($user,$administrator) {
		$data = $this->mymodel->getSpesificUser($user);
		$admin = $this->mymodel->getAdmin($administrator);
		$this->load->view('viewuserpage',array('data'=>$data, 'admin'=>$admin));
	}

}
