// let h2 = document.getElementsByTagName("h2")[0];
// let voteButton  = document.getElementsByName('submit');
let div = document.getElementById('votebody');
function date(){
    const date = new Date();
    // return h2.innerText = date.toLocaleTimeString();
}
// setTimeout(() => {setInterval(date, 1000);console.log("hbd")}, 1000*20);
// let voteButton = document.getElementsByName('submit');

let intervalVote = setInterval(function(){
                        let xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function(){
                        if(xhr.readyState == 4 && xhr.status == 200){
                            div.innerHTML = xhr.responseText;
                        }
                    }
                    xhr.open('POST', 'AJAXContainer.php',true);
                    xhr.send();
                },1000);
// console.log(form.style.display);
// if(form.style.display == 'none'){
//     clearInterval(intervalVote);
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