<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }  
  require_once $_SERVER['DOCUMENT_ROOT'].'/zyro/my_shop/my_shop/local_system/constants.php';
  require_once root_directory.'account/controllers/authController.php';
  require_once root_directory.'database/db.php';
 
  //verify the user using token
  if(isset($_GET['token']))
  {
  	$token = $_GET['token'];
  	verifyUser($token);
  }
?>

  
<!DOCTYPE html>
<html lang="en">
  <head>
     <?php require_once 'all_link_files.php'; ?>
  </head>
  <body class="goto-here">

  <!-- nav bar file  -->
  <?php require_once 'header.php';?> 

         <?php  
         if(isset($_SESSION['valid_token'])){
           $message_sent = $_SESSION['valid_token'];
           if($message_sent=='1')
             $message_sent = 'Your have been successfully registered';
           else
             $message_sent = "Invalid token,cann't registered";
          
          echo '<div class="modal myModal_token" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content " style="border:3px solid #5cb85c;">
      
        
        <div class="modal-header">
          <h4 class="modal-title text-success">'.$message_sent.'</h4>
          <button type="button" class="close" style="color:#5cb85c;" data-dismiss="modal">&times;</button>
        </div>
        
        
        
      </div>
    </div>
  </div>';
  
           unset($_SESSION['valid_token']);
         }
   ?>


    <section id="home-section" class="hero">
		  <div class="home-slider js-fullheight owl-carousel">
	      <div class="slider-item js-fullheight">
	      	<div class="overlay"></div>
	        <div class="container-fluid p-0">
	          <div class="row d-md-flex no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
	          	<div class="one-third order-md-last img js-fullheight" style="background-image:url(images/bg_1.jpg);">
	          	</div>
		          <div class="one-forth d-flex js-fullheight align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text">
		          		<span class="subheading">My eCommerce Shop</span>
		          		<div class="horizontal">
		          			<h3 class="vr" style="background-image: url(images/divider.jpg);">Stablished Since 2019</h3>
				            <h1 class="mb-4 mt-3">Catch Your Own <br><span>Stylish &amp; Look</span></h1>
				            <p>A small river named Duden flows by their place and supplies it with the nece				            
				            <p><a href="shop.php" class="btn btn-primary px-5 py-3 mt-3">Discover Now</a></p>
				          </div>
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>

	      <div class="slider-item js-fullheight">
	      	<div class="overlay"></div>
	        <div class="container-fluid p-0">
	          <div class="row d-flex no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
	          	<div class="one-third order-md-last img js-fullheight" style="background-image:url(images/bg_2.jpg);">
	          	</div>
		          <div class="one-forth d-flex js-fullheight align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text">
		          		<span class="subheading">My eCommerce Shop</span>
		          		<div class="horizontal">
		          			<h3 class="vr" style="background-image: url(images/divider.jpg);">Best eCommerce Online Shop</h3>
				            <h1 class="mb-4 mt-3">A Thouroughly <span>Modern</span> Woman</h1>
				            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country.</p>
				            
				            <p><a href="shop.php" class="btn btn-primary px-5 py-3 mt-3">Shop Now</a></p>
				          </div>
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>
	    </div>
    </section>

    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
			<div class="container">
				<div class="row">
					<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/about.jpg);">
						<!-- <a href="https://vimeo.com/45830194" class="icon popup-vimeo d-flex justify-content-center align-items-center">
							<span class="icon-play"></span>
						</a> -->
					</div>
					<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
	          <div class="heading-section-bold mb-4 mt-md-5">
	          	<div class="ml-md-0">
		            <h2 class="mb-4">Better Way to Ship Your Products</h2>
	            </div>
	          </div>
	          <div class="pb-md-5">
							<p>How to Ship Items Sold Online: Make an online sale. Determine which products to package and the total size and weight. Confirm the shipping destination. Determine which shipping carrier is being used and calculate the shipping cost. Send the package out via the appropriate carrier.</p>
							<div class="row ftco-services">
			          <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
			            <div class="media block-6 services">
			              <div class="icon d-flex justify-content-center align-items-center mb-4">
			            		<span class="flaticon-002-recommended"></span>
			              </div>
			              <div class="media-body">
			                <h3 class="heading">Refund Policy</h3>
			                <p>In retail, returning is the process of a customer taking previously purchased merchandise back to the retailer.</p>
			              </div>
			            </div>      
			          </div>
			          <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
			            <div class="media block-6 services">
			              <div class="icon d-flex justify-content-center align-items-center mb-4">
			            		<span class="flaticon-001-box"></span>
			              </div>
			              <div class="media-body">
			                <h3 class="heading">Premium Packaging</h3>
			                <p>Find here Garment Packaging Bags, Clothes Packing Bags manufacturers, suppliers & exporters in India. </p>
			              </div>
			            </div>    
			          </div>
			          <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
			            <div class="media block-6 services">
			              <div class="icon d-flex justify-content-center align-items-center mb-4">
			            		<span class="flaticon-003-medal"></span>
			              </div>
			              <div class="media-body">
			                <h3 class="heading">Superior Quality</h3>
			                <p>All things will be produced in superior quantity and quality, and with greater ease, when each man works at a single occupation.</p>
			              </div>
			            </div>      
			          </div>
			        </div>
						</div>
					</div>
				</div>
			</div>
		</section>

    <section class="ftco-section bg-light">
    	<div class="container">
		 <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Best Sellers</h2>
            <p>"The dress must follow the body of a woman, not the body following the shape of the dress."</p>
          </div>
        </div>   		
    	</div>

    	<div class="container">
        <div class="row">
          <div class="order-md-last">
    			 <div class="row"> 
              
        
        <?php 
          $sql = "SELECT * FROM products ORDER BY RAND() ASC LIMIT 8";
          $result = mysqli_query($con,$sql);
          if((mysqli_num_rows($result))>0)
            while($product_array = mysqli_fetch_array($result)){
             echo '<div class="col-sm col-md-6 col-lg-4 col-xl-3 mx-3  mx-sm-0 ftco-animate ftco-animate">';
               include 'product_list.php';
             echo '</div> <!-- <div class="col-sm col-md-6 col-lg ftco-animate">-->';
            }
        ?>
    		   </div><!-- row-->
          </div> <!-- <div class="col-md-8 col-lg-10 order-md-last"> -->
        </div><!-- row -->
      </div><!--   container -->


    </section>


    <section class="ftco-section ftco-choose ftco-no-pb ftco-no-pt">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-8 d-flex align-items-stretch">
    				<div class="img" style="background-image: url(images/about-1.jpg);"  ></div>
    			</div>
    			<div class="col-md-4 py-md-5 ftco-animate">
    				<div class="text py-3 py-md-5">
	            <h2 class="mb-4">New Women's Clothing Summer Collection 2019</h2>
	            <p>"You can never take too much care over the choice of your shoes. Too many women think that they are unimportant, but the real proof of an elegant woman is what is on her feet."</p>
	            <p><a href="shop.php" class="btn btn-white px-4 py-3">Shop now</a></p>
    				</div>
    			</div>
    		</div>

    		<div class="row">
    			<div class="col-md-5 order-md-last d-flex align-items-stretch">
    				<div class="img img-2" style="background-image: url(images/about-2.jpg);"></div>
    			</div>
    			<div class="col-md-7 py-3 py-md-5 ftco-animate">
    				<div class="text text-2 py-md-5">
	            <h2 class="mb-4">"Fashion you can buy, but style you possess.</h2>
	            <p>
	            The key to style is learning who you are, which takes years. There's no how-to road map to style. It's about self expression and, above all, attitude."</p>
	            <p><a href="shop.php" class="btn btn-white px-4 py-3">Shop now</a></p>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section bg-light">
    	<div class="container">
		 <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Products</h2>
            <p>"You gotta have style. It helps you get down the stairs. It helps you get up in the morning. It’s a way of life."</p>
          </div>
        </div>   		
    	</div>

    	<div class="container">
        <div class="row">
          <div class="order-md-last">
    			 <div class="row"> 
              
        <style type="text/css">
        	
        	  #product_image{
        	     	height: 400px;
        	     	 width:100%;
        	  }
        	
              @media screen and (max-width:992px){
                #product_image{
        	  	  height: 400px;
        	  	  width:100%;

        	    }	
              }

               @media screen and (max-width:576px){
                #product_image{
        	  	  height:100%;
        	  	  width:100%;
        	    }	
              }

        </style>




        <?php 
          $sql = "SELECT * FROM products ORDER BY RAND() ASC LIMIT 8";
          $result = mysqli_query($con,$sql);
          if((mysqli_num_rows($result))>0)
            while($product_array = mysqli_fetch_array($result)){
             echo '<div class="col-sm col-md-6 col-lg-4 col-xl-3 mx-3  mx-sm-0 ftco-animate ftco-animate">';
               include 'product_list.php';
             echo '</div> <!-- <div class="col-sm col-md-6 col-lg ftco-animate">-->';
            }
        ?>

    		</div><!-- row-->
          </div> <!-- <div class="col-md-8 col-lg-10 order-md-last"> -->
        </div><!-- row -->
      </div><!--   container -->


    </section>
    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_4.jpg);">
    	<div class="container">
    		<div class="row justify-content-center py-5">
    			<div class="col-md-10">
		    		<div class="row">
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="10000">0</strong>
		                <span>Happy Customers</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="100">0</strong>
		                <span>Branches</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="1000">0</strong>
		                <span>Partner</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="100">0</strong>
		                <span>Awards</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>

    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate">
            <h2 class="mb-4">Our satisfied customer says</h2>
            <p>"You’ve impressed me over and over with your knowledge, professionalism, courtesy and responsiveness.
