<?php
require_once("Model/clsProduct.php");
require_once("Model/clsCategory.php");
//biến $link_tieptuc và $thongbao dùng cho Views/vKetqua.php
$link_tieptuc ="?module=" . $module;
$thongbao ="";
//lấy các thông tin từ request nếu có
$act = isset($_REQUEST["act"])?$_REQUEST["act"]:"";
$tukhoa = isset($_REQUEST["tTukhoa"])? $_REQUEST["tTukhoa"]:"";
$manhom = isset($_REQUEST["manhom"])?$_REQUEST["manhom"]:0;
//tạo đối tượng clsSanpham
$sanpham = new clsProduct();
$soketqua =0;
$tennhom = "";
$limit =  6;
//B2.Tính tổng số sản phẩm
$sanpham->LayDanhSachSanpham(1,$manhom,$tukhoa);
$total_records = count($sanpham->data);
if($total_records==NULL)
    die("<h3> Error</h3>");
//B3.Tính tổng số trang sẽ có = ceil(Tổng số sản phẩm / Số sản phẩm trên 1 trang)
//$total_pages để dùng cho vòng lặp hiển thị các trang: 1 | 2 | ...|$total_pages
$total_pages = ceil($total_records/$limit);
//B4. Xác định vị trí trang muốn hiển thị (từ link phân trang)
//Ví dụ: index.php?trang=1, index.php?trang=2
$current_page = 1; //gán mặc định trang cần hiển thị = 1
if(isset($_REQUEST["trang"]) && is_numeric($_REQUEST["trang"]))
{
    $current_page = $_REQUEST["trang"];
}
if($current_page<=0) //nếu trang cần hiển thị <=0 thì gán về trang 1
    $current_page=1;
if($current_page>$total_pages)//nếu vượt quá tổng số trang thì gán bằng trang cuối
    $current_page = $total_pages;
//B5. Tính vị trí đầu tiên của bản ghi cần truy vấn ứng số vị trí trang cần hiển thị
$start = ($current_page-1) * $limit;
if($act=="timkiem")
{
    $ketqua = $sanpham->LayDanhSachSanpham(1,$manhom,$tukhoa,$start,$limit);
    if($ketqua)
        $soketqua = $sanpham->db->pdo_stm->rowCount();
}
else
{
    if($manhom >0){
        $ketqua = $sanpham->LayDanhSachSanpham(1,$manhom,"",$start,$limit);//lấy các sp có status=1 và cat_id=$manhom
        $cat =  new clsCategory();
        $cat->TimTheoIDNhomSanpham($manhom);
        $tennhom = $cat->data["cat_name"];
    }
    else{ //hiển thị tất cả sản phẩm
        $ketqua = $sanpham->LayDanhSachSanpham(1,0,"",$start,$limit);//lấy tất cả các sp có status=1
    }
}
require("ViewsUser/vProduct.php");
?>


