<?php 
class Comment
{
    
    protected $id;
    protected $post_id;
    protected $name;
    protected $textcomment;
    protected $timecomment;
    
    public function setFields($data)
    {
        foreach ($data as $key => $value) {
            $data[$key]=trim($value);
        }
        
        $this->name = $data['name'];
        $this->textcomment = $data['textcomment'];
    }

    public function setID($id)
    {
        $this->id = $id;
    }

    public function getID()
    {
        return $this->id;
    }
    
    public function getName()
    {
        return $this->name;
    }

    public function getTextcomment()
    {
        return $this->textcomment;
    }
    
    public function getTimecomment()
    {
        return $this->timecomment;
    }

    public function getPostID()
    {
        return $this->post_id;
    }

    public function setPostID($post_id)
    {
        $this->post_id = $post_id;
    }
     
}