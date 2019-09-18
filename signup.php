<?php  
 $message = '';  
 $error = '';  
 if(isset($_POST["signupBtn"]))  
 {  
      if(empty($_POST["username"]))  
      {  
           $error = "<label class='text-danger'>Enter Name</label>";  
      }  
      else if(empty($_POST["password"]))  
      {  
           $error = "<label class='text-danger'>Enter password</label>";  
      }  
      else if(empty($_POST["email"]))  
      {  
           $error = "<label class='text-danger'>Enter email</label>";  
      }else if($_POST['password']!=$_POST['confirm_password']){
	$error = "<label class='text-danger'>password and confirm password not the same.</label>";	  
	  }  
      else  
      {  
           if(file_exists('datadb.json'))  
           {  
                $current_data = file_get_contents('datadb.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'name'               =>     $_POST['username'],  
                     'email'          =>     $_POST["email"],  
                     'password'     =>     md5($_POST["password"])  
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('datadb.json', $final_data))  
                {  
					 $message = "<label class='text-success'>registration Successfull</p>";
					 echo $message;  
                }  
           }  
           else  
           {  
				$error = 'JSON File not exits'; 
				echo $error; 
           }  
      }  
 }  
 ?>  
