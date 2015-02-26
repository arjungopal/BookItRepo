<?php
	session_start ();
	require_once 'dbconnection/dbConnect.php';
	if (isset ( $_SESSION ['login_user'] ))
	header ( "location:home.php" );

	$conn = dbConnect ();
	$error = ''; // Variable To Store Error Message
	
	if (isset ( $_POST ['email'] )) 
	{
		if (empty ( $_POST ['email'] ) || empty ( $_POST ['password'] )) 
        {
		$error = "Username or Password is invalid";
		
     	} 
	else 
	    { 
	
			$username = $_POST ['email'];
			$password = md5( $_POST ['password'] );
			
			$query = "select * from userlogin where Password ='$password' AND Email ='$email'";
				
			$stmt = $conn->prepare ( $query );
			$results = $stmt->execute ();
			$row = $stmt->fetch ();
		
				if (empty ( $row )) 
				{
			$error = "Username or Password is invalid";
			    } 
				else 
				{
						if (( int ) $row [0] == 1) 
						{
						$_SESSION ['role'] = "User";
						$_SESSION ['username'] = $username;
			            } 		
					else
					{
						$_SESSION ['role'] = "Admin";
					
					$_SESSION ['login_user'] = $username;
					header ( "location:home.php" );
					}
		       }	
		}
    }
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>index page</title>
</head>

<body>
<h1> BookIt Main Page</h1><br/>
<form action="login.php" method="POST" name="login">
<label>UserName:</label>
<input name="email" type="email" required="required"><br/>
<label>Password:</label>
<input name="password" type="text" required="required"><br/>
<input type="submit" value="Sign In">
</form>


<form action="register.php" method="POST" name="registration" >
<label>Email: </label>
<input name="email" type="email" autofocus required = "required"><br/>
<label>Password: </label>
<input type="password" name="password" required="required"><br/>
<label>FirstName:</label>
<input type="text" name="firstname" required="required"><br/>
<label>LastName:</label>
<input type="text" name="lastname" required="required"><br/>
<label>Address:</label>
<input type="text" name="address" required="required"><br/>
<label>City:</label>
<input type="text" name="city" required="required"><br/>
<label>State:</label>
<input type="text" name="state" required="required"><br/>
<label>Phone:</label>
<input type="text" name="phone" required="required"><br/>
<input type="submit" value="Submit"><input type="reset">
<input type="hidden" name="MM_insert" value="registration">
</form>
</body>
</html>