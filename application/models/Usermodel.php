<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class Usermodel extends CI_Model 
    {
        // public function find()
        // {
        //     return array('nom'=>'Hariaja','Prenom'=>'Andrianandrasana');
        // }

        // public function listeProduit()
        // {   
        //     $_SESSION['hariaja'] = "bonjour";
        //     $sql = "select * from marque";
        //     $query = $this->db->query($sql);
        //     $result = array();

        //     foreach($query->result_array() as $row)
        //     {
        //         $result[] = $row;
        //     }
        //     return $result;
        // }
        // public function login(){ 
        //     $sql = "select * from marque";
        //     $query = $this->db->query($sql);
        //     $result = array();

        //     foreach($query->result_array() as $row)
        //     {
        //         $result[] = $row;
        //     }
        //     return $result;
        // }
        public function checkLogin($mail='admin',$pass='123')
        {
            $check = false;
            if($mail == 'test@gmail.com' && $pass == '123')
            {
                $check = true;
            }
            return $check;
        }
    }
?>