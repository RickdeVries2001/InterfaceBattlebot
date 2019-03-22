<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <button onclick="GetData()"> klik op deze om info op te halen via HTTP </button>
        <button onclick="SendData()"> klik op deze om info te sturen via HTTP</button>
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
        </script>
    </body>
</html>

