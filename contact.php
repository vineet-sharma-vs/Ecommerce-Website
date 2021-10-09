<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/zyro/my_shop/my_shop/local_system/constants.php';
  require_once root_directory.'account/controllers/authController.php'; 

  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  if(empty($_SESSION['contact_form_name']))
    $_SESSION['contact_form_name']='';
  if(empty($_SESSION['contact_form_email']))
    $_SESSION['contact_form_email']='';
  if(empty($_SESSION['contact_form_subject']))
    $_SESSION['contact_form_subject']='';
  if(empty($_SESSION['contact_form_message']))
    $_SESSION['contact_form_message']='';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once 'all_link_files.php'; ?>
  </head>
  <body class="goto-here">
  
  <!-- nav bar file  -->
  <?php require_once 'header.php';?>  
  
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Contact</span></p>
            <h1 class="mb-0 bread">Contact Us</h1>
          </div>
        </div>
      </div>
    </div>
  
    <section class="ftco-section contact-section bg-light">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="w-100"></div>
          <div class="col-md-3 d-flex">
            <div class="info bg-white pt-4 px-4 ">
                <p><span>Address:</span> <br>Allahabad,India</p>
              </div>
          </div>
          <div class="col-md-3 d-flex">
            <div class="info bg-white px-4 pt-md-4">
                <p><span>Phone:</span><br><a href="#">+ 999999999</a></p>
              </div>
          </div>
          <div class="col-md-3 d-flex">
            <div class="info bg-white px-4 pt-md-4">
                <p><span>Email:</span><br> <a href="#">xyz@gmail.com</a></p>
              </div>
          </div>
          <div class="col-md-3 d-flex">
            <div class="info bg-white px-4 pt-md-4">
                <p><span>Website</span><br><a href="#">xyz.com</a></p>
              </div>
          </div>
        </div>
  
 
       <?php  
         if(isset($_SESSION['message_sent'])){
           $message_sent = $_SESSION['message_sent'];
           if($message_sent=='1')
             $message_sent = 'Your message sent';
           else
             $message_sent = 'Your message not sent,Try to send again';
          
          echo '<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content " style="border:3px solid #5cb85c;">
      
        
        <div class="modal-header">
          <h4 class="modal-title text-success">'.$message_sent.'</h4>
          <button type="button" class="close" style="color:#5cb85c;" data-dismiss="modal">&times;</button>
        </div>
        
        
        
      </div>
    </div>
  </div>';
  
           unset($_SESSION['message_sent']);
         }
       ?>
    
  
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="account/controllers/send_message.php" class="bg-white p-5 contact-form" method="post">
              <div class="form-group">
                <?php if(strlen($_SESSION['contact_form_name'])>0) echo'<label class="text-danger">* '.$_SESSION['contact_form_name'].'</label>'; ?>
                <input type="text" class="form-control" placeholder="Your Name" name="name">
              </div>
              <div class="form-group">
                <?php if(strlen($_SESSION['contact_form_email'])>0) echo'<label class="text-danger">* '.$_SESSION['contact_form_email'].'</label>'; ?>
                <input type="text" class="form-control" name="email" placeholder="Your Email">
              </div>
              <div class="form-group">
                <?php if(strlen($_SESSION['contact_form_subject'])>0) echo'<label class="text-danger">* '.$_SESSION['contact_form_subject'].'</label>'; ?>
                <input type="text" name="subject" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
               <?php if(strlen($_SESSION['contact_form_message'])>0) echo'<label class="text-danger">* '.$_SESSION['contact_form_message'].'</label>'; ?>
                <textarea d="" cols="30" rows="7" class="form-control" placeholder="Message" name="message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="send_message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>
  
          <div class="col-md-6 d-flex">
            <div id="map" class="bg-white"></div>
          </div>
        </div>
      </div>
    </section> 

    <?php require_once 'footer.php'; ?> <!-- footer file -->
  
    
  </body>
</html>


 <script type='text/javascript'>
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>

<?php
  $_SESSION['contact_form_name']='';
  $_SESSION['contact_form_email']='';
  $_SESSION['contact_form_message']='';
  $_SESSION['contact_form_subject']='';
?>