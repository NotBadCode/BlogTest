<?php

require_once "lib/User.php";
require_once "lib/Post.php";
require_once "lib/Comment.php";
require_once "lib/PDO.php";
require_once "lib/UsersMapper.php";
require_once "lib/PostsMapper.php";
require_once "lib/CommentMapper.php";

$usersMapper   = new UsersMapper($DBH);
$postsMapper   = new PostsMapper($DBH);
$commentMapper = new CommentMapper($DBH);
$comments      = [];
if (isset($_COOKIE['userscookie']['code'])) {
	$code    = $_COOKIE['userscookie']['code'];
    $user = $usersMapper->getUserbyCode($code);
    $userposts = $postsMapper->getAllPostsByUser($user->getID());
    $logined = 1;
} else {
	$logined = 0;
}

if (isset($_GET['postid'])) {
	$post_id = $_GET['postid'];
	$comments = $commentMapper->getAllComments($post_id);
	$post = $postsMapper->getPost($post_id);

	if (isset($_POST['submitcom'])) {
        $comment = new Comment;
        $comment->setFields($_POST);
        $comment->setPostID($post_id);
        $commentMapper->addComment($comment);
        
    }

	include "templates/postshow.html";
	die();
}

$posts =[];

$posts = $postsMapper->getAllPosts();
$numposts = count($posts);


include "templates/listposts.html";