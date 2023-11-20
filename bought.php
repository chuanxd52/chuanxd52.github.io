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
<title>Đặt hàng | La Pharmacie</title>
<?php echo get_head();?>
<link href="./Css/cart.css" rel="stylesheet">   
</head>



<body class="page-cart no-apple-pay">


<?php require __DIR__ . '/header.php'?>



<div class="page">
<h1>
Đặt hàng thành công.
</h1>

<?php

$products = array();
if(isset($_SESSION["cart_item"])){
    foreach ($_SESSION["cart_item"] as $k=>$item){
        array_push($products,array($item["id"],$item["quantity"],$item["quantity"]));
        // $products["id"] = $item["id"],
        // $products["quantity"] = $item["quantity"];
    };
};

$email = $_SESSION["login"]["email"];
$user_info = get_user_info($email,$conn);

$today = date("m.d.y");

// $json = json_encode($_SESSION["cart_item"]); 
$json = json_encode($products); 
$sql = "INSERT INTO commands (name,email,phone,products,date,status) VALUES ('" . $user_info["username"] . "','" . $user_info["email"] . "','" . $user_info["email"] . "','" . $json . "','" . $today . "','New') ";
$conn->query($sql);

unset($_SESSION["cart_item"]);
?>



<p> Đơn đặt hàng sẽ được gửi tới email : <?php echo $_SESSION["login"]["email"]?></p>
</div>


</body>
</html>