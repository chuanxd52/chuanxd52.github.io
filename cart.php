<?php


require __DIR__ . '/functions.php';

// Create connection
$conn = get_database();

require __DIR__ . '/actions.php';



// $_POST['email'] = "chuanxd52@gmail.com";
// $_POST['password'] = "1234567";

?>



<!DOCTYPE html>
<html lang="fr">

<head>
<title>Giỏ hàng | La Pharmacie</title>
<?php echo get_head();?>
<link href="./Css/cart.css" rel="stylesheet">   
</head>



<body class="page-cart no-apple-pay">


<?php require __DIR__ . '/header.php'?>



<div class="page">


<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
    foreach ($_SESSION["cart_item"] as $k=>$item){

        $price = (float) $item["price"];
        $price = (int) ($price*25*1.4);
        $item_price = $item["quantity"]*$price;
        $stritem_price = number_format($item_price*1000, 0, ',', ' ');
        $strprice = number_format($price*1000, 0, ',', ' ');

        $total_quantity += $item["quantity"];
        $total_price += ($price*$item["quantity"]);
        $strtotal_price = number_format($total_price*1000, 0, ',', ' ');
    }
} else {
    $total_quantity = 0;
    $strtotal_price = "0";
};
?>




    <div class="l-cart m-footer-stickybar-disabled">
    
    <!-- dwMarker="slot" dwContentID="cart-top-promo" dwContext="global"-->
	<h1 class="l-cart__heading">Giỏ hàng (<?php echo $total_quantity?> sản phẩm)</h1>
    <div class="l-cart__content">
        
        <main class="l-cart__main"><!-- dwMarker="slot" dwContentID="purchase-with-purchase-slot" dwContext="global"-->
	 

	<!-- <div class="l-cart__promotions">  <div class="c-alert m-success m-icon"> <div class="c-alert__message">Vous bénéficiez de LIVRAISON OFFERTE DÈS 45 € D'ACHAT</div> </div>  </div> -->


<div class="l-cart__section">


<table class="c-product-table" role="presentation"> 
<tbody class="c-product-table__body">   

<?php
if(isset($_SESSION["cart_item"])){
    foreach ($_SESSION["cart_item"] as $k=>$item){?>


        <?php

        $dom = new DOMDocument();
        $dom->loadHTML($item['img']);
        $img=$dom->getElementsByTagName('img')[0];
        $img->setAttribute("style", "max-height:100px;max-width:100px;width: auto; height: auto;" );
        $dom->appendChild($img);
        $item["img"]=$dom->saveHTML();


        $price = (float) $item["price"];
        $price = (int) ($price*25*1.4);
        $strprice = number_format($price*1000, 0, ',', ' ');
        $item["price"] = $strprice;
        $totalprice = $price * $item["quantity"];
        $strtotalprice = number_format($totalprice*1000, 0, ',', ' ');
        $item["totalprice"] = $strtotalprice;
        // $item["totalprice"] = 0;

            // echo add_product_panier($item);
            // echo divider_product_panier();


        end($_SESSION["cart_item"]);
        if ($k === key($_SESSION["cart_item"])) {
            echo add_product_panier($item);
        } else {
            echo add_product_panier($item);
            echo divider_product_panier();
        };
}}?>




</tbody> 

</table> 


</div>

</main>

        
        <aside class="l-cart__aside" style="top: 107.562px;"><section class="l-cart__section">


<table class="c-cart-summary-table">  
<tbody>



<tr class="c-cart-summary-table__item m-total"> <th class="c-cart-summary-table__cell m-label" scope="row"> <div class="h-text-uppercase">Thành tiền</div> <div class="h-color-text-secondary h-text-size-10"></div>  </th> <td class="c-cart-summary-table__cell m-value"><?php echo $strtotal_price?> đ</td> </tr>  
</tbody>
</table> 



<form action="actions.php?action=commander" method="post" id="commander"></form>
<div class="c-cart-box__actions"><div class="c-cart-buttons ">  <div><div class="c-cart-buttons__item m-checkout"><button class="c-button c-cart-buttons__button" type="submit" form="commander" <?php if ($total_quantity===0) {echo "disabled";} ?>> Đặt hàng </button></div></div></div></div> 


</section><!-- dwMarker="slot" dwContentID="product-you-may-also-like-cart-aside" dwContext="global" dwContextID="3337872411991|||3337875583626"-->



<section class="c-cart-box">
    <div class="c-cart-box__inner">
        <h2 class="c-cart-box__title h-color-dark">LIÊN HỆ VỚI CHÚNG TÔI</h2>


<table>  
<tbody>

<tr>
<td><i class="fa fa-phone" aria-hidden="true" id="contact-table"></i></td> 
<td>07 52 45 05 84</td>
</tr>

<tr>
<td><i class="fa fa-envelope" aria-hidden="true" id="contact-table"></i></td>
<td>chuanxd52@gmail.com</td> 
</tr>

<tr>
<td><i class="fa fa-facebook-official" aria-hidden="true" id="contact-table"></i></td>
<td><a href="https://www.facebook.com/Mr.boc.clc2" id ="contact-table-a">Facebook</a></td> 
</tr>
</tbody>
</table> 


<hr>



    </div>
</section> 



	</aside>
    </div>


</div>

<?php
// libxml_use_internal_errors(true);
// $file = "footer.html";
// $doc = new DOMDocument();
// $doc->loadHTMLFile($file);
// echo $doc->saveHTML();

// require __DIR__ . '/footer.html';
?>




</body>
</html>