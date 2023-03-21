<?php 

include "includes/nav.php";
include "includes/header.php";
include "classes/user.php";



session_start();
if ($_SESSION['loggedin'] <> '1@gmail.com' || !isset($_SESSION['loggedin'])) 
{

  header("Location: login.php");
  exit();
} 
// header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");

echo "<h1>Admin Panel | ";  


if (isset($_SESSION['firstname']) && isset($_SESSION['lastname']))
{

echo "Welcome " . $_SESSION['firstname'] . " " . $_SESSION['lastname']; 
} else {echo "Welcome my friend!";}


echo "</h1>";


if (isset($_SESSION['status']))
{
  echo $_SESSION['status'];
  $now = time();
  if ($now = $now+3)
  {
    unset($_SESSION['status']);
  }
}


?>

<?php include "includes/admin_template.php" ?>

<!-- <div id="grid_table_all_user" class="mt-5"></div> -->
<div class="mt-5">
<?php $user = new User; $user->fetch_user_data(); ?>
</div>



<?php include "includes/footer.php" ?>