let h1 = document.querySelector('h1');
let h2 = document.getElementsByTagName("h2")[0];


function date(){
    const date = new Date();
    return h1.innerText = date.toLocaleTimeString();
}
// setTimeout(() => {setInterval(date, 1000);console.log("hbd")}, 1000*20);

let countdown = setInterval(function(){
const timeUp = new Date("2023-5-30 11:00:00").getTime();
const now = new Date().getTime();
let selisih = timeUp-now;
const hari = Math.floor(selisih/ (1000*60*60*24));
const jam = Math.floor(selisih% (1000*60*60*24) / (1000*60*60));    
const menit = Math.floor((selisih %(1000*60*60)) /(1000*60));
const detik = parseInt(selisih % (1000*60) / 1000);
// console.log(jam);
// console.log(menit);
// console.log(detik);
h1.innerText = hari + ":" + jam + ":" + menit + ":" + detik;
if (selisih < 0){
    h1.innerText = "waktu habis";
    clearInterval(selisih);
}
}
,1000);
    
    
    // buttonShow.addEventListener('click', () => {
    //     for (let index = 0; index < 4; index++) {
    //     creates();
    //     }
    // });
    // function creates(){
    //     let button;
    //     createdVoteButton = document.createElement('button');
    //     nameButton = document.createTextNode("vote");
    //     for (let index = 1; index < 4;index ++) {
    //         button = form.appendChild(createdVoteButton);
    //         button.appendChild(nameButton);
    //         button.setAttribute("name", "vote");
    //         button.setAttribute("value", index);
    //     }
    // }
// let voteButton = document.getElementsByName('submit');
// function access(){
// submitButton.addEventListener("click", () => {
//     let data = new FormData(form);
//     let xhr = new XMLHttpRequest();
//     xhr.onreadystatechange = function(){
//     if(xhr.readyState == 4 && xhr.status == 200){
//         table.style.display = "none";
//         // h2.innerHTML = xhr.responseText;
//         }
//     }
//        xhr.open('POST', 'index.php',true);
//        xhr.send(data);
//        return false;
// });
// }

// let checkSubmitButton = submitButton.addEventListener("click", function(){
//     location.href = 'index.php';
//     return true;
// });
// function check(){
//     if(checkSubmitButton == undefined){
//         location.href = 'login.php';
//     }
// }
// check();
