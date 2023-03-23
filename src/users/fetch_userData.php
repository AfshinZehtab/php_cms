<?php 

include "classes/user.php";


// header("Content-Type: application/json");


$method = $_SERVER['REQUEST_METHOD'];

$user = new User;

if ($method == 'GET')

{
	
	$user->fetch_user_data();
}


if ($method == 'POST')

{

	if (isset($_POST['login'])) 
	{

	  	$user->loginUser($_POST['email'], $_POST['password']);

	}

	if (isset($_POST['logout'])) 
	{

	  	$user->logoutUser();

	}

	if (isset($_POST['add_user'])) 
	{

		$user->createUser($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_FILES["img"]);
	// 	$uploads_dir = '../users/includes/img/';


    // if ($_FILES["img"]) {
    // 	// echo $_FILES["img"]["error"];
    // 	// var_dump($_FILES['img']);
    // 	foreach ($_FILES['img'] as $key => $value) {
    // 		echo $key . " = " . $value . "<br>";
    // 	}
    //     $tmp_name = $_FILES["img"]["tmp_name"];
    //     // basename() may prevent filesystem traversal attacks;
    //     // further validation/sanitation of the filename may be appropriate
    //     $name = basename($_FILES["img"]["name"]);
    //     move_uploaded_file($tmp_name, "$uploads_dir/$name");
    // }

		// $target_dir = "uploads/";
		// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		// $uploadOk = 1;
		// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// // Check if image file is a actual image or fake image
		// if(isset($_POST["submit"])) {
		//   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		//   if($check !== false) {
		//     echo "File is an image - " . $check["mime"] . ".";
		//     $uploadOk = 1;
		//   } else {
		//     echo "File is not an image.";
		//     $uploadOk = 0;
		//   }
		// }

		// // Check if file already exists
		// if (file_exists($target_file)) {
		//   echo "Sorry, file already exists.";
		//   $uploadOk = 0;
		// }

		// // Check file size
		// if ($_FILES["fileToUpload"]["size"] > 500000) {
		//   echo "Sorry, your file is too large.";
		//   $uploadOk = 0;
		// }

		// // Allow certain file formats
		// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		// && $imageFileType != "gif" ) {
		//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		//   $uploadOk = 0;
		// }

		// // Check if $uploadOk is set to 0 by an error
		// if ($uploadOk == 0) {
		//   echo "Sorry, your file was not uploaded.";
		// // if everything is ok, try to upload file
		// } else {
		//   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		//     echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
		//   } else {
		//     echo "Sorry, there was an error uploading your file.";
		//   }
		// }

	}

	if (isset($_POST['delete_user'])) 
	{
	  $user->removeUser($_POST['delete_user']);
	}

}


