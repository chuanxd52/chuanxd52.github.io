<?php


require __DIR__ . '/functions.php';

// Create connection
$conn = get_database();

require __DIR__ . '/actions.php';


?>



<!DOCTYPE html>
<html lang="fr">

<head>
<title>Đơn hàng | La Pharmacie</title>
<?php echo get_head();?>
<link href="./Css/cart.css" rel="stylesheet">   

<style>
.select{font-size:0.9rem;border:none;background-color: #009ee2;padding:5px;margin-bottom:0px;color:#ffff;width:100%}

.button{font-size:0.9rem;border:none;background-color: #009ee2;padding:5px;margin-bottom:5px;color:#ffff;width:100%}
.button:hover{border:1px solid;background: #fff;background-color: #fff;color:#060606;}
</style>

</head>



<body class="page-cart no-apple-pay">


<?php require __DIR__ . '/header.php'?>


<?php if (isadmin()) { ?>
<div class="page">

<div class="l-cart m-footer-stickybar-disabled">

<!-- dwMarker="slot" dwContentID="cart-top-promo" dwContext="global"-->
<h1 class="l-cart__heading">Đơn hàng</h1>
<div class="l-cart__content">

<main class="l-cart__main"><!-- dwMarker="slot" dwContentID="purchase-with-purchase-slot" dwContext="global"-->

	<!-- <div class="l-cart__promotions">  <div class="c-alert m-success m-icon"> <div class="c-alert__message">Vous bénéficiez de LIVRAISON OFFERTE DÈS 45 € D'ACHAT</div> </div>  </div> -->




<?php


$sql = "SELECT * FROM commands;";
$commands = $conn->query($sql);

if ($commands->num_rows > 0) {

while(($item = $commands->fetch_assoc())) {
    $icommand = $item["id"];
    $name = $item["name"];
    $email = $item["email"];
    $phone = $item["phone"];
    $status = $item["status"];
    $date = $item["date"];
    $products = json_decode($item["products"]);

    $sql = "SELECT * FROM myproducts;";
    $myproducts = $conn->query($sql);
    $tmp = array();
    if ($myproducts->num_rows > 0) {
    while(($item = $myproducts->fetch_assoc())) {
        $iprod = $item["id"];
        $tmp[$iprod] = $item;
    }};


    $total_quantity = 0;
    $total_available_quantity = 0;
    $total_price = 0;

    foreach ($products as $k=>$product){
        $iprod = (int) $product[0];
        $quantity = (int) $product[1];
        $available_quantity = (int) $product[2];
        $total_quantity += $quantity;
        $total_available_quantity += $available_quantity;


        $price = (float) $tmp[$iprod]["price"];
        $price = (int) ($price*25*1.4);

        $total_price += ($price*$available_quantity);
        $strtotal_price = number_format($total_price*1000, 0, ',', ' ');

    };


?>

<table class="c-product-table"> 
<tbody class="c-product-table__body">   

    <tr class="c-product-table__row m-product m-row-1"> 

        <td><h4>  <?php echo $name ?>  </h4></td> 
        <td><h4>  <?php echo $date ?> </h4>        </td>
        <td><h4>  <?php echo $strtotal_price ?> đ </h4>        </td>

        <td class="c-product-table__cell m-image">
            <input name="status_<?php echo $icommand ?>" value="<?php echo $status ;?>" class="select" form="savecommands">
        </td> 
    </tr> 

</tbody> 
</table> 

<div class="l-cart__section">
<table class="c-product-table" role="presentation"> 
<tbody class="c-product-table__body">   

<?php
    foreach ($products as $k=>$product){



        $iprod = (int) $product[0];
        $quantity = (int) $product[1];
        $tmp[$iprod]["quantity"] = $quantity;
        $available_quantity = (int) $product[2];
        $tmp[$iprod]["available_quantity"] = $available_quantity;

        $dom = new DOMDocument();
        $dom->loadHTML($tmp[$iprod]['img']);
        $img=$dom->getElementsByTagName('img')[0];
        $img->setAttribute("style", "max-height:100px;max-width:100px;width: auto; height: auto;" );
        $dom->appendChild($img);
        $tmp[$iprod]["img"]=$dom->saveHTML();



        $price = (float) $tmp[$iprod]["price"];
        $price = (int) ($price*25*1.4);
        $strprice = number_format($price*1000, 0, ',', ' ');
        $tmp[$iprod]["price"] = $strprice;


        end($products);
        if ($k === key($products)) {
            echo add_product_commands($icommand,$tmp[$iprod]);
        } else {
            echo add_product_commands($icommand,$tmp[$iprod]);
            echo divider_product_panier();
        };

    }

?>
</tbody> 
</table> 
</div>




<?php  } ?>



<form action="commands.php?action=savecommands"  method="post" id="savecommands"></form>

<table class="c-product-table"> 
<tbody class="c-product-table__body">   

    <tr class="c-product-table__row m-product m-row-1"> 

        <td class="c-product-table__cell m-total">
            <form action="commands.php?action=remove_all_commands" method="post">
              <button class="button" type="submit">Remove all commands</button> 
            </form>
        </td> 
        <td  class="c-product-table__cell m-total">
              <button class="button" type="submit" form="savecommands">Save</button> 
            
        </td> 
    </tr> 

</tbody> 
</table> 

<?php  }  ?>


</div>
</main>
</div>
</div>


<?php 
} else {  ?>
<div class="page"><div class="l-cart m-footer-stickybar-disabled">
<h1 class="l-cart__heading">Trang này chỉ dành cho admin</h1>
</div></div>

<?php 
}
?>

</body>
</html>