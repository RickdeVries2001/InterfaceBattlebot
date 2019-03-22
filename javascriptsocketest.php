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
                    
                    var ws = new WebSocket('ws://localhost:80//testrepro2222222/InterfaceBattlebot/GoLeft');
                    //localhost = ip/server
                    //80 = port (kan verschillen)
                    //testrepro2222222/InterfaceBattlebot/ is mijn map naam 
                    ws.onopen = function () {
                        ws.getElementById("display").innerHTML = "connected";
                        ws.send(""); // Send the message 'Ping' to the server
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