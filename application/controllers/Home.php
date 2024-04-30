<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	function __construct()
	{
		date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
		$this->load->library('session');
	}

	function index()
	{
		$data['list'] = [];
		$this->load->view('page/index_header_temp', $data);
		$this->load->view('page/company_temp', $data);
		$this->load->view('page/index_footer_temp', $data);
	}

	function costcenter()
	{
		$data['list'] = [];
		$this->load->view('page/index_header_temp', $data);
		$this->load->view('page/costcenter_temp', $data);
		$this->load->view('page/index_footer_temp', $data);
	}

	function dept()
	{
		$data['list'] = [];
		$this->load->view('page/index_header_temp', $data);
		$this->load->view('page/dept_temp', $data);
		$this->load->view('page/index_footer_temp', $data);
	}

	function grade()
	{
		$data['list'] = [];
		$this->load->view('page/index_header_temp', $data);
		$this->load->view('page/grade_temp', $data);
		$this->load->view('page/index_footer_temp', $data);
	}

	function jabatan()
	{
		$data['list'] = [];
		$this->load->view('page/index_header_temp', $data);
		$this->load->view('page/jabatan_temp', $data);
		$this->load->view('page/index_footer_temp', $data);
	}

	function education()
	{
		$data['list'] = [];
		$this->load->view('page/index_header_temp', $data);
		$this->load->view('page/education_temp', $data);
		$this->load->view('page/index_footer_temp', $data);
	}
}
