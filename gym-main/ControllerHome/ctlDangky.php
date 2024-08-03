<?php
$module ="";

$thongbao ="";
$user = $_REQUEST["username"];
$pass= $_REQUEST["password"];
function Add($user,$pass){
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "gym_shop1";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // prepare sql and bind parameters
        $stmt = $conn->prepare("INSERT INTO user (account, password) VALUES (:account, :password)");
        $stmt->bindParam(':account', $user);
        $pass=md5($pass);
        $stmt->bindParam(':password', $pass);
        $stmt->execute();
        $thongbao = "Created account successfully";
        $module ='../Login.php';
    } catch(PDOException $e) {
        $thongbao = "This username has been taken";
        $module ='../Login.php';
    }
    $conn = null;
    $link_tieptuc = $module;
    require("../ViewsAdmin/vKetqua.php");
}

if($username=null or $password=null){
    echo"Please fill in the form";
}
else {
    Add($user, $pass);
}
