<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

  require_once $_SERVER['DOCUMENT_ROOT'].'/zyro/my_shop/my_shop/local_system/constants.php';
  require_once root_directory.'database/db.php';


if(empty($_SESSION['num_of_items_in_cart']))
   $_SESSION['num_of_items_in_cart']='0';
if(!empty($_POST['action']))
  {

  	switch ($_POST['action'])
  	{
  		case 'add':
  		     if(!isset($_POST['quantity']))
           {
             $sql = "SELECT * FROM products WHERE code='".$_POST['code']."'";
             $result = mysqli_query($con,$sql);
             $productByCode = mysqli_fetch_array($result);

             $itemArray = array($productByCode['code']=>array('name'=>$productByCode['name'],'code'=>$productByCode['code'],'quantity'=>'1','price'=>$productByCode['price'],'image'=>$productByCode['image']));

            if(!empty($_SESSION['cart_item']))
            {
               if(in_array($productByCode['code'],array_keys($_SESSION['cart_item'])))
               {
                  foreach ($_SESSION['cart_item'] as $k => $v)
                   {
                  	 if($productByCode['code']==$k)
                  	 {
                  	 	if(empty($_SESSION['cart_item'][$k]['quantity']))
                  	 	  $_SESSION['cart_item'][$k]['quantity']=0;
  
                    	 	$_SESSION['cart_item'][$k]['quantity']+=1;
                  	 }
                   }
               }

               else
               {
                 $_SESSION['cart_item'] = array_merge($_SESSION['cart_item'],$itemArray);
                 $_SESSION['num_of_items_in_cart']+=1;
               }

            }
            else
            {
            	$_SESSION['cart_item'] = $itemArray;
              $_SESSION['num_of_items_in_cart']=1;
            }
        
              
            
             
            

            echo $_SESSION['num_of_items_in_cart'];
          } //if quantity is not given ends here
  



           else
           {
              
             $quantity = $_POST['quantity'];
             $sql = "SELECT * FROM products WHERE code='".$_POST['code']."'";
             $result = mysqli_query($con,$sql);
             $productByCode = mysqli_fetch_array($result);
             $itemArray = array($productByCode['code']=>array('name'=>$productByCode['name'],'code'=>$productByCode['code'],'quantity'=>$quantity,'price'=>$productByCode['price'],'image'=>$productByCode['image']));
            
            if(!empty($_SESSION['cart_item']))
            {  
               if(in_array($productByCode['code'],array_keys($_SESSION['cart_item'])))
               {
                  foreach ($_SESSION['cart_item'] as $k => $v)
                   {
                     if($productByCode['code']==$k)
                     {
                      if(empty($_SESSION['cart_item'][$k]['quantity']))
                        $_SESSION['cart_item'][$k]['quantity']=0;
                        $_SESSION['cart_item'][$k]['quantity']=$quantity;
                         
                     }
                   }
               }

               else
               {
                 $_SESSION['cart_item'] = array_merge($_SESSION['cart_item'],$itemArray);
                 $_SESSION['num_of_items_in_cart']+=1;
                
               }

            }
            else
            { 
              $_SESSION['cart_item'] = $itemArray;
              $_SESSION['num_of_items_in_cart']=1;
            }

           echo $_SESSION['num_of_items_in_cart'];
        }// quantity is given



   			break;

  		case 'remove':
  			
              if(!empty($_SESSION['cart_item']))
              {
              	foreach ($_SESSION['cart_item'] as $k => $v)
              	 {
              	  if($_POST['code']==$k)
              	  {
              	  	 $_SESSION['num_of_items_in_cart']-=1;
              	  	 unset($_SESSION['cart_item'][$k]);
                  }

              	  if(empty($_SESSION['cart_item']))
              	  {
              	  	 unset($_SESSION['cart_item']);
              	  	 $_SESSION['num_of_items_in_cart']=0;
              	  }
              	 }
              }

  			break;


  		case 'empty':
  			 unset($_SESSION['cart_item']);
  			 $_SESSION['num_of_items_in_cart']=0;
         echo 0;
  			break;



  		
  		
  	}
    $_POST['action']='';
  }

?>
