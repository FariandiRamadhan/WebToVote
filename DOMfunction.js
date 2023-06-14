let body = document.querySelector('body');
let h1 = document.querySelector('h1');
let form = document.createElement('form');
let paragraph = document.createElement('p');
let divs = document.createElement('div');
let buttontoVote = [];
let tenggatWaktu = "2023-7-12 15:20:00";


form.setAttribute("action", "");
form.setAttribute("method", "POST");
paragraph.innerText = "CHOOSE YOUR LEADER";
divs.setAttribute("id", "votebody")
divs.style.height = '300px';
divs.style.width = '300px';
divs.style.backgroundColor = 'blue';
form.appendChild(paragraph);
for (let index = 1; index < 4; index++) {
    buttontoVote[index] = document.createElement('button')
    buttontoVote[index].setAttribute("type", "submit");
    buttontoVote[index].setAttribute("value", index);
    buttontoVote[index].setAttribute("name", "submit");
    buttontoVote[index].innerText = "vote" + index;
    form.appendChild(buttontoVote[index]);
}
body.appendChild(divs);
body.appendChild(form);
let voteButton  = document.getElementsByName('submit');

let countdown = setInterval(interval,1000);
function interval(){
    const timeUp = new Date(tenggatWaktu).getTime();
    const now = new Date().getTime();
    let selisih = timeUp-now;
    const hari = Math.floor(selisih/ (1000*60*60*24));
    const jam = Math.floor(selisih% (1000*60*60*24) / (1000*60*60));    
    const menit = Math.floor((selisih %(1000*60*60)) /(1000*60));
    const detik = parseInt(selisih % (1000*60) / 1000);
    if (selisih < 0){
        h1.innerText = "waktu habis";
        selisih = 0;
        clearInterval(countdown);
        h1.childNodes[0].nodeValue == 'waktu habis'? form.style.display = "none":console.log("timeInterval error!");
    }else{
        h1.innerText = hari + ":" + jam + ":" + menit + ":" + detik;
    }
}

        // voteButton.forEach(function(element){
        //     // console.log(element);
        //     element.addEventListener(
        //         'submit', function(event){
        //             // event.preventDefault();
        //             // event.stopImmediatePropagation();
        //             event.target.parentElement.claslist.add("mine");
        //             // h2.innerHTML = element.value;
        //         });
        // });
        
    
    