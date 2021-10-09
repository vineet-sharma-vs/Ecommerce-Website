    			  
    				<div class="product">
    					<a onclick="go_to_single_product_page('<?php echo $product_array['code'] ?>');" class="img-prod"><img class="img-fluid" src="<?php echo $product_array['image']?>" alt="Colorlib Template" id="product_image">
    						<span class="status"><?php echo mt_rand(30,70); ?>%</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 px-3">
    						<h3><a ><?php echo $product_array['name']; ?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale"><?php echo $product_array['price']; ?></span></p>
		    					</div>
		    					<div class="rating">
	    							<p class="text-right">
	    								<a ><span class="ion-ios-star-outline"></span></a>
	    								<a ><span class="ion-ios-star-outline"></span></a>
	    								<a ><span class="ion-ios-star-outline"></span></a>
	    								<a ><span class="ion-ios-star-outline"></span></a>
	    								<a ><span class="ion-ios-star-outline"></span></a>
	    							</p>
	    						</div>
	    					</div>
    						<p class="bottom-area d-flex px-3">
                              <?php if(!isset($_SESSION['cart_item'][$product_array['code']]['quantity'])):  ?>
    							<a onclick="add_to_cart('add','<?php echo $product_array['code']; ?>');" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
                              <?php else: ?>
                                <a href="cart.php" class="add-to-cart text-center py-2 mr-1"><span>Go to cart<i class="ion-ios-add ml-1"></i></span></a>
                              <?php endif; ?>
    							<a href="checkout.php" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
    						</p>
    					</div>
    				</div>
    			