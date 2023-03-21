<?php

require("../db/db.php");

// include "../../db/conn.php";

/**
 * User Class 
 */

class User extends DB
{
	// protected $conn;

	public $id;
	public $firstname;
	public $lastname;
	public $email;
	public $password;
	public $img;

	public $adminEmail = "1@gmail.com";

	
	function __construct()
	{
		$this->firstname;
		$this->lastname;
		$this->email;
		$this->password;
		$this->img;

		$this->db = new DB;
	}

	public function isEmailExists($email)
	{
	    // SQL Statement
	    $sql = "SELECT * FROM users WHERE email='$email'";

	    $result = $this->db->conn->query($sql);

	    if ($result)
	    {

    	  	// Fetch Associative array
		    $row = $result->fetch_assoc();

		    // Check if there is a result and response to  1 if email is existing
		    return (is_array($row) && count($row)>0);
	    }
	    else 
	    {
	        session_start();
	        $_SESSION['status'] = "<div class='alert alert-success' role='alert'>Unsuccessfully! Please Try Again!</div>";
	        header("Location: login.php");
	        echo "Error deleting record: " . $this->db->conn->error;
	    }

   		$this->db->conn->close();

	}

	private function uploadImage($id)
	{
		$allow = array("jpg", "jpeg", "gif", "png");

		if (!file_exists('includes/img/uploads/users/' . $id)) 
		{
		    mkdir('includes/img/uploads/users/' . $id, 0777, true);
		}

		$todir = 'includes/img/uploads/users/' . $id . '/';

		if ( !!$_FILES['img']['tmp_name'] ) // is the img uploaded yet?
		{
		    $info = explode('.', strtolower( $_FILES['img']['name']) ); // whats the extension of the img

		    if ( in_array( end($info), $allow) ) // is this img allowed
		    {
		        if ( move_uploaded_file( $_FILES['img']['tmp_name'], $todir . basename($_FILES['img']['name'] ) ) )
		        {
		            // the img has been moved correctly
		        }
		    }
		    else
		    {
		        // error this img ext is not allowed
		    }
		}
	}

	public function loginUser($email, $password)
	{
		// Check if Email exists

		$isEmailExists = $this->isEmailExists($email);

	    if ($isEmailExists > 0 )
	    {
			$query = "SELECT * FROM users WHERE email='$email'";

			$result = $this->db->conn->query($query);

	        if ($result)
	        {
	        	$rowEmail = $result->fetch_assoc();

	        	if (is_array($rowEmail) && count($rowEmail)>0)
	        	{

	        		if ($password == $rowEmail['password'])
	        		{

		        		session_start();
	                    $_SESSION['firstname'] =  $rowEmail['firstname'];
	                    $_SESSION['lastname'] =  $rowEmail['lastname'];

	                    if ($this->adminEmail == $rowEmail['email'])
	                    {
	                    	$_SESSION['loggedin'] = $rowEmail['email'];
				            $_SESSION['status'] = "<div class='alert alert-success' role='alert'>Successfully loged in!</div>";
				            header("Location: admin.php");
				            exit();

	                    } else
	                    {
	                        $_SESSION['loggedin'] = $rowEmail['email'];
	                        $_SESSION['status'] = "<div class='alert alert-success' role='alert'>Successfully loged in!</div>";
	                        header("Location: ../../index.php");
	                        exit();

	                    }
	        		
	                } else
                    {
                        setcookie('status', "<div class='alert alert-danger' role='alert'>Your password is wrong, Please try again!</div>", time()+3);
                        
                        header("Location: login.php");

                    }

	        	}
		            
	        }

	        $this->db->conn->close();


	    } else
	    {

	        setcookie('status', "<div class='alert alert-danger' role='alert'>There is no account with this Email<br> Please Create an account!</div>", time()+3);

	        header("Location: login.php");

	    }
	}


	public function logoutUser()
	{
	    session_start() ;
	    unset($_SESSION["loggedin"]);
	    session_destroy() ;
	    header('Location: login.php');
	}

