<?php

if(isset($_POST['loginBtn'])){

	#Retrieves user inputs from the form
	$email = $_POST['email'];
	$password = $_POST['password'];

	/**File where user data is stored*/
	$fileDB = "datadb.json";

	$json_data = file_get_contents($fileDB); #Retrieve user data

	$userData = json_decode($json_data);

	if(password_verify($password, $userData->password) AND $email === $userData->email) 
	{
    	Location('');
	}
}

?>