<?php
  
  include 'database/db.php';
   
  $t=0;
  $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
  $arr = array(
               array("shirt",substr(str_shuffle($permitted_chars), 0, 7),"images/product_100.jpg",mt_rand(250,3000),mt_rand(10,100),"shirts_and_tops"),
               array("dresses",substr(str_shuffle($permitted_chars), 0, 7),"images/product_95.jpg",mt_rand(250,3000),mt_rand(10,100),"dresses"),
               array("shorts",substr(str_shuffle($permitted_chars), 0, 7),"images/product_102.jpg",mt_rand(250,3000),mt_rand(10,100),"shorts_and_skirts"),
               array("jackets",substr(str_shuffle($permitted_chars), 0, 7),"images/product_104.jpg",mt_rand(250,3000),mt_rand(10,100),"jackets"),
               array("sleeveless t-shirt",substr(str_shuffle($permitted_chars), 0, 7),"images/product_144.jpg",mt_rand(250,3000),mt_rand(10,100),"sleeveless"),
               array("trousers",substr(str_shuffle($permitted_chars), 0, 7),"images/product_103.jpg",mt_rand(250,3000),mt_rand(10,100),"trousers"),
               array("addidas shoes",substr(str_shuffle($permitted_chars), 0, 7),"images/product_65.jpg",mt_rand(250,3000),mt_rand(10,100),"addidas"),
               array("nike shoes",substr(str_shuffle($permitted_chars), 0, 7),"images/product_66.jpg",mt_rand(250,3000),mt_rand(10,100),"nike"),
               array("jumpsuits",substr(str_shuffle($permitted_chars), 0, 7),"images/product_96.jpg",mt_rand(250,3000),mt_rand(10,100),"jumpsuits"),
               array("coat",substr(str_shuffle($permitted_chars), 0, 7),"images/product_110.jpg",mt_rand(250,3000),mt_rand(10,100),"winter_coats"),
               array("tops",substr(str_shuffle($permitted_chars), 0, 7),"images/product_119.jpg",mt_rand(250,3000),mt_rand(10,100),"shirts_and_tops"),
               array("dresses clothes",substr(str_shuffle($permitted_chars), 0, 7),"images/product_108.jpg",mt_rand(250,3000),mt_rand(10,100),"dresses"),
               array("skirts",substr(str_shuffle($permitted_chars), 0, 7),"images/product_111.jpg",mt_rand(250,3000),mt_rand(10,100),"shorts_and_skirts"),
               array("kids jackets",substr(str_shuffle($permitted_chars), 0, 7),"images/product_105.jpg",mt_rand(250,3000),mt_rand(10,100),"jackets"),
               array("royal coat",substr(str_shuffle($permitted_chars), 0, 7),"images/product_94.jpg",mt_rand(250,3000),mt_rand(10,100),"coats"),
               array("cool jeans",substr(str_shuffle($permitted_chars), 0, 7),"images/product_8.jpg",mt_rand(250,3000),mt_rand(10,100),"jeans"),
               array("sleeveless shirt",substr(str_shuffle($permitted_chars), 0, 7),"images/product_89.jpg",mt_rand(250,3000),mt_rand(10,100),"sleeveless"),
               array("cool trousers",substr(str_shuffle($permitted_chars), 0, 7),"images/product_113.jpg",mt_rand(250,3000),mt_rand(10,100),"trousers"),
               array("winter coats",substr(str_shuffle($permitted_chars), 0, 7),"images/product_118.jpg",mt_rand(250,3000),mt_rand(10,100),"winter_coats"),
               array("jumpsuits",substr(str_shuffle($permitted_chars), 0, 7),"images/product_101.jpg",mt_rand(250,3000),mt_rand(10,100),"jumpsuits"),
               array("nike shoes",substr(str_shuffle($permitted_chars), 0, 7),"images/product_80.jpg",mt_rand(250,3000),mt_rand(10,100),"nike"),
               array("addidas shoes",substr(str_shuffle($permitted_chars), 0, 7),"images/product_79.jpg",mt_rand(250,3000),mt_rand(10,100),"addidas"),
               array("shirts",substr(str_shuffle($permitted_chars), 0, 7),"images/product_107.jpg",mt_rand(250,3000),mt_rand(10,100),"sketchers"),
               array("jackets",substr(str_shuffle($permitted_chars), 0, 7),"images/product_112.jpg",mt_rand(250,3000),mt_rand(10,100),"jackets"),
               array("full shirts",substr(str_shuffle($permitted_chars), 0, 7),"images/product_166.jpg",mt_rand(250,3000),mt_rand(10,100),"shirts_and_tops"),
               
              );
  while($t<25)
 { 
    $sql = "INSERT INTO products (name,code,image,price,quantity,type) VALUES(?,?,?,?,?,?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('sssdis',$name,$code,$image,$price,$quantity,$type);
    $name = $arr[$t][0];
    $code = $arr[$t][1];
    $image = $arr[$t][2];
    $price = $arr[$t][3];
    $quantity = $arr[$t][4];
    $type = $arr[$t][5];

    if($stmt->execute())
       echo "successuflly added";
    else
       echo "fukkkk..";
    $t++;
 }


 
?>