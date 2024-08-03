<?php
if($sanpham->data==NULL)
{
    $thongbao ="không tìm thấy thông tin";
}
else
{
    ?>
    <div >
        <h1>Update product</h1>
        <div>
            <?php
            $row = $sanpham->data;
            ?>

            <form name="form1" method="post" action="?module=<?=$module?>&act=xulysua"  enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="<?=$id?>">
                <form>
                    <a href="indexAdmin.php"><h1 style="text-align: right;text-decoration: none;color: black">x</h1></a>
                    <div class="container">
                        <h4>Category name</h4>
                            <div >
                                <div class="input-group input-group-icon">
                                <select name="s1" id="s1">
                                    <option value="0"> Choose Category</option>
                                    <?php
                                    require_once("Model/clsCategory.php");
                                    require_once("Public/Tienich.php");
                                    $nps = new clsCategory();
                                    $nps->LayDanhSachNhomSanpham(2);////lấy tất cả nhóm SP
                                    ShowOptions($nps->data,"id","cat_name",$row["cat_id"]);
                                    ?>
                                </select>
                            </div>
                            </div>

                        <?php
                        $hinhanh = $row["images"];
                        if($hinhanh=="")
                            $hinhanh= "no-Image.png";
                        ?>
                        <h4>Category name</h4>
                    <div class="input-group input-group-icon">
                        <input type="text" name="t1" id="t1"  value="<?=$row["title"];?>">
                        <div class="input-icon"><i class="fa fa-tag" aria-hidden="true"></i></div>
                    </div>
                        <h4>Brand</h4>
                        <div class="input-group input-group-icon">
                            <input type="text" name="t2" id="t2"  value="<?=$row["brand"]?>">
                            <div class="input-icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                        </div>
                        <h4>Price</h4>
                        <div class="input-group input-group-icon">
                            <input type="text" name="t3" id="t3"  value="<?=$row["price"]?>">
                            <div class="input-icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                        </div>
                        <h4>Image</h4>
                        <div class="input-group input-group-icon">
                            <img width="100" height="100" src="image/Product/<?=$hinhanh?>">
                            <input type="hidden" name="anhHientai" id="anhHientai" value="<?=$row["images"]?>">
                            <input type="file" name="f1" id="f1">
                        </div>
                        <h4>Description</h4>
                        <div class="input-group input-group-icon">
                            <textarea name="t4" id="t4" rows="5" cols="80"><?=$row["description"]?></textarea>
                        </div>
                        <h4>Content</h4>
                        <div class="input-group input-group-icon">
                            <td><textarea name="t5" id="t5" rows="5" cols="80"><?=$row["content"]?></textarea></td>
                        </div>

                        <h4>Status</h4>
                        <div class="input-group">
                            <input id="payment-method-card" type="radio" name="rTrangthai" id="r1" value="1"  <?=($row["status"]==1)?"checked":""?> />
                            <label for="payment-method-card"><span><i class="fa fa-thumbs-o-up"></i>Available</span></label>
                            <input id="payment-method-paypal" type="radio" name="rTrangthai" id="r2" value="0" <?=($row["status"]==0)?"checked":""?>/>
                            <label for="payment-method-paypal"> <span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>Not Available</span></label>
                        </div>
                        <div class="row">
                            <input type="submit" name="button" id="button" value="Đồng ý">
                        </div>
                    </div>

                </form>
            </form>
            <script language="javascript">
                var ckTomtat = CKEDITOR.replace('t4');
                ckTomtat.config.width = 600;
                CKFinder.setupCKEditor(ckTomtat, null, { type: 'Images' });

                var ckNoidung = CKEDITOR.replace('t5');
                ckNoidung.config.width = 600;
                CKFinder.setupCKEditor(ckNoidung, null, { type: 'Images' });
            </script>
        </div>
    </div>
    <?php
}
?>


