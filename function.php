<?php
    $CONN = mysqli_connect("localhost","root","","votetable");

function Query($queryContent){
    global $CONN;
    mysqli_query($CONN, $queryContent);
    $WHITELIST = ["INSERT","UPDATE", "WHERE", "VALUES", "FROM"];
    $ARR_QUERY_CONTENT = explode(" ", $queryContent);
    for ($index=0; $index < count($WHITELIST); $index++) { 
        if(in_array($WHITELIST[$index], $ARR_QUERY_CONTENT)){
            if(mysqli_affected_rows($CONN) && !mysqli_error($CONN)){
                return mysqli_query($CONN, $queryContent);
         
            }else{
                echo "QUERY GAGAL";
            }
        }else if($index == count($WHITELIST)-1 && !in_array($WHITELIST[$index], $ARR_QUERY_CONTENT)){
            echo "INVALID SQL COMMAND";
        }
    
    }
}

function Form($data){
    $ALLDATA = ParsingJSON();
    $SENDQUERY = [];

        switch ($data['submit']) {
            case 'login':
                $NIM = htmlSpecialChars($data["nim"]);
                $NAMA = htmlSpecialChars($data["nama"]);
                $PWD = htmlSpecialChars($data["pwd"]);
                // print_r($ALLDATA);
                $NIMDB = Show("SELECT nim FROM votes");
                $PWDDB = Show("SELECT pwd FROM votes");
                if (in_array($NIM,$NIMDB) && in_array(md5($PWD),$PWDDB)) {
                    $_POST["nim"] = $NIM;
                    header("location: index.php");
                    break;
                }else{
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
            }
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
                break;
            
            case '1' || '2' || '3':
                
                $VOTE = intval($data['submit']);
                $NIM = $data[0]["nim"]; // [0] = Array_push in Index.php [submit],[0]
                if(!is_nan($VOTE)){
                $VOTECOMMAND = "UPDATE votes SET vote = $VOTE WHERE nim = '$NIM'";
                if($VOTE > 0){
                    echo $VOTECOMMAND;
                    Query($VOTECOMMAND);
                    echo "more than one";
                }else{
                    echo 'gagal mengupdate';
                }
            }
                break;
            default:
    
                header("location:login.php");
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

function CountVotes(){
    $CALCULATED = [];
    $VOTES = array(array());
    $COUNT = 0;
    $VOTESROW = Show("SELECT vote FROM votes WHERE vote != 0"); // [[],[]]
    foreach ($VOTESROW as $KEY => $ARRAY1) { //key = 1,2,3 value = [0 => 1],[0 => 3]
            // $VOTESROW[$KEY] = $ARRAY1[0]; // 3212   3,2,1,2
            // echo "ok";
            // print_r($ARRAY1);
            if($ARRAY1[0] == "1")$VOTES[0][$COUNT] = intval($ARRAY1[0]);
            if($ARRAY1[0] == "2")$VOTES[1][$COUNT] = intval($ARRAY1[0]);
            if($ARRAY1[0] == "3")$VOTES[2][$COUNT] = intval($ARRAY1[0]);
            $COUNT++;
    }
    for ($index=0; $index < count($VOTES); $index++) {    
        $CALCULATED[$index] = round((count($VOTES[$index])/count($VOTESROW)) * 100);
    }
    // echo count($VOTES[2]);
    if(array_sum($CALCULATED)>100){
        for ($index=0; $index < count($CALCULATED); $index++) { 
            $CALCULATED[$index] = floor((count($VOTES[$index])/count($VOTESROW)) * 100);
        }
    }
    // var_dump($CALCULATED);
    // var_dump(count($VOTE1));
    // var_dump(count($VOTE2));
    // var_dump(count($VOTE3));
    return $CALCULATED;
}
?>