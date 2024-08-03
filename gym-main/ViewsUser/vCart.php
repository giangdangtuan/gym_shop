
<section>
    <div class="">
        <div style="width: 65%; float:left;margin-left: 2%">
            <?php
            $total =0;
            //đếm số đầu sản phẩm trong giỏ hàng
            $count =0;
            if(isset($_SESSION["cart"]))
                $count = count($_SESSION["cart"]);//đếm số phần tử của mảng cart
            if($count==0)
            {
                ?>
                <h1>No item</h1>

                <h3><a href="index.php">Go to buy page</a></h3>
                <?php
            }
            else //count>0
            {
            //tạo chuỗi chứa danh sách các id của sản phẩm từ giỏ hàng (để SELECT)
            $arr = array_keys($_SESSION["cart"]);//lấy ra danh sách các key của mảng cart
            $str = implode(",", $arr);//tạo chuỗi chứa các phần tử của mảng ngăn cách bởi dấu phẩy
            //tạo đối tượng clsSanpham
            $sanpham = new clsProduct();
            $ketqua = $sanpham->TimTheo_DS_IDSanpham($str,1);
            if($ketqua==FALSE)
            {
                echo "<h2>Lỗi hiển thị sản phẩm từ CSDL</h2>";
            }
            else
            {
            $total =0;//tổng tiền của tất cả sản phẩm trong giỏ hàng
            $rows = $sanpham->data;
            ?>

            <div id="content_cart">
                <h1 style="text-align: center;color: #fd3d0c;margin: 50px 30px 0 0;font-size: 60px">Your cart</h1>
                <form name="f1" id="f1" action="?module=cart&act=update" method="post">
                    <div id="right_detail">
                        <br>
                        <table class="Content_Table" >
                            <tr>
                                <td> Product name </td>
                                <td> Brand </td>
                                <td> Price </td>
                                <td> Image </td>
                                <td>Amount</td>
                                <td>Total</td>
                            </tr>

                            <?php
                            foreach($rows as $row)
                            {
                                $masp = $row["id"];
                                $soluong = $_SESSION['cart'][$masp];//số lượng của masp từ giỏ hàng
                                $total+=$soluong*$row["price"];
                                $hinhanh = $row["images"];
                                if($hinhanh=="")
                                    $hinhanh = "no-Image.png";
                                ?>



                                <br>
                                <tr>
                                    <td> <?=$row["title"]?> </td>
                                    <td> <?=$row["brand"]?> </td>
                                    <td> <?=$row["price"]?> $ </td>
                                    <td style="width: 200px"><img src="image/Product/<?=$hinhanh?>" style="width: 100px;height: 100px"> </td>
                                    <td><input type="number" name="qty[<?=$masp?>]" value="<?=$soluong?>" style="width: 100px;height: 100px"></td>
                                    <td><span><?=number_format($soluong*$row["price"])?> $</span></td>
                                    <td ><a href="?module=cart&act=del&masp=<?=$row["id"]?>" title="Xóa sản phẩm" style="color: red"> Delete </a></td>
                                </tr>
                                <?php
                            }
                            ?>
                    </div>
                    </table>
                    <br>
                    <div class="cart_update">
                        <input type="submit" name="capnhat" value="Update Cart" class="button" style="width: 15%;margin-left: 85%">
                    </div>
                </form>
            </div>
        </div>

        <?php
        }//if($ketqua==FALSE)
        }//đóng else //count>0
        ?>
    </div>

    <span class="iphone" style="width: 30%; float:right"">
    <h1 style="text-align: center">BILL</h1>
    <h2>Infomation</h2>
    <script>
        function kt()
        {
            hoten = document.getElementById("hoten");
            diachi = document.getElementById("diachi");
            dienthoai = document.getElementById("dienthoai");
            if(hoten.value=="" || diachi.value=="" ||dienthoai.value=="")
            {
                alert("Chưa nhập đủ thông tin");
                return false;
            }
        }
    </script>
    <form name="f2" id="f1" action="?module=dathang" method="post" onSubmit="return kt();" enctype="application/x-www-form-urlencoded">
        <p><span>Name</span>
            <input type="text" name="hoten" id="hoten" value="<?=$_SESSION['username']?> " class="w3-input" readonly ></p>
        <p><span>Address</span>
            <input type="text" name="diachi" id="diachi" class="w3-input" required></p>
        <p><span>Phone No</span>
            <input type="text" name="dienthoai" id="dienthoai" class="w3-input" required></p>
        <br>
        <div>
            <h2>Shopping Bill</h2>

            <table>
                <tbody>
                <tr>
                    <td>Shipping fee</td>
                    <td align="right">$5</td>
                </tr>
                <tr>
                    <td>Discount 10%</td>
                    <td align="right"><?=number_format($total*10/100)?> $</td>
                </tr>
                <tr>
                    <td>Price Total</td>
                    <td align="right"><?=$_SESSION["total"]=$total?> $</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td>Total</td>
                    <td align="right">Total:<?=number_format($total + 5 - ($total*10/100)) ?> $</td>
                </tr>
                </tfoot>
            </table>
        </div>
        <div>
            <div>
                <button name="dathang" id="dathang" class="button button--full" type="submit" ><svg class="icon">
                        <use xlink:href="#icon-shopping-bag" />
                    </svg>Buy Now</button>
            </div>
    </form>
    </span>
    </div>
    </div>
