<div id="content_left" class="content_left">
    <div class="left1">
        <div class="topnav">
        <h3 ><a href="?module=<?=$module?>">Back</a></h3>

        </div>
    </div>
</div>
<hr/>
<div id="content_right" class="content_right">
    <h1 style="margin-left: 2px"> Order detail</h1>
    <div id="right_detail">
        <?php
        $trangthai="";
        if($rowHD["status"]==0)
            $trangthai = "Newly added";
        else if($rowHD["status"]==1)
            $trangthai = "Confirmed";
        else if($rowHD["status"]==2)
            $trangthai = "Payed";
        else if($rowHD["status"]==3)
            $trangthai = "Cancelled temporary";
        ?>
        <p> Id: <b> <?=$id?> </b></p>
        <p> Name: <b> <?=$rowHD["buyer"]?> </b></p>
        <p> Address :<b> <?=$rowHD["address"]?> </b></p>
        <p> Phone :<b> <?=$rowHD["phone"]?> </b></p>
        <p> Order date :<b> <?=$rowHD["ngaydat"]?> </b></p>
        <p> Status :<b> <?=$trangthai?> </b>
            <select name="sTT" id="sTT" onChange="sTT_Change(this.value);">
                <option value=""> Update order status</option>
                <option value="0"> Newly added</option>
                <option value="1"> Confirmed</option>
                <option value="2"> Payed</option>
                <option value="3"> Cancelled</option>

            </select>
            <script>
                function sTT_Change(new_value)
                {
                    if(new_value!="")
                        window.location.href=
                            "?module=<?=$module?>&act=trangthai&id=<?=$id?>&ttht=<?=$rowHD["status"]?>&ttmoi="+new_value;
                }
            </script>
        </p>
        <p> Tổng tiền :<span style="color:red; font-weight:bold">
						<?=number_format($tongtien)?> VNĐ</span>
        </p>
        <h3>Products that this user bought: </h3>
        <table width="98%" border="1" class="Content_Table" cellpadding="0" cellspacing="0">
            <tr>
                <td>id</td>
                <td>product id</td>
                <td>product name</td>
                <td>brand</td>
                <td>price</td>
                <td>amount</td>
                <td>total</td>
            </tr>
            <?php
            $rows = $hoadon->data;
            $stt=0;
            foreach($rows as $row)
            {
                $stt++;
                ?>
                <tr>
                    <td><?=$stt?></td>
                    <td><?=$row["maSP"]?></td>
                    <td><?=$row["title"]?></td>
                    <td><?=$row["brand"]?></td>
                    <td><?=number_format($row["price"])?></td>
                    <td><?=$row["amount"]?></td>
                    <td><?=number_format($row["price"]*$row["amount"])?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>