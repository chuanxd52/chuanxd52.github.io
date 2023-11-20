<?php
libxml_use_internal_errors(true);

function get_database(){
    define( 'DB_NAME', 'pharmacie' );

    /** Database username */
    define( 'DB_USER', 'root' );

    /** Database password */
    define( 'DB_PASSWORD', '' );

    /** Database hostname */
    define( 'DB_HOST', '127.0.0.1' );

    /** Database charset to use in creating database tables. */
    define( 'DB_CHARSET', 'utf8' );

    /** The database collate type. Don't change this if in doubt. */
    define( 'DB_COLLATE', '' );


    // Create connection
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);

    return $conn;
}



function get_head() {?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes">  

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="./Css/category.css" rel="stylesheet">   

<link href="./Css/commons.css" rel="stylesheet">  


<style>
#contact-table{font-size:0.875rem;vertical-align:middle;margin-right:10px}
#contact-table-a{
    font-size:1rem;
    color: #000;
    direction: ltr;
    font-family: Locator-Regular,sans-serif;
    font-size: .75rem;
    font-weight: 400;
    line-height: 1.5;
}

#contact-table-a:hover {
    color: #009ee2;
}
</style>
<?php return ob_get_clean(); }



function menu_level_2( $text, $href) {
    $output = sprintf( <<<EOT
<li class="c-navigation__item m-level-2" data-category="offers"> <span class="c-navigation__item-title m-level-2 " data-js-trigger="" data-analytics="{&quot;breakpoints&quot;:{&quot;large down&quot;:{&quot;category&quot;:&quot;main menu navigation&quot;,&quot;action&quot;:&quot;select::burger menu&quot;,&quot;label&quot;:&quot;offres&quot;,&quot;extraData&quot;:{&quot;event_name&quot;:&quot;menu_click&quot;,&quot;click_area&quot;:&quot;burger menu&quot;,&quot;breadcrumb&quot;:&quot;offres&quot;}},&quot;xlarge&quot;:{&quot;category&quot;:&quot;main menu navigation&quot;,&quot;action&quot;:&quot;select::header&quot;,&quot;label&quot;:&quot;offres&quot;,&quot;extraData&quot;:{&quot;event_name&quot;:&quot;menu_click&quot;,&quot;click_area&quot;:&quot;header&quot;,&quot;breadcrumb&quot;:&quot;offres&quot;}}}}"> <a class="c-navigation__link m-without-subcategories m-level-2 " data-js-submenu-item="" href="%s" data-title="%s">  %s  </a> </span> </li>   </ul>  <div class="c-navigation__flyout-slot">
EOT , $href, $text, $text);
    return $output;
}


function menu_level_3( $text, $href) {
    $output = sprintf( <<<EOT
<li class="c-navigation__item m-level-3" data-category="shop-by_001_002"> <span class="c-navigation__item-title m-level-3 " data-js-trigger="" data-analytics="{&quot;breakpoints&quot;:{&quot;large down&quot;:{&quot;category&quot;:&quot;main menu navigation&quot;,&quot;action&quot;:&quot;select::burger menu&quot;,&quot;label&quot;:&quot;besoins::préoccupations::peau et cancer&quot;,&quot;extraData&quot;:{&quot;event_name&quot;:&quot;menu_click&quot;,&quot;click_area&quot;:&quot;burger menu&quot;,&quot;breadcrumb&quot;:&quot;besoins::préoccupations::peau et cancer&quot;}},&quot;xlarge&quot;:{&quot;category&quot;:&quot;main menu navigation&quot;,&quot;action&quot;:&quot;select::header&quot;,&quot;label&quot;:&quot;besoins::préoccupations::peau et cancer&quot;,&quot;extraData&quot;:{&quot;event_name&quot;:&quot;menu_click&quot;,&quot;click_area&quot;:&quot;header&quot;,&quot;breadcrumb&quot;:&quot;besoins::préoccupations::peau et cancer&quot;}}}}"> <a class="c-navigation__link m-without-subcategories m-level-3 " data-js-submenu-item="" href="%s" data-title="%s">  %s  </a> </span> </li>
EOT , $href, $text, $text);
    return $output;
}




