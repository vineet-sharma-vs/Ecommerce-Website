<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/zyro/my_shop/my_shop/local_system/constants.php';
  require_once root_directory.'database/db.php';

  $subscribe_display='none';
  $subscribe_message='';
  
  
  if(isset($_POST['subscribebtn']))
     {
        
     	function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }

        if(empty($_POST['subscribers']))
        	$subscribe_message='Email required';
        else
        {
     	   $email = test_input($_POST['subscribers']);
           
           if(!filter_var($email,FILTER_VALIDATE_EMAIL))
           	  $subscribe_message='Invalid Email';
     	   else
     	   {
              $sql="SELECT email FROM  subcribers WHERE email='$email'";
              $result=mysqli_query($con,$sql);

              if(mysqli_num_rows($result)>0)
                 $subscribe_message='Already Subscribed';	
              else
              {
     	        $sql="INSERT INTO subcribers(email) VALUES('$email') ";
                
                if(mysqli_query($con,$sql))
                  $subscribe_message='Thanks for Subscribing';

                 else
                  $subscribe_message='Something Wrong';	
               }
           }
           
        }
       
       echo $subscribe_message;
     }




?>