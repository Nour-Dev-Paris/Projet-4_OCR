<?php // Routeur - Gestion des requêtes - Appel du bon Controlleur

session_start();

require('..\Projet4\controller\frontend.php');
require('..\Projet4\controller\backend.php');

try 
{
    if(isset($_GET['action'])) {
        if ($_GET['action'] == 'homePage') {
                $pageHome = new FrontendController();
                $home = $pageHome->homePage();
                return $home;
        }
        elseif ($_GET['action'] == 'loginAdmin') {
            $adminLogin = new BackendController();
            $admin = $adminLogin->loginAdmin();
            return $admin;
        }
        elseif($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $postView = new FrontendController();
                $viewPost = $postView->post();
                
                return $viewPost;
            }
        }
        elseif($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $addComment = new FrontendController();
                    $addComment->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
            }
        }
        elseif ($_GET['action'] == 'report') {
            $reportComment = new FrontendController();
			$reportComment->postReport($_GET['id'], $_GET['comment_id']);
		}
        elseif ($_GET['action'] == 'postReportView') {
                $postReportView = new FrontendController();
                $reportView = $postReportView->postReportView();
                return $reportView;
            
                if(isset($_GET['id']) && $_GET['id'] > 0) {
                    $postReportView = new FrontendController();
                $reportView = $postReportView->postReportView();
                } else {
                    throw new Exception('Aucun identifiant de commentaire envoyé');
                }
        }
        elseif (isset($_SESSION) && $_SESSION['id'] == '1') {
            
            if($_GET['action'] == 'createPost') {
                $postCreate = new BackendController();
                $post = $postCreate->createPost();
                return $post;
            }
            elseif ($_GET['action'] == 'postAdmin') {

                if (!empty($_POST['title']) && !empty($_POST['content'])) {

                    $submitPostAdmin = new BackendController();
                    $submitPostAdmin->newPost($_POST['title'], $_POST['content']);
                }
                else {

                    throw new Exception('Tous les champs ne sont pas remplis');
                }
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
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            }
            elseif($_GET['action'] == 'updatePost') {
                $updatePost = new BackendController();
                $updated = $updatePost->submitUpdate($_POST['title'], $_POST['content'], $_GET['id']);
                return $updated;
            }
            elseif($_GET['action'] == 'deletePostView') {
                if(isset($_GET['id']) && $_GET['id'] > 0) {
                    $removePostView = new BackendController();
                    $postDeleteView = $removePostView->DeleteTicketSubmit();
                }
                else 
                {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            }
            elseif($_GET['action'] == 'deletePost') {
                $removePost = new BackendController();
                $postDelete = $removePost->deletePost($_GET['id']);
                return $postDelete;
            }
            elseif($_GET['action'] == 'adminView') {
                $adminReturn = new BackendController();
                $return = $adminReturn->adminView();
                return $return;
            }
            elseif($_GET['action'] == 'commentManageView') {
                $commentViewManage = new BackendController();
                $commentView = $commentViewManage->commentManageView();
                return $commentView;
            }
            elseif($_GET['action'] == 'commentManage') {
                
                if(isset($_GET['id']) && $_GET['id'] > 0) {
                    $updateReportView = new BackendController();
                    $viewUpdateReport = $updateReportView->submitReportView();
                } else {
                    throw new Exception('Aucun identifiant de commentaire envoyé');
                }
            }
            elseif($_GET['action'] == 'updateReport') {
                $updateReport = new BackendController();
                $reportUpdated = $updateReport->reportUpdate($_POST['title'], $_POST['content'], $_GET['id']);
                
                return $reportUpdated;
            }
            elseif($_GET['action'] == 'deleteCommentView') {
                $removeCommentView = new BackendController();
                $commentDelete = $removeCommentView->deleteCommentView();
                
                return $commentDelete;
            }
            elseif($_GET['action'] == 'deleteComment') {
                $removeComment = new BackendController();
                $commentDelete = $removeComment->deleteComment($_GET['id']);
                
                return $commentDelete;
            }
            elseif($_GET['action'] == 'sessionStop') {
                $removeSession = new BackendController();
                $sessionStop = $removeSession->sessionStop();
                return $sessionStop;
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