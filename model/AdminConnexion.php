<?php 

require_once('..\Projet4\model\Manager.php');

class AdminConnexion extends Manager
{
    public function getAdminLogin() 
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT identifiant, pass FROM admin');
        $resultat = $req->fetch();
        
        return $resultat;
    }
}