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

function ParsingJSON(){
    $contents = file_get_contents('Representative.json');
    $parse = json_decode($contents, true);
    $DataName = [];
    $DataNim = [];
    $DataPwd = [];
    
    foreach ($parse as $array => $arrayValue) {
        // var_dump($arrayValue); 
        foreach ($arrayValue as $innerArray => $innerArrayValue) {
            $DataName = $arrayValue["nama"];
            $DataNim = $arrayValue["nim"];
            $DataPwd = $arrayValue["pwd"];
            
                var_dump($DataNim);
            
            // echo $innerArray." : ".$innerArrayValue;
        }
    }
}
?>