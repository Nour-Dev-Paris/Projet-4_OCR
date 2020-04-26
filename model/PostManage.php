<?php 

require_once('C:\wamp64\www\Projet4\model\Manager.php');

class PostManage extends Manager
{
    public function insertPost($title, $content)  //createPost
    {
        $db = $this->dbConnect();
        $postAdmin = $db->prepare('INSERT INTO posts(title, content, creation_date, update_date) VALUES(?, ?, NOW(), NOW())');
        $newPostAdmin = $postAdmin->execute(array($title, $content));

        return $newPostAdmin;
    }
    
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }
    
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y %H:%i:%s") AS date_fr, DATE_FORMAT(update_date, "%d/%m/%Y %H:%i:%s") AS update_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        
        return $post;
    }
    
    public function updatePost($title, $content, $postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET title = ?, content = ?, update_date = NOW() WHERE id = ?');
        $updated = $req->execute(array($title, $content, $postId));
        
        return $updated;
    }
    
//    public function deletePost($postId)
//    {
//        $db = $this->dbConnect();
//        $req = $db->prepare('DELETE FROM posts WHERE id = ?');
//        $deletedPost = $req->execute(array($postId));
//
//        return $deletedPost;
//    }
}