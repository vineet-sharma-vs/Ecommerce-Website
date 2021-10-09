<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
require_once $_SERVER['DOCUMENT_ROOT'] . '/zyro/my_shop/my_shop/local_system/constants.php';
require_once root_directory . 'account/vendor/autoload.php';

function sendVerificationEmail($email, $name, $subject, $message)
{
    global $mailer;
    $body = '<!DOCTYPE html>
  <html>
  <head>
  <meta charset="utf-8">
  </head>
  <body>
  <div>
  <h3 style="color:red;">message by ' . $email . '</h3><h4>Subject:' . $subject . '</h4>
  <p>
  Name: ' . $name . '<br>Message: ' . $message . '
  </p> 
  </div>
  </body>
  </html>';

    $message = (new Swift_Message('My shop Website'))->setFrom(EMAIL)
        ->setTo('yourEmailAdress@gmail.com')
        ->setBody($body, 'text/html');

    // Send the message
    if ($mailer->send($message)) return 1;
    else return 0;
} // sendVerificationEmail() function ends here


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (!isset($_POST['send_message']))
{

    if (empty($_POST['name'])) $_SESSION['contact_form_name'] = 'Name is required';
    else
    {
        $name = test_input($_POST['name']);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) $_SESSION['contact_form_name'] = "Inappropriate name";
        else $_SESSION['contact_form_name'] = '';
    }

    if (empty($_POST['subject'])) $_SESSION['contact_form_subject'] = 'subject is required';
    else
    {
        $subject = test_input($_POST['subject']);
        if (!preg_match("/^[a-zA-Z ]*$/", $subject)) $_SESSION['contact_form_subject'] = "Inappropriate subject";
        else $_SESSION['contact_form_subject'] = '';
    }

    if (empty($_POST['message'])) $_SESSION['contact_form_message'] = 'message is required';
    else
    {
        $message = test_input($_POST['message']);
        if (!preg_match("/^[a-zA-Z ]*$/", $message)) $_SESSION['contact_form_message'] = "Inappropriate message";
        else $_SESSION['contact_form_message'] = '';
    }

    if (empty($_POST['email'])) $_SESSION['contact_form_email'] = 'email is required';
    else
    {
        $email = test_input($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $_SESSION['contact_form_email'] = "Inappropriate email";
        else $_SESSION['contact_form_email'] = '';
    }

    if (count($_SESSION) === 0)
    {

        // Create the Transport
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))->setUsername(EMAIL)
            ->setPassword(PASS);

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);
        if (sendVerificationEmail($email, $name, $subject, $message))
        {

            $_SESSION['message_sent'] = 1;
            header('location: ../../contact.php');
        }
        else
        {
            $_SESSION['message_sent'] = 0;
            header('location: ../../contact.php');
        }

    } //if empty(_SESSION)
    else
    {   $_SESSION['message_sent'] = 0;
        header('location: ../../contact.php');
    }

} /*if post[send_message]*/

?>
