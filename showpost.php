<?php

require_once "lib/User.php";
require_once "lib/Post.php";
require_once "lib/PDO.php";
require_once "lib/UsersMapper.php";
require_once "lib/PostsMapper.php";

$usersMapper = new UsersMapper($DBH);
$postsMapper = new PostsMapper($DBH);

if (isset($_COOKIE['userscookie']['code'])) {
	$code    = $_COOKIE['userscookie']['code'];
    $user = $usersMapper->getUserbyCode($code);
    $userposts = $postsMapper->getAllPostsByUser($user->getID());
    $logined = 1;
} else {
	$logined = 0;
}


