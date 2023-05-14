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
    $contents = file_get_contents('Representative.json'); //Representative.json berupa array yang dalamnya beberapa objek
    $parse = json_decode($contents, true); //di parsing dalam bentuk assosiative array ("nama" => value), value = array yang dalammnya objek
    $AllData = []; //menampung array yang isinya objek untuk dipindahkan keluar foreach
    $DataName = []; //menampung string 'nama' untuk dipindahkan keluar foreach
    $DataNim = []; //menampung string 'nim' untuk dipindahkan keluar foreach
    $DataPwd = []; //menampung string 'pwd' untuk dipindahkan keluar foreach
    $counter = 0; // digunakkan untuk menjadi acuan indeks array

    foreach ($parse as $array => $arrayValue) { //parsing :{[{},{}]} -> [indeks], ({},{})
        $AllData[$array] = $arrayValue; //dimasukkan ke AllData
    } // isi All Data = [{},{}]
    
    foreach ($AllData as $innerArray) { //parsing :[{},{}] -> {},{}
        $DataName[$counter] = $innerArray["nama"]; //mencari property 'nama' dan memasukkan ke array
        $DataNim[$counter] = $innerArray["nim"]; //mencari property 'nim' dan memasukkan ke array
        $DataPwd[$counter] = $innerArray["pwd"]; //mencari property 'pwd' dan memasukkan ke array
        $counter ++; //foreach = for(Berulang)
    }
    var_dump($DataName); // hasil var_dump = ["nama1","nama2","nama3"]
}
?>