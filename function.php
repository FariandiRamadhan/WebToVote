<?php
$CONN = mysqli_connect("localhost","root","","votetable");
function Query($querycontent){
    global $CONN;
    $QUERY = mysqli_query($CONN, $querycontent);
    $ROWS = [];
    if(mysqli_error($CONN)){
    echo "gagal";
    }
    else {
        $RESULT = mysqli_fetch_row($querycontent);
        foreach ($RESULT as $ROW) {
            echo $ROW;
        }
    }
}

// function Show($showablecontent){
//     global $CONN;
//     $ROWS = [];
//     if(mysqli_error($CONN)){
//     echo "gagal";
//     }
//     else {
//         $RESULT = mysqli_fetch_row($showablecontent);
//         foreach ($RESULT as $ROW) {
//             echo $ROW;
//         }
//     }

// }
?>