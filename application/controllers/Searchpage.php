<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Searchpage extends CI_Controller {

	public function index()
	{
		$key = $_POST['searchkey'];
		$username = $_POST['username'];
		$user = $this->mymodel->getSpesificUser($username);
		$data = $this->mymodel->searchUsername($key);
		$this->load->view('searchuser',array('user'=>$user,'data'=>$data));
	}

	public function searchAll($username) {
		$user = $this->mymodel->getSpesificUser($username);
		$data = $this->mymodel->getUser();
		$this->load->view('searchuser',array('user'=>$user,'data'=>$data));
	}

}
