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
       
        Header('Location: index.php?action=createPost&new-post=success');
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
        return $updated;
        Header('Location : index.php?action=adminView&update-post=success');
    }
    
    function deletePost($postId)
    {
        $deletePostManage = new PostManage();
        $postDelete = $deletePostManage->deletePost($postId);
        return $postDelete;
        
        Header('Location : index.php?action=adminView&delete-post=success');
    }
    
}
//            $isPassCorrect = password_verify($_POST['pass'], $resultat['pass']);
//            if (!$resultat)
//            {
//                echo 'erreur';
//                //header('Location: index.php?action=homePage');
//            }
//            else
//            {
//                if ($isPassCorrect) {
//                    $_SESSION['identifiant'] = $resultat['identifiant'];
//                    $_SESSION['pass'] = $resultat['pass'];
//                    require('C:\wamp64\www\Projet 4\view\frontend\ticketView.php');
//                }
//                else {
//                    echo 'erreur';
//                    //header('Location: index.php?action=homePage');
//                }
//            }
  