<?php
    require_once('C:\wamp64\www\Projet4\model\AdminConnexion.php');
    require_once('C:\wamp64\www\Projet4\model\PostManage.php');

class FrontendController
{
    function homePage()
    {
        require('C:\wamp64\www\Projet4\view\frontend\listTicketsView.php');
    }
    
    public function listPosts()
    {
        $postManager = new PostManage();
        $posts = $postManager->getPosts();
        return $posts;
        require('view/frontend/listTicketsView.php');
    }
}
//
//    function loginAdmin() 
//    {
//        $resultat = $this->getAdminLogin();
//        $isPassCorrect = password_verify($_POST['pass'], $resultat['pass']);
//
//        if (!$resultat)
//        {
//            header('Location: index.php?action=homePage');
//        }
//        else
//        {
//            if ($isPassCorrect) {
//                $_SESSION['identification'] = $resultat['identification'];
//                $_SESSION['pass'] = $pass;
//                header('Location: C:\wamp64\www\Projet 4\view\frontend\ticketView.php');
//                exit();
//            }
//            else {
//                header('Location: index.php?action=homePage');
//            }
//        }
//    }