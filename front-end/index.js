window.addEventListener("keydown", getKeyPress);

//mocht het niet kloppen dan kun je dit weghalen
window.addEventListener("keyup", Stop);

function Stop(){   
    if(document.getElementById('lastmove').innerHTML == "F" || 
    document.getElementById('lastmove').innerHTML == "B" || 
    document.getElementById('lastmove').innerHTML == "L" || 
    document.getElementById('lastmove').innerHTML == "R"){	
        stopmessage = "S";
        document.getElementById('lastmove').innerHTML = 'S'
        console.log(stopmessage);
        $.ajax( {
                url: "sendCommand.php",
                method: "POST",
                data: {command: "S"},
                dataType: "text",
                success: function(strMessage) {
                    $("#stopped").text(strMessage);
                }
        });
    }
}

function getKeyPress()
{
    let x = event.which || event.keyCode;
    let cmd = "";
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
    if(document.getElementById('lastmove').innerHTML != cmd){
	if(cmd != ""){
        //als hij eerder is ingedrukt, moet hij niet meer spammen
		$.ajax( {
			url: "sendCommand.php",
			method: "POST",
			data: {
                            command:cmd
			},
			dataType: "text",
			success: function(strMessage) {
                            $("#stopped").text(strMessage);
			}
		});
            console.log(cmd);
            document.getElementById('lastmove').innerHTML = cmd;
	}
    }
}