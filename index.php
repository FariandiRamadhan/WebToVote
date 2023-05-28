 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Web Vote</title>
</head>
<body>
    <script src="DOMfunction.js"></script>
    <?php 
    session_start();
    ?>
    <h1></h1>
    <h2></h2>
    
    <!-- <table> 
        <form action="" method="post" enctype="multipart/form-data" name= "forminput">
            <tr>
            <td><label for="nama">Nama : </label></td>
            <td><input type="text" id = "nama" name= "name"></td>
        </tr>
        <tr>
        <td><label for="file">Gambar : </label></td>
            <td><input type="file" id = "file" name = "gambar"></td>
        </tr>
        <tr>
            <td colspan= "2"> <input type="submit" name = "submit" value="submit"> </td>
        </tr>
        </form>
</table> -->

<form action="" method="post">
    <label for="vote">Vote : </label>
    <button type = "submit" value = "1" name = "submit">vote 1</button>
    <button type = "submit" value = "2" name = "submit">vote 2</button>
    <button type = "submit" value = "3" name = "submit">vote 3</button>
</form>
<?php
    require "function.php";
    // require "crudFunctionDB.php";
    // $sesi = $_SESSION["nim"];
    array_push($_POST,$_SESSION);
    // var_dump($_POST);
    // if(!$_SESSION) header("location: login.php");
    if (isset($_POST["submit"])) {
        Form($_POST);
        session_unset();
        session_destroy();
        var_dump($_SESSION);
        // header("location: login.php");
    }

    // $queryFunction = Query($valuesToShow);
    // if($queryFunction) Show($queryFunction);
    // // var_dump($_FILES);
    // var_dump(countVoteValues());
    // ParsingJSON();
    ?>
    <!-- <div class = "image">
    
        <img src = "" alt="" width = "200">
        <p>

        </p>
    </div> -->
    <script src="function.js"></script>
</body>
</html>