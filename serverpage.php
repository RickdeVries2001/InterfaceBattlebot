<?php 
    if(empty($_COOKIE['id'])){
        if(isset($_GET['id'])){
            setcookie("id", $_GET['id'], time() + (86400 * 30));
            header('location: Botcontroller.php?id='.$_COOKIE['id']);
        }
        else{
            header('location: index.php');
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <title> serverpage </title>
    <style>
        *{
            font-family: roboto, arial;
            color: white;
            padding: 0;
            margin: 0;
        }
        
        body{
            background-color: #222222;
        }
        
        .mainContent{
            width: 80vw;
            height: calc(100vh - 30px);
            margin-left: 10vw;
            margin-top: 20px;
        }
        
        a{
            color: cadetblue;
        }

        #logoutbutton{
            float: right;
            color: tomato;
        }
        
        #serverpage{
            padding-left: 200px;
        }


        
        .teamcmd{
            display: inline;
        }
        
        .teamname{
            display: inline; 
            margin-right: 10px;
        }
        
        #servercontent{
            width: 100%;
            height: 300px;
            padding-top: 50px;
        }
        
        @media only screen and (max-width: 900px){
            *{
                padding: 1px;
                margin: 1px;
            }
            
            .mainContent{
                width: 100vw;
                height: calc(100vh - 30px);
                margin-left: 0;
                margin-top: 0;
            }
            a{
                margin-left: 0;
                width: 100%;
                float: left
            }
            #serverpage{
                display: none;
            }
            #logoutbutton{
                float: left;
                width: 100%;
            }
            
            #txtHint{
                margin-top: 60px;
            }
        }
        
    </style>
</head>
<body>
<!--    insert into users(ID, pass, username, btname) values (1001, "nee123", "INF1H", "yeet")-->
    <div class="mainContent">
        <h3><a href="score.php        
            <?php if(isset($_GET['id'])){
                    echo '?id='.$_GET['id'];
            }?>
        "> Scoreboard </a> 
            <a id="serverpage" href="Botcontroller.php
            <?php if(isset($_GET['id'])){
                    echo '?id='.$_GET['id'];
            }?>
        ">Controller</a>
        <a id="logoutbutton" href="functions/logout_script.php">Uitloggen</a></h3>
        
        <div id="servercontent">
            <div id="txtHint">
            </div>
<!--            <div id="feedback"> hey</div>-->
                <div id="audioPlayers"> 
                </div>

            <audio controls volume="0.1" id='playINF1A'> <source src='Sounds/INF1A.mp3' type='audio/mpeg'> </audio>     
            <audio controls volume="0.1" id='playINF1B'> <source src='Sounds/INF1B.mp3' type='audio/mpeg'> </audio>        
            <audio controls volume="0.1" id='playINF1C'> <source src='Sounds/INF1C.mp3' type='audio/mpeg'> </audio>        
            <audio controls volume="0.1" id='playINF1D'> <source src='Sounds/INF1D.mp3' type='audio/mpeg'> </audio>     
            <audio controls volume="0.1" id='playINF1E'> <source src='Sounds/INF1E.mp3' type='audio/mpeg'> </audio>        
            <audio controls volume="0.1" id='playINF1G'> <source src='Sounds/INF1G.mp3' type='audio/mpeg'> </audio>
            <audio controls volume="0.1" id='playINF1H'> <source src='Sounds/INF1H.mp3' type='audio/mpeg'> </audio>        
            <audio controls volume="0.1" id='playINF1I'> <source src='Sounds/INF1I.mp3' type='audio/mpeg'> </audio>
            <audio controls volume="0.1" id='playINF1J'> <source src='Sounds/INF1J.mp3' type='audio/mpeg'> </audio>

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


                var wachttijd = 2; //delay
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
                            //console.log(Teams[x]);
                            if(document.getElementById("INF1" + Teams[x]).innerHTML == "S"
                            || document.getElementById("INF1" + Teams[x]).innerHTML == "5"
                            || document.getElementById("INF1" + Teams[x]).innerHTML == "4"){
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
                            || document.getElementById("INF1" + Teams[x]).innerHTML == "R1"
                            || document.getElementById("INF1" + Teams[x]).innerHTML == "R2"
                            || document.getElementById("INF1" + Teams[x]).innerHTML == "R3"
                            || document.getElementById("INF1" + Teams[x]).innerHTML == "R4"){
                                document.getElementById("playINF1" + Teams[x]).play();
                            }
                        }
                    }
                }

            </script>
        </div>
    </div>
<!--    <div onclick='playaudio()'> knopje knopje </div> 
    <script> 
        var vid = document.getElementById('INF1J'); 
        function playaudio(){
            vid.play();
        }
    </script>-->
</body>
</html>