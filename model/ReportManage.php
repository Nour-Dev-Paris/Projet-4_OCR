<?php 

require_once('..\Projet4\model\Manager.php');

class ReportManage extends Manager{

    public function postReports($commentId) {
    	$db = $this->dbConnect();
    	$req = $db->prepare('INSERT INTO reports(comment_id, report_date) VALUES(?, NOW())');
    	$reported = $req->execute(array($commentId));

    	return $reported;
    }

    public function getReports() {
      $db = $this->dbConnect();
      $reports = $db->query('SELECT author, comment, comment_date
      FROM comments
      WHERE reports.comment_id = comments.id');

      return $reports;
    }
}