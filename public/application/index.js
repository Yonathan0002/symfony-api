console.log("test");
function updateList(url){
    fetch(url)
    .then((response)=>{
        return response.json()
    })
    .then(function(data){
        var liste = document.createElement("ul");
        //console.log(data["hydra:member"]);
        var element = document.createElement("li");
        data["hydra:member"].forEach(race => {
            element.innerHTML = race.name;
            liste.appendChild(element);
        })
        document.body.appendChild(liste)
    });
}


updateList("http://localhost:8000/api/races?page=1")