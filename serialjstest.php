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
                req.open("GET", "GoLeft", true);
                req.send();
            }
        </script>
    </body>
</html>

