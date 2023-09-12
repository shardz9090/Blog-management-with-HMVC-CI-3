<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
	public function __construct()
	{
		// Load the constructer from MY_Controller
		parent::__construct();
	}
	public function index()
	{
		$data['blogs'] = $this->blog_model->viewblogs();
		$data['main'] = "index_view";
		$this->load->view('layouts/main_view', $data);
	}
}
