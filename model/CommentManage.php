<?php 

namespace Projet4\model;

require_once('..\Projet4\model\Manager.php');

class CommentManage extends Manager
{
    
    public function postComment($postId, $author, $comment) // Insert un commentaire dans la BDD
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));
        
        return $affectedLines;
    }

    public function getComments($postId) // Récupère le commentaire
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        
        $comments->execute(array($postId));
    
        return $comments;
    }
}