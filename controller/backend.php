<?php

require_once('..\Projet4\model\AdminConnexion.php');
require_once('..\Projet4\model\PostManage.php');

class BackendController
{
    function loginAdmin() 
    {
        $adminConnexion = new AdminConnexion();
        $resultat = $adminConnexion->getAdminLogin();
        
        if (isset($_POST['pass']) AND $_POST['pass'] == $resultat['pass'] AND isset($_POST['identifiant']) AND $_POST['identifiant'] == $resultat['identifiant']) {
            
            sleep(1);
            
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['identifiant'] = $resultat['identifiant'];
            $_SESSION['pass'] = $resultat['pass'];
            
            require('..\Projet4\view\frontend\adminPanel.php');
        }
        else {
            echo'erreur';
        }
     } 

    function createPost()
    {
        require('..\Projet4\view\backend\create.php');
    }

    function adminView()
    {
        require('..\Projet4\view\frontend\adminPanel.php');
    }
    
    function commentManageView()
    {
        require('..\Projet4\view\backend\comments_manage.php');
    }
    
    function UpdateView()
    {
        require('..\Projet4\view\backend\tickets_manage.php');
    }
    
    public function newPost($title, $content)
    {
//        $postManage = new PostManage();
//        $newPost = $postManage->insertPost($title, $content);
        $postManage = new PostManage();
        $newPostAdmin = $postManage->insertPost($title, $content);
       
        header('Location: index.php?action=createPost&new-post=success');
        exit;
    }
    
    function submitUpdateView()
    {
        $postManage = new PostManage();
        $post = $postManage->getPost($_GET['id']);
        
        require('..\Projet4\view\backend\update.php');
    }
    
    function submitUpdate($title, $content, $postId)
    {
        $postManage = new PostManage();
        $updated = $postManage->updatePost($title, $content, $postId);
//        return $updated;
        
        header('Location: index.php?action=updateView&update-post=success');
        exit;
    }
    
    function deletePost($postId)
    {
        $deletePostManage = new PostManage();
        $postDelete = $deletePostManage->deletePost($postId);
//        return $postDelete;
        
        header('Location: index.php?action=loginAdmin&delete-post=success');
        exit;
    }

    function getReports()
    {
        $getReportsView = new ReportManage();
        $reportsView = $getReportsView->getReports();
        return $reportsView;
    }
    
    function submitReportView()
    {
        $reportManage = new ReportManage();
        $getReportView = $reportManage->getReport($_GET['id']);
        
        require('..\Projet4\view\backend\update_report.php');
    }
    
    function reportUpdate($author, $comment, $postId)
    {
        $reportManage = new ReportManage();
        $updateReport = $reportManage->updateReport($author, $comment, $postId);
        
        header('Location: index.php?action=commentManageView&update-post=success');
        exit;
    }
    
    function deleteComment($commentId)
    {
        $deleteCommentManage = new ReportManage();
        $commentDelete = $deleteCommentManage->deleteComment($commentId);

        header('Location: index.php?action=commentManageView&delete-post=success');
        exit;
    }
}