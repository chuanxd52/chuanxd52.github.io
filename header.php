<div class="l-header__main-area-wrapper" style="border-bottom: 1px solid #CECECE;padding-bottom:5px;">
    <div class="l-header__main-area">
        <!-- logo -->
        <div class="l-header__logo">  <a href="index.php" class="a_logo">LA PHARMACIE</a>  </div>
        <!-- logo -->

        <!-- left header -->
        <div class="l-header__top-nav m-left"><ul class="l-header__top-nav-list">
            <li class="l-header__top-nav-item m-stores">
                <a class="c-storeslink" href="">  
                    <span class="c-storeslink__text">Cửa hàng</span>
                </a> 
            </li>
            <li class="l-header__top-nav-item m-stores">
                <a class="c-user__link m-login" href="" >  
                    <span class="c-storeslink__text">Giới thiệu</span>
                </a> 
            </li>

        </ul></div>
        <!-- left header -->


        <!-- right header -->
        <div class="l-header__top-nav m-right">
        <div class="l-header__top-nav-row">
<?php 

$array=explode("/", $_SERVER['SCRIPT_NAME']);
if (end($array) !== "register.php" and end($array) !== "account.php" and end($array) !== "commands.php") {
    $_SESSION["LASTESTPAGE"] = $_SERVER['SCRIPT_NAME'];
}
// echo ($_SESSION["LASTESTPAGE"]);

$login = get_login_status($conn);
$flag = $login["islogin"];
$username = $login["username"];
if ($flag) {
    $text = "Tài khoản";
    $href = "account.php";
} else {
    $text = "Đăng nhập";
    $href = "register.php";
}
?>



            <div class="l-header__top-nav-item m-account"><div class="c-user ">  <a rel="nofollow" class="c-user__link m-login" href="<?php echo $href?>"> <i title="Mon Compte" class="c-icon m-before-text m-user"> <span class="c-icon__svg c-user__link-icon"></span> </i> <span class="c-user__text m-login"><?php echo $text?></span> </a>  </div> </div>


<?php 
$total_quantity = 0;
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    foreach ($_SESSION["cart_item"] as $k=>$item){
        $total_quantity += $item["quantity"];
    }
}
?>
            <div class="l-header__top-nav-item m-account">
                <a class="c-user__link" href="cart.php"><button class="c-minicart-icon__link " type="submit"> <i class="c-minicart-icon__svg"></i> <span class="c-minicart-icon__label">Giỏ hàng</span> <span class="c-minicart-icon__qty"><?php echo $total_quantity ?></span> </button> </a>
            </div>
        </div>
        <div class="l-header__top-nav-item m-search">

        </div>
        </div>
        <!-- right header -->




        <div class="l-header__break m-hide-on-sticky-for-large"></div>
        <div class="c-hamburger l-header__hamburger">  


            <div class="c-hamburger__content" id="hamburger-navigation"> 
                <div class="c-hamburger__item m-navigation">
                    <div class="c-navigation__wrapper"> <nav class="c-navigation"> <ul class="c-navigation__list m-level-1">

                    <!-- menu -->
                    <?php
                    $sql = "SELECT * FROM mymenu;";
                    $mymenu = $conn->query($sql);
                    if ($mymenu->num_rows > 0) {

                      // output data of each row
                    while($row = $mymenu->fetch_assoc()) {
                    echo sprintf( <<<EOT
                    <li class="c-navigation__item m-parent m-level-1 m-offers  " > <span class="c-navigation__item-title m-accordion-control m-level-1 "> <a class="c-navigation__link m-level-1" href="%s" >  %s  </a>  </span></li>
                    EOT , $row["href"], $row["name"]);
                      }
                    } else {

                    }
                    ?>


                   </ul> </nav> </div> 
                </div>
            </div> 

        <!-- search button -->
        <div class="l-header__search-cta"> <button class="l-header__search-button" aria-controls="headerSimpleSearch" aria-label="Search" data-js-header-search-cta-large="" aria-expanded="false" tabindex="2"> <span class="l-header__search-button-label">Search</span> </button> </div> 
        <!-- search button -->


        </div> 
    </div>

    <!-- search form -->
    <div class="l-header__simple-search" data-js-header-search-container="" id="headerSimpleSearch">
        <form class="c-simple-search m-primary m-search-button-active" action="https://www.laroche-posay.fr/on/demandware.store/Sites-lrp-fr-Site/fr_FR/Search-Show" method="get" name="simpleSearch" role="search" data-component="global/SimpleSearch" data-component-options="{&quot;apiUrl&quot;:&quot;/on/demandware.store/Sites-lrp-fr-Site/fr_FR/Search-GetSuggestions?q=&quot;,&quot;suggestionsMinChars&quot;:3,&quot;searchAriaLabel&quot;:&quot;Des suggestions sont disponibles au-dessous de la zone de recherche&quot;,&quot;isAutocompletion&quot;:false}" data-component-force="" data-component-id="o_dg7ltcagxng"> <div class="c-simple-search__input-group"> <input class="c-simple-search__field" aria-autocomplete="both" aria-controls="simpleSearchResults-055987" aria-expanded="false" autocomplete="off" aria-haspopup="dialog" data-js-search-input="" id="simpleSearch-055987" role="combobox" name="q" placeholder=" " type="text" value="">  <label class="c-simple-search__search-label" for="simpleSearch-055987">Je cherche...</label>  <button class="c-simple-search__button" data-js-search-submit="" type="submit"> <span class="c-simple-search__button-text">Search</span> </button> <button class="c-simple-search__close-button" data-js-search-close="" type="button"> <span class="c-simple-search__close-button-text">Fermer</span> </button> <button class="c-simple-search__clear-button" data-js-search-clear="" type="button"> <span class="c-simple-search__clear-button-text">Effacer</span> </button> <input type="hidden" value="" name="lang"> </div>  <div class="h-show-for-sr" aria-live="polite" aria-atomic="true" data-js-header-search-aria=""></div> <div class="c-simple-search__results"> <div class="c-simple-search__results-group" data-js-search-results-group=""> <div data-js-search-results="" id="simpleSearchResults-055987" role="dialog" class="c-simple-search__results-container"></div>  </div> </div>  </form> 
    </div>
    <!-- search form -->


</div>