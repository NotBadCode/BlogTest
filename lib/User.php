<?php

class User
{
    
    protected $id;
    protected $login;
    protected $email;
    protected $code;
    protected $password;

    public function setFields($data)
    {
        foreach ($data as $key => $value) {
            $data[$key] = trim($value);
        }
        $this->login    = $data['login'];
        $this->email    = $data['email'];
        $this->password = md5(md5($data['password']));
    }
    
    public function checkFields()
    {
        $regExp     = "/^[0-9а-яa-zё-]+$/ui";
        $numregExp  = "/^[0-9]+$/";
        $mailregExp = "/.+@.+\..+/i";
        
        if (!preg_match($regExp, $this->login))
            return "login";

        if (!preg_match($mailregExp, $this->email))
            return "emailwrong";
    }
    
    public function generateCode()
    {
        $string = "abcdefghijklmnopqrstuvwxyz1234567890";
        $length = 36;
        for ($i = 0; $i <= 31; $i++) {
            $newcode .= $string[mt_rand(0, 35)];
        }
        
        $this->code = $newcode;
    }
    
    public function setID($id)
    {
        $this->id = $id;
    }
    

    public function getID()
    {
        return $this->id;
    }
    
    public function getLogin()
    {
        return $this->login;
    }
    
    
    public function getEmail()
    {
        return $this->email;
    }
    
    
    public function getCode()
    {
        return $this->code;
    }

    public function getPassword()
    {
        return $this->password;
    }
    
}