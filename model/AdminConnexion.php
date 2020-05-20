<?php 

namespace Projet4\model;

require_once('..\Projet4\model\Manager.php');

class AdminConnexion extends Manager // Récupère les ID de l'Admin dans la BDD
{
    public function getAdminLogin() 
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, identifiant, pass FROM admin');
        $resultat = $req->fetch();
        
        return $resultat;
    }
}