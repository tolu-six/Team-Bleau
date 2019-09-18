<?php

if(isset($_POST['signupBtn'])){

	/**File to store user data*/
	$fileDB = "datadb.json";

	$retrieved_data = file_get_contents("datadb.json");
    $decoded_data = json_decode($retrieved_data, true);
   $decode_data_array = [];

   $decode_data_array = $decoded_data;

    $email_exist = false;
    
	$data = [];

	$formArray = $_POST; #retrieves the form values passed

		foreach ($decode_data_array as $key => $value) {

	    	if($decode_data_array['email'] === $formArray['email']){
	    		$email_exist = true;
	    		break;
	    	}
    	}

    	if($email_exist){
    		echo "<script>
					alert('Email address entered already exist in database, please change your email');
					window.location.href='index.html';
					</script>";
		}else{

			$formArray['password'] = password_hash($formArray['password'], PASSWORD_DEFAULT); #Hash the password

						#Removes the SignUpBtn since it is returning an empty value
						unset($formArray['signupBtn'], $formArray['confirm_password']);
						$json_data = json_encode($formArray); #Encode data to JSON/Object format
			   
				   /**Every new registration should be appended (i.e added to the next line of the previous)*/
				   file_put_contents($fileDB, $json_data, FILE_APPEND);

			        header('Location: welcome.php?email='.$formArray['email']); 
			}				   
}

?>
