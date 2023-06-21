<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
        $this->load->library('session');
	}

	function index(){
		$data['list'] = [];
		$this->load->view('page/index_header_temp', $data);
		$this->load->view('page/company_temp', $data);
		$this->load->view('page/index_footer_temp', $data);
	}
}
