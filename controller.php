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
        // put your code here
        ?>
        <p> Maak gebruik van de A-S-W-D toetsen om naar link, achteren, rechts en voren te bewegen. </p>
        <input type="text" id="besturingsvak" onkeydown="GetKeyInput()" onkeyup="Stop()"> <!--   -->
        <div id="display" onclick="loadDoc()"> beweging </div>
        <div id="ForwardBackwards"> richting: </div>
        <div id="TurnAround"> Draaien: </div>
        <script>
            
            function GetKeyInput(){
                var x = event.which || event.keyCode;
                
                var input = document.getElementById("besturingsvak").value;
                document.getElementById("besturingsvak").value = "";
                if(x > 0){
                    document.getElementById("display").innerHTML = "rijden";
                }
                if(x == 87){
                    document.getElementById("ForwardBackwards").innerHTML = "richting: voor<br>"; 
                }
                else if(x == 83){
                    document.getElementById("ForwardBackwards").innerHTML = "richting: achter<br>";                     
                }
                else if(x == 65){
                    document.getElementById("TurnAround").innerHTML = "Draaien: links<br>";                   
                }
                else if(x == 68){ 
                    document.getElementById("TurnAround").innerHTML = "Draaien: rechts<br>";    
                }
                else{
                    document.getElementById("display").innerHTML = "niet geldig";
                }
            }               
            
            function Stop(){
                document.getElementById("display").innerHTML = "stilstaan";  
                document.getElementById("ForwardBackwards").innerHTML = "richting:";                     
                document.getElementById("TurnAround").innerHTML = "Draaien:";      
            }
            //als je de w/s/d/a knop loslaat dan moet de robot stil staan
            
            window.setInterval(function(){
                document.getElementById("besturingsvak").select();  
            }, 250);
            //selecteerd de textbox elke 0.250 seconden (voor wanneer de speler wegklikt) 
        </script>
    </body>
</html>
