<?php

$home_directory="/SUB4/";
include 'functions.php';
require 'mysqlconnect.php';
session_start();
ob_start();
// for making posts
if (isset($_POST['post'])&&!empty($_POST['post']))
    post($_POST['post']);
if (isset($_POST['del'])&&!empty($_POST['del']))
    deletepost($_POST['del']);
if (isset($_POST['comment'])&&!empty($_POST['comment']))
    comment($_POST['comment'],$_POST['post_id']);
if (isset($_POST['create_user'])&&!empty($_POST['create_user']))
    createuser($_POST['create_user'],$_POST['create_pass'],$_POST['create_pass_check'],$_POST['create_email']);

include 'signin.php';
include 'body.php';
?>