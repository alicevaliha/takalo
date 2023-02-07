<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();

    }
    public function index()
	{
		// $data = array();
		// $data['listeProduit'] = $this->Model->listeProduit();
		$data['mail'] = $this->session->userdata('mail');
        // $data['content'] = 'page/home';
		$this->load->view('essai',$data);

     }
    
}