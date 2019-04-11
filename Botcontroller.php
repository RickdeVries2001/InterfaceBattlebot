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
    else{
        if(empty($_GET['id'])){
            header('location: index.php');
        }
    }
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Adruino user <?php echo $_COOCKIE['id'];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">

    </script>
    <style>
        *{
            font-family: roboto, arial;
            padding: 0;
            margin: 0;
            color: white;
        }
        
        body{
            background-color: #222222;
        }
        
        a{
            color: cadetblue;
        }
        
        #lastmove{
            margin-top: 10px;
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 22px;
            display: inline;
            margin-left: 20px;
            opacity: 0.2;
        }
        
        #lastinput{
            font-weight: bold;
            font-size: 22px;  
            display: inline;
            opacity: 0.2;
        }
        
        #isstopped{
            font-weight: bold;
            font-size: 22px;  
            display: inline;
            opacity: 0.2;            
        }
        
        #controllerbox input{
            opacity: 0;
            height: 0px;
            width: 0px;
        }

        #controllerbox form{
            height: 0px;
            width: 0px;
            display: inline;
        }
        
        #toetsQ{
            opacity: 0.3;
        }
        
        #toetsQ p{
            color: black;
        }
        
        #BeginGames{
            margin: 40px;
            margin-right: 0;
/*            width: 40vw;*/
        }
        
        .BeginGamesbutton{
            height: 90px;
            width: 90px;
            transform: skewX(-10deg);
            border-radius: 5px;
            border: 0;
            background-color: cadetblue;
            color: white;
            font-weight: bold;
            font-size: 15px;
            margin-left: 5px;
            cursor: pointer;
            float: left;
        }
        
        .RijNaar{
            height: 40px;
            width: 50px;
            transform: skewX(-10deg);
            border-radius: 5px;
            border: 0;
            background-color: cadetblue;
            color: white;
            font-weight: bold;
            font-size: 12px;
            margin-left: 5px;
            cursor: pointer;      
            float: left;
                margin-top: 25px;
        }
        
        #FullStopButton{
            height: 100px;
            padding-top: 30px;
            width: 130px;
            background-color: tomato;
            color: white;
            margin: 20px;
            margin-left: 80px;
            border-radius: 100%;
            text-align: center;
            font-size: 30px;
            font-weight: 900;
            font-style: italic;
            float: left;
            cursor: pointer;
            margin-top: 40px;
        }

        #DisplayedController{
            margin: 20px;
            margin-top: 20px;
            margin-bottom: 0;
            padding-left: 25px; 
            float: left;
            opacity: 0.2;
        }

        #DisplayedController td{
            height: 80px;
            width: 80px;
            border: 2px solid #222222;
        }

        .toets{
            background-color: #bfbfbf;
            text-align: center;
            font-size: 25px;
            color: white;
            font-weight: bold;
            border-radius: 5px;
        }

        .toets p{
            font-size: 16px;
            opacity: 0.8;
        }
        
        .mainContent{
            width: 80vw;
            height: calc(100vh - 30px);
            margin-left: 10vw;
            margin-top: 20px;
        }
        
        #logoutbutton{
            float: right;
            color: tomato;
        }
        
        #controlvoorkeuren{
            float: left;
            padding-top: 50px;
            padding-left: 150px;
        }

        #controlvoorkeuren div{
            padding: 5px;
            border-radius: 20px;
            margin: 5px;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
        }
        
        #ASWDstop{
            background-color: cadetblue;
            opacity: 1;
        }
        
        #useQstop{
            background-color: tomato;
            opacity: 0.2;
        }
        
        .Begin{
            transform: rotate(270deg);
            float: left;
            margin-top: 35px;
            opacity: 0.5;
            font-size: 20px;
            font-style: italic;
        }
        
        .End{
            transform: rotate(270deg);
            float: left;
            margin-top: 35px;
            opacity: 0.5;
            font-size: 20px;
            font-style: italic;
        }
        
        #GameBox{
            min-height: 40vh;
            width: 100%;
            float: left;
        }
        
        .controllerbuttons{
            width: 100%;
            height: 250px;
            float: left;
            padding-top: 20px;
        }
        
        #serverpage{
            color: grey;
            margin-left: 100px;
        }
        
        .BeginGamesPart{
            float: left;
            margin-top: 5px;
        }
        
        #responsivemessage{
            display: none;
        }
        
        @media only screen and (max-width: 900px){
            .mainContent{
                width: 100vw;
                height: calc(100vh - 30px);
                margin-left: 0;
                margin-top: 20px;
            }
            a{
                margin-left: 0;
                width: 100%;
                float: left
            }
            #serverpage{
                margin-left: 0;
                width: 100%;
            }
            #logoutbutton{
                float: left;
                width: 100%;
            }
        }
        
        @media only screen and (max-width: 450px){
            #GameBox{
                display: none;
            }
            
            #controlvoorkeuren{
                display: none;
            }
            
            #DisplayedController{
                display: none;
            }
            #FullStopButton{
                display: none;
            }
            #responsivemessage{
                display: block;
            }
        }
    </style>
