<?php
class CommentMapper
{
    public $DBH;
    
    public function __construct(PDO $DBH)
    {
        $this->DBH = $DBH;
    }
    
    public function getAllComments($post_id)
    {

        $STH = $this->DBH->prepare("SELECT * FROM Comments WHERE post_id=:post_id");
        $STH->bindValue(":post_id", $post_id);
        $STH->execute();
        return $STH->fetchAll(PDO::FETCH_CLASS, "comment");
    }

    public function addComment(Comment $comment)
    {

        $STH = $this->DBH->prepare("INSERT INTO Comments (name, post_id, textcomment) 
            VALUES (:name, :post_id, :textcomment)");

        $STH->bindvalue(":name", $comment->getName());
        $STH->bindvalue(":post_id", $comment->getPostID());
        $STH->bindvalue(":textcomment", $comment->getTextcomment());
            

        $STH->execute();
        $comment->setID($this->DBH->lastInsertId());
    }

}