	public function fetch_user_data()
	{

	    $query = "SELECT * FROM users";

	    $result = $this->db->conn->query($query);

	    echo "
	    <div class='table-responsive'><table class='table table-striped table-bordered'>
		  <thead>
		    <tr>
		      <th scope='col-auto'>Photo</th>
		      <th scope='col-auto'>Firstname</th>
		      <th scope='col-auto'>Lastname</th>
		      <th scope='col-auto'>Email</th>
		      <th scope='col-auto'>Action</th>
		    </tr>
		  </thead>
		  <tbody>"; 


	    foreach($result as $row)
	    {

	        $output [] = array(
	            'img'    =>  $row['img'],
	            'firstname' =>  $row['firstname'],
	            'lastname'  =>  $row['lastname'],
	            'email' =>  $row['email'],
	            'password' =>  $row['password'],
	            'createdDate'   =>  $row['createdDate']
	        );



	        echo "
	        <tr class='mt-1 pt-3 pb-3'>
	            <th scope='row' style='text-align: center;'><img src='../users/includes/img/uploads/users/".$row['id']."/".$row['img']."' alt='".$row['img']."' class='rounded-pill img-fluid img-thumbnail' style='width: 8rem; height: 7rem; border-radius: 80%;'></th>
	            <th>".$row['firstname']."</th>
	            <th>".$row['lastname']."</th>
	            <th>".$row['email']."</th>
	            <th>
	                <form method='POST' action='fetch_userData.php' class='row'>

	                    <button type='submit' name='delete_user' class='col btn btn-danger m-1' value='".$row['id']."'>Delete</button>

	                </form>
	            </th>

	        </tr>";

	    }
	    echo "</tbody></table></div>";

	    $this->db->conn->close();
	    // return json_encode($output);
	    // echo json_encode($output);

	}

	public function createUser($firstname, $lastname, $email, $password)
	{
		// Check if Email exists

		$isEmailExists = $this->isEmailExists($this->email);

	    if ($isEmailExists > 0 )
	    {

	        session_start();

	        $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>There is an account with this Email! <br> Please use <a href='http://localhost/src/users/login.php'>login</a> page!</div>";

	        header("Location: admin.php");


	    } else
	    {
	    	// $target_dir = "../users/includes/img/uploads/users/";
			$img = basename($_FILES["img"]["name"]);
			$uploadOk = 1;
			// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image

			  // $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			  // if($check !== false) {
			  //   echo "File is an image - " . $check["mime"] . ".";
			  //   $uploadOk = 1;
			  // } else {
			  //   echo "File is not an image.";
			  //   $uploadOk = 0;
			  // }


			$query = "INSERT INTO users (firstname, lastname, email, password, img) VALUES ('$firstname', '$lastname', '$email', '$password', '$img')";

			$result = $this->db->conn->query($query);


	        if ($result)
	        {
	            session_start();
	            $_SESSION['status'] = "<div class='alert alert-success' role='alert'>Successfully created! <br> Please use <a href='http://localhost/src/users/login.php'>login</a> page!</div>";

				$queryID = "SELECT id FROM users WHERE email='$email'";

            	$resultID = $this->db->conn->query($queryID);

            	if ($resultID)
		        {
		        	$newUser = $resultID->fetch_assoc();
		            $this->uploadImage($newUser['id']);
		        }
	            header("Location: admin.php");
	        } 
	        else 
	        {
	            session_start();
	            $_SESSION['status'] = "<div class='alert alert-danger' role='alert'>There is an account with this Email! <br> Please use <a href='http://localhost/src/users/login.php'>login</a> page!</div>";
	            header("Location: admin.php");
	            echo "Error created record: " . $this->db->conn->error;
	        }

	        $this->db->conn->close();
	    }
	}

	public function removeUser($id) 
	{

	    $query = "DELETE FROM users WHERE id='$id'";

	    $result = $this->db->conn->query($query);

	    if ($result) 
	    {

	        session_start();
	        $_SESSION['status'] = "<div class='alert alert-success' role='alert'>Successfully deleted!</div>";
	        header("Location: admin.php");
	    } 
	    else 
	    {
	        session_start();
	        $_SESSION['status'] = "<div class='alert alert-success' role='alert'>Unsuccessfully deleted!</div>";
	        header("Location: admin.php");
	        echo "Error deleting record: " . $conn->error;
	    }

	    $conn->close();

	}


}



