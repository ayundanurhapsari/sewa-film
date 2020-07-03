<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sewa extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('m_sewa');
	}

	public function index() {
    	$data['val']=$this->m_sewa->get(); /**ambil data untuk dropdown nama film*/
        $this->load->view('templates/header');
        $this->load->view('sewa', $data);
    }

	public function add() {
		$id_sewa = $this->input->post('id_sewa');
		$this->m_sewa->tambah_sewa();
	}
}