<style>
    /* 64ac15 */
    *,
    *:before,
    *:after {
        box-sizing: border-box;
    }
    body {
        padding: 1em;
        font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 15px;
        color: #b9b9b9;
        background-color: #e3e3e3;
    }
    h4 {
        color: #f0a500;
    }
    input,
    input[type="radio"] + label,
    input[type="checkbox"] + label:before,
    select option,
    select {
        width: 100%;
        padding: 1em;
        line-height: 1.4;
        background-color: #f9f9f9;
        border: 1px solid #e5e5e5;
        border-radius: 3px;
        -webkit-transition: 0.35s ease-in-out;
        -moz-transition: 0.35s ease-in-out;
        -o-transition: 0.35s ease-in-out;
        transition: 0.35s ease-in-out;
        transition: all 0.35s ease-in-out;
    }
    input:focus {
        outline: 0;
        border-color: #bd8200;
    }
    input:focus + .input-icon i {
        color: #f0a500;
    }
    input:focus + .input-icon:after {
        border-right-color: #f0a500;
    }
    input[type="radio"] {
        display: none;
    }
    input[type="radio"] + label,
    select {
        display: inline-block;
        width: 50%;
        text-align: center;
        float: left;
        border-radius: 0;
    }
    input[type="radio"] + label:first-of-type {
        border-top-left-radius: 3px;
        border-bottom-left-radius: 3px;
    }
    input[type="radio"] + label:last-of-type {
        border-top-right-radius: 3px;
        border-bottom-right-radius: 3px;
    }
    input[type="radio"] + label i {
        padding-right: 0.4em;
    }
    input[type="radio"]:checked + label,
    input:checked + label:before,
    select:focus,
    select:active {
        background-color: #f0a500;
        color: #fff;
        border-color: #bd8200;
    }
    input[type="checkbox"] {
        display: none;
    }
    input[type="checkbox"] + label {
        position: relative;
        display: block;
        padding-left: 1.6em;
    }
    input[type="checkbox"] + label:before {
        position: absolute;
        top: 0.2em;
        left: 0;
        display: block;
        width: 1em;
        height: 1em;
        padding: 0;
        content: "";
    }
    input[type="checkbox"] + label:after {
        position: absolute;
        top: 0.45em;
        left: 0.2em;
        font-size: 0.8em;
        color: #fff;
        opacity: 0;
        font-family: FontAwesome;
        content: "\f00c";
    }
    input:checked + label:after {
        opacity: 1;
    }
    select {
        height: 3.4em;
        line-height: 2;
    }
    select:first-of-type {
        border-top-left-radius: 3px;
        border-bottom-left-radius: 3px;
    }
    select:last-of-type {
        border-top-right-radius: 3px;
        border-bottom-right-radius: 3px;
    }
    select:focus,
    select:active {
        outline: 0;
    }
    select option {
        background-color: rgba(125, 161, 189, 0.83);
        color: #fff;
    }
    .input-group {
        margin-bottom: 1em;
        zoom: 1;
    }
    .input-group:before,
    .input-group:after {
        content: "";
        display: table;
    }
    .input-group:after {
        clear: both;
    }
    .input-group-icon {
        position: relative;
    }
    .input-group-icon input {
        padding-left: 4.4em;
    }
    .input-group-icon .input-icon {
        position: absolute;
        top: 0;
        left: 0;
        width: 3.4em;
        height: 3.4em;
        line-height: 3.4em;
        text-align: center;
        pointer-events: none;
    }
    .input-group-icon .input-icon:after {
        position: absolute;
        top: 0.6em;
        bottom: 0.6em;
        left: 3.4em;
        display: block;
        border-right: 1px solid #e5e5e5;
        content: "";
        -webkit-transition: 0.35s ease-in-out;
        -moz-transition: 0.35s ease-in-out;
        -o-transition: 0.35s ease-in-out;
        transition: 0.35s ease-in-out;
        transition: all 0.35s ease-in-out;
    }
    .input-group-icon .input-icon i {
        -webkit-transition: 0.35s ease-in-out;
        -moz-transition: 0.35s ease-in-out;
        -o-transition: 0.35s ease-in-out;
        transition: 0.35s ease-in-out;
        transition: all 0.35s ease-in-out;
    }
    .container {
        max-width: 38em;
        padding: 1em 3em 2em 3em;
        margin: 0em auto;
        background-color: #fff;
        border-radius: 4.2px;
        box-shadow: 0px 3px 10px -2px rgba(0, 0, 0, 0.2);
    }
    .row {
        zoom: 1;
    }
    .row:before,
    .row:after {
        content: "";
        display: table;
    }
    .row:after {
        clear: both;
    }
    .col-half {
        padding-right: 10px;
        float: left;
        width: 50%;
    }
    .col-half:last-of-type {
        padding-right: 0;
    }
    .col-third {
        padding-right: 10px;
        float: left;
        width: 33.33333333%;
    }
    .col-third:last-of-type {
        padding-right: 0;
    }
    @media only screen and (max-width: 540px) {
        .col-half {
            width: 100%;
            padding-right: 0;
        }
    }

</style>

