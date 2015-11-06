<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public function index()
	{
		$data = $this->mymodel->getUser();
		$this->load->view('webview',array('data'=>$data));
	}

	public function insertUser() {
		$fullname = $_POST['fullname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
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
			'username' => $username,
			'password' => $password,
			'email' => $email,
			'relationship' => $status 
		);
		$res = $this->mymodel->insertData('registered_user',$data_insert);
		if($res>=1) {
			$string = 'homepage/reloadHomePage/'.$username;
			redirect($string);
		} else {
			//echo "update gagal";
		}
	}

}
