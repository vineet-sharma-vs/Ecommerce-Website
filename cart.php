<?php
 if (session_status() == PHP_SESSION_NONE) {
    session_start();
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

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>

<!-- for cart items list -->
<style type="text/css"> 

   @media screen and (max-width:770px){

    #my_product_img_td{
      width: 150px;
      border :1px solid red;
    } 
    
    #my_product_img{
      height: 230px;
    }

    .my_cart_column{
      width:48%;
      margin: 0 auto 0 auto;
    }

   @media screen and (max-width:450px){
    .my_cart_column{
      width: 100%;
       margin: 0 10px 0 10px;
    }
    
  } 
</style>

<section class="ftco-section ftco-cart">
      <div class="container-fluid mx-auto px-lg-5">


    <?php
        if(isset($_SESSION["cart_item"])){
        $total_quantity = 0;
        $total_price = 0;
    ?>

<!-- table_1 if screen width is less than 770px -->
 <div class="row d-md-none"> 

                        <?php
                            foreach($_SESSION['cart_item'] as $item)
                             {
                               
                               $item_price = $item['quantity']*$item['price']
                             ?> 
  <div class="my_cart_column d-md-none">           
  <table class="table" style="border:1px solid rgb(222, 226, 230);">
                <thead class="thead-dark">
                  <tr class="text-center">
                    <th colspan="2">Your Cart item</th>
                  </tr>
                </thead>
                <tbody>

                  <tr>
                    <td class="" id="my_product_img_td">
                      <a href="product-single.php?product_code=<?php echo $item["code"]; ?>"><img src="<?php echo $item["image"]; ?>" alt="product_image"  class="w-100" id="my_product_img"></td>
                    <td>
                       <div>
                         <br>
                         <ul class="list-unstyled">
                             <li class="text-left"><?php echo $item["name"]; ?></li>
                             <br>
                             <li class="text-left">Price &nbsp; &nbsp; <?php echo "$ ".$item["price"]; ?></li>
                             <br>
                             <li class="text-left">Quantity  &nbsp;  &nbsp; <input type="text" name="quantity" class="quantity w-25 text-center" value="<?php echo $item["quantity"]; ?>" min="0" onblur="add_to_cart_quantity('<?php echo $item["code"]; ?>',this.value)" ></li>
                             <br>
                             <li class="text-left">Total  &nbsp;  &nbsp;<?php echo "$ ". number_format($item_price,2); ?></li>
                         </ul>
                       </div>
                    </td>
                  </tr>
                  <tr>
                   <td><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>"><img src="images/icon/icon-delete.png" /></a></td>
                   <td><a href="checkout.php">Buy now</a></td>
                  </tr>

                </tbody>
              </table>
        </div>

        <?php } ?>

    </div><!-- row -->
  <!-- table_1 if screen width is less than 770px ends here -->









<!-- table_1 if screen width is greater than 770px start here-->
        <div class="row mx-lg-5 d-none d-md-block">
          <div class="col-md-12 ftco-animate">
            <div class="cart-list">
     

	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>Remove</th>
						        <th>Image</th>
						        <th>Product</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
                    <th></th>
						      </tr>
						    </thead>
						    <tbody>

                            <?php
                            foreach($_SESSION['cart_item'] as $item)
                             {
                               $item_price = $item['quantity']*$item['price']
                             ?>
                <div class="d-none d-md-block">             
						      <tr class="text-center">
						        <td class="product-remove"><a onclick="remove_an_item('remove','<?php echo $item["code"]?>')"><img src="images/icon/icon-delete.png" alt="Remove Item" /><!-- <span class="ion-ios-close"></span> --></a></td>
						        
						        <td class="image-prod"><a onclick="go_to_single_product_page('<?php echo $item['code'] ?>');"> <div class="img" style="background-image:url(<?php echo $item["image"]; ?>);"></div></a></td>
						        
						        <td class="product-name">
						        	<h3><?php echo $item["name"]; ?></h3>
						        	<p></p>
						        </td>
						        
						        <td class="price"><?php echo "$ ".$item["price"]; ?></td>
						        
                    <td class="quantity">
                      <div class="input-group mb-3">
                        <input type="text" name="quantity"  class="quantity form-control input-number" value="<?php echo $item["quantity"]; ?>" min="0" onblur="add_to_cart_quantity('<?php echo $item["code"]; ?>',this.value)">
                      </div>
                    </td>
                    
                    <td class="total"><?php echo "$ ". number_format($item_price,2); ?></td>
                    <td class="buy">
                      <a href="checkout.php">Buy now</a>
                    </td>
						      </tr><!-- END TR--> 
                  </div><!-- div for showing rows only if screen size  --> 
                          <?php 

                            $total_quantity += $item["quantity"];
                          $total_price += ($item["price"]*$item["quantity"]);
                            } ?>
                 
						    </tbody>
						  </table>
	          </div>
          </div>
        </div> <!-- row ends here -->
 <!-- table_1 if screen width is greater than 770px ends here -->

    <?php } else {
     ?>
     <div>
     <p class="text-center text-dark">Your cart is Empty now</p>
     <p class="text-center"><a href="shop.php" class="btn btn-info py-3 px-4">Shop now</a></p>
     </div>
     <?php } ?> 

                      

                         <?php
        if(isset($_SESSION["cart_item"]) and ($_SESSION['num_of_items_in_cart'])>0){
    ?> 		
    		<div class="row justify-content-center">
    			<div class="col-8 col-sm-6 col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                  
    		     	<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Total Items</span>
    						<span><?php echo $total_quantity; ?></span>
    					</p>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span><?php echo "$ ".number_format($total_price, 2); ?></span>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>$0.00</span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span>$0.00</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span><?php echo "$ ".number_format($total_price, 2); ?></span>
    					</p>
    				</div>
    				<p class="text-center"><a href="checkout.php" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    				<p class="text-center"><a onclick="empty_cart('empty');" class="btn btn-primary py-3 px-4" href="#">Empty Cart</a></p>
    			</div>
    		</div>
			</div>

	 <?php } ?>

		</section>

<?php require_once 'footer.php'; ?> <!-- footer file -->
  
  </body>
</html>



  <script type="text/javascript">
    function empty_cart(acn){
      $.ajax({
        type: 'POST',
        url: ('cart/cart_controller.php'),
        data: {action: acn}
      }).done(function(data){
         location.reload(true);
      }).fail(function(){
         alert('something wrong');
      });
    }

   function remove_an_item(acn,cde){
    $.ajax({
       type: 'POST',
       url: ('cart/cart_controller.php'),
       data: {action: acn,code: cde}
    }).done(function(data,status){
       location.reload(true);
    }).fail(function(){
       alert('something wrong');
    });
   }

   // for cart items quantity change
  function add_to_cart_quantity(cde,qty){
    $.ajax({
      type: 'POST',
      url: 'cart/cart_controller.php',
      data: {action: 'add', code:cde ,quantity:qty}
    }).done(function(data,status){
       location.reload(true);
    }).fail(function(){
       alert('something wrong');
    });
  };





  </script>

