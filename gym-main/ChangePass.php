<?php
$username = $_REQUEST["username"];
$password= $_REQUEST["password"];
function Update($u,$p)
{

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym_shop";


    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $p = md5($p);
        $sql = "UPDATE user SET password = '$p' WHERE account = '$u'";
        // Prepare statement
        $stmt = $conn->prepare($sql);
        // execute the query
        $stmt->execute();
        // echo a message to say the UPDATE succeeded
        if($stmt->rowCount()==0){
            echo"Failed";
        }
        else{
            echo"success";
        }
        echo"<a href='index.php'>CLick to login</a>";
    } catch (PDOException $e) {
        echo "Change password failed" . "<a href='ForgotPassword.php'>CLick</a>";
        echo $e->getMessage();

    }
}
$conn = null;

Update($username,$password);
