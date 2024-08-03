<section class="main-classes-in">
    <h1 class="h1-ten" style="text-align: center;color: #f66002;margin-bottom: 40px">Product Detail</h1>
<div class="container" >
    <div c class="row" style="background-color: #eeeeee;padding: 70px 0">
        <div class="row product-row" >
            <div class="col-lg-6 col-md-6 col-sm-12 product-left float-start">
                    <?php
                    if($sanpham->data==NULL)
                    echo "<H2>KHÔNG TÌM THẤY SẢN PHẨM</H2>";
                    else {
                        $row = $sanpham->data;
                        $hinhanh = $row["images"];
                        if ($hinhanh == "")
                            $hinhanh = "no-Image.png";
                    }
                    ?>
                <div class="image magnific-popup">
                    <a href="https://demo.ashrayinfotech.com/Opencart4.0.2.1/OPC162/OPC162/image/cache/catalog/productsimage/2-370x370.png"
                       title="Fuzzy Bear"><img style="max-height: 420px; margin-left: 70px"
                                src="image/Product/<?=$hinhanh?>"
                            title="Fuzzy Bear" alt="Fuzzy Bear" class="img-thumbnail mb-3"></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 product-right float-end" style="background-color: #ffffff;max-width: 500px;height: 420px">
                <div style="margin-top: 20px;margin-left: 20px">
                <div class="product-left-title d-none d-lg-block d-md-block">
                    <h1 class="product-title"><?=$row["title"];?></h1>
                </div>
                <ul class="list-unstyled price">
                    <li class="product-price">
                        <h2>Price: <?= number_format($row["price"]) ?>$</h2>
                    </li>

                </ul>
                <div class="inner-box-desc">
                    <ul class="list-unstyled">
                        <li class="brand">Brand: <?=$row["brand"]?>
                        </li>
                        <li class="stock">Availability: Available
                        </li>
                    </ul>
                </div>
                <form method="post" data-oc-toggle="ajax">
                    <div class="form-group">

                    </div>
                    <input type="hidden" name="product_id" value="44">
                </form>
                <div id="product">
                    <form id="form-product" method="post" enctype="multipart/form-data" action="?module=cart&act=add&masp=<?= $row["id"] ?>">
                        <div class="form-group qut">
                            <label for="input-quantity" class="control-label form-label">Quantity :</label>
                            <input type="number" name="qty" value="1" style="width: 100px">
                            <input type="submit" name="button" class="button-detail" value="Add to card">
<!--                            <button type="submit" name="submit" formaction="" data-bs-toggle="tooltip" title="Add to Cart"-->
<!--                                    class="btn btn-lg abc" style=""><a href="?module=cart&act=add&masp=--><?php //= $row["id"] ?><!--" style="color:#ffffff">Add to Cart</a>-->
<!--                            </button>-->
                        </div>
                    </form>
                </div>
                <div class="tabs_info clearfix">
                    <div id="accordion" class="panel-group" role="tablist">
                        <div class="accordion-item">
                            <div class="accordion-header" role="tab" id="headingOne">
                                <a data-bs-toggle="collapse" data-bs-target="#tab-description"
                                   data-bs-parent="#accordion" aria-expanded="true" aria-controls="tab-description">
                                    Description
                                </a>
                            </div>
                            <div id="tab-description" class="collapse accordion__content show"
                                 aria-labelledby="headingOne" data-bs-parent="#accordion">
                                <div class="tab-description"><p><?=$row["description"]?></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div style="margin-top: 70px">
    <p class="section-subtitle" style="margin: auto">Related Product</p>

    <h1 class="h2 section-title text-center" style="margin: 20px 0;font-weight: bold">New available</h1>

    <ul class="blog-list has-scrollbar">
        <?php
        $rows = $sanpham1->data;
        $c = count($rows);
        echo "$c";
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

            <li class="scrollbar-item">
                <div class="blog-card">
                    <div class="card-banner img-holder" style="--width: 440; --height: 270;">
                        <img src="image/Product/<?= $hinhanh ?>" style="max-width: 440px;max-height: 240px"
                             width="440" height="270" loading="lazy"
                             alt="Going to the gym for the first time" class="img-cover">
                    </div>
                    <div class="card-content" >
                        <h3 class="h3">
                            <a class="tsanpham" href="?module=chitietsanpham&manhom=<?= $row["cat_id"] ?>&masp=<?= $row["id"] ?>"><?= $row["title"] ?></a>
                        </h3>

                        <p class="card-text">
                            Praesent id ipsum pellentesque lectus dapibus condimentum curabitur eget risus quam. In
                            hac
                            habitasse platea dictumst.
                        </p>
                        <p>Price: <?= number_format($row["price"]) ?>$</p>
                        <button type="submit" class="sec-btn">
                            <a class="acart" href="?module=cart&act=add&masp=<?= $row["id"] ?>" class="btn-link has-before"><span>Add to cart</span></a>
                        </button>
                    </div>
                </div>
            </li>
            <?php
        }
        ?>

    </ul>
    </div>
</div>
</section>
<style>
    .button-detail{
        max-width: 158px;
        background-color: #fd3d0c;
        color: #ffffff;
        max-width: 120px;
        min-height: 40px;
    }
    .button-detail:hover{
        background-color: #f63909;
    }
</style>