<?php
require_once("../Model/clsContact.php");
$contactInfo = new clsContact();
$ketqua = $contactInfo->showComment();
require ("../ViewsAdmin/vContact.php");



