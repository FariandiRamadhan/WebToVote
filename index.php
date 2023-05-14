<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Web Vote</title>
</head>
<body>
    <h1></h1>
    <h2></h2>
    <table> 
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
    </table>
    <table> 
        <form action="" method="post" name= "forminput">
        <tr>
            <td><label for="nim">NIM : </label></td>
            <td><input type="number" id = "nim" name= "nim" maxlength = "9"></td>
        </tr>
        <tr>
        <td><label for="nama">Nama : </label></td>
            <td><input type="text" id = "nama" name = "nama"></td>
        </tr>
        <tr>
        <td><label for="pwd">Password : </label></td>
            <td><input type="password" id = "pwd" name = "pwd"></td>
        </tr>
        <tr>
        <td><label for="vote">Vote : </label></td>
            <td><input type="text" id = "vote" name = "vote"></td>
        </tr>
        <tr>
            <td colspan= "2"> <input type="submit" name = "submit" value="submit"> </td>
        </tr>
        </form>
    </table>
    <script src="function.js"></script>
    <?php
    require "function.php";
    require "crudFunctionDB.php";
    
    // AddData($_POST);

    // $queryFunction = Query($valuesToShow);
    // if($queryFunction) Show($queryFunction);
    // // var_dump($_FILES);
    // var_dump(countVoteValues());
    ParsingJSON();
    ?>
    <div class = "image">
    
        <img src = "" alt="" width = "200">
        <p>
            <?php
            //   echo form($_FILES);
              ?>
        </p>
    </div>
    
</body>
</html>