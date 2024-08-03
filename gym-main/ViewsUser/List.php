<?php

session_start();
$user = $_SESSION["username"];
//require("../Controller/ctlOrder.php");
require_once("../Model/clsInVoice.php");
$hoadon = new clsInVoice();

$ketqua = $hoadon->LayDanhSachHoadonuser($user);
require("../ViewsUser/vListOrder.php");