function star($fill) {
$id = uniqid();

if ($fill == 0) {
$output1 = <<<EOT
<svg focusable="false" xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 25 25" style="width: 20px !important; height: 20px !important;"><polygon points="" style="fill: url(&quot;#bv_inline_ratings_star_filled_4_53.29_dkP2iGOkS1&quot;) !important;"></polygon><path d="M24.8676481,9.0008973 C24.7082329,8.54565507 24.2825324,8.23189792 23.7931772,8.20897226 L16.1009423,8.20897226 L13.658963,0.793674161 C13.4850788,0.296529881 12.9965414,-0.0267985214 12.4623931,0.00174912135 L12.4623931,0.00174912135 C11.9394964,-0.00194214302 11.4747239,0.328465149 11.3146628,0.81767189 L8.87268352,8.23296999 L1.20486846,8.23296999 C0.689809989,8.22949161 0.230279943,8.55030885 0.0640800798,9.0294023 C-0.102119784,9.50849575 0.0623083246,10.0383495 0.472274662,10.3447701 L6.69932193,14.9763317 L4.25734261,22.4396253 C4.08483744,22.9295881 4.25922828,23.4727606 4.68662933,23.7767181 C5.11403038,24.0806756 5.69357086,24.0736812 6.11324689,23.7595003 L12.6333317,18.9599546 L19.1778362,23.7595003 C19.381674,23.9119158 19.6299003,23.9960316 19.8860103,23.9994776 C20.2758842,24.0048539 20.6439728,23.8232161 20.8724402,23.5127115 C21.1009077,23.202207 21.1610972,22.8017824 21.0337405,22.4396253 L18.5917612,14.9763317 L24.6967095,10.3207724 C25.0258477,9.95783882 25.0937839,9.43328063 24.8676481,9.0008973 Z" style="fill: url(&quot;#
EOT;


$output2 = <<<EOT
&quot;) !important;"></path><defs><lineargradient id="
EOT;

$output3 = <<<EOT
" x1="0%" y1="0%" x2="0%" y2="0%"><stop offset="0%" style="stop-color: rgb(0, 143, 205); stop-opacity: 1;"></stop><stop offset="1%" style="stop-color: rgb(180, 180, 180); stop-opacity: 1;"></stop></lineargradient></defs></svg>
EOT;
}
elseif ($fill == 1) {
$output1 = <<<EOT
<svg focusable="false" xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 25 25" style="width: 20px !important; height: 20px !important;"><polygon points="" style="fill: url(&quot;#bv_inline_ratings_star_filled_0_99.99_7A7NKHqE7D&quot;) !important;"></polygon><path d="M24.8676481,9.0008973 C24.7082329,8.54565507 24.2825324,8.23189792 23.7931772,8.20897226 L16.1009423,8.20897226 L13.658963,0.793674161 C13.4850788,0.296529881 12.9965414,-0.0267985214 12.4623931,0.00174912135 L12.4623931,0.00174912135 C11.9394964,-0.00194214302 11.4747239,0.328465149 11.3146628,0.81767189 L8.87268352,8.23296999 L1.20486846,8.23296999 C0.689809989,8.22949161 0.230279943,8.55030885 0.0640800798,9.0294023 C-0.102119784,9.50849575 0.0623083246,10.0383495 0.472274662,10.3447701 L6.69932193,14.9763317 L4.25734261,22.4396253 C4.08483744,22.9295881 4.25922828,23.4727606 4.68662933,23.7767181 C5.11403038,24.0806756 5.69357086,24.0736812 6.11324689,23.7595003 L12.6333317,18.9599546 L19.1778362,23.7595003 C19.381674,23.9119158 19.6299003,23.9960316 19.8860103,23.9994776 C20.2758842,24.0048539 20.6439728,23.8232161 20.8724402,23.5127115 C21.1009077,23.202207 21.1610972,22.8017824 21.0337405,22.4396253 L18.5917612,14.9763317 L24.6967095,10.3207724 C25.0258477,9.95783882 25.0937839,9.43328063 24.8676481,9.0008973 Z" style="fill: url(&quot;#
EOT;


$output2 = <<<EOT
&quot;) !important;"></path><defs><lineargradient id="
EOT;

$output3 = <<<EOT
" x1="99.99%" y1="0%" x2="100%" y2="0%"><stop offset="0%" style="stop-color: rgb(0, 143, 205); stop-opacity: 1;"></stop><stop offset="1%" style="stop-color: rgb(180, 180, 180); stop-opacity: 1;"></stop></lineargradient></defs></svg>
EOT;


} else {
$output1 = <<<EOT
<svg focusable="false" xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 25 25" style="width: 20px !important; height: 20px !important;"><polygon points="" style="fill: url(&quot;#bv_inline_ratings_star_filled_4_53.29_dkP2iGOkS1&quot;) !important;"></polygon><path d="M24.8676481,9.0008973 C24.7082329,8.54565507 24.2825324,8.23189792 23.7931772,8.20897226 L16.1009423,8.20897226 L13.658963,0.793674161 C13.4850788,0.296529881 12.9965414,-0.0267985214 12.4623931,0.00174912135 L12.4623931,0.00174912135 C11.9394964,-0.00194214302 11.4747239,0.328465149 11.3146628,0.81767189 L8.87268352,8.23296999 L1.20486846,8.23296999 C0.689809989,8.22949161 0.230279943,8.55030885 0.0640800798,9.0294023 C-0.102119784,9.50849575 0.0623083246,10.0383495 0.472274662,10.3447701 L6.69932193,14.9763317 L4.25734261,22.4396253 C4.08483744,22.9295881 4.25922828,23.4727606 4.68662933,23.7767181 C5.11403038,24.0806756 5.69357086,24.0736812 6.11324689,23.7595003 L12.6333317,18.9599546 L19.1778362,23.7595003 C19.381674,23.9119158 19.6299003,23.9960316 19.8860103,23.9994776 C20.2758842,24.0048539 20.6439728,23.8232161 20.8724402,23.5127115 C21.1009077,23.202207 21.1610972,22.8017824 21.0337405,22.4396253 L18.5917612,14.9763317 L24.6967095,10.3207724 C25.0258477,9.95783882 25.0937839,9.43328063 24.8676481,9.0008973 Z" style="fill: url(&quot;#
EOT;


$output2 = <<<EOT
&quot;) !important;"></path><defs><lineargradient id="
EOT;

$output3 = <<<EOT
" x1="53.29%" y1="0%" x2="100%" y2="0%"><stop offset="0%" style="stop-color: rgb(0, 143, 205); stop-opacity: 1;"></stop><stop offset="1%" style="stop-color: rgb(180, 180, 180); stop-opacity: 1;"></stop></lineargradient></defs></svg>
EOT;
}

$output=$output1.$id.$output2.$id.$output3;

return $output;}


