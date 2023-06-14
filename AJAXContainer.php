<!-- <!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head> -->
<html lang="en">
<body>
    <?php 
    require_once 'function.php';
    require_once 'crudFunctionDB.php';
    [$vote1, $vote2, $vote3] = CountVotes();
    ?>
    
    <h2>
    <?php echo $vote1;?>
    </h2> 
    <h2>
    <?php echo $vote2;?>
    </h2>
    <h2>
    <?php echo $vote3;?>
    </h2>
</body>
</html>