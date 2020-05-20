<?php // Controlleur gérant la partie Frontend 
     
use \Projet4\model\Autoloader;  // Appel des class des fichiers Modèle
use \Projet4\model\AdminConnexion;
use \Projet4\model\PostManage;
use \Projet4\model\CommentManage;
use \Projet4\model\ReportManage;

require_once '..\Projet4\model\Autoloader.php';
Autoloader::register();


class FrontendController
{
    function homePage()
    {
        require('..\Projet4\view\frontend\listTicketsView.php');
    }
    
    
    public function listPosts() // Affiche la page d'accueil avec les articles crées
    {
        $postManager = new PostManage();
        $posts = $postManager->getPosts();
        return $posts;
        require('..\Projet4\view\frontend\listTicketsView.php');
    }
    
    function post() // Affiche la page d'un article avec les commentaires liées
    {
        $postManage = new PostManage();
        $commentManage = new CommentManage();
        
        $post = $postManage->getPost($_GET['id']);
        $comments = $commentManage->getComments($_GET['id']);
        
        require('..\Projet4\view\frontend\postView.php');
        exit;
    }
    
    function addComment($postId, $author, $comment)
    {
        $commentManage = new CommentManage();
        
        $lineComment = $commentManage->postComment($postId, $author, $comment);
        
        if ( $lineComment === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }
    
    
    function postReport($commentId) //Permet le signalement d'un commentaire
    {
        $reportManage = new ReportManage();
        
        $reported = $reportManage->postReports($commentId);
        
        header('Location: index.php?action=postReportView&id=' . $commentId . '&report=success');
        exit;
    }

    function postReportView() // Message de confirmation d'un commentaire signalé
    {
        $reportManage = new ReportManage();
        $getReportView = $reportManage->getReport($_GET['id']);  
        
        require('..\Projet4\view\frontend\postReport.php');
    }
}