<?php 

function AddData($data){
    $nim = $data["nim"];
    $nama = $data["nama"];
    $pwd = $data["pwd"];
    $vote = $data["vote"];
    $valuesInsert = "INSERT INTO votes VALUES ('$nim','$nama', '$pwd',$vote)";
    var_dump($valuesInsert);
    Query($valuesInsert);
    // if(mysqli_affected_rows(1)) echo "<script>alert('ok');</script>";

}
function Form($data){
    // $NAMA = $data["name"];
    $FILES = $data["gambar"];
    $FILES_NAME = $FILES["name"];
    $ERROR = $FILES["error"];
    $TYPE = $FILES["type"];
    $TEMPORARY_FILE = $FILES["tmp_name"];
    $FILE_SIZE = $FILES["size"];
    //  "$FILES_NAME" . "$ERROR" . "$TYPE" . "$TEMPORARY_FILE" . "$FILE_SIZE";
    move_uploaded_file($TEMPORARY_FILE, "D:\\xampp\\htdocs\\WebVote\\". $FILES_NAME);
    return $FILES_NAME;
    }
    function Show($showablecontent){
        global $CONN;
        $ROWS = [];
        if(mysqli_error($CONN)){
        echo "gagal";
        }
        else {
            $RESULT = mysqli_fetch_row($showablecontent);
            $ROWS = $RESULT;
            foreach ($ROWS as $ROW) {
                echo $ROW;
            }
        }
    
    }
?>