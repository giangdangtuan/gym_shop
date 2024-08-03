
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<div style="padding: 20px;20px;background-color: #eee">
    <div class="card mb-4">
        <div class="card-header" style="background-color: rgba(125,161,189,0.83)">
           <a href="../index.php">Back</a>
        </div>
        <div class="card-body">
            <table id="customers" >

                <thead>
                <tr>

                    <th>Address</th>
                    <th>Phone</th>
                    <th>Order date</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Act</th>
                </tr>
                </thead>

                <tbody>
                <?php
                $rows = $hoadon->data;
                foreach($rows as $row)
                {
                    $trangthai="";
                    if($row["status"]==0)
                        $trangthai = "Newly added";
                    else if($row["status"]==1)
                        $trangthai = "Confirmed";
                    else if($row["status"]==2)
                        $trangthai = "Payed";
                    else if($row["status"]==3)
                        $trangthai = "Cancelled";

                    ?>
                        <form action="sua.php" method="post" enctype="multipart/form-data">
                    <tr>
                        <input name="id" id="id" value="<?=$row["id"]?>" hidden>
                        <td><?=$row["address"]?></td>
                        <td><?=$row["phone"]?></td>
                        <td><?=$row["ngaydat"]?></td>
                        <td><?=number_format($hoadon->TongTien($row["id"]))?></td>
                        <td><?=$trangthai?></td>
                        <td>

                            <button type="submit"><i class="fa fa-trash" aria-hidden="true" style="color: red"></i></button>


                        </td>
                    </tr>
                        </form>
                    <?php
                }
                ?>
            </table>


            </tbody>
            </table>
        </div>
    </div>
</div>
</style>


<script language="javascript">
    var ckTomtat = CKEDITOR.replace('t4');
    ckTomtat.config.width = 600;
    CKFinder.setupCKEditor(ckTomtat, null, { type: 'Images' });

    var ckNoidung = CKEDITOR.replace('t5');
    ckNoidung.config.width = 600;
    CKFinder.setupCKEditor(ckNoidung, null, { type: 'Images' });
</script>
<style>
#customers {
font-family: Arial, Helvetica, sans-serif;
border-collapse: collapse;
width: 100%;
}

#customers td, #customers th {
border: 1px solid #ddd;
padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
padding-top: 12px;
padding-bottom: 12px;
text-align: left;
background-color: #04AA6D;
color: white;
}
</style>
