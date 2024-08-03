<?php
require_once("Model/clsCategory.php");
$cat_id = $_REQUEST["id"];
if($cat_id!="" && is_numeric($cat_id)){
    $sp = new clsCategory();
    try {
        $sp->XoaNhomSanpham($cat_id);//tìm các sản phẩm của nhóm có id này
        if ($sp->data == NULL) { //nếu chưa có sản phẩm nào liên quan thì xóa
            $ketqua = $Nhomsanpham->XoaNhomSanpham($cat_id);
            if ($ketqua == FALSE) {
                $thongbao = "Something went wrong";
            } else
                $thongbao = "Deleted successfully";
        }
    }catch (Exception $e){
        $thongbao ="Product with this category has existed ";
        require ("ViewsAdmin/vKetqua.php");
    }
}
else
    $thongbao ="Something went wrong";
    require ("ViewsAdmin/vKetqua.php")
?>