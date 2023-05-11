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
    <script src="function.js"></script>
    <?php
    require "function.php";
    $NIM = "220444180013";
    $values = "INSERT INTO votes VALUES ('220444180013','Fariandi Ramadhan', 'Hai','1')";
    $values2 = "SELECT * FROM votes";
    $values3 = "UPDATE votes SET nim = '220444180012' WHERE nim = $NIM ";
    Query($values3);
    Query($values2);
    ?>
</body>
</html>