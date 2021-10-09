  //add to cart 
  function add_to_cart(acn,cde){
    $.ajax({
      type: 'POST',
      url: ('cart/cart_controller.php'),
      data: {action:acn,code:cde}
    }).done(function(data){
      $('#nav_cart_items').html('');
      $('#nav_cart_items').html('<span class="icon-shopping_cart"></span>['+data+']');
    }).fail(function(){ 
       alert("cann't add to cart now");
    });
  }


  //for all anchor tags for cursor pointer
  $(document).ready(function(){
    $('a').mouseenter(function(){
      $(this).css('cursor','pointer');
    });
  });



  //go to single product page
  function go_to_single_product_page(cde){
    var form = '<form method="post" id="product_single_form" action="product-single.php"><input type="text" name="product_code" value='+cde+'></form>';
    $('body').append(form);
    $('#product_single_form').submit();
  }

  function confirm_delete(x){
    if(x==0)
      $('#confirm_delete_box').css('display','none');
    else
      $('#confirm_delete_box').css('display','flex');
  }
   
   


  