</head>
<body>
    <div class="mainContent">
        <h3><a href="score.php        
            <?php if(isset($_GET['id'])){
                    echo '?id='.$_GET['id'];
            }?>
        "> Scoreboard </a> 
        <a id="serverpage" href="serverpage.php
            <?php if(isset($_GET['id'])){
                    echo '?id='.$_GET['id'];
            }?>
        ">Serverpagina</a>
        <a id="logoutbutton" href="functions/logout_script.php">Uitloggen</a></h3>
        <div id="responsivemessage">
            please use a computer to control your robot :)
        </div>
        <div id="controllerbox">
            <input type="text" id="besturingsvak" onkeydown="GetKeyInput()" onkeyup="Stop()"> <!--   -->

            <form action = 'Botcontroller.php' method = 'post' id="forward">
                <input type="radio" value="F" name="w" id="w" checked="checked"/>
               <!-- <input type="submit" value="p" name="w" id="w" checked="checked"/> -->
            </form>
            <form action = 'Botcontroller.php' method = 'post' id="left">
                <input type="radio" value="L" name="a" id="a" checked="checked"/>
            </form>
            <form action = 'Botcontroller.php' method = 'post' id="right">
                <input type="radio" value="R" name="d" id="d" checked="checked"/>
            </form>
            <form action = 'Botcontroller.php' method = 'post' id="back">
                <input type="radio" value="B" name="s" id="s" checked="checked"/>
            </form>

            <form action = 'Botcontroller.php' method = 'post' id="stop">
                <input type="radio" value="Q" name="q" id="q" checked="checked"/>
            </form>
        </div>
        
        <div id="GameBox">
<!--            <p> Maak gebruik van de A-S-W-D toetsen om te bewegen en de Q toets om stil te staan. </p>
            <div id="demo">  niet weghalen! deze zijn voor testen </div>
            <div id="demo2">  niet weghalen! deze zijn voor testen </div>
            <div id="richtingbox"></div>-->
            <div id="lastinput"></div> <!-- niet weghalen! -->
            <div id="lastmove"></div> <!-- niet weghalen! -->
            <div id="isstopped"></div> <!-- niet weghalen! -->
<!--            <p> Klik op de knop om aan het bijhorende spel te beginnen!</p>
            <p> Klik op de stopknop als het spel afgelopen is of als de robot het spel faalt</p>-->


            <div id="BeginGames">
                <div class="BeginGamesPart">
                    <div class="Begin"> Start </div>
                    <button class="RijNaar" id="rijLijnRace" onclick="StartGame('R1')"> 1 Next </button>
                    <button class="BeginGamesbutton" id="Lijnrace" onclick="StartGame('1')"> Lijnrace </button>
                    <button class="RijNaar" id="rijZoeken" onclick="StartGame('R2')"> 2 Next </button>
                    <button class="BeginGamesbutton" id='Zoeken' onclick="StartGame('2')"> Zoektocht </button>
                </div>
                <div class="BeginGamesPart">
                    <button class="RijNaar" id="rijRace" onclick="StartGame('R3')"> 3 Next </button>
                    <button class="BeginGamesbutton" id='Paardenrace' onclick="StartGame('3')"> Horserace </button>
                    <button class="RijNaar" id="rijDoos" onclick="StartGame('R4')"> 4 Next </button>
                    <button class="BeginGamesbutton" id='Doos' onclick="StartGame('4')"> Parcours </button>
                    <div class="End"> Finish </div>
                </div>   
            </div>
        </div>
        