</section>
<style>
    @use postcss-preset-env {
        stage: 0;
    }

    :root {
        --color-background: #fae3ea;
        --color-primary: #fc8080;
        --font-family-base: Poppin, sans-serif;
        --font-size-h1: 1.25rem;
        --font-size-h2: 1rem;
    }


    * {
        box-sizing: inherit;
    }

    html {
        box-sizing: border-box;
    }



    address {
        font-style: normal;
    }

    button {
        border: 0;
        color: inherit;
        cursor: pointer;
        font: inherit;
    }

    fieldset {
        border: 0;
        margin: 0;
        padding: 0;
    }

    h1 {
        font-size: var(--font-size-h1);
        line-height: 1.2;
        margin-block: 0 1.5em;
    }

    h2 {
        font-size: var(--font-size-h2);
        line-height: 1.2;
        margin-block: 0 0.5em;
    }

    legend {
        font-weight: 600;
        margin-block-end: 0.5em;
        padding: 0;
    }

    input {
        border: 0;
        color: inherit;
        font: inherit;
    }

    input[type="radio"] {
        accent-color: var(--color-primary);
    }

    table {
        border-collapse: collapse;
        inline-size: 100%;
    }

    tbody {
        color: #b4b4b4;
    }

    td {
        padding-block: 0.125em;
    }

    tfoot {
        border-top: 1px solid #b4b4b4;
        font-weight: 600;
    }

    .align {
        display: grid;
        place-items: center;
    }

    .button {
        align-items: center;
        background-color: var(--color-primary);
        border-radius: 999em;
        color: #fff;
        display: flex;
        gap: 0.5em;
        justify-content: center;
        padding-block: 0.75em;
        padding-inline: 1em;
        transition: 0.3s;
    }

    .button:focus,
    .button:hover {
        background-color: #e96363;
    }

    .button--full {
        inline-size: 100%;
    }

    .card {
        border-radius: 1em;
        background-color: var(--color-primary);
        color: #fff;
        padding: 1em;
    }

    .form {
        display: grid;
        gap: 2em;
    }

    .form__radios {
        display: grid;
        gap: 1em;
    }

    .form__radio {
        align-items: center;
        background-color: #fefdfe;
        border-radius: 1em;
        box-shadow: 0 0 1em rgba(0, 0, 0, 0.0625);
        display: flex;
        padding: 1em;
    }

    .form__radio label {
        align-items: center;
        display: flex;
        flex: 1;
        gap: 1em;
    }

    .header {
        display: flex;
        justify-content: center;
        padding-block: 0.5em;
        padding-inline: 1em;
    }

    .icon {
        block-size: 1em;
        display: inline-block;
        fill: currentColor;
        inline-size: 1em;
        vertical-align: middle;
    }

    .iphone {
        background-color: #fbf6f7;
        background-image: linear-gradient(to bottom, #fbf6f7, #fff);
        border-radius: 2em;
        block-size: 812px;
        box-shadow: 0 0 1em rgba(0, 0, 0, 0.0625);
        inline-size: 375px;
        overflow: auto;
        padding: 2em;
    }


</style>
<script>
    function kt()
    {
        hoten = document.getElementById("hoten");
        diachi = document.getElementById("diachi");
        dienthoai = document.getElementById("dienthoai");
        if(hoten.value=="" || diachi.value=="" ||dienthoai.value=="")
        {
            alert("Chưa nhập đủ thông tin");
            return false;
        }
    }
</script>
