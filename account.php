<?php

require __DIR__ . '/functions.php';

// Create connection
$conn = get_database();

require __DIR__ . '/actions.php';


// $_POST['email'] = "chuanxd52@gmail.com";
// $_POST['password'] = "123456";

// $page = "index.php";
// unset($_SESSION['email']);
?>



<!DOCTYPE html>
<html lang="fr">

<head>
<title>Tài khoản <?php echo $_SESSION["login"]["username"];?> | La Pharmacie</title>

<?php echo get_head();?>
<link href="./Css/account.css" rel="stylesheet">  
<link href="./Css/pagedesigner.css" rel="stylesheet">  
<link href="./Css/content.css" rel="stylesheet">   
<link media="print" href="./Css/print-account.css" rel="stylesheet">

</head>



<body class="page-account no-apple-pay">

<main class="l-plp">
        

        <div class="l-plp__top">
            
            

<?php require __DIR__ . '/header.php'?>


<h1><?php echo $_SESSION["login"]["username"];?></h1>

<form action="actions.php?action=disconnect" method="post">
<button type="submit">Đăng xuất</button>
</form>

<?php if (isadmin()) { ?>
<a href="commands.php">Đơn hàng</a>
<?php } ?>

</div>
</main>
</body>
</html>