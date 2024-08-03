<?php
require_once("Model/clsInVoice.php");
require_once("Model/clsProduct.php");
//biến $link_tieptuc và $thongbao dùng cho Views/vKetqua.php
$link_tieptuc ="?module=cart";
$thongbao ="";
$hoten = $_SESSION["username"];
$diachi = $_SESSION["diachi"];
$dienthoai = $_SESSION["dienthoai"];
//Lấy thông tin từ form và chèn hóa đơn mới
if(isset($_SESSION["cart"])==false)
    $thongbao ="Cart empty";
//else if(isset($_REQUEST["dathang"])==false)
//    $thongbao ="Something went wrong";
else if(isset($_GET['partnerCode'])){
    $code_order = rand(0,9999);
    $partnerCode= $_GET['partnerCode'];
    $orderId=$_GET['orderId'];
    $amount=$_GET['amount'];
    $orderInfo=$_GET['orderInfo'];
    $orderType=$_GET['orderType'];
    $transId=$_GET['transId'];
    $payType=$_GET['payType'];
    $hoadon = new clsInVoice();
    $ketqua = $hoadon->ThemHoadonmomo($partnerCode,$orderId,$amount,$orderInfo,$orderType,$transId,$payType,$code_order);
    if($ketqua){
        $ketqua2 = $hoadon->ThemHoadon($hoten,$diachi,$dienthoai,$orderType,2);
        if($ketqua2==FALSE)
            $thongbao ="Something went wrong";
        else
        {
            //lấy mã hóa đơn tự động sinh từ lệnh insert trên
            $mahd = $hoadon->getLastId();
            $sanpham = new clsProduct();
            //duyệt từng mặt hàng trong giỏ hàng (cart) lấy ra masp và soluong
            //lưu mã hóa đơn, mã sản phẩm, số lượng, giá sản phẩm vào chi tiết hóa đơn
            foreach($_SESSION["cart"] as $masp=>$soluong)
            {
                $ketqua = $sanpham->TimTheoIDSanpham($masp);
                $giasp = $sanpham->data["price"];//lấy giá sản phẩm
                $ketqua = $hoadon->ThemChitietHoadon($mahd,$masp,$soluong,$giasp);
                if($ketqua==FALSE)
                    $thongbao ="Something went wrong";
                else
                {
                    unset($_SESSION["cart"]);//xóa giỏ hàng
                    $thongbao ="Thanks for your purchase";
                    $thongbao .= "<br>We will contact back as soon as possible";
                    $thongbao .= "<br>Account: 0011223344";
                    $thongbao .= "<br>Bank: BIDV";
                }
            }
        }
    }
}
else
{
    //$ngaynhan = $_REQUEST["ngaynhan"];
    $hoadon = new clsInVoice();
    $ketqua = $hoadon->ThemHoadon($hoten,$diachi,$dienthoai,'Pay on shipment');
    if($ketqua==FALSE)
        $thongbao ="Something went wrong";
    else
    {
        //lấy mã hóa đơn tự động sinh từ lệnh insert trên
        $mahd = $hoadon->getLastId();
        $sanpham = new clsProduct();
        //duyệt từng mặt hàng trong giỏ hàng (cart) lấy ra masp và soluong
        //lưu mã hóa đơn, mã sản phẩm, số lượng, giá sản phẩm vào chi tiết hóa đơn
        foreach($_SESSION["cart"] as $masp=>$soluong)
        {
            $ketqua = $sanpham->TimTheoIDSanpham($masp);
            $giasp = $sanpham->data["price"];//lấy giá sản phẩm
            $ketqua = $hoadon->ThemChitietHoadon($mahd,$masp,$soluong,$giasp);
            if($ketqua==FALSE)
                $thongbao ="Something went wrong";
            else
            {
                unset($_SESSION["cart"]);//xóa giỏ hàng
                $thongbao ="Thanks for your purchase";
                $thongbao .= "<br>We will contact back as soon as possible";
                $thongbao .= "<br>Account: 0011223344";
                $thongbao .= "<br>Bank: BIDV";
            }
        }
    }
}
require("ViewsAdmin/vKetqua.php");
?>