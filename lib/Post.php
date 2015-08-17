<?php

class Post
{
    
    protected $id;
    protected $title;
    protected $textpost;
    protected $usr_id;

    public function setFields($data)
    {
        foreach ($data as $key => $value) {
            $data[$key] = trim($value);
        }
        $this->title    = $data['title'];
        $this->textpost     = $data['textpost'];
    }
    
    public function checkFields()
    {
        $regExp = "/.+/ui";
        
        if (!preg_match($regExp, $this->title))
            return "title";

        if (!preg_match($regExp, $this->textpost))
            return "text";
    }
    
    public function setID($id)
    {
        $this->id = $id;
    }
    

    public function getID()
    {
        return $this->id;
    }
    
    public function getTitle()
    {
        return $this->title;
    }
    
    
    public function getTextpost()
    {
        return $this->textpost;
    }
    
    public function getUsrID()
    {
        return $this->usr_id;
    }

    public function setUsrID($usr_id)
    {
        $this->usr_id = $usr_id;
    }
    
}