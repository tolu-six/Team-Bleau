<?php

if(isset($_POST['loginBtn'])){
	$email = stripslashes($_POST['loginemail']);
	$password = stripslashes(md5($_POST['loginpassword']));
	$filedb = file_get_contents("datadb.json");  
	$data = json_decode($filedb, true);
	 
	foreach ($data as $key => $value) {
	 $dat =  $value['email'].', ';  
	 if(strstr($dat,$email)){
	  echo "success";   
	 }
	}
	
}

?>
