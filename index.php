 <!DOCTYPE html>
    <?php 
    session_start();
    ?>
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
        <script src="DOMfunction.js"></script>
    <?php
    require_once "function.php";
    require_once "crudFunctionDB.php";
    // $_SESSION["nim"];
    array_push($_POST,$_SESSION);
    $timeCheck = time() - $_SESSION["stamp"];
    // var_dump(time() - $_SESSION["stamp"]);
    if(!$_SESSION) header("location: login.php");
    if (isset($_POST["submit"]) || $timeCheck >= 200) {
        // || $timeCheck >= 200
        Form($_POST);
        // session_unset();
        // session_destroy();
        // var_dump($_SESSION);
    }

    // $queryFunction = Query($valuesToShow);
    // if($queryFunction) Show($queryFunction);
    // // var_dump($_FILES);
    // var_dump(countVoteValues"());
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