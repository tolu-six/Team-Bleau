<?php

if(isset($_POST['signupBtn'])){

	/**File to store user data*/
	$fileDB = "datadb.json";

	$data = [];

	$formArray = $_POST; #retrieves the form values passed
	$formArray['password'] = password_hash($formArray['password'], PASSWORD_DEFAULT); #Hash the password
	
	$json_retrieved_data = file_get_contents($fileDB);
    	$decoded_data = json_decode($json_retrieved_data, true);
	
    	$email = $formArray['email'];
    	$email_exists = false;
		
	foreach ($decoded_data as $key => $value) {
		if ($value['email'] == $email) {
		    $email_exists = true;
		    break;
		}
	}
	if ($email_exist) {
		Location('index.html');
	  } 
	else {
	
		//$data['id'] = 1;
		//$data = array_merge($data, $formArray); #combine id to the data from form

		#Removes the SignUpBtn since it is returning an empty value
		unset($formArray['signupBtn']);

		$json_data = json_encode($formArray); #Encode data to JSON/Object format

		/**Every new registration should be appended (i.e added to the next line of the previous)*/
		file_put_contents($fileDB, $json_data, FILE_APPEND);
	}		
}
?>
