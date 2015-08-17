<?php

class UsersMapper
{
    private $DBH;
    
    public function __construct(PDO $DBH)
    {
        $this->DBH = $DBH;
    }
    
    public function countUsers()
    {
        $STH = $this->DBH->prepare("SELECT COUNT(*) FROM Users "); 
        return $STH->fetchColumn();
    }
    
    public function isemailUsed($email, $code)
    {
        $STH = $this->DBH->prepare("SELECT * FROM Users WHERE email=:email and code!=:code");
        $STH->bindValue(":email", $email);
        $STH->bindValue(":code", $code);
        $STH->execute();
        $STH->setFetchMode(PDO::FETCH_CLASS, 'user');
        return $STH->fetch();
    }

    public function isloginUsed($login, $code)
    {
        $STH = $this->DBH->prepare("SELECT * FROM Users WHERE login=:login and code!=:code");
        $STH->bindValue(":login", $login);
        $STH->bindValue(":code", $code);
        $STH->execute();
        $STH->setFetchMode(PDO::FETCH_CLASS, 'user');
        return $STH->fetch();
    }
    
    public function iscodeUsed($code)
    {
        $STH = $this->DBH->prepare("SELECT * FROM Users WHERE code=:code");
        $STH->bindValue(":code", $code);
        $STH->execute();
        $STH->setFetchMode(PDO::FETCH_CLASS, 'user');
        return $STH->fetch();
    }
    
    public function getUserbyCode($code)
    {
        $STH = $this->DBH->prepare("SELECT * FROM Users WHERE code=:code");
        $STH->bindValue(":code", $code);
        $STH->execute();
        $STH->setFetchMode(PDO::FETCH_CLASS, 'user');
        return $STH->fetch();
    }
    
    public function getAllUsers()
    {
        $STH = $this->DBH->prepare("SELECT * FROM Users");
        $STH->execute();
        $result = $STH->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "user");
        return $result;
    }
    
    public function addUser(User $user)
    {
        $STH = $this->DBH->prepare("INSERT INTO Users (login, email, password, code) 
            VALUES (:login, :email, :password, :code)");
        
        $STH->bindValue(":login", $user->getLogin());
        $STH->bindValue(":email", $user->getEmail());
        $STH->bindValue(":password", $user->getPassword());
        $STH->bindValue(":code", $user->getCode());
        
        $STH->execute();
        $user->setID($this->DBH->lastInsertId());
    }
    
    public function editUser(User $user)
    {
        $STH = $this->DBH->prepare("UPDATE Users SET login=:login, email=:email, password=:password WHERE id=:id");
        $STH->bindValue(":login", $user->getLogin());
        $STH->bindValue(":email", $user->getEmail());
        $STH->bindValue(":password", $user->getPassword());
        $STH->bindValue(":id", $user->getID());
        
        $STH->execute();
    }

    public function checkPasswordUser(User $user)
    {
        $STH = $this->DBH->prepare("SELECT * FROM Users WHERE login=:login and password=:password ");
        $STH->bindValue(":login", $user->getLogin());
        $STH->bindValue(":password",  $user->getPassword());
        $STH->execute();
        $STH->setFetchMode(PDO::FETCH_CLASS, 'user');
        return $STH->fetch();
    }
}