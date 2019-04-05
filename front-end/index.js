window.addEventListener("keydown", getKeyPress);

//mocht het niet kloppen dan kun je dit weghalen
window.addEventListener("keyup", Stop);

pressed = false;

function Stop(){   
    if(document.getElementById('lastmove').innerHTML == "F" || 
    document.getElementById('lastmove').innerHTML == "B" || 
    document.getElementById('lastmove').innerHTML == "L" || 
    document.getElementById('lastmove').innerHTML == "R"){	
        stopmessage = "S";
        document.getElementById('lastmove').innerHTML = 'S'
        console.log(stopmessage);
        $.ajax( {
                url: "front-end/sendCommand.php",
                method: "POST",
                data: {command: "S"},
                dataType: "text",
                success: function(strMessage) {
                    $("#stopped").text(strMessage);
                }
        });
    }
    pressed = false;
}

let cmd = "";
    
function getKeyPress()
{
    pressed = true;
    let x = event.which || event.keyCode;
    switch(x)
    {
        case 87:
            cmd = "F";
            break;
        case 83:
            cmd = "B";
            break;
        case 65:
            cmd = "L";
            break;
        case 68:
            cmd = "R";
            break;
        case 81:
            cmd = "S";
        break;
    }
}

var wachttijd = 0.5;
var myVar = setInterval(myTimer, wachttijd * 1000);
var oldvar = new Date().getTime() / 1000;
        
function myTimer() {
    var seconds = new Date().getTime() / 1000;

//    document.getElementById("demo").innerHTML = seconds;
//    document.getElementById("demo2").innerHTML = oldvar;

    if (oldvar < seconds){
        oldvar += wachttijd;
    }
    if(cmd != "" && (pressed == true)){ 
        //als hij eerder is ingedrukt, moet hij niet meer spammen
        //hij moet niet iets sturen als er een nieuwe s binnen komt
        //het laatste command is niet al gebeurd

        pressed = true;
        $.ajax( {
            url: "front-end/sendCommand.php",
            method: "POST",
            data: {
                command:cmd,
            },
            dataType: "text",
            success: function(strMessage) {
                $("#stopped").text(strMessage);
            }
        });
        document.getElementById('lastmove').innerHTML = cmd;     
        console.log(cmd); 
        cmd = "";
    }
}