<?php
require_once("clsDatabase.php");
class clsContact
{
    public $db;
    public $data;//mảng chứa dữ liệu trả về bởi hàm truy vấn dữ liệu

    function __construct()
    {
        $this->db = new clsDatabase();//tạo đối tượng clsDatabase và kết nối CSDSL
        $this->data = array();
    }
    //các hàm truy vấn, thêm, sửa, xóa
    //$trangthai: 2 - tất cả; 1 hoặc 0 thì lọc các bản ghi có status = 1|0
    //$order = 0 : không sắp xếp; 1 : tăng dần; -1 : giảm dần
    //tham số mặc định $trangthai =2, $order =0
    function AddComment($ten,$content)
    {
        $sql = "insert into contact values(Null,$ten,$content,Null)";
        //nếu khác 2 thì thêm mệnh đề WHERE để lọc,
        //còn nếu =2 thì không có có WHERE => sẽ hiển thị mọi sản phẩm

        $ketqua = $this->db->ThucthiSQL($sql);
        //LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
        $this->data = NULL;
        if ($ketqua == TRUE)
            $this->data = $this->db->pdo_stm->fetchAll();
        return $ketqua;//trả về $ketqua: TRUE/FALSE
    }
    //Hàm thêm dữ liệu

    function showComment(){
        $sql = "SELECT * from contact";
        $ketqua = $this->db->ThucthiSQL($sql);
        //LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
        $this->data = NULL;
        if ($ketqua == TRUE)
            $this->data = $this->db->pdo_stm->fetchAll();
        return $ketqua;//trả về $ketqua: TRUE/FALSE
    }

    function delete(){
        $sql = "SELECT * from contact";
        $ketqua = $this->db->ThucthiSQL($sql);
        //LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
        $this->data = NULL;
        if ($ketqua == TRUE)
            $this->data = $this->db->pdo_stm->fetchAll();
        return $ketqua;//trả về $ketqua: TRUE/FALSE
    }
}
?>