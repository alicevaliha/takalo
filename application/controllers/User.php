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
      $data['categories']=$this->Model->listcategorie();
      $data['content'] = 'user/acceuil';
		$this->load->view('user',$data);

     }
     public function utilisateurs()
	{
		$data = array();
		$data['objectlist'] = $this->Model->listobjects();
		//$data['mail'] = $this->session->userdata('mail');
        $data['content'] = 'user/utilisateurs';
        $data['categories']=$this->Model->listcategorie();
		$this->load->view('user',$data);

     }
     public function productdetailperso($idobj){

        $data['objdetails'] = $this->Model->detailobjet($idobj);
        $data['content'] = 'user/detailsperso';
        $data['categories']=$this->Model->listcategorie();

        $this->load->view('user',$data);

     }
     public function productdetail($idobj){

        $data['objdetails'] = $this->Model->detailobjet($idobj);
        $data['content'] = 'user/details';
        $data['categories']=$this->Model->listcategorie();

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
        $data['categories']=$this->Model->listcategorie();

        $this->load->view('user',$data);

     }
     public function proposer(){
        $idd=$_SESSION['iduser'];
        $iprop=$this->input->post("iprop");
        $idobjd=$this->input->post("objd");
        $idobjoff=$this->input->post("objoff");
        $this->Model->proposer($idd,$iprop,$idobjd,$idobjoff);
        $data['content']='user/exchangedone';
        $data['categories']=$this->Model->listcategorie();

        $this->load->view('user',$data);
     }
     public function propositions(){
        $data['proposition'] = $this->Model->listprops();
        $data['content']='user/propositions';
        $data['categories']=$this->Model->listcategorie();

        $this->load->view('user',$data);
     }
     public function research(){
      $this->load->model('Model');
      $cat=$this->input->get("categorie");
      $mot=$this->input->get("search");
      $data = array();
      if($this->Model->researchmodel($cat,$mot) == "string"){
         $data['listres'] = "pas de résultat";
         $data['content'] = 'user/dump';
         $data['categories']=$this->Model->listcategorie();
         $this->load->view('user',$data);
      }else{
         $data['listres'] = $this->Model->researchmodel($cat,$mot);
         $data['content'] = 'user/resultat';
         $data['categories']=$this->Model->listcategorie();
         $this->load->view('user',$data);
      }
      
      }
      // public function researchbis(){
      //    $this->load->model('Model');
      //    $cat=$this->input->get("categorie");
      //    $mot=$this->input->get("search");
      //    $data = array();
      //    $data['listres'] = $this->Model->researchmodel($cat,$mot);
      //    $data['content'] = 'user/dump';
      //    $this->load->view('user',$data);

      // }
      
    
}