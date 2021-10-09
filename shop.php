<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  
  if(isset($_POST['searchitem']))
    $search_item_var = $_POST['searchitem'];
  else
    $search_item_var = ''; 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once 'all_link_files.php'; ?>
  </head>
  <body class="goto-here">
  
  <!-- nav bar file  -->
  <div id="navigation_bar">
     <?php require_once 'header.php';?> 
  </div>




    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Collection Products</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
      <div class="container-fluid mx-auto px-5" >
        <div class="row px-xl-5 mx-xl-5">
          
          <!--For product list  -->
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

             a:hover{
              cursor: pointer;
             } 

          </style>

          <div class="col-md-9 col-lg-10 order-md-last" id="products_list">
            
          </div>  <!-- col-md-8 col-lg-10 order-md-last ends here -->


          <div class="col-md-3 col-lg-2 sidebar">
              <h3 class="heading mb-4 text-md-left text-center" id="allproducts" ><a class="text-warning" onclick="allproducts()">All products</a></h3>
           <div class="row">
            <div class="sidebar-box-2 col-4 col-md-12">
              <h2 class="heading mb-4"><a onclick="filterSelection('clothing')">Clothing</a></h2>
              <ul>
                <li><a onclick="filterSelection('shirts_and_tops')">Shirts &amp; Tops</a></li>
                <li><a onclick="filterSelection('dresses')">Dresses</a></li>
                <li><a onclick="filterSelection('shorts_and_skirts')">Shorts &amp; Skirts</a></li>
                <li><a onclick="filterSelection('jackets')">Jackets</a></li>
                <li><a onclick="filterSelection('coats')">Coats</a></li>
                <li><a onclick="filterSelection('sleeveless')">Sleeveless</a></li>
                <li><a onclick="filterSelection('trousers')">Trousers</a></li>
                <li><a onclick="filterSelection('winter_coats')">Winter Coats</a></li>
                <li><a onclick="filterSelection('jumpsuits')">Jumpsuits</a></li>
              </ul>
            </div>
            <div class="sidebar-box-2 col-4 col-md-12">
              <h2 class="heading mb-4"><a>Jeans</a></h2>
              <ul>
                <li><a onclick="filterSelection('shirts')">Shirts &amp; Tops</a></li>
                <li><a onclick="filterSelection('dresses')">Dresses</a></li>
                <li><a onclick="filterSelection('shorts_and_skirts')">Shorts &amp; Skirts</a></li>
                <li><a onclick="filterSelection('jackets')">Jackets</a></li>
                <li><a onclick="filterSelection('coats')">Coats</a></li>
                <li><a onclick="filterSelection('jeans')">Jeans</a></li>
                <li><a onclick="filterSelection('sleeveless')">Sleeveless</a></li>
                <li><a onclick="filterSelection('trousers')">Trousers</a></li>
                <li><a onclick="filterSelection('winter_coats')">Winter Coats</a></li>
                <li><a onclick="filterSelection('jumpsuits')">Jumpsuits</a></li>
              </ul>
            </div>
            <!-- <div class="sidebar-box-2">
              <h2 class="heading mb-2"><a>Bags</a></h2>
              <h2 class="heading mb-2"><a>Accessories</a></h2>
            </div> -->
            <div class="sidebar-box-2 col-4 col-md-12">
              <h2 class="heading mb-4"><a>Shoes</a></h2>
              <ul>
                <li><a onclick="filterSelection('nike')">Nike</a></li>
                <li><a onclick="filterSelection('addidas')">Addidas</a></li>
                <li><a onclick="filterSelection('sketchers')">Skechers</a></li>
                <li><a onclick="filterSelection('jackets')">Jackets</a></li>
                <li><a onclick="filterSelection('coats')">Coats</a></li>
                <li><a onclick="filterSelection('jeans')">Jeans</a></li>
              </ul>
            </div>
           </div><!-- row fro sidebar-box-2" ends here-->
          </div>
        </div>
      </div>
    </section>

    <?php require_once 'footer.php'; ?> <!-- footer file -->
  
  </body>
</html>

<script>
  $(document).ready(function(){
    {
     

    var search_item = "<?php echo $search_item_var ?>";
    if(search_item.length != 0)
    {
       $.ajax({
        type: 'POST',
        url: 'product/product_query.php',
        data: {search_by_name: search_item }                                                                            
      }).done(function(data){
        $('#products_list').html(data);
      }).fail(function(){
         alert('posting failed'); 
        });
    }
    else
        $.post('product/product_query.php',
       function(data,status){
         $('#products_list').html(data);
       });
    }

   $("#searchbar").submit(function(){
      $.ajax({
        type: 'POST',
        url: 'product/product_query.php',
        data: {search_by_name: $('#search_item_input').val()}                                                                            
      }).done(function(data){
        $('#products_list').html(data);
      }).fail(function(){
         alert('posting failed');
      });

     // to prevent refreshing the whole page page
     return false;
    });


  });


  function allproducts(){
    $.post('product/product_query.php',
    function(data,status){
      $('#products_list').html(data);
    });
  }

  function filterSelection(t) {
    $(document).ready(function(){
     $.post('product/product_query.php',
         {
           search_by_type: t
         },
         function(data,status){
          $('#products_list').html(data);
      });
    });
  }
  function page_change(n,t) {
    $(document).ready(function(){
     $.post('product/product_query.php',
         {
           page: n,
           search_by_type: t
         },
         function(data,status){
          $('#products_list').html(data);
      });
    });
  }


</script>



