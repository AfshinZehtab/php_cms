<?php 

include "includes/header.php";


if (isset($_SESSION['status']))
{
    echo $_SESSION['status'];

    $now = time();

    if ($now = $now+3)
    {
        unset($_SESSION['status']);

    }
}

if (isset($_COOKIE['status']))
{
    echo $_COOKIE['status'];
}


include "includes/login_template.php";

include "includes/footer.php";