function bv_stars($rating) {

if ($rating > 5) {$rating = 5;};

$fillstars = (int) ($rating);

if ($rating-$fillstars > 0) {
$halffillstars = 1;
} else {
$halffillstars = 0;
};

$emptystars = 5-$fillstars - $halffillstars;


$output="";
if ($fillstars>0){
$x = 1;
do {
  $output = $output.star(1);
  $x++;
} while ($x <= $fillstars);
}


if ($halffillstars>0){
$x = 1;
do {
  $output = $output.star(0.5);
  $x++;
} while ($x <= $halffillstars);
}


if ($emptystars>0){
$x = 1;
do {
  $output = $output.star(0);
  $x++;
} while ($x <= $emptystars);
}

return $output;
}





function add_product($item) {
$id     =   $item["id"];
$name   =   $item["name"];
$href   =   $item["href"];
$description=   $item["description"];
$price  =   $item["price"];
$img    =   $item["img"];
$rating =   $item["rating"];


?>

<div class="c-product-tile__wrapper c-product-grid__tile aos-init aos-animate" id="<?php echo $id ?>"> 
<figure class="c-product-tile "> 
<div class="c-product-tile__figure"> 
<div class="c-product-tile__thumbnail">  

<a class="c-product-image c-product-image__link m-with-alternatives" href="<?php echo $href ?>">  
<span>

<?php echo $img ?>

</span>  
</a>    
</div> 
</div> 

<figcaption class="c-product-tile__caption"> <div class="c-product-tile__caption-inner">  
<div class="c-product-tile__wishlist">  
<button class="c-add-to-wishlist"><span class="h-show-for-sr">Liste de favoris</span> </button>
</div>   
<h2 class="c-product-tile__name"><a href="<?php echo $href ?>" title="<?php echo $name ?>"><?php echo $name ?></a></h2>

<p class="c-product-tile__description"><?php echo $description ?></p>

<div class="c-product-tile__info m-multiple-items" >  
<div class="c-product-tile__info-item c-product-tile__rating"><div><div><a href="<?php echo $href ?>" class="bv_main_container bv_hover">

<div class="bv_stars_component_container" aria-hidden="true">
<div class="bv_stars_button_container">
<span class="bv_stars_svg_no_wrap" aria-hidden="true">


<?php echo bv_stars($rating) ?>

</span>
</div>
</div>
</a></div></div></div>

<div class="c-product-tile__info-item c-product-tile__price"><div class="c-product-price"><span class="c-product-price__value"><?php echo $price ?> đ</span></div></div>
</div>
</div>      



<div class="c-product-tile__actions m-add-bag-enabled">  <form method="post" action="index.php?action=add&id=<?php echo $id ?>"><input type="hidden" name="quantity" value="1"><button class="c-button m-expand-for-medium-down c-product-add-bag__button" type="submit">  <span class="c-product-add-bag__text">Thêm vào giỏ hàng</span> </button> </form></div>

</figcaption> </figure> </div>


    <?php
    return ob_get_clean();
}