<!--                //&& document.getElementById("isstopped").innerHTML == "5"-->
        <script>
            function StartGame(game){
                if(game == "R1" && document.getElementById("lastinput").innerHTML == ""){
                    document.getElementById("rijLijnRace").style.opacity = 0.2;
                    ValidClick = true;
                } else if(game == "1" && document.getElementById("lastinput").innerHTML == "R1" 
                && document.getElementById("isstopped").innerHTML == "5"){
                    document.getElementById("Lijnrace").style.opacity = 0.2;          
                    ValidClick = true;
                } else if(game == "R2" && document.getElementById("lastinput").innerHTML == "1"
                && document.getElementById("isstopped").innerHTML == "5"){
                    document.getElementById("rijZoeken").style.opacity = 0.2;  
                    ValidClick = true;
                } else if(game == "2" && document.getElementById("lastinput").innerHTML == "R2"
                && document.getElementById("isstopped").innerHTML == "5"){
                    document.getElementById("Zoeken").style.opacity = 0.2;    
                    ValidClick = true;
                } else if(game == "R3" && document.getElementById("lastinput").innerHTML == "2"
                && document.getElementById("isstopped").innerHTML == "5"){
                    document.getElementById("rijRace").style.opacity = 0.2;    
                    ValidClick = true;
                } else if(game == "3" && document.getElementById("lastinput").innerHTML == "R3"
                && document.getElementById("isstopped").innerHTML == "5"){
                    document.getElementById("Paardenrace").style.opacity = 0.2;  
                    ValidClick = true;
                } else if(game == "R4" && document.getElementById("lastinput").innerHTML == "3"
                && document.getElementById("isstopped").innerHTML == "5"){
                    document.getElementById("rijDoos").style.opacity = 0.2;      
                    ValidClick = true;
                } else if(game == "4" && document.getElementById("lastinput").innerHTML == "R4"
                && document.getElementById("isstopped").innerHTML == "5"){
                    document.getElementById("Doos").style.opacity = 0.2;       
                    ValidClick = true;
                } else if(game == "5"){
                    ValidClick = true;
                } else{
                    ValidClick = false;     
                    alert("Je hebt nog niet op de stopknop geklikt! \nOf jouw robot is nog niet bij dit spel!");
                }
                
                if(game == "5"){
                    document.getElementById("isstopped").innerHTML = "5";
                } else{
                    document.getElementById("isstopped").innerHTML = "";                   
                }
                
                if(ValidClick){
                    if(game != 5){
                        document.getElementById("lastinput").innerHTML = game;
                    }
                    
                    if(game == 4){
                        document.getElementById("DisplayedController").style.opacity = 1;
                    }
                    else{
                        document.getElementById("DisplayedController").style.opacity = 0.2;
                    }
                    console.log(game);
                    $.ajax( {
                        url: "front-end/sendCommand.php",
                        method: "POST",
                        data: {command:game},
                        dataType: "text",
                        success: function(strMessage) {
                            $("#stopped").text(strMessage);
                        }
                    });  
                }
            }

            function GiveControllerInstruction(){
                alert("Gebruik de toetsen op je toetsenbord om de robot te besturen!");
            }
        </script>
        
        <div class="controllerbuttons">                   
            
            <div id="DisplayedController" onclick="GiveControllerInstruction()">
                <table>
                    <tr>
                        <td id="toetsQ" class="toets">Q <p>(stop)</p></td>
                        <td id="toetsW" class="toets">W <p> (voren)</p></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td id="toetsA" class="toets">A <p> (links)</p></td>
                        <td id="toetsS" class="toets">S <p> (achter)</p></td>
                        <td id="toetsD" class="toets">D <p> (rechts)</p></td>
                    </tr>
                </table>
            </div>

            <div id="FullStopButton" onclick="StartGame('5')" onmousedown="FullStop()" onmouseup="stopstop()">
                STOP KNOP
            </div>
            
            <div id="controlvoorkeuren">
                <h3> Robot moet stoppen bij: </h3>
                <div id="ASWDstop" onclick="useWASDstop()"> loslaten ASWD toets </div>
                <div id="useQstop" onclick="useQstop()"> indrukken Q toets </div>
            </div>

            <script src="front-end/index.js"></script>
            
            <?php
                include 'front-end/sendCommand.php';
            ?>
            
        </div>
        <?php
            if(isset($_GET['id'])){
                require 'front-end/dbConn.php';
                $sql="SELECT username FROM users WHERE ID = ?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, 's', $_GET['id']);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $name);
                while (mysqli_stmt_fetch($stmt)) {
                    $sound = $name.'.mp3';  
                }
                mysqli_close($conn);
            }
        ?>

        <script>
            audiofile = 'Sounds/' + <?php echo json_encode($sound); ?>;
            audio = new Audio(audiofile);
            Wtoets = document.getElementById("toetsW");
            Atoets = document.getElementById("toetsA");
            Stoets = document.getElementById("toetsS");
            Dtoets = document.getElementById("toetsD");
            Qtoets = document.getElementById("toetsQ");
            
            
            function GetKeyInput(){
                q = event.which || event.keyCode;
                if(document.getElementById('lastinput').innerHTML == 4){
                    if(q == 87 || q == 83 || q == 65 || q == 68){
                        audio.play();
                    }

                    if(q == 87){
                        Wtoets.style.backgroundColor = 'grey';
                    }

                    if(q == 83){
                        Stoets.style.backgroundColor = 'grey';
                    }

                    if(q == 65){
                        Atoets.style.backgroundColor = 'grey';
                    }

                    if(q == 68){
                        Dtoets.style.backgroundColor = 'grey';
                    }

                    if(q == 81){
                        Qtoets.style.backgroundColor = 'grey';
                        if(!ReleaseToStop){
                            audio.pause();
                            audio.currentTime = 0;
                        }
                    }
                }
            }

            function Stop(){
                if(ReleaseToStop){
                    audio.pause();
                    audio.currentTime = 0;
                }
                Wtoets.style.backgroundColor = '#bfbfbf';
                Atoets.style.backgroundColor = '#bfbfbf';
                Stoets.style.backgroundColor = '#bfbfbf';
                Dtoets.style.backgroundColor = '#bfbfbf';
                Qtoets.style.backgroundColor = '#bfbfbf';
            }

            function FullStop(){
                document.getElementById("FullStopButton").style.backgroundColor = "red";
            }
            
            function stopstop(){
                document.getElementById("FullStopButton").style.backgroundColor = "tomato";             
            }
            
            audio.onended = function() {
                audio.currentTime = 0;
            };

            window.setInterval(function(){
                document.getElementById("besturingsvak").select();
            }, 50);
        </script>
    </div>
</body>
</html>
