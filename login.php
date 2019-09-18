<?php

if(isset($_POST['loginBtn'])){

	#Retrieves user inputs from the form
	$email = $_POST['email'];
	$password = $_POST['password'];

	/**File where user data is stored*/
	$fileDB = "datadb.json";

	$json_data = file_get_contents($fileDB); #Retrieve user data

	$userData = json_decode($json_data, true);
	
	$prev_password = $userData->password; //Retrieves user password

	if(password_verify($password, $prev_password) AND $email === $userData->email) 
	{
    	Location('index.html'); //This should be changed to the Dashboard were it welcomes the signed in user.
	}
}

?>