Lucy is a truly outstanding company and we can all agree that you have really made our work here a success."</p>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(images/employee/vineet_3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-5 pl-4 line">“Your time is limited, so don't waste it living someone else's life.”</p>
                    <p class="name">Vineet Kumar</p>
                    <span class="position">Interface Manager</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(images/employee/amit.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-5 pl-4 line">“Have the end in mind and every day make sure your working towards it”</p>
                    <p class="name">Amit Sharma</p>
                    <span class="position">Marketing Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(images/employee/kahnaiya.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-5 pl-4 line">“Business has only two functions – marketing and innovation.”</p>
                    <p class="name">Kahnaiya Kharwar</p>
                    <span class="position">UI Designer</span>
                  </div>
                </div>
              </div>
              
              
            </div>
          </div>
        </div>
      </div>
    </section>
		<hr>




		<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center py-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
              <h2>Subcribe to our Newsletter</h2>
              <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-8">
                  <form class="subscribe-form" id="subscribeform">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address" name="subscribers" style="letter-spacing: 0;text-transform:none;font-size: 18px;" id="subscribersemail">
                      <input type="button" value="Subscribe" class="submit px-3" name="subscribebtn" id="subscribebtn">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

 

 <div class="modal modal_subscription" id="myModal" >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border border-danger">
      
        
        <div class="modal-header">
          <h4 class="modal-title text-danger" id="subscription_message"></h4>
          <button type="button" class="close subscribe text-danger" data-dismiss="modal">&times;</button>
        </div>
        
      </div>
    </div>
  </div>
 

  <?php require_once 'footer.php'; ?> <!-- footer file -->  
    
  </body>
</html>

<script type="text/javascript">
  // for subscription in index page (index.php)
  $(document).ready(function(){

      $('.subscribe').click(function(){
          $('.modal_subscription').hide();
      });

      $('#subscribebtn').click(function(){
        $.post('subscription/subscribe.php',
         {
          subscribebtn: 'ok',
          subscribers: $('#subscribersemail').val()
         },
         function(data,status){
          $('.modal_subscription').css('display','block');
          $('#subscription_message').text(data);
         });
      });
  });


  // for token verification mode box message (index.php)
   $(window).on('load',function(){
        $('.myModal_token').modal('show');
    });
</script>
