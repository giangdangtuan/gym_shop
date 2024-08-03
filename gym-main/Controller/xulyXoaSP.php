<?php
require_once("Model/clsInVoice.php");
if($id!="" && is_numeric($id))
{
	//bổ sung kiểm tra id sản phẩm có trong bảng tbChitietSanpham (cột masp) hay chưa?
	//nếu chưa có thì xóa sản phẩm, nếu đã có thì không được xóa mà update cột status =0
	$hd = new clsInVoice();
	$hd->TimChitietHoadon($id);
	if($hd->data==NULL) //nếu chưa có sản phẩm nào trong hóa đơn liên quan thì xóa
	{	
		$ketqua = $sanpham->XoaSanpham($id);
		if($ketqua==FALSE)
			$thongbao="Something went wrong";
		else
			$thongbao ="Deleted successfully";
	}
	else
	{
		$ketqua = $sanpham->SuaTrangThaiSanpham($id,0);
		if($ketqua==FALSE)
		$thongbao="Lỗi xóa dữ liệu";
		else
		$thongbao ="Someone has bought it so you cant delete this"."updated to not available";

	}
}
else
	$thongbao ="Xóa dữ liệu lỗi id sản phẩm";

require("ViewsAdmin/vKetqua.php");
?>