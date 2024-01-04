<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index()
		{
			$array_items = array('username','password','admin'); 
			$this->session->unset_userdata($array_items);
			redirect("Login");
		} 
}
