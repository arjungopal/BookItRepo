<?php
     include_once 'authentication.php';
	 include 'dbconnection/dbConnect.php';
	

     $conn = dbConnect();


	 $fname = $_POST['firstname'];
	 $lname = $_POST['lastname'];
     $password = md5($_POST['password']);
	 $email = $_POST['email'];
	 $add = $_POST['address'];
	 $city  = $_POST['city'];
	 $state = $_POST['state'];
	 $phone = $_POST['phone'];
	 $address = $add."##".$city."##".$state;

	 $usr_record="insert into user (Email,Fname,Lname,Address,Phone) VALUES ('$email','$firstname', '$lastname',  
                                    '$address','$phone')";
	 $user_login="insert into userlogin (Email,Password,Role) VALUES ('$email','$password','1')";
	
	$datauser = $conn->query($usr_record);
	$dataloginTable = $conn->query($user_login); 

        if($datauser) 
       {  
		  header( 'Location:index.php?msg=success');
		}
	else
	{
		header( 'Location:index.php') ; 
	}
?>
