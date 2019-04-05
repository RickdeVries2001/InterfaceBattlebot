window.addEventListener("keydown", getKeyPress);
window.addEventListener("keyup", Stop);

WASD = document.getElementById('ASWDstop');
Qkey = document.getElementById('useQstop');

ReleaseToStop = true;

function useWASDstop(){
    WASD.style.opacity = 1;
    Qkey.style.opacity = 0.2;
    ReleaseToStop = true;
}

function useQstop(){
    WASD.style.opacity = 0.2;
    Qkey.style.opacity = 1;
    ReleaseToStop = false;
}

function Stop(){   
    if(ReleaseToStop){
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
    }
}

let cmd = "";
    
function getKeyPress()
{
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
    
    //als je deze command wilt spammen terwijl de toets ingedrukt is 
    //moet je deze if statement wegcommenten en de comments onderaan uncommenten
    
    if(cmd != document.getElementById('lastmove').innerHTML){
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
    }
}


//deze code is voor het regelmatig verzenden van de commandos
//bijvoorbeeld 1x per seconde of 10x per seconde
 
//var wachttijd = 0.1;
//var myVar = setInterval(myTimer, wachttijd * 1000);
//var oldvar = new Date().getTime() / 1000;
//        
//function myTimer() {
//    var seconds = new Date().getTime() / 1000;
//
////    document.getElementById("demo").innerHTML = seconds;
////    document.getElementById("demo2").innerHTML = oldvar;
//
//    if (oldvar < seconds){
//        oldvar += wachttijd;
//    }
//    if(cmd != "" && (pressed == true)){ 
//        //als hij eerder is ingedrukt, moet hij niet meer spammen
//        //hij moet niet iets sturen als er een nieuwe s binnen komt
//        //het laatste command is niet al gebeurd
//
//        pressed = true;
//
//        cmd = "";
//    }
//}