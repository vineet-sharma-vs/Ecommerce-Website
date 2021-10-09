<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  require_once $_SERVER['DOCUMENT_ROOT'].'/zyro/my_shop/my_shop/local_system/constants.php';
  require_once root_directory.'database/db.php';
  require_once root_directory.'account/controllers/emailController.php';

 $errors  = array();
 $username = '';
 $email ='';
 
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }


 //for signup 
 if(isset($_POST['signup-btn']))
  {
   

    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConf  = $_POST['passwordConf'];

    //validation
    if(empty($_POST['username']))
      $errors['username'] = 'Username required';
    else{
    $username = test_input($_POST['username']);
    if (!preg_match("/^[a-zA-Z ]*$/",$username))
      $error_messages['username'] = "Inappropriate name";  
    }

    if(empty($_POST['email']))
      $error_messages['email']='email is required';
    else{
      $email = test_input($_POST['email']);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
       $error_messages['email'] = "Inappropriate email";  
    }

    if(empty($password))
      $errors['password'] = 'password required';

    if(empty($passwordConf))
      $errors['passwordConf'] = 'Reenter password';

    if($password!==$passwordConf)
      $errors['password'] = 'password do not matched';
    
    $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
    $stmt = $con->prepare($emailQuery);
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();


    if($userCount > 0)
      $errors['email'] = "Email already exit";

    if(count($errors) === 0)
    {
      $password = password_hash($password, PASSWORD_DEFAULT);
      $token = bin2hex(random_bytes(50));
      $verified = false;

      $sql = "INSERT INTO users(username,email,verified,token,password) VALUES(?,?,?,?,?)";
      
      $stmt = $con->prepare($sql);
      $stmt->bind_param('ssbss',$username,$email,$verified,$token,$password);
     
      if(sendVerificationEmail($email,$token))
       {
        if($stmt->execute())
        {
        	 //login user
           $user_id = $con->insert_id;
           $_SESSION['id'] = $user_id;
           $_SESSION['username'] = $username;
           $_SESSION['email'] = $email;
           $_SESSION['verified'] = $verified;
  
             
  
  
             header('location: ../index.php');   
             exit();
        }//if($stmt->execute()) ends here
        else          
        	$errors['db_error'] = 'Database error: failed to register';
          header('location:  signup.php');
      } // send verification email
      else $error['mail_error'] = 'Something wrong,cannt signup';
        header('location: signup.php');
    } // if(count($errors) === 0) ends here
  } //isset($_POST['signup-btn']) ends here


  
  //for login
  if(isset($_POST['login-btn']))
  {
    
    //validation
    if(empty($_POST['email']))
      $errors['email']='email is required';
    else{
      $email = test_input($_POST['email']);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        $errors['email'] = "Inappropriate email";  
    }

    if(empty($_POST['password']))
      $errors['password'] = 'Password required';
    else
      $password = $_POST['password'];
    
    if(count($errors)===0)
    {
      $sql = "SELECT * FROM users WHERE email=? LIMIT 1";
      $stmt = $con->prepare($sql);
      $stmt->bind_param('s',$email);
      $stmt->execute();
      $result=$stmt->get_result();
      $user = $result->fetch_assoc();
      
    if(isset($user)>0)
    {  if(password_verify($password,$user['password']))
      {
        //login user
           $_SESSION['id'] = $user['id'];
           $_SESSION['username'] = $user['username'];
           $_SESSION['email'] = $user['email'];
           $_SESSION['verified'] = $user['verified'];
           //set flash message
           //$_SESSION['message'] = "You are now logged in!";
           //$_SESSION['alert-class'] = 'alert-success';
           header('location: ../index.php');
           exit();
      }// if for password verfication ends here
      else
        $errors['login_fail'] = 'wrong credentials';
    }
    else
        $errors['login_fail'] = 'Email not exits';

    }/*no error in a validation*/
  }/*for login ends here*/


  function verifyUser($token)
  { 
    global $con;
    $token = test_input($token);
   if(preg_match("/[A-Za-z0-9]+/", $token) == TRUE)
    {
    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($con,$sql);
    
    if(mysqli_num_rows($result)>0)
    {
      $user = mysqli_fetch_assoc($result);
      $update_query = "UPDATE users SET verified=1 WHERE token='$token'";
  
      if(mysqli_query($con,$update_query))
       {
         //login user
           $_SESSION['id'] = $user['id'];
           $_SESSION['username'] = $user['username'];
           $_SESSION['email'] = $user['email'];
           $_SESSION['verified'] = 1;
           $_SESSION['valid_token']=1;
           //set flash message
           //$_SESSION['message'] = "Your email address successfully verified";
           //$_SESSION['alert-class'] = 'alert-success';

           header('location: ../../index.php');
           exit();
       }//if(mysqli_query($con,$update_query))
    }//if(mysqli_num_rows($result)>0)
    else
       $_SESSION['valid_token']=0;
       header('location: ../../index.php');
    }
    else
      $_SESSION['valid_token']=0;    
      header('location: ../../index.php');
  }//verifyUser function ends here
  




  //logout user
   if(isset($_GET['logout']))
   {
     $_SESSION = array();
     session_destroy();
     header('location: ../../index.php');
     exit();
   }

    //delete user accou t
   if(isset($_GET['delete']))
   {
     $email = $_SESSION['email']; 
     $sql = "DELETE FROM users WHERE email='".$email."'";
     mysqli_query($con,$sql);

     $_SESSION = array();
     session_destroy();
     header('location: ../../index.php');
     exit();
   }

?>