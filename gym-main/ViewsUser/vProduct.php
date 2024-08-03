<style>

</style>
<!--Classes Start-->
<section class="main-classes-in">
    <div class="container">
        <h1 style="text-align: center;color: #f66002;margin-bottom: 40px">Product</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="portfolio-tabbing">
                    <?PHP
                    require_once("Model/clsCategory.php");
                    require_once("Model/clsProduct.php");
                    $tukhoa = isset($_REQUEST["tTukhoa"]) ? $_REQUEST["tTukhoa"] : "";
                    $manhom = isset($_REQUEST["manhom"]) ? $_REQUEST["manhom"] : 0;
                    $act = isset($_REQUEST["act"])?$_REQUEST["act"]:"";
                    $page = isset($_REQUEST["trang"]) ? $_REQUEST["trang"] : 0;
                    $focus1 = "active";
                    if($page!=0)
                        $focus1 = "";
                    $mnuNhomSP = new clsCategory();
                    $ketqua = $mnuNhomSP->LayDanhSachNhomSanpham(1);//lấy ds nhomsp có trạng thái =1 và sắp xếp theo cat_ord tăng dần
                    $focus = "active";
                    if ($manhom != 0) {
                        $focus = "";
                    }
                    ?>
                    <ul id="filters">
                        <li>
                            <a href="?module=product"><span class="filter <?= $focus ?>">All</span></a>
                        </li>
                        <?php
                        $rows = $mnuNhomSP->data;
                        foreach ($rows as $row) {
                            $focus = "";
                            if ($manhom == $row["id"]) {
                                $focus = "active";
                            }
                            ?>
                            <li><a href="?module=product&manhom=<?= $row["id"] ?>"><span
                                            class="filter <?= $focus ?>"><?= $row["cat_name"] ?></span></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="portfolio-tabbing">
                    <div class="blog-search-form">
                        <form name="fTimkiem" id="fTiemkiem" action="">
                            <div class="form-box">
                                <input type="hidden" name="module" value="product">
                                <input type="hidden" name="act" value="timkiem">
                                <input type="text" name="tTukhoa" id="tTukhoa" value="<?= $tukhoa ?>"
                                       placeholder="Search...">
                                <button type="submit" name="bSearch" id="bSearch" class="sec-btn"><span><i
                                                class="fa fa-search" aria-hidden="true"></i></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="counter" style="padding-top: 20px; border-top: 3px solid #eeeeee">
            <?php
            $rows = $sanpham->data;
            foreach ($rows as $row) {
                $hinhanh = $row["images"];
                if ($hinhanh == "")
                    $hinhanh = "no-Image.png";
                $trangthai = "";
                if ($row["status"] == 1)
                    $trangthai = "có";
                else
                    $trangthai = "không";
                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="class-box wow fadeInUp" data-wow-delay=".5s"
                         style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                        <div class="class-img">
                            <img src="image/Product/<?= $hinhanh ?>" width="440" height="270"
                                 style="max-width: 440px;max-height: 240px" loading="lazy"
                                 alt="Going to the gym for the first time" class="img-cover">
                        </div>
                        <div class="class-box-contant">
                            <div class="class-box-title">
                                <div class="class-box-icon">
                                    <img src="Public/assetsHomepage/images/class-icon-1.png">
                                </div>
                                <a href="?module=chitietsanpham&manhom=<?= $row["cat_id"] ?>&masp=<?= $row["id"] ?>"><h3
                                            class="h3-title"><?= $row["title"] ?></h3></a>
                            </div>
                            <p><?=$row["description"]?></p>
                            <p>Price: <?= number_format($row["price"]) ?>$</p>
                            <button type="submit" class="sec-btn">
                                <a class="acart" href="?module=cart&act=add&masp=<?= $row["id"] ?>" class="btn-link has-before"><span>Add to cart</span></a>
                            </button>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-pagination">
                    <?php
                    //tính vị trí trang trước
                    $trang = (($current_page-1)>0)?($current_page-1):1;
                    ?>
                    <a href="?module=product&manhom=<?=$manhom?>&trang=<?=$trang?>&tTukhoa=<?=$tukhoa?>&act=<?=$act?>" class="pagination-arrow"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    <ul>
                        <li class="<?=$focus1?>"><a href="?module=product&manhom=<?=$manhom?>&trang=<?=$trang?>&tTukhoa=<?=$tukhoa?>&act=<?=$act?>"><span>1</span></a></li>
                        <?php
                        for($trang=2; $trang<=$total_pages; $trang++)
                        {
                            $focus = "";
                            if ($trang == $page) {
                                $focus = "active";
                            }
                            ?>
                            <li class="<?=$focus?>"><a href="?module=product&manhom=<?=$manhom?>&trang=<?=$trang?>&tTukhoa=<?=$tukhoa?>&act=<?=$act?>"><span><?=$trang?></span></a></li>
                            <?php
                        }
                        //tính vị trí trang tiếp
                        $trang = (($current_page+1)<=$total_pages)?($current_page+1):$total_pages;
                        ?>
                    </ul>
                    <a href="?module=product&manhom=<?=$manhom?>&trang=<?=$trang?>&tTukhoa=<?=$tukhoa?>&act=<?=$act?>"" class="pagination-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Classes End-->
<!--Counter Start-->
<section class="main-counter">
    <div class="container">
        <div class="row counter-bg wow fadeInUp" data-wow-delay=".5s"
             style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="counter-box">
                    <div class="counter-content">
                        <h2 class="h2-title counting-data" data-count="874">874</h2>
                        <div class="counter-text">
                            <img src="Public/assetsHomepage/images/happy-client.png" alt="Happy Client">
                            <span>Happy Clients</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="counter-box">
                    <div class="counter-content">
                        <h2 class="h2-title counting-data" data-count="987">987</h2>
                        <div class="counter-text">
                            <img src="Public/assetsHomepage/images/total-clients.png" alt="Total Clients">
                            <span>Total Clients</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="counter-box">
                    <div class="counter-content">
                        <h2 class="h2-title counting-data" data-count="587">587</h2>
                        <div class="counter-text">
                            <img src="Public/assetsHomepage/images/gym-equipment.png" alt="Gym Equipment">
                            <span>Gym Equipment</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="counter-box">
                    <div class="counter-content">
                        <h2 class="h2-title counting-data" data-count="748">748</h2>
                        <div class="counter-text">
                            <img src="Public/assetsHomepage/images/cup-of-coffee.png" alt="Cup Of Coffee">
                            <span>Cup Of Coffee</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Counter End-->

<!--Team Start-->
<section class="main-team">
    <div class="team-overlay-bg animate-this" style="transform: translateX(15.9991px) translateY(-9.99986px);">
        <img src="assets/images/team-overlay-bg.png" alt="Overlay">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="team-title">
                    <div class="subtitle">
                        <h2 class="h2-subtitle">Best Trainer</h2>
                    </div>
                    <h2 class="h2-title">Clients said</h2>
                </div>
            </div>
        </div>
        <div class="row team-slider slick-initialized slick-slider slick-dotted">
            <div class="slick-list draggable">
                <div class="slick-track" style="opacity: 1; width: 4620px; transform: translate3d(-2310px, 0px, 0px);">
                    <div class="col-lg-3 slick-slide slick-cloned" data-slick-index="-4" id="" aria-hidden="true"
                         tabindex="-1" style="width: 330px;">
                        <div class="team-box wow fadeInDown" data-wow-delay=".5s"
                             style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
                            <div class="team-img-box team-border-one">
                                <div class="team-img">
                                    <img src="assets/images/trainer2.jpg" alt="Trainer">
                                </div>
                            </div>
                            <div class="team-content">
                                <a href="team-detail.html" tabindex="-1"><h3 class="h3-title team-text-color">Kate
                                        Johnson</h3></a>
                                <span>Fitness Trainer</span>
                                <div class="team-social">
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0);" tabindex="-1"><i class="fa fa-facebook"
                                                                                           aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" tabindex="-1"><i class="fa fa-instagram"
                                                                                           aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" tabindex="-1"><i class="fa fa-twitter"
                                                                                           aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 slick-slide slick-cloned" data-slick-index="-3" id="" aria-hidden="true"
                         tabindex="-1" style="width: 330px;">
                        <div class="team-box wow fadeInUp" data-wow-delay=".5s"
                             style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                            <div class="team-img-box team-border-one">
                                <div class="team-img">
                                    <img src="assets/images/trainer3.jpg" alt="Trainer">
                                </div>
                            </div>
                            <div class="team-content">
                                <a href="team-detail.html" tabindex="-1"><h3 class="h3-title team-text-color">John
                                        Hard</h3></a>
                                <span>Fitness Trainer</span>
                                <div class="team-social">
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0);" tabindex="-1"><i class="fa fa-facebook"
                                                                                           aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" tabindex="-1"><i class="fa fa-instagram"
                                                                                           aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" tabindex="-1"><i class="fa fa-twitter"
                                                                                           aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 slick-slide slick-cloned" data-slick-index="-2" id="" aria-hidden="true"
                         tabindex="-1" style="width: 330px;">
                        <div class="team-box wow fadeInDown" data-wow-delay=".5s"
                             style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
                            <div class="team-img-box team-border-one">
                                <div class="team-img">
                                    <img src="assets/images/trainer4.jpg" alt="Trainer">
                                </div>
                            </div>
                            <div class="team-content">
                                <a href="team-detail.html" tabindex="-1"><h3 class="h3-title team-text-color">Zahra
                                        Sharif</h3></a>
                                <span>Fitness Trainer</span>
                                <div class="team-social">
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0);" tabindex="-1"><i class="fa fa-facebook"
                                                                                           aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" tabindex="-1"><i class="fa fa-instagram"
                                                                                           aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" tabindex="-1"><i class="fa fa-twitter"
                                                                                           aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 slick-slide slick-cloned" data-slick-index="-1" id="" aria-hidden="true"
                         tabindex="-1" style="width: 330px;">
                        <div class="team-box wow fadeInUp" data-wow-delay=".5s"
                             style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                            <div class="team-img-box team-border-one">
                                <div class="team-img">
                                    <img src="#" alt="Trainer">
                                </div>
                            </div>
                            <div class="team-content">
                                <a href="team-detail.html" tabindex="-1"><h3 class="h3-title team-text-color">Ruth
                                        Edwards</h3></a>
                                <span>Fitness Trainer</span>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 slick-slide" data-slick-index="0" aria-hidden="true" tabindex="-1"
                         role="tabpanel" id="slick-slide10" aria-describedby="slick-slide-control10"
                         style="width: 330px;">
                        <div class="team-box wow fadeInUp" data-wow-delay=".5s"
                             style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                            <div class="team-img-box team-border-one">
                                <div class="team-img">
                                    <img src="assets/images/trainer1.jpg" alt="Trainer">
                                </div>
                            </div>
                            <div class="team-content">
                                <a href="team-detail.html" tabindex="-1"><h3 class="h3-title team-text-color">Desert
                                        Antony</h3></a>
                                <span>Fitness Trainer</span>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1"
                         role="tabpanel" id="slick-slide11" aria-describedby="slick-slide-control11"
                         style="width: 330px;">
                        <div class="team-box wow fadeInDown" data-wow-delay=".5s"
                             style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
                            <div class="team-img-box team-border-one">
                                <div class="team-img">
                                    <img src="assets/images/trainer2.jpg" alt="Trainer">
                                </div>
                            </div>
                            <div class="team-content">
                                <a href="team-detail.html" tabindex="-1"><h3 class="h3-title team-text-color">Kate
                                        Johnson</h3></a>
                                <span>Fitness Trainer</span>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 slick-slide" data-slick-index="2" aria-hidden="true" tabindex="-1"
                         role="tabpanel" id="slick-slide12" aria-describedby="slick-slide-control12"
                         style="width: 330px;">
                        <div class="team-box wow fadeInUp" data-wow-delay=".5s"
                             style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                            <div class="team-img-box team-border-one">
                                <div class="team-img">
                                    <img src="assets/images/trainer3.jpg" alt="Trainer">
                                </div>
                            </div>
                            <div class="team-content">
                                <a href="team-detail.html" tabindex="-1"><h3 class="h3-title team-text-color">John
                                        Hard</h3></a>
                                <span>Fitness Trainer</span>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 slick-slide slick-current slick-active" data-slick-index="3"
                         aria-hidden="false" tabindex="0" role="tabpanel" id="slick-slide13"
                         aria-describedby="slick-slide-control13" style="width: 330px;">
                        <div class="team-box wow fadeInDown" data-wow-delay=".5s"
                             style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
                            <div class="team-img-box team-border-one">
                                <div class="team-img">
                                    <img src="Public/assetsHomepage/images/trainer2.jpg" alt="Trainer">
                                </div>
                            </div>
                            <div class="team-content">
                                <a href="team-detail.html" tabindex="0"><h3 class="h3-title team-text-color">Zahra
                                        Sharif</h3></a>
                                <span>Fitness Trainer</span>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 slick-slide slick-active" data-slick-index="4" aria-hidden="false" tabindex="0"
                         role="tabpanel" id="slick-slide14" aria-describedby="slick-slide-control14"
                         style="width: 330px;">
                        <div class="team-box wow fadeInUp" data-wow-delay=".5s"
                             style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                            <div class="team-img-box team-border-one">
                                <div class="team-img">
                                    <img src="Public/assetsHomepage/images/trainer3.jpg" alt="Trainer">
                                </div>
                            </div>
                            <div class="team-content">
                                <a href="team-detail.html" tabindex="0"><h3 class="h3-title team-text-color">Ruth
                                        Edwards</h3></a>
                                <span>Fitness Trainer</span>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 slick-slide slick-cloned slick-active" data-slick-index="5" id=""
                         aria-hidden="false" tabindex="-1" style="width: 330px;">
                        <div class="team-box wow fadeInUp" data-wow-delay=".5s"
                             style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                            <div class="team-img-box team-border-one">
                                <div class="team-img">
                                    <img src="Public/assetsHomepage/images/trainer1.jpg" alt="Trainer">
                                </div>
                            </div>
                            <div class="team-content">
                                <a href="team-detail.html" tabindex="0"><h3 class="h3-title team-text-color">Desert
                                        Antony</h3></a>
                                <span>Fitness Trainer</span>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 slick-slide slick-cloned slick-active" data-slick-index="6" id=""
                         aria-hidden="false" tabindex="-1" style="width: 330px;">
                        <div class="team-box wow fadeInDown" data-wow-delay=".5s"
                             style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
                            <div class="team-img-box team-border-one">
                                <div class="team-img">
                                    <img src="Public/assetsHomepage/images/trainer4.jpg" alt="Trainer">
                                </div>
                            </div>
                            <div class="team-content">
                                <a href="team-detail.html" tabindex="0"><h3 class="h3-title team-text-color">Kate
                                        Johnson</h3></a>
                                <span>Fitness Trainer</span>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 slick-slide slick-cloned" data-slick-index="7" id="" aria-hidden="true"
                         tabindex="-1" style="width: 330px;">
                        <div class="team-box wow fadeInUp" data-wow-delay=".5s"
                             style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                            <div class="team-img-box team-border-one">
                                <div class="team-img">
                                    <img src="Public/assetsHomepage/images/trainer3%20(1).jpg.jpg" alt="Trainer">
                                </div>
                            </div>
                            <div class="team-content">
                                <a href="team-detail.html" tabindex="-1"><h3 class="h3-title team-text-color">John
                                        Hard</h3></a>
                                <span>Fitness Trainer</span>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 slick-slide slick-cloned" data-slick-index="8" id="" aria-hidden="true"
                         tabindex="-1" style="width: 330px;">
                        <div class="team-box wow fadeInDown" data-wow-delay=".5s"
                             style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
                            <div class="team-img-box team-border-one">
                                <div class="team-img">
                                    <img src="Public/assetsHomepage/images/trainer3.jpg" alt="Trainer">
                                </div>
                            </div>
                            <div class="team-content">
                                <a href="team-detail.html" tabindex="-1"><h3 class="h3-title team-text-color">Zahra
                                        Sharif</h3></a>
                                <span>Fitness Trainer</span>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 slick-slide slick-cloned" data-slick-index="9" id="" aria-hidden="true"
                         tabindex="-1" style="width: 330px;">
                        <div class="team-box wow fadeInUp" data-wow-delay=".5s"
                             style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                            <div class="team-img-box team-border-one">
                                <div class="team-img">
                                    <img src="Public/assetsHomepage/images/trainer1.jpg" alt="Trainer">
                                </div>
                            </div>
                            <div class="team-content">
                                <a href="team-detail.html" tabindex="-1"><h3 class="h3-title team-text-color">Ruth
                                        Edwards</h3></a>
                                <span>Fitness Trainer</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>