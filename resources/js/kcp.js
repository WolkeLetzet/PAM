    
    var playerScore=0;
    var COMScore=0;

function kachipum(choice) {
    let player = choice;
    let COM = parseInt(Math.random() * 3);

    const options=["Piedra","Papel","Tijera"];
    setTimeout((COM)=>{
        setInterval((COM)=>{
            Animationselect();
        },100)
        
    },1000)

    let result = "";

    if (player == COM) {

        alert("Empate");
        result = "Empate";

    }
    else if (player == 0 && COM == 2) {
        playerScore++;
        alert("Ganaste");
        result = "Player";

    }
    else if (player == 1 && COM == 0) {

        playerScore++;
        alert("Ganaste");
        result = "Player";

    }
    else if (player == 2 && COM == 1) {

        playerScore++;
        alert("Ganaste");
        result = "Player";

    }
    else {
        COMScore++;
        alert("Perdiste");
        result = "COM";
    }

    document.getElementById("playerScore").innerText="Player Score: " + playerScore;
    document.getElementById("COMScore").innerText= "COM Score: " + COMScore;


    let template = '<tr> <td>' + options[player] + '</td> <td>' + options[COM] + '</td> <td>'+result+'</tr>';
    let tbody = document.getElementById("tbody");
    tbody.innerHTML += template;


}

function Animationselect(){

}

