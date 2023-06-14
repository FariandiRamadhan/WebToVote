<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to Website</title>
</head>
<body>
<?php
require_once 'function.php';
require_once 'crudFunctionDB.php';
// print_r(Show("SELECT nim FROM votes"));
session_start();


?>
<table> 
    <form action="" method="post" name= "forminput">
        <tr>
            <td><label for="nama">NAMA : </label></td>
            <td><input type="text" id = "nama" name= "nama" maxlength="60"></td>
        </tr>
        <tr>
        <td><label for="nim">NIM : </label></td>
        <td><input type="number" id = "nim" name = "nim"></td>
        </tr>
        <tr>
            <td><label for="pwd">PASSWORD : </label></td>
            <td><input type="password" id = "pwd" name = "pwd"></td>
        </tr>
        <tr>
            <td colspan= "2"><button type="submit" name="submit" value="login">Submit</button></td>
        </tr>
    </form>
</table>
<?php
// print_r($_SESSION);
if (isset($_POST["submit"])) {
    Form($_POST);
    $_SESSION["stamp"] = time();
    $_SESSION["nim"] = $_POST["nim"];
    $_SESSION["vote"] = 0;
    }

?>
</body>
</html>