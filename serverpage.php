<!DOCTYPE html>
<html>
<head>
    <style>
        .teamcmd{
            display: inline;
        }
        
        .teamname{
            display: inline; 
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <div id="txtHint">Database informatie</div>
    <div id="feedback"> </div>
        <div id="audioPlayers"> </div>
        
    <audio volume="0.1" id='playINF1A'> <source src='Sounds/INF1J.mp3' type='audio/mpeg'> </audio>     
    <audio volume="0.1" id='playINF1B'> <source src='Sounds/INF1J.mp3' type='audio/mpeg'> </audio>        
    <audio volume="0.1" id='playINF1C'> <source src='Sounds/INF1J.mp3' type='audio/mpeg'> </audio>        
    <audio volume="0.1" id='playINF1D'> <source src='Sounds/INF1J.mp3' type='audio/mpeg'> </audio>     
    <audio volume="0.1" id='playINF1E'> <source src='Sounds/INF1J.mp3' type='audio/mpeg'> </audio>        
    <audio volume="0.1" id='playINF1G'> <source src='Sounds/INF1J.mp3' type='audio/mpeg'> </audio>
    <audio volume="0.1" id='playINF1H'> <source src='Sounds/INF1J.mp3' type='audio/mpeg'> </audio>        
    <audio volume="0.1" id='playINF1I'> <source src='Sounds/INF1J.mp3' type='audio/mpeg'> </audio>
    <audio volume="0.1" id='playINF1J'> <source src='Sounds/INF1J.mp3' type='audio/mpeg'> </audio>

    <script>
        function GetMoves(){
            if (window.XMLHttpRequest) {
                xmlhttp=new XMLHttpRequest(); // code for IE7+, Firefox, Chrome, Opera, Safari
            } else {
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); // code for IE6, IE5
            }
            xmlhttp.onreadystatechange=function() {
                if(xmlhttp.readyState==4 && xmlhttp.status==200) {
                    document.getElementById("txtHint").innerHTML= xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","front-end/getUserMoves.php?q=q",true);
            xmlhttp.send();
            //console.log('succes!');
        }


        var wachttijd = 0.1; //delay
        var myVar = setInterval(myTimer, wachttijd * 1000);
        var oldvar = new Date().getTime() / 1000;

        function myTimer() {
            var seconds = new Date().getTime() / 1000;

            if (oldvar < seconds){
                oldvar += wachttijd;
            }
            GetMoves();
            
            Teams = ["A", "B", "C", "D", "E", "G", "H", "I", "J"];
            
            for(x = 0; x < 9; x++){
                if(document.getElementById("INF1" + Teams[x])){
                    if(document.getElementById("INF1" + Teams[x]).innerHTML == "S"
                    || document.getElementById("INF1" + Teams[x]).innerHTML == "5"){
                        document.getElementById("playINF1" + Teams[x]).pause();
                        document.getElementById("playINF1" + Teams[x]).currentTime = 0.5;
                    }
                    
                    if(document.getElementById("INF1" + Teams[x]).innerHTML == "F"
                    || document.getElementById("INF1" + Teams[x]).innerHTML == "B"
                    || document.getElementById("INF1" + Teams[x]).innerHTML == "L"
                    || document.getElementById("INF1" + Teams[x]).innerHTML == "R"
                    || document.getElementById("INF1" + Teams[x]).innerHTML == 1
                    || document.getElementById("INF1" + Teams[x]).innerHTML == 2
                    || document.getElementById("INF1" + Teams[x]).innerHTML == 3
                    || document.getElementById("INF1" + Teams[x]).innerHTML == 4){
                        document.getElementById("playINF1" + Teams[x]).play();
                    }
                }
            }
        }

    </script>
<!--    <div onclick='playaudio()'> knopje knopje </div> 
    <script> 
        var vid = document.getElementById('INF1J'); 
        function playaudio(){
            vid.play();
        }
    </script>-->
</body>
</html>