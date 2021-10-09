<?php

 if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
 if(!isset($_SESSION['num_of_items_in_cart']))
     $_SESSION['num_of_items_in_cart']=0;              
?>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.php">My shop</a>



 <style type="text/css">
  #searchbar input
  {
    width: 27rem;
  }

  @media screen and (max-width:1200px){
    #searchbar input{
     width: 17rem;
    }
  }

  @media screen and (max-width: 992px){
    #searchbar input{
      width: 27rem;
    }
  }

  @media screen and (max-width: 768px){
    #searchbar input{
      width: 18rem;
    }
  }
  
  @media screen and (max-width: 576px){
    #searchbar input{
      width: 14rem;
    }
  }


 </style>
<!-- ------------------------------------------------------ -->

       <form id="searchbar" class="form-inline" action="shop.php" method="post">
        <div class="input-group">
           <input type="text" name="searchitem" class="" placeholder="search..." style="padding-left:10px;border:1px solid rgb(255, 164, 92); " id="search_item_input" required="">
                 <div class="input-group-append">
        <button class="border-0 text-white" style="background: rgb(255, 164, 92);">Search</button>
      </div>

      </div>
       </form>
<!-- -------------------------------------------------- -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span>
        </button>

         

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="shop.php">Shop</a>
                
                <a class="dropdown-item" href="cart.php">Cart</a>
                <a class="dropdown-item" href="checkout.php">Checkout</a>
              </div>
            </li>
            <!-- <li class="nav-item"><a href="about.php" class="nav-link">about</a></li> -->
            <!-- <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li> -->
            <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
            <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"  id="nav_cart_items"><span class="icon-shopping_cart"></span>[<?php
                echo $_SESSION['num_of_items_in_cart']; 
             ?>]</a></li>

            
            <!-- if user is not logged in -->
              <?php  if(!isset($_SESSION['id'])): ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle"  id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="account/login.php">Login</a>
                <a class="dropdown-item" href="account/signup.php">SignUp</a>
              </div>
            </li>
              <?php endif; ?>

               <!-- user is logged in -->
              <?php  if(isset($_SESSION['id'])): ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle"  id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" ><?php echo $_SESSION['username']; ?></a>
                <a class="dropdown-item" >Coupons</a>
                <a class="dropdown-item" >Orders</a>
                <a class="dropdown-item" >My Chats</a>
                <a class="dropdown-item" >Gift Cars</a>
                <a class="dropdown-item" href="account/controllers/authController.php?logout=1">Logout</a>
                <a class="dropdown-item" onclick="confirm_delete(1);">Delete account</a>
              </div>
            </li>
              <?php endif; ?>



          </ul>
        </div>
      </div>
    </nav>
    
    <!-- END nav -->

    <div class="position-fixed w-100 h-100 fixed-top justify-content-center align-items-center" id="confirm_delete_box" style="display:none">
      <div class="w-lg-25 w-sm-75 w-md-50 position-absolute  rounded bg-primary p-3 mx-2">
        <h5 class="text-white">Are you sure want to delete account ?</h5>
        <div class="d-flex justify-content-around">
        <a href="account/controllers/authController.php?delete=1" class="btn btn-light text-primary">Delete account</a>
        <a class="btn btn-light text-primary" onclick="confirm_delete(0);">cancel</a>
        </div>
      </div>
    </div>