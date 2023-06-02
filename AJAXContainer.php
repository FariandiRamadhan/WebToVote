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
    <script>
        let h2 = document.querySelector('h2'); 
        console.log(h2.childNodes.length);
        // let h2 = [];
        // for (let index = 1; index < 4; index++) {
        // h2[index] = document.createElement('h2');  
        // body.appendChild(h2[index]);
    // }
        // let votePSecond = setInterval(function(){
            // h2[1].innerHTML = "<?php //echo $vote1;?>";
            // h2[2].innerHTML = "<?php //echo $vote2;?>";
            // h2[3].innerHTML = "<?php //echo $vote3;?>";
        // },1000);
    </script>
</body>
</html>