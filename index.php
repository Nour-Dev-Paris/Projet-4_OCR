<?php 

session_start();

require('C:\wamp64\www\Projet4\controller\frontend.php');
require('C:\wamp64\www\Projet4\controller\backend.php');

try 
{
    if(isset($_GET['action'])) {
        if ($_GET['action'] == 'homePage') {
            $pageHome = new FrontendController();
            $home = $pageHome->homePage();
            return $home;
        }
        elseif($_GET['action'] == 'loginAdmin') {
            $adminLogin = new BackendController();
            $admin = $adminLogin->loginAdmin();
            return $admin;
        }
        elseif($_GET['action'] == 'createPost') {
            $postCreate = new BackendController();
            $post = $postCreate->createPost();
            return $post;
        }
        elseif($_GET['action'] == 'updateView') {
            $updateView = new BackendController();
            $adminUpdateView = $updateView->UpdateView();
            return $adminUpdateView;
        }
        elseif($_GET['action'] == 'updatePostView') {
            
            if(isset($_GET['id']) && $_GET['id'] > 0) {
                $updatePostView = new BackendController();
                $viewUpdatePost = $updatePostView->submitUpdateView();
            } else {
                echo 'aucun identifiant de billet trouvé';
            }
        }
        elseif($_GET['action'] == 'updatePost') {
            $updatePost = new BackendController();
            $updated = $updatePost->submitUpdate($_POST['title'], $_POST['content'], $_GET['id']);
            return $updated;
        }
        elseif($_GET['action'] == 'adminView') {
            $adminReturn = new BackendController();
            $return = $adminReturn->adminView();
            return $return;
        }
        elseif ($_GET['action'] == 'postAdmin') {

            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                
                $submitPostAdmin = new BackendController();
                $submitPostAdmin->newPost($_POST['title'], $_POST['content']);
                exit;

            }
            else {
                
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        elseif ($_GET['action'] == 'listPosts') {
            $listPost = new FrontendController();
            $posts = $listPost->listPosts();
            return $posts;
        }
    }
    else
    {
        $pageHome = new FrontendController();
        $home = $pageHome->homePage();
        return $home;
    }
}
catch(Exception $e) 
{
    echo 'Erreur : ' . $e->getMessage();
}