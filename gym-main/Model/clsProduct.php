<?php
require_once("clsDatabase.php");
class clsProduct
{
    public $db;
    public $data;//mảng chứa dữ liệu trả về bởi hàm truy vấn dữ liệu

    function __construct()
    {
        $this->db = new clsDatabase();//tạo đối tượng clsDatabase và kết nối CSDSL
        $this->data = array();
    }
    //các hàm truy vấn, thêm, sửa, xóa
    //Hàm LayDanhSachSanpham() truy vấn dữ liệu lưu vào thuộc tính data của lớp
    function DanhSach_SP_Theo_Vitri($start, $limit)
    {
        $sql = "SELECT * FROM sanpham LIMIT $start, $limit";
        $ketqua = $this->db->ThucthiSQL($sql);
        if($ketqua==FALSE)
            return NULL;
        else
        {
            $this->data = $this->db->pdo_stm->fetchAll();
            return $ketqua;
        }
    }
    function LayDanhSachSanpham($trangthai = 1, $cat_id = 0, $tukhoa = "",$start = 0, $limit=100)
    {
        $sql = "SELECT Sp.*, Cat.cat_name, Cat.cat_status 
					FROM sanpham AS Sp INNER JOIN category AS Cat 
					ON Sp.cat_id=Cat.id WHERE 1 ";
        if ($cat_id != 0)
            $sql = $sql . " AND Sp.cat_id = " . $cat_id;
        //nếu khác 2 thì thêm mệnh đề WHERE để lọc,
        //còn nếu =2 thì không có có WHERE => sẽ hiển thị mọi sản phẩm
        if ($trangthai != 2) {
            $sql = $sql . " AND Sp.status = " . $trangthai;
            $sql = $sql . " AND Cat.cat_status = " . $trangthai;
        }
        //bổ sung tìm theo từ khóa
        if ($tukhoa != "")
            $sql = $sql . " AND Sp.title LIKE '%" . $tukhoa . "%'";
        $sql = $sql . " LIMIT " . $start . "," . $limit;
        $ketqua = $this->db->ThucthiSQL($sql);
        //LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
        $this->data = NULL;
        if ($ketqua == TRUE)
            $this->data = $this->db->pdo_stm->fetchAll();
        return $ketqua;//trả về $ketqua: TRUE/FALSE
    }
    function GetAll()
    {
        $sql = "SELECT * FROM sanpham ";
        $ketqua = $this->db->ThucthiSQL($sql);
        //LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
        $this->data = NULL;
        if ($ketqua == TRUE)
            $this->data = $this->db->pdo_stm->fetchAll();
        return $ketqua;//trả về $ketqua: TRUE/FALSE
    }
    //Hàm thêm dữ liệu
    function ThemSanpham($tensp,$brand, $price, $image,$description,$content,$status,$cat_id)
    {
        $sql = "INSERT INTO sanpham VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)";
        $data[] = $tensp;
        $data[] = $brand;
        $data[] = $price;
        $data[] = $image;
        $data[] = $description;
        $data[] = $content;
        $data[] = $status;
        $data[] = $cat_id;
        $ketqua = $this->db->ThucthiSQL($sql,$data);
        return $ketqua;
    }
    //Hàm sửa dữ liệu
    function SuaSanpham($id,$title,$brand,$price, $image, $description,$content,$status,$cat_id)
    {
        $sql = "UPDATE sanpham SET title = ?, brand = ?, price = ?, 
				images = ?,description = ?,content = ?, status=?, cat_id=? WHERE id=?";
        $data[] = $title;
        $data[] = $brand;
        $data[] = $price;
        $data[] = $image;
        $data[] = $description;
        $data[] = $content;
        $data[] = $status;
        $data[] = $cat_id;
        $data[] = $id;
        $ketqua = $this->db->ThucthiSQL($sql,$data);
        return $ketqua;
    }
    //Hàm TimTheoIDSanpham($id) truy vấn dữ liệu theo id lưu vào thuộc tính data
    function TimTheoIDSanpham($id, $trangthai=2)
    {
        $sql = "SELECT * FROM sanpham WHERE id=?";
        if($trangthai!=2)
            $sql = $sql . " AND status = " . $trangthai;

        $data[] = $id;
        $ketqua = $this->db->ThucthiSQL($sql,$data);
        //LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
        $this->data=NULL;
        if($ketqua==TRUE)
            $this->data = $this->db->pdo_stm->fetch();
        return $ketqua;//trả về $ketqua: TRUE/FALSE
    }
    function TimTheo_DS_IDSanpham($list, $trangthai=2)
    {
        $sql = "SELECT * FROM sanpham WHERE id in ($list)";
        if($trangthai!=2)
            $sql = $sql . " AND status = " . $trangthai;

        $data = NULL;
        $ketqua = $this->db->ThucthiSQL($sql,$data);
        //LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
        $this->data=NULL;
        if($ketqua==TRUE)
            $this->data = $this->db->pdo_stm->fetchAll();
        return $ketqua;//trả về $ketqua: TRUE/FALSE
    }
    //Lấy số lượng $n danh sách sản phẩm mới nhất
    function LaySanphamMoiNhat($n)
    {
        $sql = "SELECT Sp.*, Cat.cat_status FROM sanpham AS Sp INNER JOIN category AS Cat 
				ON Sp.cat_id=Cat.id
				WHERE status = 1 AND cat_status=1 ORDER BY Sp.id DESC LIMIT 0,$n";
        $ketqua = $this->db->ThucthiSQL($sql);
        //LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
        $this->data=NULL;
        if($ketqua==TRUE)
            $this->data = $this->db->pdo_stm->fetchAll();
        return $ketqua;//trả về $ketqua: TRUE/FALSE
    }
    function DemTongSoSanPham()
    {
        $sql = "SELECT COUNT(*) as Tong  FROM sanpham ";
        $ketqua = $this->db->ThucthiSQL($sql);
        if($ketqua==FALSE)
            return NULL;
        else
        {
            $this->data = $this->db->pdo_stm->fetchAll();
            return $ketqua;
        }
    }
//hàm trả về số lượng $limit sản phẩm bắt đầu từ bị trí $start
    function XoaSanpham($id)
    {
        $sql = "DELETE FROM sanpham WHERE id=?";
        $data[] = $id;
        $ketqua = $this->db->ThucthiSQL($sql,$data);
        return $ketqua;
    }

    function SuaTrangThaiSanpham($id, $status)
    {
        $sql = "UPDATE sanpham SET status = ? WHERE id=?";
        $data[] = $status;
        $data[] = $id;
        $ketqua = $this->db->ThucthiSQL($sql,$data);
        return $ketqua;
    }
}
?>