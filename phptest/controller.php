<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> controller estafette</title>
        <style>
            *{
                margin: 0;
                padding: 0;
            }
            
            h2{
                margin-top: 20px;
            }
            
            #besturingsvak{
                opacity: 0;
                cursor: default;
            }
        </style>
    </head>
    <body>
        <?php 
            //deze variabele gaat in javascript en dan naar de server.
            //hij mag aangepast worden zodat hij met de database wordt verbonden.
            $group = "INF1J";
        ?>
        <p> Maak gebruik van de A-S-W-D toetsen om naar link, achteren, rechts en voren te bewegen. </p>
        <input type="text" id="besturingsvak" onkeydown="GetKeyInput()" onkeyup="Stop()"> <!--   -->
        <div id="display" onclick="loadDoc()"> beweging </div>
        <div id="ForwardBackwards"> richting: </div>
        <div id="TurnAround"> Draaien: </div>
        <div id="Infotest"> </div>
        <script>
            
            group = <?php echo json_encode($group); ?>;
            lastmove = ""; //zodat er geen request gespamt worden wanneer je w/a/s/d inhoud
            var req = new XMLHttpRequest();
            
            function GetKeyInput(){
                var x = event.which || event.keyCode;
                var input = document.getElementById("besturingsvak").value;
                
                document.getElementById("besturingsvak").value = "";
                if(x > 0){
                    document.getElementById("display").innerHTML = "rijden";
                }
                if(x == 87){
                    document.getElementById("ForwardBackwards").innerHTML = "richting: voor<br>"; 
                    req.open("POST", "UIRequest.txt", false);
                    if(lastmove != "F"){
                        req.send(group + ".Forward");
                    }
                    lastmove = "F";
                }
                else if(x == 83){
                    document.getElementById("ForwardBackwards").innerHTML = "richting: achter<br>";
                    req.open("POST", "UIRequest.txt", false);
                    if(lastmove != "B"){
                        req.send(group + ".Backward");
                    }
                    lastmove = "B";
                }
                else if(x == 65){
                    document.getElementById("TurnAround").innerHTML = "Draaien: links<br>"; 
                    req.open("POST", "UIRequest.txt", false);
                    
                    if(lastmove == "F" && lastmove != "FL"){
                        req.send(group + ".Forward_TurnLeft");
                        lastmove = "FL";
                    }
                    else if(lastmove == "B" && lastmove != "BL"){
                        req.send(group + ".Backward_TurnLeft");
                        lastmove = "BL";
                    }
                    else if(lastmove != "L" && lastmove != "BL" && lastmove != "FL"){
                        req.send(group + ".Left");
                        lastmove = "L";
                    }
                }
                else if(x == 68){ 
                    document.getElementById("TurnAround").innerHTML = "Draaien: rechts<br>";   
                    req.open("POST", "UIRequest.txt", false);
                    
                    if(lastmove == "F" && lastmove != "FR"){
                        req.send(group + ".Forward_TurnRight");
                        lastmove = "FR";
                    }
                    else if(lastmove == "B" && lastmove != "BR"){
                        req.send(group + ".Backward_TurnRight");
                        lastmove = "BR";
                    }
                    else if(lastmove != "R" && lastmove != "BR" && lastmove != "FR"){
                        req.send(group + ".Right");
                        lastmove = "R";
                    }
                }
                else{
                    document.getElementById("display").innerHTML = "niet geldig";
                }
            }               
            
            function Stop(){
                document.getElementById("display").innerHTML = "stilstaan";  
                document.getElementById("ForwardBackwards").innerHTML = "richting:";                     
                document.getElementById("TurnAround").innerHTML = "Draaien:";
                req.open("POST", "UIRequest.txt", false);
                if(lastmove != "S"){
                    req.send(group + ".Stop");
                }
                lastmove = "S";
            }
            //als je de w/s/d/a knop loslaat dan moet de robot stil staan
            
            window.setInterval(function(){
                document.getElementById("besturingsvak").select();  
            }, 250);
            //selecteerd de textbox elke 0.250 seconden (voor wanneer de speler wegklikt) 
        </script>
        <br>
        <b> mogelijke uitvoer: </b>
        <ul>
            <li> <?php echo $group; ?>.Left </li>
            <li> <?php echo $group; ?>.Right </li>
            <li> <?php echo $group; ?>.Forward </li>
            <li> <?php echo $group; ?>.Forward_TurnLeft </li>
            <li> <?php echo $group; ?>.Forward_TurnRight </li>   
            <li> <?php echo $group; ?>.Backward </li>
            <li> <?php echo $group; ?>.Backward_TurnLeft </li>
            <li> <?php echo $group; ?>.Backward_TurnRight </li>            
        </ul>
    </body>
</html>
