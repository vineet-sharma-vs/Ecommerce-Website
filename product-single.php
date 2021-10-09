<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  require_once $_SERVER['DOCUMENT_ROOT'].'/zyro/my_shop/my_shop/local_system/constants.php';
  require_once  root_directory.'database/db.php';

  if(isset($_POST['product_code']))
     $product_code=$_POST['product_code'];
  else
     header("location:index.php");
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
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"><a href="index.php">Product</a></span> <span>Product Single</span></p>
            <h1 class="mb-0 bread">Product Single</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">

        <?php
          $sql = "SELECT * FROM products WHERE code='$product_code'";
          $result = mysqli_query($con,$sql);
          $product = mysqli_fetch_array($result);
        ?>

    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="<?php echo $product['image'] ?>" class="image-popup"><img src="<?php echo $product['image'] ?>" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3><?php echo $product['name'] ?></h3>
    				<div class="rating d-flex">
							<p class="text-left mr-4">
								<a href="#" class="mr-2">5.0</a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
							</p>
							<p class="text-left mr-4">
								<a href="#" class="mr-2" style="color: #000;"><?php echo rand(50,100); ?> <span style="color: #bbb;">Rating</span></a>
							</p>
							<p class="text-left">
								<a href="#" class="mr-2" style="color: #000;"><?php echo rand(100,1000) ?><span style="color: #bbb;"> Sold</span></a>
							</p>
						</div>
    				<p class="price"><span>Rs.<?php echo $product['price'] ?></span></p>
    				<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
    				<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.
						</p>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex">
		              <div class="select-wrap">
	                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                  <select name="" id="" class="form-control">
	                  	<option value="">Small</option>
	                    <option value="">Medium</option>
	                    <option value="">Large</option>
	                    <option value="">Extra Large</option>
	                  </select>
	                </div>
		            </div>
							</div>
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">
	                	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
	                   <i class="ion-ios-remove"></i>
	                	</button>
	            		</span>
	             	<input type="text" id="quantity" name="quantity" class="form-control input-number" value="0" min="1" max="100" >
	             	<span class="input-group-btn ml-2">
	                	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
	                     <i class="ion-ios-add"></i>
	                 </button>
	             	</span>
	          	</div>
	          	<div class="w-100"></div>
	          	<div class="col-md-12">
	          		<p style="color: #000;">80 piece available</p>
	          	</div>
          	</div>
          	<p class="d-flex d-md-block justify-content-between">
              <a  class="btn btn-black py-3 px-3 text-white" onclick="add_to_cart_single_product('<?php echo $product['code'] ?>')">Add to Cart</a>&nbsp;&nbsp;&nbsp;&nbsp;
              <a  class="btn btn-black py-3 px-3 " href="checkout.php">Buy now</a>
            </p>
    			</div>
    		</div>
    	</div>
    </section>

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
    

    <section class="ftco-section bg-light">
      <div class="container">
     <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Ralated Products</h2>
            <p>"I always find beauty in things that are odd and imperfect, they are much more interesting."</p>
          </div>
        </div>      
      </div>

      <div class="container">
        <div class="row">
          <div class="order-md-last">
           <div class="row"> 
              
        
        <?php 
          $sql = "SELECT * FROM products ORDER BY RAND() ASC LIMIT 16";
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
      </div><!-- container -->


    </section>

<?php require_once 'footer.php'; ?> <!-- footer file -->  
  
</body>
</html>
 
 
  <script> 
    // for +/- cart items input
    $(document).ready(function(){

    var quantitiy=0;
       $('.quantity-right-plus').click(function(e){
            
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
                
                $('#quantity').val(quantity + 1);

              
                // Increment
            
        });

         $('.quantity-left-minus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
          
                // Increment
                if(quantity>0){
                $('#quantity').val(quantity - 1);
                }
        });
        
    });


  // single product  page input (product-single.php)
  function add_to_cart_single_product(cde){
    $.ajax({
      type: 'POST',
      url: ('cart/cart_controller.php'),
      data: {action:'add',code:cde, quantity:$('#quantity').val() }
    }).done(function(data){
      $('#nav_cart_items').html('');
      $('#nav_cart_items').html('<span class="icon-shopping_cart"></span>['+data+']');
    }).fail(function(){ 
       alert("cann't add to cart now");
    });
  }
</script>