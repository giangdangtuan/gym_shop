<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en"><head>
    <title>Fithub - Gym &amp; Fitness HTML Template</title>
    <meta name="keywords" content="Fithub">
    <meta name="description" content="Fithub">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" type="text/css" href="Public/assetsHomepage/css/css.css">
    <link rel="stylesheet" type="text/css" href="Public/assetsHomepage/css/fontawesome-free-6.4.2-web/css/all.min.css">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="Public/assetsHomepage/css/index.css">
    <link rel="stylesheet" type="text/css" href="Public/assetsHomepage/css/index2.css">
    <link rel="stylesheet" type="text/css" href="Public/assetsHomepage/css/style.css">
    <link rel="stylesheet" type="text/css" href="Public/assetsHomepage/css/slick.css">
    <link rel="stylesheet" type="text/css" href="Public/assetsHomepage/css/magnific-popup.min.css">
    <link rel="stylesheet" type="text/css" href="Public/assetsHomepage/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="Public/assetsHomepage/css/animate.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="Public/assetsHomepage/css/css2.css">
    <link rel="stylesheet" type="text/css" href="Public/assetsHomepage/css/styles.css">
    <link rel="stylesheet" type="text/css" href="Public/assetsHomepage/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Public/assetsHomepage/css/style2.css">
    <link rel="stylesheet" type="text/css" href="Public/assetsHomepage/css/slick-theme.css">
    <!--Google Fonts CSS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&amp;family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

</head>
<body>

<!-- Loader Start -->
<div class="loader-box" style="display: none;">
    <div class="loader-text">
        <span class="let1">L</span>
        <span class="let2">o</span>
        <span class="let3">a</span>
        <span class="let4">d</span>
        <span class="let5">i</span>
        <span class="let6">n</span>
        <span class="let7">g</span>
        <span class="let8">.</span>
        <span class="let9">.</span>
        <span class="let10">.</span>
    </div>
</div>
<!-- Loader End -->

<!-- Header Start -->
<div id="wrapper">
    <main>
        <article>
            <?php include("ViewsUser/inc_Header.php"); ?>
            <?php include("ViewsUser/inc_Banner.php"); ?>
            <div id="content" class="clear_fix">
                <?php
                //hiển thị phần nội dung giữa của trang web
                $module = "";
                if(isset($_REQUEST["module"]))
                    $module = $_REQUEST["module"];
                if($module=="blog")
                {
                    require("ViewsUser/vBlog.php");
                }
                else if($module=="product")
                {
                    require("ControllerHome/ctlProduct.php");
                }
                else if($module=="chitietsanpham")
                {
                    require("ControllerHome/ctlDetail.php");
                }
                else if($module=="cart")
                {
                    if(isset($_SESSION["username"]) == false){
                        $thongbao = "Log in to buy stuffs";
                        $link_tieptuc = 'Login.php';
                        require ('ViewsAdmin/vKetqua.php');
                    }
                    else{
                        require("ControllerHome/ctlCart.php");
                    }
                }
                else if($module=="checkout")
                {
                    require("ControllerHome/ctlCheckOut.php");
                }
                else if($module=="contact")
                {
                    require("ViewsUser/vContact.php");
                }
                else if($module=="dathang")
                {
                    require("ViewsUser/vCheckOut.php");
                }
                else
                {
                    require("ControllerHome/ctlHome.php");
                }
                ?>
            </div> <!--id="content" -->
            <?php include("ViewsUser/inc_Footer.php"); ?>
        </article>
    </main>
</div>
<!-- Header End -->

<!--Banner Start-->

<!--Banner End-->

<!--About Us Start-->

</body>

<!--Footer Start-->

<!--Footer End-->

<!--Back To Top Start-->

<!-- modal-search-end -->

<!-- Jquery JS Link -->
<script src="assets/js/jquery.min.js"></script>

<!-- Bootstrap JS Link -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/popper.min.js"></script>

<!-- Custom JS Link -->
<script src="assets/js/custom.js"></script>

<!-- Slick Slider JS Link -->
<script src="assets/js/slick.min.js"></script>

<!-- Wow Animation JS -->
<script src="assets/js/wow.min.js"></script>

<!--Bg Moving Js-->
<script src="assets/js/bg-moving.js"></script>

<!--Magnific Popup JS-->
<script src="assets/js/magnific-popup.js"></script>
<script src="assets/js/custom-magnific-popup.js"></script>

<!--Progress Bar JS-->
<script src="assets/js/custom-progress-bar.js"></script>

<!--Scroll Count JS-->
<script src="assets/js/custom-scroll-count.js"></script>

<!--BAck To Top JS-->
<script src="assets/js/back-to-top.js"></script>

</html>

