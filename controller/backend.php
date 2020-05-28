<?php // Controlleur gérant la partie Backend

use \Projet4\model\Autoloader;
use \Projet4\model\AdminConnexion;
use \Projet4\model\PostManage;
use \Projet4\model\CommentManage;
use \Projet4\model\ReportManage;

require_once '..\Projet4\model\Autoloader.php';
Autoloader::register();


class BackendController
{
    function loginAdmin() //Compare l'ID et le mot de passe hashé et crée les ID Session si tout est ok
    {
        $adminConnexion = new AdminConnexion();
        $resultat = $adminConnexion->getAdminLogin();
        
        $passCorrect = password_verify($_POST['pass'], $resultat['pass']);

        if (isset($_POST['pass']) AND $_POST['pass'] == $passCorrect AND isset($_POST['identifiant']) AND $_POST['identifiant'] == $resultat['identifiant']) {
            
            sleep(1);
            
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['identifiant'] = $resultat['identifiant'];
            $_SESSION['pass'] = $resultat['pass'];
            
            require('..\Projet4\view\backend\adminPanel.php');
        }
        else 
        {
            echo 'Admin non identifié !';
            
            sleep(2);
            
            header('Location: index.php?action=homePage');
        }
     } 
     
    function adminView() // Appel la vue de l'adminPanel
    {
        require('..\Projet4\view\backend\adminPanel.php');
    }
     
    function createPost() // Appel la vue permettant de créer un article
    {
        require('..\Projet4\view\backend\create.php');
    }

    
    function commentManageView() // Appel la vue de la gestion des commentaires
    {
        require('..\Projet4\view\backend\comments_manage.php');
    }
    
    function UpdateView() // Appel la vue de la gestion des articles
    {
        require('..\Projet4\view\backend\tickets_manage.php');
    }
    
    public function newPost($title, $content) // Ajout d'un article
    {

        $postManage = new PostManage();
        $newPostAdmin = $postManage->insertPost($title, $content);
       
        header('Location: index.php?action=adminView&new-post=success');
        exit;
    }
    
    function submitUpdateView() // Appel de la vue d'un article à modifier avec son ID
    {
        $postManage = new PostManage();
        $post = $postManage->getPost($_GET['id']);
        
        require('..\Projet4\view\backend\update.php');
    }
    
    function submitUpdate($title, $content, $postId) // Modifie un article déjà crée dans la BDD
    {
        $postManage = new PostManage();
        $updated = $postManage->updatePost($title, $content, $postId);
//        return $updated;
        
        header('Location: index.php?action=updateView&update-post=success');
        exit;
    }
    
    function DeleteTicketSubmit() // Amène à la page de confirmation de suppression d'un article
    {
        $postManage = new PostManage();
        $post = $postManage->getPost($_GET['id']);
        
        require('..\Projet4\view\backend\delete_ticket.php');
    }
    
    function deletePost($postId) // Supprime un article de la BDD
    {
        $deletePostManage = new PostManage();
        $postDelete = $deletePostManage->deletePost($postId);
                
        header('Location: index.php?action=adminView&delete-post=success');
        exit;
    }
    
    function submitReportView() // Récupère les commentaires signalés avec leurs ID
    {
        $reportManage = new ReportManage();
        $getReportView = $reportManage->getReport($_GET['id']);
        
        require('..\Projet4\view\backend\update_report.php');
    }
    
    function getReports()
    {
        $getReportsView = new ReportManage();
        $reportsView = $getReportsView->getReports();
        return $reportsView;
    }
    
    function reportUpdate($author, $comment, $postId) // Modifie un commentaire signalé (update de la BDD)
    {
        $reportManage = new ReportManage();
        $updateReport = $reportManage->updateReport($author, $comment, $postId);
        
        header('Location: index.php?action=commentManageView&update-post=success');
        exit;
    }
    
    function deleteCommentView() // Amène à la page de confirmation de suppression de commentaire
    {
        $deleteCommentView = new ReportManage();
        $getCommentView = $deleteCommentView->getReport($_GET['id']);
        
        require('..\Projet4\view\backend\delete_comment.php');
    }
    
    function deleteComment($commentId)  // Supprime un commentaire signalé de la BDD
    {
        $deleteCommentManage = new ReportManage();
        $commentDelete = $deleteCommentManage->deleteComment($commentId);

        header('Location: index.php?action=commentManageView&delete-post=success');
        exit;
    }
    
    function sessionStop() // Supprime la session lors de la deconnexion de l'Admin
    {
        session_destroy();
        
        header('Location: index.php?action=homePage&deconnexion=sucess');
        exit;
    }
}