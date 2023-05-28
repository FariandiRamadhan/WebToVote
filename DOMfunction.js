// let h2 = document.getElementsByTagName('h2')[0];
let voteButton  = document.getElementsByName('submit');

        voteButton.forEach(function(element){
            // console.log(element);
            element.addEventListener(
                'submit', function(event){
                    // event.preventDefault();
                    // event.stopImmediatePropagation();
                    event.target.parentElement.claslist.add("mine");
                    // h2.innerHTML = element.value;
                });
        });
        
    
    