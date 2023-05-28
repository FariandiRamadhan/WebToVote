<?php 

function AddData($data){
    // print_r($data);
        [$ArrayIndex1,$ArrayIndex2,$ArrayIndex3] = $data; //vote ?
        $ArrayIndex3 = md5($ArrayIndex3);
        $valuesInsert = "INSERT INTO votes VALUES ('$ArrayIndex1','$ArrayIndex2', '$ArrayIndex3',0)";
        Query($valuesInsert);
}
    function Show($showablecontent){
        global $CONN;
        $ROWS = [];
        // $VoteCommand = "SELECT vote FROM votes";
        // $AllVotes = mysqli_query($CONN, $showablecontent);
        $AllVotes = Query($showablecontent);

        if(mysqli_error($CONN)){
        echo "gagal";
        }
        else {
            // $ROWS = $RESULT;
            while( $row = mysqli_fetch_row($AllVotes)){
                $ROWS[] = $row;
            }
            return $ROWS;

        }   
    }
?>