<?php
session_start();

if(!empty($_GET["action"])) {
switch($_GET["action"]) {
    case "add":
        if(!empty($_POST["quantity"])) {
            $productByid = $conn->query("SELECT * FROM myproducts WHERE id=" . $_GET["id"]);

            $itemArray = $productByid->fetch_assoc();

            if(!empty($_SESSION["cart_item"])) {
                $flag=false;
                foreach($_SESSION["cart_item"] as $k => $v) {
                    if($itemArray['id'] == $v['id']) {
                        $flag=true;
                        break;
                    };
                };


                if($flag) {

                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($itemArray['id'] == $v['id']) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                    }
                } else {

                    // array_push($_SESSION["cart_item"],$itemArray);
                    $_SESSION["cart_item"][$itemArray['id']] = $itemArray;
                    $_SESSION["cart_item"][$itemArray['id']]["quantity"] = $_POST["quantity"];
                }
            } else {

                $_SESSION["cart_item"] = array($itemArray['id']=>$itemArray);
                $_SESSION["cart_item"][$itemArray['id']]["quantity"] = $_POST["quantity"];
            }
        };
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit;
    case "remove":
        if(!empty($_SESSION["cart_item"])) {
            foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET["id"] == $v['id'])
                        unset($_SESSION["cart_item"][$k]);                
                    if(empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
            }
        
        };
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit;
    case "empty":
        unset($_SESSION["cart_item"]);
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit;
    case "minus":
        $_SESSION["cart_item"][$_GET["id"]]["quantity"] += -1;
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit;
    case "plus":
        $_SESSION["cart_item"][$_GET["id"]]["quantity"] += 1;
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit;


    case "commander":


        if (isset($_SESSION["login"]["islogin"])) {
            if (!$_SESSION["login"]["islogin"]) {
                header("Location:register.php");
            } else {

                header("Location:bought.php");
                // unset($_SESSION["login"]);
                // if (isset($_SESSION["cart_item"])) {unset($_SESSION["cart_item"]);};
            };
        } else {
            header("Location:register.php");
        };




        exit;



    case "login":
        $_SESSION["login"] = array("email" => $_POST["email"], "password" => $_POST["password"]);
        $login = get_login_status($conn);
        $flag = $login["islogin"];
        $username = $login["username"];
        $_SESSION["login"]["username"]=$username;
        if ($flag) {
            $text = "Tài khoản";echo "y";
            $href = "account.php";
            $_SESSION["login"]["islogin"] = true;
            header("Location:".$_SESSION["LASTESTPAGE"]);
        } else {
            $text = "Đăng nhập";
            $href = "register.php";
            $_SESSION["login"]["islogin"] = false;
            header("Location: register.php");
        };
        exit;
    case "disconnect":
        unset($_SESSION["login"]);
        header("Location:".$_SESSION["LASTESTPAGE"]);
        // header("Location: index.php");
        // header("Location: {$_SERVER['HTTP_REFERER']}");
        exit;




    case "register":
        // print_r($_POST);
        $sql = "SELECT * FROM users;";
        $users = $conn->query($sql);

        $flag=false;
        if ($users->num_rows > 0) {

        while(($user = $users->fetch_assoc())) {
            $email = $user["email"];
            if ($email === $_POST["email"]) {$flag=true;};
        };
        };

        if ($flag) {
            $_SESSION["register"] = false;
            header("Location: register.php");
        } else {
            $_SESSION["register"] = true;
            $sql = "INSERT INTO users (name,email,phone,products,date,status) VALUES ('" . $_POST["name"] . "','" . $user_info["email"] . "','" . $user_info["email"] . "','" . $json . "','" . $today . "','New') ";
            $conn->query($sql);
            header("Location: register.php"); 
        };

        exit;

    case "disconnect":
        unset($_SESSION["login"]);
        header("Location:".$_SESSION["LASTESTPAGE"]);
        header("Location: index.php");
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit;





    case "remove_all_users":
        if (isadmin()){
            $sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'users'" ;
            $resquery = $conn->query($sql);
            if ($resquery->num_rows > 0) {
            $sql = "DROP TABLE users";
            $conn->query($sql);
            };


            $sql = "
            CREATE TABLE users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(30) NOT NULL,
            password VARCHAR(30) NOT NULL,
            username VARCHAR(30) NOT NULL,
            sex VARCHAR(30) NOT NULL,
            phone VARCHAR(30) NOT NULL
            )
            ";

            if ($conn->query($sql) === TRUE) {
              echo "Table MyGuests created successfully";
            } else {
              echo "Error creating table: " . $conn->error;
            };

            $sql = "INSERT INTO users (email,password,username,sex,phone) VALUES ('chuanxd52@gmail.com','123456','Vu Duc Chuan','Mr','0752450584') ";
            $conn->query($sql);

            header("Location: {$_SERVER['HTTP_REFERER']}");
        };
        exit;


    case "remove_all_commands":
        if (isadmin()){

            $sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'commands'" ;
            $resquery = $conn->query($sql);
            if ($resquery->num_rows > 0) {
            $sql = "DROP TABLE commands";
            $conn->query($sql);
            };


            $sql = "
            CREATE TABLE commands (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            email VARCHAR(30) NOT NULL,
            phone VARCHAR(30) NOT NULL,
            products VARCHAR(8001) NOT NULL,
            date VARCHAR(30) NOT NULL,
            status VARCHAR(30) NOT NULL
            )
            ";

            if ($conn->query($sql) === TRUE) {
              echo "Table MyGuests created successfully";
            } else {
              echo "Error creating table: " . $conn->error;
            };
            header("Location: {$_SERVER['HTTP_REFERER']}");

        };

        exit;



    case "savecommands":
        // print_r($_POST);
        $sql = "SELECT * FROM commands;";
        $commands = $conn->query($sql);

        if ($commands->num_rows > 0) {

        while(($item = $commands->fetch_assoc())) {
            $icommand = $item["id"];
            $name = $item["name"];
            $email = $item["email"];
            $phone = $item["phone"];
            $status = $_POST["status_".$icommand];
            $date = $item["date"];
            $products = json_decode($item["products"]);

            $sql = "UPDATE commands SET status = '". $status ."' WHERE id = ". $icommand .";";
            $conn->query($sql);


            foreach ($products as $k=>$product){
                $available_quantity = $_POST["available_quantity_".$icommand."_".$product[0]];
                $products[$k][2] = $available_quantity;
            };

            $json = json_encode($products); 

            $sql = "UPDATE commands SET products = '". $json ."' WHERE id = ". $icommand .";";
            $conn->query($sql);

        };
        };
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit;

};
};


?>