<?php
require_once("../Model/clsContact.php");
$name = $_REQUEST["name"];
$info = $_REQUEST["info"];
$contactInfo = new clsContact();
$ketqua = $contactInfo->AddComment($name,$info);
if($ketqua){
    $thongbao="We have received your comment";
    $link_tieptuc="../IndexUser.php";
    require ("../ViewsAdmin/vKetqua.php");
}


