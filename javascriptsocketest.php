<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> controller estafette</title>
        <style>
            
        </style>
    </head>
    <body>
        <div id="display" onclick="ConnectAndSend()"> 
            klik op deze tekst om informatie naar de server te sturen.
        </div>
        <script>
            function ConnectAndSend(){
                if("WebSocket" in window){
                    document.getElementById("display").innerHTML = "connectable";
                    
                    socket = "80"; //dit is mijn port (deze kan variëren (kijk in xampp voor jouw port)
                    ipadress = "127.0.0.1";
                    
                    var ws = new WebSocket('ws://' + ipadress + ':' + socket);
                    ws.onopen = function () {
                        ws.getElementById("display").innerHTML = "connected";
                        ws.send('Hello World'); // Send the message 'Ping' to the server
                    };  
                }
                else{
                    document.getElementById("display").innerHTML = "\
                    Deze browser ondersteunt geen HTML5 websocket, gebruik een andere browser";
                }
            }
        </script>
    </body>
</html>