function add_product_panier($item) {
if ($item["quantity"] > 1) {
    $disabled_minus_button="";
} else {
    $disabled_minus_button='disabled="disabled"';
}
?>
    <tr class="c-product-table__row m-product m-row-1"> 

        <td class="c-product-table__cell m-image" rowspan="2">   <button class="c-product-table-details__action m-edit" type="button">      <div class="c-product-image">  <span class="c-product-image__primary"><picture><?php echo $item["img"] ?></picture></span>   </div>     </button>  </td> 

        <td class="c-product-table__cell m-details"> 
            <div class="c-product-table-details m-auto-height"> <div class="c-product-table-details__info">  <h3 class="c-product-table-details__title"> <button class="c-product-table-details__action m-edit" type="button"><?php echo $item["name"] ?></button></h3><div class="c-product-variation">  <div class="c-product-variation__item m-size">   <span class="c-product-variation__value"></span> </div>  </div> <div class="c-product-table-details__bundle"></div> </div> </div> 
        </td>

        <form action="actions.php?action=minus&id=<?php echo $item["id"]; ?>" method="post" id="minus_<?php echo $item["id"] ?>"></form>
        <form action="actions.php?action=plus&id=<?php echo $item["id"]; ?>" method="post" id="plus_<?php echo $item["id"] ?>"></form>

        <td class="c-product-table__cell m-quantity" rowspan="2"> <div class="c-product-table-allocation"> <div class="c-product-table-allocation__qty">   <div class="c-product__quantity-selector">  <div class="c-stepper-input "> 
            <button class="c-stepper-input__minus" type="submit" <?php echo $disabled_minus_button ?> form="minus_<?php echo $item["id"]; ?>">−</button> 
            <input class="c-stepper-input__field " value="<?php echo $item["quantity"] ?>"> <label class="c-stepper-input__label">Số lượng</label> 
            <button class="c-stepper-input__plus" type="submit" form="plus_<?php echo $item["id"]; ?>">+</button> 
        </div> </div>    </div>  </div>  
        <!-- <div class="c-product-table-allocation__status"> <span class="c-cart-item__availibility m-in-stock">En stock</span>     </div>  </div> </td> -->

        <td class="c-product-table__cell m-total" rowspan="2"> 
            <div class="c-product-table__price ">    <span class="c-product-table__price-value  "><?php echo $item["price"] ?> đ</span>     </div>     
            <!-- <div style="margin-top:70px"></div>      -->
            <!-- <div class="c-product-table__price ">    <span class="c-product-table__price-value  ">Tổng : <?php echo $item["totalprice"] ?> đ</span>     </div>      -->
        </td> 
    </tr> 

    <tr class="c-product-table__row m-product m-row-2"> 
        <td class="c-product-table__cell m-actions">
            <div class="c-product-table-details m-auto-height"> <div class="c-product-table-details__actions  ">   
                <!-- <button class="c-product-table-details__action m-edit">   Modifier  </button>   
                <button class="c-product-table-details__action c-product-table__wishlist m-wishlist"> 
                    <span class="c-product-table__wishlist-add">Ajouter à mes favoris</span> 
                    <span class="c-product-table__wishlist-remove">Supprimer des présélections</span> 
                </button>    -->
                <button class="c-product-table-details__action m-remove"> <a href="actions.php?action=remove&id=<?php echo $item["id"]; ?>">Xóa khỏi giỏ hàng</a></button>   
            </div>  </div> 
        </td>
    </tr>


    <?php
    return ob_get_clean();
}




