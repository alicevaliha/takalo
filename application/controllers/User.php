<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');

    }
    public function index()
	{
		$data = array();
		$data['objectlist'] = $this->Model->listproperobjects();
		//$data['mail'] = $this->session->userdata('mail');
        $data['content'] = 'user/acceuil';
		$this->load->view('user',$data);

     }
     public function utilisateurs()
	{
		$data = array();
		$data['objectlist'] = $this->Model->listobjects();
		//$data['mail'] = $this->session->userdata('mail');
        $data['content'] = 'user/utilisateurs';
		$this->load->view('user',$data);

     }
     public function productdetailperso($idobj){

        $data['objdetails'] = $this->Model->detailobjet($idobj);
        $data['content'] = 'user/detailsperso';
        $this->load->view('user',$data);

     }
     public function productdetail($idobj){

        $data['objdetails'] = $this->Model->detailobjet($idobj);
        $data['content'] = 'user/details';
        $this->load->view('user',$data);

     }
     public function gotoexchange(){

        $idobj = $this->input->post("idobj");
        $id= $this->input->post("id");
        $data['idobj']=$idobj;
        $data['idproprio']=$id;
        $data['content']='user/exchange';
        $data['objectlist'] = $this->Model->listproperobjects();
        $data['objdetails'] = $this->Model->detailobjet($idobj);
        $this->load->view('user',$data);

     }
    
}