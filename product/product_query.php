<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

require_once $_SERVER['DOCUMENT_ROOT'] . '/zyro/my_shop/my_shop/local_system/constants.php';
require_once root_directory . 'database/db.php';

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['search_by_type']) and preg_match("/^[a-zA-Z_ ]*$/", test_input($_POST['search_by_type']))) select_products_according_to_query($_POST['search_by_type'], 'type');
else if (isset($_POST['search_by_name']) and (preg_match("/^[a-zA-Z ]*$/", test_input($_POST['search_by_name'])))) select_products_according_to_query($_POST['search_by_name'], 'name');
else if (!isset($_POST['search_by_name']) and !isset($_POST['search_by_type'])) 
    select_products_according_to_query('%', 'name');
else if (isset($_POST['search_by_name']) and !preg_match("/^[a-zA-Z ]*$/", test_input($_POST['search_by_name']))) echo "No result found";

function select_products_according_to_query($q, $query_type)
{
    $con = $GLOBALS['con'];
    $results_per_page = 9;

    $sql = "SELECT * FROM products WHERE $query_type LIKE '%$q%' ";
    $result = mysqli_query($con, $sql);

    $number_of_results = mysqli_num_rows($result);

    $number_of_pages = ceil($number_of_results / $results_per_page);

    if (!isset($_POST['page'])) $page = 1;

    else $page = $_POST['page'];

    $this_page_first_result = ($page - 1) * $results_per_page;

    $sql = "SELECT * FROM products WHERE $query_type LIKE '%$q%' ORDER BY RAND() LIMIT " . $this_page_first_result . ',' . $results_per_page;
    $result = mysqli_query($con, $sql);

    echo '<div class="row" id="products_list">';

    if ($number_of_results <= 0) echo '<div>No result found</div>';
    else while ($row = mysqli_fetch_array($result)) search_query_products($row);

    echo ' 
                 </div> <!-- row ends here --> 


                                        
                <div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
		              <ul>';
    
    if($q=='%')  // particular case only for all products 
    	$q='';
    for ($page = 1;$page <= $number_of_pages;$page++) echo '<li><a onclick=page_change(' . $page . ',"' . $q . '");>' . $page . '</a></li> &nbsp;  &nbsp;';

    echo '</ul>
		            </div>
		          </div>
		        </div>';
} /*select_products_according_to_query ends here*/

function search_query_products($row)
{
    echo '
		    	        <div class=" col-12 col-sm-6 col-md-6 col-lg-4 ftco-animate' . $row['type'] . '">
		    				<div class="product">
		    					<a onclick=go_to_single_product_page("' . $row['code'] . '"); class="img-prod"><img class="img-fluid" src="' . $row['image'] . '" alt="product image" id="product_image">
		    						<span class="status">' . mt_rand(30, 70) . '%</span>
		    						<div class="overlay"></div>
		    					</a>
                       
		    					<div class="text py-3 px-3">
		    						<h3><a>' . $row['name'] . '</a></h3>
		    						<div class="d-flex">
		    							<div class="pricing">
				    						<p class="price"><span class="mr-2 price-dc">' . $row["price"] . '</span><span class="price-sale">' . $row["price"] . '</span></p>
				    					</div>
				    					<div class="rating">
			    							<p class="text-right">
			    								<a><span class="ion-ios-star-outline"></span></a>
			    								<a><span class="ion-ios-star-outline"></span></a>
			    								<a><span class="ion-ios-star-outline"></span></a>
			    								<a><span class="ion-ios-star-outline"></span></a>
			    								<a><span class="ion-ios-star-outline"></span></a>
			    							</p>
			    						</div>
			    					</div>
			    					<p class="bottom-area d-flex px-3">';
			    					  if(!isset($_SESSION['cart_item'][$row['code']]['quantity'])):
		    					        echo '<a onclick=add_to_cart("add","' . $row['code'] . '"); class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>';
		    						  else:
		    							echo '<a href="cart.php" class="add-to-cart text-center py-2 mr-1"><span>Go to cart<i class="ion-ios-add ml-1"></i></span></a>';
		    						  endif;
		    						    echo '<a href="checkout.php" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>';
		    				   echo '</p>
		    					</div>
		    				</div>
		    			</div>';
} /*search_query_products($row) ends here*/

?>
