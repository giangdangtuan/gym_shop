<header class="site-header sticky-header">
    <!--Navbar Start  -->
    <div class="header-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <!-- Sit Logo Start -->
                    <div class="site-branding">
                        <a href="index.html" title="Fithub">
                            <img src="Public/assetsHomepage/images/logo.png" alt="Logo">
                            <img src="Public/assetsHomepage/images/logo_stickey.png" class="sticky-logo" alt="Logo">
                        </a>
                    </div>
                    <!-- Sit Logo End -->
                </div>
                <div class="col-lg-10">
                    <div class="header-menu">
                        <nav class="main-navigation one">
                            <button class="toggle-button">
                                <span></span>
                                <span class="toggle-width"></span>
                                <span></span>
                            </button>
                            <div class="mobile-menu-box">
                                <i class="menu-background top"></i>
                                <i class="menu-background middle"></i>
                                <i class="menu-background bottom"></i>
                                <ul class="menu">
                                    <li >
                                        <a href="index.php" title="Home">Home</a>
                                    </li>
                                    <!--                                    <li><a href="indexUserProduct.php">Our products</a></li>-->
                                    <li>
                                        <a href="?module=product" class="navbar-link" data-nav-link>Product</a>
                                        <?PHP
                                        require_once("Model/clsCategory.php");
                                        $mnuNhomSP = new clsCategory();
                                        $ketqua = $mnuNhomSP->LayDanhSachNhomSanpham(1);//lấy ds nhomsp có trạng thái =1 và sắp xếp theo cat_ord tăng dần
                                        ?>
                                        <ul class="sub-menu">-->
                                            <?php
                                            $rows = $mnuNhomSP->data;
                                            foreach($rows as $row)
                                            {
                                                ?>
                                                <li><a href="?module=product&manhom=<?=$row["id"]?>"><?=$row["cat_name"]?></a></li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="?module=blog" class="navbar-link" title="Blog" data-nav-link>Blog</a>
                                    </li>
                                    <li><a href="?module=contact">Contact Us</a></li>
                                    <li><a href="">Account</a>
                                        <ul class="sub-menu">
                                            <?php
                                            $login="Login.php";
                                            $logout="Logout.php";
                                            $His="ViewsUser/List.php";
                                            if($_SESSION["username"]==""){
                                                echo"<li><a href=$login>Login</a></li>";
                                            }
                                            else{
                                                echo"<li><a href=$logout>Logout</a></li>";
                                                echo"<li><a href=$His>History</a></li>";
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </nav>

                        <div class="black-shadow"></div>
                        <div class="header-btn">
                            <a href="?module=cart" class="sec-btn">Your cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Navbar End  -->
</header>