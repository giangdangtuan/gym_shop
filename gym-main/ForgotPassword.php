<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome Icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
          integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
          crossorigin="anonymous" />
    <link rel="stylesheet" href="Public/css/forgotpass.css" >
</head>

<body>
<form class="card" action="ChangePass.php" method="post" enctype="multipart/form-data">
    <h2>Forgot Password?</h2>
    <input type="text" class="passInput" name="username" placeholder="Enter username">
    <input type="text" class="passInput" name="password" placeholder="Enter new password">
    <button>Change Pass Word</button>

</form>
</body>
</html>
<style>
    button:hover{
        color:red;
        background-color: #0c63e4;
    }
</style>
