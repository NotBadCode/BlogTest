<?php

class PostsMapper
{
    private $DBH;
    
    public function __construct(PDO $DBH)
    {
        $this->DBH = $DBH;
    }
    
    public function getPost($id)
    {
        $STH = $this->DBH->prepare("SELECT * FROM Posts WHERE id=:id");
        $STH->bindValue(":id", $id);
        $STH->execute();
        $STH->setFetchMode(PDO::FETCH_CLASS, 'post');
        return $STH->fetch();
    }
    
    public function getAllPosts()
    {
        $STH = $this->DBH->prepare("SELECT * FROM Posts");
        $STH->execute();
        $result = $STH->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "post");
        return $result;
    }

    public function getAllPostsByUser($usr_id)
    {
        $STH = $this->DBH->prepare("SELECT * FROM Posts WHERE usr_id=:usr_id");
        $STH->bindValue(":usr_id", $usr_id);
        $STH->execute();
        $result = $STH->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "post");
        return $result;
    }
    
    public function addPost(Post $post)
    {
        $STH = $this->DBH->prepare("INSERT INTO Posts (usr_id, textpost, title) 
            VALUES (:usr_id, :textpost, :title )");
        
        $STH->bindValue(":usr_id", $post->getUsrID());
        $STH->bindValue(":textpost", $post->getTextpost());
        $STH->bindValue(":title", $post->getTitle());
        
        $STH->execute();
        
        return $this->DBH->lastInsertId();
    }
    
    public function editPost(Post $post)
    {
        $STH = $this->DBH->prepare("UPDATE Posts SET textpost=:textpost, title=:title
            WHERE id=:id");
        $STH->bindValue(":textpost", $post->getTextpost());
        $STH->bindValue(":title", $post->getTitle());
        
        $STH->execute();
    }
    
}

?>