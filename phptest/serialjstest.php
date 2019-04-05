<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <button onclick="GetData()"> Get HTTP </button>
        <button onclick="SendData()"> Send HTTP</button>
        <button onclick="TCPtest()"> TCP</button>
        <div id="box"> <!-- in deze box komt de opgehaalde info --> </div>
        <script>
            function SendData(){
                req = new XMLHttpRequest();
                req.open("POST", "UIRequest.txt", true);
                req.send("Hello World");
            }
            
            function GetData(){
                request = new XMLHttpRequest();
                request.open('GET', "UIRequest.txt", true);
                request.send();
            }
            
            function TCPtest(){
                //https://pterneas.com/2014/12/28/html5-websocket/
                //https://developer.mozilla.org/en-US/docs/Web/API/WebSocket/protocol
                if ("WebSocket" in window) {
                    message = "hallo wereld!";
                    
                    //pas deze aan zodat het ip en de poort overeenkomen
                    websocket = 'ws://echo.websocket.org'
                    
                    //In de websocket komt te 'ws://IPADRES:PORT' te staan (van de server)
                    //bijvoorbeeld: 'ws://127.0.0.1:80'
                    //dit is het orgnieel: 'ws://echo.websocket.org' (voor een handshake)
                    //Voor Servergroep: je moet alleen de variabele websocket aanpassen 
                    //zodat hij overeenkomt met het ip en de port van de server
                    
                    var connection = new WebSocket(websocket); 
                    connection.onopen = function () {
                      connection.send("de server zegt:" + message); // Send the message 'Ping' to the server
                      document.getElementById("box").innerHTML = "sent";
                    };                     
                    
                    connection.onmessage = function (event) {
                        document.getElementById("box").innerHTML = event.data;
                    }
                }
                else{
                    alert("Deze browser ondersteunt geen HTML5 websockets, gebruik een ander");
                }
            }
        </script>
    </body>
</html>

