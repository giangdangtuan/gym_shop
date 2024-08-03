<?php
require_once("Model/clsProduct.php");
//lấy các thông tin từ request nếu có
$act = "";
$masp = "";
$soluongthem = isset($_REQUEST["qty"])?$_REQUEST["qty"]:1;
if(isset($_REQUEST["act"]))
    $act = $_REQUEST["act"];
if(isset($_REQUEST["masp"]))
    $masp = $_REQUEST["masp"];
//biến $link_tieptuc và $thongbao dùng cho Views/vKetqua.php
$link_tieptuc ="?module=" . $module;
$thongbao ="";

if($act == "add"){
    if($masp=="" || is_numeric($masp)==false)
        $thongbao = "something went wrong";
    else
    {
        if(isset($_SESSION["cart"][$masp])==true)//nếu sản phẩm có trong giỏ hàng
        {
            if($soluongthem>=0){
                $soluong = $_SESSION["cart"][$masp];
                //tăng số lượng của sản phẩm trong mảng lên 1 đv và gán cho masp cũ
                $_SESSION["cart"][$masp] = $soluong +$soluongthem;
            }
            else{
                $soluong = $_SESSION["cart"][$masp];
                $_SESSION["cart"][$masp] = $soluong;
            }
        }
        else//masp phẩm chưa có trong giỏ hàng (mua sản phẩm mới)
        {
            //thêm 1 phần tử có key là $masp và giá trị là 1 vào mảng cart
            if($soluongthem>=0){
            $_SESSION["cart"][$masp] =$soluongthem;
            }
            else{
                $_SESSION["cart"][$masp] = 1;
            }
        }
        $thongbao ="Added product to cart";
        //header("location:index.php?module=cart");
    }
    require_once("ViewsUser/vCart.php");
}
else if($act == "del"){
    if($masp=="" || is_numeric($masp)==false)
        $thongbao = "something went wrong";
    else
    {
        if($masp==0)//xóa toàn bộ giỏ hàng
        {
            unset($_SESSION["cart"]);
        }
        else//xóa sản phẩm có masp chọn
        {
            unset($_SESSION["cart"][$masp]);
        }
        $thongbao ="Deleted product from cart";
        //header("location:index.php?module=cart");
    }
    require("ViewsAdmin/vKetqua.php");
}
else if($act == "update"){
    if(isset($_POST["capnhat"])==false)
        $thongbao = "Error";
    else
    {
        $qty = $_REQUEST["qty"];//lấy mảng các input có name="qty[x]"
        foreach($qty as $masp=>$soluong)
        {
            //nếu số lượng =0 hoặc không phải số thì xóa sản phẩm
            if($soluong<=0 || is_numeric($soluong)==false)
                unset($_SESSION["cart"][$masp]);
            else
                $_SESSION["cart"][$masp] = $soluong;
        }
        $thongbao ="Updated amount of product in cart";
        //header("location:index.php?module=cart");//chuyển link sang trang cart
    }

    require("ViewsAdmin/vKetqua.php");
}
else
{
    require_once("ViewsUser/vCart.php");
}

?>