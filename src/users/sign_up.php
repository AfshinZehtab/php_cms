<?php include "/includes/header.php" ?>
<?php include "../db/conn.php" ?>
<?php include "/users_functions.php" ?>



<?php

isForbidden();

    if (isset($_POST['sign_up_submit'])) {


        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        createUser($conn, 'users', $firstname, $lastname, $email, $password);

    } else 
    {
        echo "<h1 class='display-4'>Please create an account!</h1>";
    } 
?>



<?php include "/includes/sign_up_template.php" ?>

<?php include "/includes/footer.php" ?>