
<section style="margin: 70px 0">
    <div class="" >
        <div style="width: 65%; float:left;margin-left: 2%">
            <?php
            $_SESSION["diachi"] = $_REQUEST['diachi'];
            $_SESSION["dienthoai"] = $_REQUEST['dienthoai'];
            $total = (integer)$_SESSION["total"];
            //đếm số đầu sản phẩm trong giỏ hàng
            ?>

        </div>
    </div>

    <span class="iphone" style="width: 40%;margin: auto;background-color: #eeeeee">
    <h1 style="text-align: center">Check Out</h1>
    <h2>Infomation</h2>
    <form name="f2" id="f1" action="?module=checkout" method="post" onSubmit="return kt();" enctype="application/x-www-form-urlencoded">
        <p><span>Name</span>
            <input type="text" name="hoten" id="hoten" value="<?=$_SESSION['username']?> " class="w3-input" readonly ></p>
        <p><span>Address</span>
            <input type="text" name="diachi" id="diachi" value="<?=$_SESSION['diachi']?> " class="w3-input" readonly></p>
        <p><span>Phone No</span>
            <input type="text" name="dienthoai" id="dienthoai"  value="<?=$_SESSION['dienthoai']?> " class="w3-input" readonly></p>
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
                    <td align="right"><?=$total?> $</td>
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
            <input class="btn-checkout" type="submit" name="dathang" id="dathang" value="PAY ON SHIPMENT" class="btn btn-danger">
    </form>
    <div>
        <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
              action="ControllerHome/ctlMoMo_ATM.php">
            <input class="btn-checkout" type="submit" name="momo" value="USING MOMO ATM" class="btn btn-danger">
        </form>
    </div>
    <div>
        <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="ControllerHome/ctlMoMo.php">
            <input class="btn-checkout" type="submit" name="momo" value="USING MOMO QR" class="btn btn-danger">
        </form>
    </div>
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
        box-shadow: 0 0 1em rgba(0, 0, 0, 0.0625);
        inline-size: 375px;
        overflow: auto;
        padding: 2em;
    }
    .btn-checkout{
        min-width: 250px;
        margin-bottom: 10px;
        background-color: #fd3d0c;
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
