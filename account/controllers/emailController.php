<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/zyro/my_shop/my_shop/local_system/constants.php';
require_once root_directory.'account/vendor/autoload.php';

 // Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com',465,'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASS);

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message


function sendVerificationEmail($userEmail,$token)
{ 
   global $mailer;      
   $body = '<!DOCTYPE html>
              <html>
                <head>
              <meta charset="utf-8">
              <title>Verify Email</title>
                </head>
            <body>
               <div>
               <p>
                  Thank you for signing up on our website.Please click on to verify your email.
               </p> 
          <a href="http://localhost/zyro/my_shop/my_shop/local_system/index.php?token='.$token.'">Verify your email address</a>
          </div>
            </body>
            </html>';


    $message = (new Swift_Message('Wonderful Subject'))
  ->setFrom(EMAIL)
  ->setTo($userEmail)
  ->setBody($body,'text/html');

  // Send the message
  if($mailer->send($message))
    return 1;
  else
    return 0;
}







?>