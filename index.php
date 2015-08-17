<?php

require_once "lib/User.php";
require_once "lib/PDO.php";
require_once "lib/UsersMapper.php";
error_reporting(E_ALL);
$error   = "";
$mapper = new UsersMapper($DBH);

if (isset($_COOKIE['userscookie']['code'])) {
    $code    = $_COOKIE['userscookie']['code'];
    $head    = "Ваши данные: можете изменить их";
    $user = $mapper->getUserbyCode($code);
    $new     = 0;
    $message = "вы можете их изменить";
    $logined = 1;
} else {
    $head    = "Войдите или Зарегистрируйтесь";
    $user = new User;
    $new     = 1;
    $message = '';
    $code    = '';
    $logined = 0;
}

if (isset($_POST['regsubmit'])) {
    
    $user->setFields($_POST);
    
    if ($mapper->isloginUsed($_POST['login'], $code)) {
        $error   = "loginused";
        $message = "Такой login уже зарегистрирован!";
    } else {
       if ($mapper->isemailUsed($_POST['email'], $code)) {
        $error   = "emailused";
        $message = "Такой email уже зарегистрирован!";
        } else {
            $error = $user->checkFields();
        }
    }

    if (!$error) {
        if ($new) {
            $user->generateCode();
            while ($mapper->iscodeUsed($user->getCode())) {
                $user->generateCode();
            }
            $mapper->addUser($user);
            $code = $user->getCode();
            setcookie("userscookie[code]", $code, time() + (7 * 24 * 60 * 60 * 42), "/");
            header("Location: index.php");
            die();
        } else {
            $mapper->editUser($user);
            $message = "Данные успешно изменены!";
        }
    }
}

if (isset($_POST['logsubmit'])) {
    $user->setFields($_POST);
    $user = $mapper->checkPasswordUser($user);
    if (!$user) {
        $error   = "passwordwrong";
    } 
    
    if (!$error) {
        echo "OK";
        $code = $user->getCode();
        var_dump($code) ;
        setcookie("userscookie[code]", $code, time() + (7 * 24 * 60 * 60 * 42));
        header("Location: index.php");
        die();
    }

}

if (isset($_POST['exit'])) {
    $code = $user->getCode();
    echo $code;
    setcookie("userscookie[code]", $code, time() - 3600);
    header("Location: index.php");
    die();
}

$users = $mapper->getAllUsers();

include "templates/profile.html";