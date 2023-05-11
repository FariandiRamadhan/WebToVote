let h1 = document.querySelector('h1');


function date(){
    const date = new Date();
    return h1.innerHTML = date.toLocaleTimeString();
}
// setTimeout(() => {setInterval(date, 1000);console.log("hbd")}, 1000*20);

let countdown = setInterval(function(){
const timeUp = new Date("2023-5-11 15:56:00").getTime();
const now = new Date().getTime();
let selisih = timeUp-now;
const jam = Math.floor(selisih/ (1000*60*60));
const menit = Math.floor((selisih %(1000*60*60)) /(1000*60));
const detik = parseInt(selisih % (1000*60) / 1000);
// console.log(jam);
// console.log(menit);
// console.log(detik);
h1.innerHTML = jam + ":" + menit + ":" + detik;
if (selisih < 0){
    h1.innerHTML = "waktu habis";
    clearInterval(selisih);
}
}
,1000);