function add_product_commands($id_command,$item) {
if ($item["quantity"] > 1) {
    $disabled_minus_button="";
} else {
    $disabled_minus_button='disabled="disabled"';
}
?>
    <tr class="c-product-table__row m-product m-row-1"> 

        <td class="c-product-table__cell m-image" rowspan="2">   <button class="c-product-table-details__action m-edit" type="button">      <div class="c-product-image">  <span class="c-product-image__primary"><picture><?php echo $item["img"] ?></picture></span>   </div>     </button>  </td> 

        <td class="c-product-table__cell m-details"> 
            <div class="c-product-table-details m-auto-height"> <div class="c-product-table-details__info">  <h3 class="c-product-table-details__title"> <button class="c-product-table-details__action m-edit" type="button"><?php echo $item["name"] ?></button></h3><div class="c-product-variation">  <div class="c-product-variation__item m-size">   <span class="c-product-variation__value"></span> </div>  </div> <div class="c-product-table-details__bundle"></div> </div> </div> 
        </td>

        <td class="c-product-table__cell m-quantity" rowspan="2"> 
            <div class="c-product-table-allocation"> <div class="c-product-table-allocation__qty">   <div class="c-product__quantity-selector">  <div class="c-stepper-input "> 
                <input class="c-stepper-input__field " name="available_quantity_<?php echo $id_command."_".$item["id"] ?>" value="<?php echo $item["available_quantity"] ?>" form="savecommands"> 
                <input class="c-stepper-input__field " disabled="disabled" value="/<?php echo $item["quantity"] ?>"> 
                <label class="c-stepper-input__label">Số lượng</label> 

            </div> </div>    </div>  </div>  
        <!-- <div class="c-product-table-allocation__status"> <span class="c-cart-item__availibility m-in-stock">En stock</span>     </div>  </div> </td> -->

        <td class="c-product-table__cell m-total" rowspan="2">
            <div class="c-product-table__price ">    <span class="c-product-table__price-value  "><?php echo $item["price"] ?> đ</span>     </div>     
            <!-- <div style="margin-top:70px"></div>      -->
            <!-- <div class="c-product-table__price ">    <span class="c-product-table__price-value  ">Tổng : <?php echo $item["totalprice"] ?> đ</span>     </div>      -->
        </td> 
    </tr> 

    <tr class="c-product-table__row m-product m-row-2"> 
        <td class="c-product-table__cell m-actions">
            <div class="c-product-table-details m-auto-height"> <div class="c-product-table-details__actions  " >   
                <!-- <button class="c-product-table-details__action m-edit">   Modifier  </button>   
                <button class="c-product-table-details__action c-product-table__wishlist m-wishlist"> 
                    <span class="c-product-table__wishlist-add">Ajouter à mes favoris</span> 
                    <span class="c-product-table__wishlist-remove">Supprimer des présélections</span> 
                </button>    -->

                <button class="c-product-table-details__action m-remove" > <a href="<?php echo $item["producthref"]; ?>" ><?php echo substr($item["producthref"],0,40)."..."; ?></a></button>
            </div>  </div> 
        </td>
    </tr>


    <?php
    return ob_get_clean();
}




function divider_product_panier() {?>
    <tr class="c-product-table__row m-divider" role="presentation"> <td colspan="4" class="c-product-table__cell m-divider"> <div class="c-product-table__divider"></div> </td> </tr>   

    <?php
    return ob_get_clean();
}




function get_login_status($conn){
    if (empty($_SESSION["login"])) {
        $flag=false;
        $uname="";
    } else {
        $email = $_SESSION["login"]['email'];
        $password = $_SESSION["login"]['password'];
        $sql = "SELECT * FROM users;";
        $users = $conn->query($sql);


        $flag_user=false;
        $flag_pw=false;
        if ($users->num_rows > 0) {
        while(($user = $users->fetch_assoc())) {
            $uemail = $user["email"];
            $upassword = $user["password"];
 
            if ($email == $uemail) {
                // echo $uemail.$password.$upassword;
                $flag_user=true;
                if ($password == $upassword) {$flag_pw=true;$uname = $user["username"];}
            };

        };
        };

        if ($flag_user and $flag_pw) {
            $flag=true;
        } else {
            $flag=false;
            $uname="";
        };

    };



return array("islogin"=>$flag,"username"=>$uname);};




function get_user_info($email,$conn){

        $sql = "SELECT * FROM users;";
        $users = $conn->query($sql);

        if ($users->num_rows > 0) {
        while(($user = $users->fetch_assoc())) {
            $uemail = $user["email"];
            $upassword = $user["password"];
 
            if ($email == $uemail) { $res = $user; };

        };
        };



return $res;};



function isadmin(){
    $flag = false;
    if (isset($_SESSION["login"])){
        $flag = ($_SESSION["login"]["islogin"] and ($_SESSION["login"]["email"] === "chuanxd52@gmail.com"));
    };
    return $flag;
}