<?php
if (!defined('BASEPATH'))
    exit('No direct script acces allowed');

class Model extends CI_Model
{
    public function checkLogin($mail, $mdp)
    {
        $valiny = false;
        $query = $this->db->query('SELECT id_utilisateur,nom,email,mdp FROM Utilisateur');
        foreach ($query->result_array() as $row) {
            if ($mail == $row['email'] && $mdp == $row['mdp']) {
                $valiny = true;
                $_SESSION['iduser']= $row['id_utilisateur'];
            }
        }
        return $valiny;
    }
    public function listcategorie()
    {
        $sql="select * from categorie";
        $query = $this->db->query($sql);
        $result = array();

        foreach($query->result_array() as $row)
        {
            $result[] = $row;
        }
        return $result;
    }
    public function listobjects(){
        $sql="select * from v_allobjects2 where id_utilisateur!=%s";
        $sprint=sprintf($sql,$_SESSION['iduser']);
        $query = $this->db->query($sprint);
        $result = array();

        foreach($query->result_array() as $row)
        {
            $result[] = $row;
        }
        return $result;
    }
    public function listproperobjects(){
        $sql="select * from v_allobjects2 where id_utilisateur=%s";
        $sprint=sprintf($sql,$_SESSION['iduser']);
        $query = $this->db->query($sprint);
        $result = array();

        foreach($query->result_array() as $row)
        {
            $result[] = $row;
        }
        return $result;
    }
    public function detailobjet($idobj){
        $sql="select * from v_allobjects2 where id_objet=%s";
        $sprint=sprintf($sql,$idobj);
        $query = $this->db->query($sprint);
        $row = $query->row_array();
        return $row;
    }
    public function proposer($iddemandeur,$idproprio,$idobjetd,$idobjeto){
        $sql="insert into proposition values (null,%s,%s,%s,%s,0)";
        $sprint=sprintf($sql,$iddemandeur,$idproprio,$idobjetd,$idobjeto);
        $query = $this->db->query($sprint);
    }
}
?>