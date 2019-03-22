<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <button onclick="SendData()"> aaaaaaaaaaaaaaaaaaa</button>
        <script>
            function SendData(){
                var req = new XMLHttpRequest();
                req.open("POST", "file", false, "INF1J");
                //Method, bestand, gelijktijdig: ja(true) of nee(false), username, password
                req.send("Hello World");
            }
        </script>
    </body>
</html>

