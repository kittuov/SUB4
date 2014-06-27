<?php 
include "mysqlconnect.php";
function mainmatter()
{
    global $userinfo,$id,$signin;
    if (isloggedin())
       include 'posts.php';
    else {include 'loginform.php'; echo @$_SESSION['imp_msg'];$_SESSION['imp_msg']=null;}
}
function check($username,$password)
{
    $query = "SELECT `id`,`Email` FROM `logininfo` WHERE `username`= '$username' AND `password` ='$password'";

    if ($query_run = mysql_query($query))
    {
        global $query_row;
        $numrows= mysql_num_rows($query_run);
        if ($numrows==0){echo 'wrong password, username combination';return false;}
        else {$query_row=mysql_fetch_assoc($query_run);$_SESSION['userid']=$query_row['id'];return true;}
    }else echo "Query Fail";return false;
}
function signin($id)
{
    global $query_row , $userinfo;
    $query_new="SELECT `username`,`password`,`Email`,`id` FROM `logininfo` WHERE `id`='$id'";
    if ($query_new_run=mysql_query($query_new))
        $userinfo=mysql_fetch_assoc($query_new_run);
     $_POST=null;
    $_SESSION['userid']=$id;
}
function signout()
{
    $_SESION['userid']=null;
}
function post($post)
{
    global $userinfo;
    $id = $_SESSION['userid'];
    $timenow=time();  
	$put_post="INSERT INTO `posts` (`id`, `content`, `user_id`, `time_stamp`) VALUES (null,'$post',$id,'$timenow')" ;
    mysql_query($put_post);
    $_POST=null;
}
function isloggedin ()
{
    if (isset($_SESSION['userid'])&&!empty($_SESSION['userid']))return true;
    else
        return false;
}
function getusername($userid)
{
    $user_query="SELECT `username` FROM `logininfo` where `id` = '$userid'";
    $user_run=mysql_query( $user_query);
    $user_name=mysql_fetch_assoc($user_run);
    return $user_name['username'];
}
function deletepost ($post)
{
    $query_delete="DELETE FROM `posts` WHERE `id` = '$post'";
    mysql_query($query_delete);
    $_POST=null;
    header('Location: index.php');
}
function comment ($comment, $postid)
{
    $id=$_SESSION['userid'];
    $timenow=time();
    $query="INSERT INTO `comments`(`id`, `comment`, `user_id`, `post_id`, `time_stamp`) VALUES (null,'$comment','$id','$postid', $timenow)";
    mysql_query($query);
    header("Location: index.php");
}
function createuser($username, $password, $password_check,$email)
{
    $check="SELECT `id` FROM `logininfo` WHERE `username` = '".$username."'";
    if ($bullshit = mysql_query($check));
    {        
        $numrows=mysql_num_rows($bullshit);
        if ($numrows != 0) $_SESSION['imp_msg']=" User name already Exists";
        else
        if ($password===$password_check)       
        {
            $query="INSERT INTO `logininfo`(`id`, `username`, `password`, `Email`) VALUES (null,'".$username."','".$password."','".$email."')";
            if (!mysql_query($query)) $_SESSION['imp_msg']=" couldn't enter";
        }else $_SESSION['imp_msg']=" Two fields didnot match";
    }
}
?>
