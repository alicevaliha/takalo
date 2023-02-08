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
    public function inscription($nom,$mail,$mdp)
    {
        $sql = "insert into Utilisateur(nom,email,mdp) values(%s,%s,%s)";
        $sql = sprintf($sql, $this->db->escape($nom), $this->db->escape($mail), $this->db->escape($mdp));
        $query = $this->db->query($sql);
        
    }
    public function listcategorie()
    {
        $sql="select * from Categorie";
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
        $sql="insert into Proposition values (null,%s,%s,%s,%s,0)";
        $sprint=sprintf($sql,$iddemandeur,$idproprio,$idobjetd,$idobjeto);
        $query = $this->db->query($sprint);
    }
    public function listprops(){
        $sql="select * from v_propositions where id_proprio=%s";
        $sprint=sprintf($sql,$_SESSION['iduser']);
        $query = $this->db->query($sprint);
        $result = array();

        foreach($query->result_array() as $row)
        {
            $result[] = $row;
        }
        return $result;
    }
    
    function acceptprop($idprop){
        
        $sql="update Proposition set stat=1 where id_Proposition='%s' ";
        $sprint=sprintf($sql,$idprop);
        $query2 = $this->db->query($sprint);

        
        
        $sql2 = "select * from Proposition where id_Proposition='%s'";
        $sprint2=sprintf($sql2,$idprop);
        $query = $this->db->query($sprint2);
       // $query = $this->db->query($sprint);
        $result = $query->row_array();
        //return $row;
        //return $result;
        $demandeur = $result['id_demande'];
        $objetdemande = $result['id_objetdemande'];
        $accepteur = $result['id_proprio'];
        $objetoffert = $result['id_objetoffert'];

        $sqlautre="update Proposition set stat=2 where id_Proposition !='%s' and id_objetdemande=%s ";
        $sprintautre=sprintf($sql,$objetdemande);
       
        $queryautre = $this->db->query($sprintautre);

        $sql3="update objet set id_proprietaire=%s , stat=1 where id_objet=%s";
        $sql4="update objet set id_proprietaire=%s, stat=1 where id_objet=%s";
        $sprint3=sprintf($sql3,$demandeur,$objetdemande);
        $sprint4=sprintf($sql4,$accepteur,$objetoffert);
        $query3 = $this->db->query($sprint3);
        $query4 = $this->db->query($sprint4);
        //return $sprint3;

        $sqlex="insert into exchanges values (%s,now())";
        $sprintex=sprintf($sqlex,$idprop);
        $queryex = $this->db->query($sprintex);

        
    }
    function declineprop($idprop){
        
        $sql="update Proposition set stat=2 where id_Proposition='%s' ";
        $sprint=sprintf($sql,$idprop);
        $query = $this->db->query($sprint);
        
    }
    public function listbycat($cat){
        $sql="select * from v_allobjects2 where id_cat=%s";
        $sprint=sprintf($sql,$cat);
        $query = $this->db->query($sprint);
        $result = array();

        foreach($query->result_array() as $row)
        {
            $result[] = $row;
        }
        return $result;
    }
    public function membersnum(){
        $sql="select count(id_utilisateur) as membres from Utilisateur;";
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row;
    }
    public function exchangesnum(){
        $sql="select count(moment) as exchanges from exchanges;";
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row;
    }
    
    public function researchmodel($cat,$motclé){

        $sql = "SELECT descri AS motcle, id_objet from Objet where id_cat=%s";
        $sprint= sprintf($sql,$this->db->escape($cat));
        $splits = $this->db->query($sprint);
        $result = array();
        $stack = array();

        foreach($splits->result_array() as $row)
        {
            $result[] = $row;
        }
       // return $result;
       
        $nbresult = count($result);
        
        for($i=0;$i<$nbresult;$i++){
            $all=explode(" ",$result[$i]['motcle']);
            //return $all;
            $nbmots=count($all);
            for($o=0;$o<$nbmots;$o++){
                if(strcasecmp($motclé,$all[$o])==0){
                    array_push($stack,$result[$i]['id_objet']);
                }else{}
            }
        }
        // $stack= array();
        // $stack = explode(" ",$result['motcle'])
        // foreach($stack){
        //     if(str_contains($motclé,$res['motclé'])){
        //         array_push($stack,$res['id_objet']);
        //     }else{}
        // }

        $objets = implode(",", $stack);
        //return $objets;
        $sqlbis="SELECT * from v_allobjects2 where id_objet in (%s)";
        $sprint2=sprintf($sqlbis,$objets);
        $query2 = $this->db->query($sprint2);
        $result2 = array();

        foreach($query2->result_array() as $row)
        {
            $result2[] = $row;
        }
        if(count($result2)==0){
            return "string";
        }else{
            return $result2;
        } 
    }
    function historique($idobjet){
        $sql="select * from historique where id_objet=%s";
        $sprint=sprintf($sql,$idobjet);
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row;
    }
    // public functio
    // public function acceptexchange(){
    //     $idpropo=$this->
    //     $sql=
    // }
}
?>