<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class Productmodel extends CI_Model 
    {

        public function listeprod()
        {   
            $sql = "select * from objet";
            $query = $this->db->query($sql);
            $result = array();

            foreach($query->result_array() as $row)
            {
                $result[] = $row;
            }
            return $result;
        }
        public function listgroupcategorie($idcategorie)
        {
            $sql="select * from Sous_categorie where id_categorie=%s";
            $sprint=sprintf($sql,$idcategorie);
            $query = $this->db->query($sprint);
            $result = array();

            foreach($query->result_array() as $row)
            {
                $result[] = $row;
            }
            return $result;
        }
      
        public function newcategorie($nomcate)
        {
            $sql="insert into categorie values(null,'%s')";
            $sprint=sprintf($sql,$this->db->escape($nomcate));
            $query = $this->db->query($sql);
        }
        public function addcategory()
        {

        }
    }
?>