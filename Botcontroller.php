<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Adruino</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">

    </script>
    <style>
        *{
            font-family: roboto;
            padding: 0;
            margin: 0;
        }
        
        a{
            display: block;
        }
        
        #lastmove{
/*            font-size: 0;
            height: 0;
            width: 0;*/
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
            font-size: 16px;
        }
        
        #BeginGames{
            margin: 40px;
            margin-right: 0;
        }
        
        #BeginGames button{
            height: 100px;
            width: 100px;
            transform: skewX(-10deg);
            border-radius: 5px;
            border: 0;
            background-color: cadetblue;
            color: white;
            font-weight: bold;
            font-size: 18px;
            margin-left: 2px;
            cursor: pointer;
        }
        
        #FullStopButton{
            height: 100px;
            padding-top: 30px;
            width: 130px;
            background-color: tomato;
            color: white;
            margin: 20px;
            margin-left: 40px;
            border-radius: 100%;
            text-align: center;
            font-size: 30px;
            font-weight: 900;
            font-style: italic;
            float: left;
            cursor: pointer;
        }
        
        #DisplayedController{
            margin: 20px;
            margin-top: 0;
            margin-bottom: 0;
            padding-left: 25px; 
            float: left;
        }

        #DisplayedController td{
            height: 80px;
            width: 80px;
            border: 2px solid white;
        }

        .toets{
            background-color: #bfbfbf;
            text-align: center;
            font-size: 25px;
            color: white;
            font-weight: bold;
            border-radius: 5px;
        }

    </style>
</head>
<body>
        <p> Maak gebruik van de A-S-W-D toetsen om naar link, achteren, rechts en voren te bewegen. </p>
        <p> Gebruik de q toets om stil te staan (om de actie niet meer uit te voeren.) </p>
        <h3><a href="login.php">Inloggen</a> - <a href="logout.php">Uitloggen</a></h3>
        <a href="index.php"> Home </a>
        <a href="score.php"> Scoreboard </a>
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

        <div id="demo"> </div>
        <div id="demo2"> </div>
        <div id="richtingbox">
            <?php
                if(isset($_POST['w'])){
                    echo 'forward';
                }
                if(isset($_POST['a'])){
                    echo 'left';
                }
                if(isset($_POST['d'])){
                    echo 'right';
                }
                if(isset($_POST['s'])){
                    echo 'back';
                }
                if(isset($_POST['q'])){
                    echo 'Stop';
                }
            ?>
        </div>
        <div id="lastmove"> ..</div>
        <script src="front-end/index.js"></script>
		<?php
		include 'front-end/sendCommand.php';
		?>

        <div id="BeginGames">
            <button id="Lijnrace" value="Lijnrace" onclick="StartGame('Lijnrace')"> Lijnrace </button>
            <button id='Doos' value="Parcour" onclick="StartGame('Doos')"> Parcour </button>
            <button id='Paardenrace' value="Horserace" onclick="StartGame('Paardenrace')"> Horserace </button>
            <button id='Zoeken' value="Zoektocht" onclick="StartGame('Zoeken')"> Zoektocht </button>
        </div>
        
        <script>
            function StartGame(game){
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
                document.getElementById(game).style.backgroundColor = "tomato";
            }

            function GiveControllerInstruction(){
                alert("Gebruik de toetsen op je toetsenbord om de robot te besturen!");
            }
        </script>
        <div id="DisplayedController" onclick="GiveControllerInstruction()">
            <table>
                <tr>
                    <td id="toetsQ" class="toets">Q <p>(stop)</p></td>
                    <td id="toetsW" class="toets">W</td>
                    <td></td>
                </tr>
                <tr>
                    <td id="toetsA" class="toets">A</td>
                    <td id="toetsS" class="toets">S</td>
                    <td id="toetsD" class="toets">D</td>
                </tr>
            </table>
        </div>

        <div id="FullStopButton" onclick="StartGame('Stop')" onmousedown="FullStop()" onmouseup="stopstop()">
            STOP SPEL
        </div>
        
        <?php
            $sound = 'Car.mp3'
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
                }
                
            }

            function Stop(){
                audio.pause();
                audio.currentTime = 0;
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
</body>
</html>
