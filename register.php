<?php

require __DIR__ . '/functions.php';

// Create connection
$conn = get_database();

require __DIR__ . '/actions.php';


// $_POST['email'] = "chuanxd52@gmail.com";
// $_POST['password'] = "123456";

?>



<!DOCTYPE html>
<html lang="fr">

<head>
<title>Đăng nhập/đăng ký | La Pharmacie</title>

<?php echo get_head();?>
<link href="./Css/account.css" rel="stylesheet">  
<link href="./Css/pagedesigner.css" rel="stylesheet">  
<link href="./Css/content.css" rel="stylesheet">   
<link media="print" href="./Css/print-account.css" rel="stylesheet">


<style>

.button-checkmark {
  margin-left:0.65rem;
  margin-right:1.5rem;
}


.myinput[type="checkbox"]{
  position: relative;
  display: inline-block;
  width: 15px;
  height: 15px;
  border: 1px solid #808080;
  content: "";
  background: #FFF;
  vertical-align:middle;

}

</style>


</head>



<body class="page-account no-apple-pay">


<?php require __DIR__ . '/header.php'?>

<?php 
if (isset($_SESSION["register"])) {
    $flag = $_SESSION["register"];
} else {
    $flag = false;
};


if ($flag) {
    echo "OKKKK";
} else {
?>

<div class="page"><div class="l-account">        <div class="l-account__main">
    <section class="l-account__main-top">
        <nav class="c-breadcrumbs "> <ol class="c-breadcrumbs__list">    <li class="c-breadcrumbs__item"> <a class="c-breadcrumbs__link" href="index.php"> <span class="c-breadcrumbs__text">Trang chủ</span> </a> <span class="c-breadcrumbs__item-separator"></span> </li>     <li class="c-breadcrumbs__item"> <span class="c-breadcrumbs__text c-breadcrumbs__item-text">Đăng ký</span> </li>   </ol> </nav> 
    </section>
            
    <div class="c-tabs__content l-account__loginregistration">   

        <div class="c-tabs__panel l-account__login-content  m-active">      <div class="l-signin m-secondary">  <div class="c-account__login-section m-form m-expand">  <h2 class="c-account__title ">Đăng nhập</h2> 

<?php 
if (isset($_SESSION["login"]["islogin"])) {
    if (!$_SESSION["login"]["islogin"]) {echo '<p class="register-err">Tên đăng nhập hoặc mật khẩu sai. Vui lòng đăng nhập lại!</p>';};
};
unset($_SESSION["login"]["islogin"]);
?>


        <!-- <form class="c-form m-relative-loader" method="POST" action="actions.php?action=login">    -->
        <!-- <div class="c-form__legend">Mục đánh dấu <span class="h-text-size-14"> (*)</span> là bắt buộc</div>      -->
        <form class="c-form m-relative-loader" method="POST" action="register.php?action=login">   <!-- <div class="c-form__legend">Mục đánh dấu <span class="h-text-size-14"> (*)</span> là bắt buộc</div>      -->

        <div class="c-field c-text-field m-float">  
        <input type="email" autocomplete="email" name="email" class=" c-text-field__input" placeholder=" " pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$" required="required">  
        <label class=" m-float c-text-field__label">E-mail<span class="h-text-size-14">*</span></label>   
        </div>     

        <div class=" c-field c-text-field m-password m-float">  
        <input type="password" autocomplete="current-password" name="password" class="c-text-field__input" placeholder=" " required="required" id="password">
        <label class=" m-float c-text-field__label">Mật khẩu<span class="h-text-size-14">*</span></label>   
        <button class="c-text-field__password-button" type="button" onclick="showpassword('password')"></button>
        </div>


        <div class=" c-form__row m-group">     <div class=" c-field c-check-field m-checkbox">  <!--<input type="checkbox" name="rememberme" class=" c-check-field__input">  <label class=" c-check-field__label">Lưu đăng nhập</label> -->  </div>        <div class="c-field"> <button type="button" class="l-signin__forgotpassword c-link"> quên mật khẩu&nbsp;? </button> </div>         </div>

        <div class=" c-field">  <button type="submit" class="m-expand c-button" name="submit">Đăng nhập</button>   </div>            


        </form>       
        </div>   </div>   </div>




        <div class="c-tabs__panel l-account__registration-content " style="display:inline-block">     
        <div class="c-account__registration "> <h2 class="c-account__title ">Đăng ký tài khoản</h2>    
            <?php if (isset($_SESSION["register"])) { if (!$_SESSION["register"]) {echo '<p class="register-err">Email này đã được đăng ký. Vui lòng đăng nhập hoặc sử dung email khác!</p>';};}; ?>
            <form class="c-form m-relative-loader" method="POST" action="register.php?action=register"> 
            <!--<div class="c-form__legend">Mục đánh dấu <span class="h-text-size-14" > (*)</span> là bắt buộc</div>--><!-- dwMarker="content" dwContentID="a3f3324b7de6e7a8a684988012" --><h5><b>Giới tính*</b></h5>
            <div class="c-form__row m-inlined-auto">  


                <button type="button" class="button-checkmark" onclick="checkmrs()"><label><input name="checkboxMrMrs" type="checkbox" value="Mrs" checked="checked" id="checkboxMrs">&nbsp;&nbsp;Mrs</label></button>
                <button type="button" class="button-checkmark" onclick="checkmr()"><label><input name="checkboxMrMrs" type="checkbox" value="Mr" id="checkboxMr">&nbsp;&nbsp;Mr</label></button>

            </div>
            <div class="m-small-fullwidth m-medium-fullwidth c-form__row m-group">     
                <div class=" c-field c-text-field m-float">  <input autocomplete="given-name" type="text" name="name" class=" c-text-field__input" placeholder=" " maxlength="20" required="required">  <label class=" m-float c-text-field__label">Họ và tên<span class="h-text-size-14">*</span></label>   </div>     
                <!-- <div class=" c-field c-text-field m-float">  <input autocomplete="family-name" type="text" name="lastname" class=" c-text-field__input" id="lastname-088296" placeholder=" " pattern="^\s*([A-Za-z\u0080-\u00FF\u0027 -]{1,25})\s*$" required="required">  <label class=" m-float c-text-field__label">Họ<span class="h-text-size-14">*</span></label>   </div>      -->
            </div>



            <div class="m-small-fullwidth m-medium-fullwidth c-form__row m-group">     
                <div class=" c-field c-text-field m-float">  <input type="email" autocomplete="email" name="email" class=" c-text-field__input" id="email-075583" placeholder=" " pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" maxlength="50" required="required" >  <label class=" m-float c-text-field__label">E-mail<span class="h-text-size-14">*</span></label>   </div>     
                <div class=" c-field c-text-field m-inlined m-float">  <input type="email" autocomplete="off" name="confirmemail" class=" c-text-field__input" placeholder=" " pattern="^[a-zA-Z0-9_\-\.\+]{1,}@([\da-zA-Z\-]{1,}\.){1,}[\da-zA-Z\-]{2,20}$" maxlength="50" required="required">  <label class=" m-float c-text-field__label" >Xác nhận e-mail<span class="h-text-size-14">*</span></label>   </div>     
            </div>


            <div class="m-small-fullwidth m-medium-fullwidth c-form__row m-group">     
                <div class=" c-field c-text-field m-password m-inlined m-float">  <input type="password" autocomplete="new-password" id="new-password" name="password" class=" c-text-field__input" placeholder=" " required="required">  <label class=" m-float c-text-field__label">Mật khẩu<span class="h-text-size-14">*</span></label>   
                <button class="c-text-field__password-button" type="button" onclick="showpassword('new-password')"></button></div>     
                <div class=" c-field c-text-field m-password m-inlined m-float">  <input type="password" autocomplete="off" name="confirmpassword" id="confirmpassword" class=" c-text-field__input" placeholder=" " required="required">  <label class=" m-float c-text-field__label">Xác nhận mật khẩu<span class="h-text-size-14">*</span></label>   <button class="c-text-field__password-button" type="button" onclick="showpassword('confirmpassword')"></button></div>     
            </div>


            <div class=" c-field c-text-field m-float">  <input type="tel" autocomplete="tel-national" name="phonemobile" class=" c-text-field__input" placeholder=" " pattern="^(\+33|0033|0)[1-7|9]{1}\d{8}$" maxlength="10" required="required">  <label class=" m-float c-text-field__label">Số điện thoại<span class="h-text-size-14">*</span></label>   </div>


            <div class="c-form__row-title "></div>
            <!-- <div class="c-form__row-title ">Votre date de naissance*</div> -->
            <!-- <div class=" c-form__row m-group">      -->
                <!-- <div class=" c-field c-select">  <div class="c-select__container"><select name="day" class=" c-select__field" required="required">  <option value=""> Jour </option>  <option value="1"> 01 </option>  <option value="2"> 02 </option>  <option value="3"> 03 </option>  <option value="4"> 04 </option>  <option value="5"> 05 </option>  <option value="6"> 06 </option>  <option value="7"> 07 </option>  <option value="8"> 08 </option>  <option value="9"> 09 </option>  <option value="10"> 10 </option>  <option value="11"> 11 </option>  <option value="12"> 12 </option>  <option value="13"> 13 </option>  <option value="14"> 14 </option>  <option value="15"> 15 </option>  <option value="16"> 16 </option>  <option value="17"> 17 </option>  <option value="18"> 18 </option>  <option value="19"> 19 </option>  <option value="20"> 20 </option>  <option value="21"> 21 </option>  <option value="22"> 22 </option>  <option value="23"> 23 </option>  <option value="24"> 24 </option>  <option value="25"> 25 </option>  <option value="26"> 26 </option>  <option value="27"> 27 </option>  <option value="28"> 28 </option>  <option value="29"> 29 </option>  <option value="30"> 30 </option>  <option value="31"> 31 </option>  </select></div>   </div>      -->

                <!-- <div class=" c-field c-select">  <div class="c-select__container"><select data-js-field="true" name="month" class=" c-select__field" required="required" aria-required="true" data-error-required="<span data-js-error-message class=&quot;h-show-for-sr&quot;>Error : Mois is required</span>Merci de renseigner le mois de naissance">  <option value=""> Mois </option>  <option value="1"> Janvier </option>  <option value="2"> Février </option>  <option value="3"> Mars </option>  <option value="4"> Avril </option>  <option value="5"> Mai </option>  <option value="6"> Juin </option>  <option value="7"> Juillet </option>  <option value="8"> Août </option>  <option value="9"> Septembre </option>  <option value="10"> Octobre </option>  <option value="11"> Novembre </option>  <option value="12"> Décembre </option>  </select></div>   </div>      -->

                <!-- <div class=" c-field c-select">  <div class="c-select__container"><select name="year" class=" c-select__field" required="required">  <option value=""> Année </option>  <option value="1938"> 1938 </option>  <option value="1939"> 1939 </option>  <option value="1940"> 1940 </option>  <option value="1941"> 1941 </option>  <option value="1942"> 1942 </option>  <option value="1943"> 1943 </option>  <option value="1944"> 1944 </option>  <option value="1945"> 1945 </option>  <option value="1946"> 1946 </option>  <option value="1947"> 1947 </option>  <option value="1948"> 1948 </option>  <option value="1949"> 1949 </option>  <option value="1950"> 1950 </option>  <option value="1951"> 1951 </option>  <option value="1952"> 1952 </option>  <option value="1953"> 1953 </option>  <option value="1954"> 1954 </option>  <option value="1955"> 1955 </option>  <option value="1956"> 1956 </option>  <option value="1957"> 1957 </option>  <option value="1958"> 1958 </option>  <option value="1959"> 1959 </option>  <option value="1960"> 1960 </option>  <option value="1961"> 1961 </option>  <option value="1962"> 1962 </option>  <option value="1963"> 1963 </option>  <option value="1964"> 1964 </option>  <option value="1965"> 1965 </option>  <option value="1966"> 1966 </option>  <option value="1967"> 1967 </option>  <option value="1968"> 1968 </option>  <option value="1969"> 1969 </option>  <option value="1970"> 1970 </option>  <option value="1971"> 1971 </option>  <option value="1972"> 1972 </option>  <option value="1973"> 1973 </option>  <option value="1974"> 1974 </option>  <option value="1975"> 1975 </option>  <option value="1976"> 1976 </option>  <option value="1977"> 1977 </option>  <option value="1978"> 1978 </option>  <option value="1979"> 1979 </option>  <option value="1980"> 1980 </option>  <option value="1981"> 1981 </option>  <option value="1982"> 1982 </option>  <option value="1983"> 1983 </option>  <option value="1984"> 1984 </option>  <option value="1985"> 1985 </option>  <option value="1986"> 1986 </option>  <option value="1987"> 1987 </option>  <option value="1988"> 1988 </option>  <option value="1989"> 1989 </option>  <option value="1990"> 1990 </option>  <option value="1991"> 1991 </option>  <option value="1992"> 1992 </option>  <option value="1993"> 1993 </option>  <option value="1994"> 1994 </option>  <option value="1995"> 1995 </option>  <option value="1996"> 1996 </option>  <option value="1997"> 1997 </option>  <option value="1998"> 1998 </option>  <option value="1999"> 1999 </option>  <option value="2000"> 2000 </option>  <option value="2001"> 2001 </option>  <option value="2002"> 2002 </option>  <option value="2003"> 2003 </option>  <option value="2004"> 2004 </option>  <option value="2005"> 2005 </option>  <option value="2006"> 2006 </option>  <option value="2007"> 2007 </option>  <option value="2008"> 2008 </option>  </select></div>   </div>      -->
            <!-- </div> -->


            <!-- dwMarker="content" dwContentID="e3d8020979ed8be2a14a2b5cb4" -->

            <div class=" c-field" data-js-field-component="true">  <button type="submit" class="c-form__submit c-button" name="submit">Đăng ký</button>   </div>


            </form>

        
        </div>
        </div>
    </div>
</div></div></div>


<?php 
};
unset($_SESSION["register"]);
?>

<script>
function showpassword(id) {
  var x = document.getElementById(id);
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}



function checkmrs() {
  var x = document.getElementById("checkboxMrs");
  var y = document.getElementById("checkboxMr");
    if (x.checked) {
        y.checked=false;
    } else {
        y.checked=true;
    }
}

function checkmr() {
  var x = document.getElementById("checkboxMr");
  var y = document.getElementById("checkboxMrs");
    if (x.checked) {
        y.checked=false;
    } else {
        y.checked=true;
    }
}
</script>

</body>
</html>