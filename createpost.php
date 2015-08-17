<?php

require_once "lib/User.php";
require_once "lib/Post.php";
require_once "lib/PDO.php";
require_once "lib/UsersMapper.php";
require_once "lib/PostsMapper.php";
$usersMapper = new UsersMapper($DBH);
$postsMapper = new PostsMapper($DBH);
error_reporting(E_ALL);
$error   = "";

if (isset($_COOKIE['userscookie']['code'])) {
    $code    = $_COOKIE['userscookie']['code'];
    $head    = "Ваши данные:";
    $user = $usersMapper->getUserbyCode($code);
    $post = new Post;
    $new     = 1;
    $message = "вы можете их изменить";
    $logined = 1;
} else {
    $head    = "Войдите или Зарегистрируйтесь";
    header("Location: index.php");
    die();
}

if (isset($_POST['submit'])) {
    $post->setFields($_POST);
    $post->setUsrID($user->getID());
    $error = $post->checkFields();


    if (!$error) {
        if ($new) {
            $postsMapper->addPost($post);
            header("Location: posts.php");
            die();
        } else {
        }
    }
}

include "templates/createpost.html";