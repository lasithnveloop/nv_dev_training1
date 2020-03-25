<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	// public function __construct(){
	// 	$this->load->database('default');
	// }

	public function index()
	{
		$this->load->view('welcome_message', ['data' => $this->select()]);
	}

	public function post(){
		$this->load->view('addemployee');
	}

	public function edit($id){

		$this->load->view('update',['data' => $this->selectW($id)]);
	}

	public function add(){
		$this->form_validation->set_rules('fullname', 'Full Name', 'required');
		$this->form_validation->set_rules('contact', 'Contact', 'required');

		if ($this->form_validation->run())
		{
			$data = $this->input->post();
			unset($data['submit']);
			$sql = "Insert into tbl_employee (`emp_name`, `emp_role`, `emp_contact`) values (?,?,?)";
			$query = $this->db->query($sql,array($data['fullname'],$data['role'],$data['contact']));
			$this->load->view('welcome_message',['data' => $this->select()]);
		}
		else
		{
			$this->load->view('addemployee');
		}

	}
	public function update(){
		$this->form_validation->set_rules('fullname', 'Full Name', 'required');
		$this->form_validation->set_rules('contact', 'Contact', 'required');
		$this->form_validation->set_rules('id_P', 'id_P', 'required');

		if ($this->form_validation->run())
		{
			$data = $this->input->post();
			unset($data['submit']);
			$sql = "update tbl_employee set `emp_name` = ?, `emp_role` = ?, `emp_contact` = ? where id = ?";
			$query = $this->db->query($sql,array($data['fullname'],$data['role'],$data['contact'],$data['id_P']));
			$this->load->view('welcome_message',['data' => $this->select()]);
		}
		else
		{
			$this->load->view('addemployee');
		}

	}

	private function select(){
		$sql = "select * from tbl_employee";
		$query = $this->db->get('tbl_employee');
		if($query->num_rows() > 0 ){
			return $query->result();
		}
	}
	private function selectW($id){
		$sql = "select * from tbl_employee where id = ? limit 1";
		$query = $this->db->query($sql,[$id]);
		if($query->num_rows() > 0 ){
			return $query->row();
		}
	}

	public function delete($id){
		$sql = "delete from tbl_employee where id = ?";
		$query = $this->db->query($sql,[$id]);
		$this->load->view('welcome_message',['data' => $this->select()]);
	}

	public function pdfprint(){
		// $this->load->view('welcome_message',['data' => $this->select()]);
		$this->load->model('Tpdf');
		// $this->Tpdf->create();
		$this->Tpdf->create($this->select());
	}
}

