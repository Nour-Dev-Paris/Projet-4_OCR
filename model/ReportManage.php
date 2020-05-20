<?php 

namespace Projet4\model;

require_once('..\Projet4\model\Manager.php');

class ReportManage extends Manager
{

    public function postReports($commentId) // Insert un commentaire signalé
    {
    	$db = $this->dbConnect();
    	$req = $db->prepare('INSERT INTO reports(comment_id, report_date) VALUES(?, NOW())');
    	$reported = $req->execute(array($commentId));

    	return $reported;
    }

    public function getReports() // Fait une liaison entre les tables 'comments' et 'reports' Pour lier l'ID d'un commentaire avec le champs 'comment_id' de la table 'reports'
    {
      $db = $this->dbConnect();
      $reports = $db->query('Select DISTINCT comments.* 
      FROM comments, reports 
      WHERE comments.id 
      IN (Select reports.comment_id FROM reports)');

      return $reports;
    }
    
    public function getReport($postId) // Récupère les commentaires signalés
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, comment FROM comments WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        
        return $post;
    }
    
    public function updateReport($author, $comment, $postId) // Modifie un commentaire signalé
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET author = ?, comment = ?, comment_date = NOW() WHERE id = ?');
        $updated = $req->execute(array($author, $comment, $postId));
        
        return $updated;
    }
    
    public function deleteComment($commentId) // Supprime un commentaire signalés
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $deletedComment = $req->execute(array($commentId));

        return $deletedComment;
    }
}