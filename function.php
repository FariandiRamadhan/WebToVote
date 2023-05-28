<?php
$CONN = mysqli_connect("localhost","root","","votetable");
function Query($queryContent){
    global $CONN;
    mysqli_query($CONN, $queryContent);
    // var_dump($querycontent);
    // $ROWS = [];
    if(mysqli_affected_rows($CONN) && !mysqli_error($CONN)){
        echo "success";
        return mysqli_query($CONN, $queryContent);
 
    }else{
        echo "gagal";
    }
}

function Form($data){
    $ALLDATA = ParsingJSON();
    $SENDQUERY = [];
    // print_r($DBNIM);
        switch ($data['submit']) {
            case 'login':
                $NIM = htmlSpecialChars($data["nim"]);
                $NAMA = htmlSpecialChars($data["nama"]);
                $PWD = htmlSpecialChars($data["pwd"]);
                // print_r($ALLDATA);
    
            foreach($ALLDATA as $key) {
            // echo $ALLDATA[$index]["nama"];
            // var_dump($key);
                if($NAMA == $key["nama"]){
                    echo "nama ok";
                    $SENDQUERY[1] = $NAMA;
                    if ($NIM == $key["nim"]) {
                        echo "nim ok";
                        $SENDQUERY[0] = $NIM;
                        if ($PWD == $key["pwd"]) {
                            echo "pwd ok";
                            $SENDQUERY[2] = $PWD;
                            
                        }else{
                            echo "password not!";
                            break;
                        }
                    }else{
                        echo "nim not!";
                    }
                }else{
                    echo "nama not!";
                }
                // if (Query("SELECT nim FROM votes")) {
                //     # code...
                // }
            }
    
                if (!$SENDQUERY[1]) {
                    echo '<h3>NAMA TIDAK TERDAFTAR<h3>';
                    die;
                }
                if(!$SENDQUERY[0]){
                    echo '<h3>NIM TIDAK TERDAFTAR<h3>';
                    die;
                }
                if (!$SENDQUERY[2]) {
                    echo '<h3>PASSWORD SALAH<h3>';
                    die;
                }
            if(count($SENDQUERY) == 3){
                AddData($SENDQUERY);
                header("location:index.php");
            }
            // else if($SENDQUERY[0] == NULL){
            //     echo "DATA KOSONG";
            //     // header("location:login.php");
            // }
                break;
            
            case '1' || '2' || '3':
                
                $VOTE = intval($data['submit']);
                $NIM = $data[0]["nim"];
                if(!is_nan($VOTE)){
                $VOTECOMMAND = "UPDATE votes SET vote = $VOTE WHERE nim = '$NIM'";
                echo 'ok';
                if($VOTE > 0){
                    echo $VOTECOMMAND;
                    Query($VOTECOMMAND);
                    echo "ko";
                }else{
                    echo 'k';
                // return false;
                }
            }
                break;
            default:
            // print_r("_SESSION");
            // if ($_SESSION == NULL) {
                header("location:login.php");
            // }
                break;
        }
    // echo $NIM ." ".$NAMA." ".$PWD." ".$VOTE;

    // digunakan saat akan menghandle Files
    // $FILES = $data["gambar"];
    // $FILES_NAME = $FILES["name"];
    // $ERROR = $FILES["error"];
    // $TYPE = $FILES["type"];
    // $TEMPORARY_FILE = $FILES["tmp_name"];
    // $FILE_SIZE = $FILES["size"];
    // move_uploaded_file($TEMPORARY_FILE, "D:\\xampp\\htdocs\\WebVote\\". $FILES_NAME);
    //return $FILES_NAME;
    }
function ParsingJSON(){
    $contents = file_get_contents('Representative.json'); //Representative.json berupa array yang dalamnya beberapa objek
    $parse = json_decode($contents, true); //di parsing dalam bentuk assosiative array ("nama" => value), value = array yang dalammnya objek
    $AllData = []; //menampung array yang isinya objek untuk dipindahkan keluar foreach
    $DataName = []; //menampung string 'nama' untuk dipindahkan keluar foreach
    $DataNim = []; //menampung string 'nim' untuk dipindahkan keluar foreach
    $DataPwd = []; //menampung string 'pwd' untuk dipindahkan keluar foreach

    foreach ($parse as $array => $arrayValue) { //parsing :{[{},{}]} -> [indeks], ({},{})
        $AllData[$array] = $arrayValue; //dimasukkan ke AllData
        // print_r($arrayValue);  
    } // isi AllData = [{},{}]

    foreach ($AllData as $InnerKeyArray => $InnerArray) { //parsing :[{},{}] -> {},{}
        $DataName[$InnerKeyArray] = $InnerArray["nama"]; //mencari property 'nama' dan memasukkan ke array
        $DataNim[$InnerKeyArray] = $InnerArray["nim"]; //mencari property 'nim' dan memasukkan ke array
        $DataPwd[$InnerKeyArray] = $InnerArray["pwd"]; //mencari property 'pwd' dan memasukkan ke array
        //foreach = for(Berulang)
    }
    // var_dump($DataName); // hasil var_dump = ["nama1","nama2","nama3"]
    return $AllData;
}
?>