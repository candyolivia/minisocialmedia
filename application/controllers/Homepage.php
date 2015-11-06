<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function index()
	{
		$username = $_POST['username'];
		$data = $this->mymodel->getSpesificUser($username);
		$friend = $this->mymodel->getUser();
		$this->load->view('home',array('data'=>$data,'friend'=>$friend));
	}

	public function reloadHomePage($username)
	{
		$data = $this->mymodel->getSpesificUser($username);
		$friend = $this->mymodel->getUser();
		$this->load->view('home',array('data'=>$data,'friend'=>$friend));
	}

	public function viewFriendDetail($user,$username) {
		$data = $this->mymodel->getSpesificUser($user);
		$user = $this->mymodel->getSpesificUser($username);
		$friend = $this->mymodel->getUser();
		$this->load->view('viewFriendDetail',array('data'=>$data, 'user'=>$user, 'friend'=>$friend));
	}

	public function searchUser() {
		$key = $_POST['searchkey'];
		$data = $this->mymodel->searchUsername($key);
		$this->load->view('searchuser',array('data'=>$data));
	}

	public function settingUser($username)
	{
		$data = $this->mymodel->getSpesificUser($username);
		$this->load->view('settingpage',array('data'=>$data));
	}

	public function updateUser($username) {

		$this->load->library('form_validation');
		$this->form_validation->set_rules('fullname', 'Fullname', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$string = "index.php/homepage/settingUser/".$username;
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

			$config['upload_path'] = './images/profpic/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2000';
			$config['max_width'] = '2000';
			$config['max_height'] = '2000';
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload',$config);

			if (!($this->upload->do_upload('profilepicture'))) {
				echo $this->upload->display_errors('<p>','</p>');
			} else {
				$data_upload_files = $this->upload->data();
				$this->load->database();
				$this->load->model('mymodel');
				$photo_path = "images/profpic/".$data_upload_files['file_name'];
				echo $photo_path;
			}

			$data_insert = array(
				'fullname' => $fullname,
				'password' => $password,
				'email' => $email,
				'relationship' => $status,
				'occupation' => $occupation,
				'birthdate' => $birthdate,
				'photoprofile' => $photo_path
					
			);
			$res = $this->mymodel->updateData('registered_user',$data_insert,array('username'=>$username));
			if($res>=1) {
				$string = 'homepage/reloadHomePage/'.$username;
				redirect($string);
			} else {
				//echo "insert gagal";
			}
		}
	}
}
