<?php
    if (isset($_POST['username'])&&!empty($_POST['username']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        if (check($username,$password))
            signin($_SESSION['userid']);
    }else if (isloggedin())
    {
        signin($_SESSION['userid']);
    }
        
?>