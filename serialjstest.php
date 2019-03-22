<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <button onclick="GetData()"> klik op deze om info op te halen via HTTP </button>
        <button onclick="GetData()"> klik op deze om info te sturen via HTTP</button>
        <div id="box"> <!-- in deze box komt de opgehaalde info --> </div>
        <script>
            function SendData(){
                var req = new XMLHttpRequest();
                req.open("POST", "file", false, "INF1J");
                //Method, bestand, gelijktijdig: ja(true) of nee(false), username, password
                req.send("Hello World");
            }
            
            function GetData(){
                var request = new XMLHttpRequest();
                request.open('GET', "");
                //in de tweede waarde komt de url te staan.
                //in dit geval staat er niks en laden we de pagina opnieuw op 
                //(daardoor verdubbelen de knoppen)
                request.responseType = 'text';
                request.onload = function() {
                    document.getElementById("box").innerHTML = request.response;
                };
                request.send();
            }
        </script>
    </body>
</html>

