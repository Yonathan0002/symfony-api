function updatePagination(data){
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
            updateList(data['hydra:view']['hydra:previous']);
        });
        document.querySelector("div").appendChild(buttonPrevious);
    }
}

function updateList(url){
    document.querySelector("div").innerHTML = '';
    
    fetch(url)
    .then((response)=>{
        //console.log("reponse")
        return response.json();
    })
    .then(function(data){
        console.log(data);
        var liste = document.createElement("ul");
        var element = document.createElement("li");
        data["hydra:member"].forEach(race => {
            
            liste.innerHTML += `<li><div>${race.name} <div style="color: grey">${race.willStartAt}</div></div></li>`;
        })
        document.querySelector("div").appendChild(liste);


        // ajout button
        //console.log("=>",data['hydra:view']['hydra:next'])
        

            
        updatePagination(data)
    });
    
    //document.body.appendChild("button")
}

function bootstrap(){
    updateList("http://localhost:8000/api/races")
    //setList();
}

function setUrlParameters(url) {
    var urlset = url;
    url += `?order[${form[0].options[form[0].selectedIndex].value}]=asc`
    if(form[1].options[form[1].selectedIndex].value) {
        url += "&isClosed=" + form[1].options[form[1].selectedIndex].value
    }
    if(form[2].value){
        url += "&name=" + form[2].value
    }
    return urlset;
}

function setList(){
    var url = setUrlParameters("http://localhost:8000/api/races");

    updateList(url);
}

bootstrap()

var form = document.querySelector("form");

form[3].addEventListener("click",()=>{
    //console.log(form)
    /*
    console.log(form[0].options[form[0].selectedIndex].value)
    console.log("=>",form[1].options[form[1].selectedIndex].value)
    console.log(form[2].value)*/
    setList()
    event.preventDefault(); 
},false)