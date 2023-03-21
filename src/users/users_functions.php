<?php 
require("classes/user.php");

include "../db/conn.php";
include "includes/password.php";





function isAdmin($adminEmail)
{

    if ($adminEmail = '1@gmail.com')
    {
        header("Location: admin.php");
 
    } else
    {
        header("Location: ../../index.php");

    }
}


function isForbidden ()
{
    $email = $_COOKIE['email'];

    if(empty($email)) 
    {

    //give error and start redirection to login page
    //you may never see this `echo` because the redirect may happen too fast
    echo "Please log in first to see this page.";
    header('Location: login.php');

    //kill page because user is not logged in and is waiting for redirection
    die();
    }

    if (!empty($email) && $email = '1@gmail.com') 
    {
        header("Location: http://localhost/src/users/admin.php");
        exit(); 
    } else
    {
        header("Location: ../../index.php");

    }


}

