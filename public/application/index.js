console.log("test");

function updateList(url){
    document.querySelector("div").innerHTML = '';
    
    fetch(url)
    .then((response)=>{
        //console.log("reponse")
        return response.json()
    })
    .then(function(data){
        console.log(data);
        var liste = document.createElement("ul")
        var element = document.createElement("li");
        data["hydra:member"].forEach(race => {
            
            liste.innerHTML += `<li><div>${race.name} <div style="color: grey">${race.willStartAt}</div></div></li>`;
        })
        document.querySelector("div").appendChild(liste);


        // ajout button
        //console.log("=>",data['hydra:view']['hydra:next'])
        

        if(data['hydra:view']['hydra:next']){
            buttonNext = document.createElement("button");
            buttonNext.innerHTML += `next`;
            buttonNext.addEventListener("click", ()=>{
                updateList(data['hydra:view']['hydra:next'])
            });
            document.querySelector("div").appendChild(buttonNext);
        } 
        if(data['hydra:view']['hydra:previous']) {
            buttonPrevious = document.createElement("button");
            buttonPrevious.innerHTML += `previous`;
            buttonPrevious.addEventListener('click',()=>{
                updateList(data['hydra:view']['hydra:previous'])
            });
            document.querySelector("div").appendChild(buttonPrevious);
        }    

    });
    
    //document.body.appendChild("button")
}

function bootstrap(){
    updateList("http://localhost:8000/api/races")
}

bootstrap()