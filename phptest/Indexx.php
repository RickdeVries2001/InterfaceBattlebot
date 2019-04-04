<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Adruino</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
    <style>
        *{
            font-family: Comic Sans MS;
            padding: 0;
            margin: 0;
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
        
        #BeginGames input{
            height: 130px;
            width: 130px;
        }

        #DisplayedController{
            margin: 50px;
        }
        
        #DisplayedController td{
            height: 80px;
            width: 80px;
        }
        
        #toets{
            background-color: lightgrey;
            text-align: center;
            font-size: 25px;
        }
        
    </style>
</head>
<body>
<!--    <form action = 'index.php' method = 'post' name="">
     <button value='w' name='w'> Name </button>
    <button value='s' name='S'>Name </button>
    <button value='a' name='A'>Name </button>
    <button value='d' name='D'>Name </button> 
    <input type="submit" value="w" name="w" id="w" />
    <input type="submit" value="A" name="a" id="a" />
    <input type="submit" value="D" name="d" id="d" />
    <input type="submit" value="S" name="s" id="s" />
    </form>-->
        <!-- <button value='w' name='w'> Name </button>
        <button value='s' name='S'>Name </button>
        <button value='a' name='A'>Name </button>
        <button value='d' name='D'>Name </button> -->
        
            <?php 
            //deze variabele gaat in javascript en dan naar de server.
            //hij mag aangepast worden zodat hij met de database wordt verbonden.
            $group = "INF1J";
        ?>
        <p> Maak gebruik van de A-S-W-D toetsen om naar link, achteren, rechts en voren te bewegen. </p>
        <h3> Druk de toetsen langere tijd in om de robot gecontrolleerd te besturen</h3>
        <h3> Druk de toetsen snel in om de robot ongecontrolleerd te besturen </h3> 
        
        <div id="DisplayedController"> 
            <table>
                <tr>
                    <td></td>
                    <td class="toets" id="toetsW">W</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="toets" id="toetsA">A</td>
                    <td class="toets" id="toetsS">S</td>
                    <td class="toets" id="toetsD">D</td>
                </tr>
            </table>
        </div>
        
        <?php 
            $DisplayController = "block";
        ?>
           
        <div id="BeginGames">
            <input type="submit" value="Start Lijnrace">
            <input type="submit" value="Start Parcour">        
            <input type="submit" value="Start Doolhof">
            <input type="submit" value="Start zoektocht">
        </div>
            
        <div id="controllerbox" style="display: <?php echo $DisplayController; ?>;">
            <input type="text" id="besturingsvak" onkeydown="GetKeyInput()" onkeyup="Stop()"> <!--   -->

            <form action = 'Indexx.php' method = 'post' id="forward"> 
                <input type="radio" value="F" name="w" id="w" checked="checked"/>
            </form>
            <form action = 'Indexx.php' method = 'post' id="left"> 
                <input type="radio" value="L" name="a" id="a" checked="checked"/>
            </form>
            <form action = 'Indexx.php' method = 'post' id="right"> 
                <input type="radio" value="R" name="d" id="d" checked="checked"/>
            </form>
            <form action = 'Indexx.php' method = 'post' id="back"> 
                <input type="radio" value="B" name="s" id="s" checked="checked"/>
            </form>

            <form action = 'Indexx.php' method = 'post' id="stop"> 
                <input type="radio" value="Q" name="q" id="q" checked="checked"/>
            </form>

            <div id="Infotest"> </div>
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
        </div>
        
        <script>
            MyInput = document.getElementById("richtingbox").innerHTML;
            //de knop wordt niet ingehouden maar er staat geet stop command
            
            function GetKeyInput(){
                x = event.which || event.keyCode;
                input = document.getElementById("besturingsvak").value;
                
                    
                document.getElementById("besturingsvak").value = "";
                if(x > 0){
//                    document.getElementById("display").innerHTML = "rijden";
                }
                if(x == 87){
                    if(MyInput.includes("forward")){
                    }else{
//                        document.getElementById("ForwardBackwards").innerHTML = "richting: voor<br>";
                        document.getElementById("forward").submit();
                    }
                }
                else if(x == 83 && MyInput != "back"){
                    if(MyInput.includes("back")){
                    }else{
//                        document.getElementById("ForwardBackwards").innerHTML = "richting: achter<br>";
                        document.getElementById("back").submit();     
                    }
                }
                else if(x == 65 && MyInput != "left"){
                    if(MyInput.includes("left")){
                    }else{
//                        document.getElementById("TurnAround").innerHTML = "Draaien: links<br>"; 
                        document.getElementById("left").submit();
                    }
                }
                else if(x == 68 && MyInput != "right"){ 
                    if(MyInput.includes("right")){
                    }else{
//                        document.getElementById("TurnAround").innerHTML = "Draaien: rechts<br>";   
                        document.getElementById("right").submit();
                    }
                }
                else{
//                    document.getElementById("display").innerHTML = "niet geldig";
                }
            }               
            
            
            function Stop(){
                
//                document.getElementById("display").innerHTML = "stilstaan";  
//                document.getElementById("ForwardBackwards").innerHTML = "richting:";                     
//                document.getElementById("TurnAround").innerHTML = "Draaien:";
                
                document.getElementById("stop").submit();
                
                
//                if(MyInput.includes("right") || MyInput.includes("left") || 
//                MyInput.includes("forward") || MyInput.includes("back")){
//                    document.getElementById("stop").submit(); 
//                }
                
            }
            
            MyInput = document.getElementById("richtingbox").innerHTML;
//            MyDisplay = document.getElementById("display").innerHTML;

            window.setInterval(function(){
                document.getElementById("besturingsvak").select();  
            }, 50);


        </script>
        
        
        
        
        
        
        
    <?php
//    include "dbConn.php";
//    $id = "";
//    $user_id = "9981";
//    
//    if(isset($_POST['w']))
//    {
//        $id = 'w';
//    }else if(isset($_POST['a']))
//    {
//        $id = 'a';
//    }else if(isset($_POST['s']))
//    {
//        $id = 's';
//    }else if(isset($_POST['d'])) 
//    {
//        $id = 'd';
//    }
//    if ($id != "")
//    {
//        
//        $SQLstring2 = "INSERT INTO user_command (user_id, cmd_id) VALUES(?, ?)";
//        if ($stmt = mysqli_prepare($conn, $SQLstring2)) 
//        {
//            mysqli_stmt_bind_param($stmt, 'is', $user_id, $id);
//            $QueryResult2 = mysqli_stmt_execute($stmt);
//            if ($QueryResult2 === FALSE) 
//            {
//                echo "<p>Unable to execute the query.</p>"
//                . "<p>Error code "
//                . mysqli_errno($conn)
//                . ": "
//                . mysqli_error($conn)
//                . "</p>";
//            } else {
//                echo "Executed!";
//                    
//            }
//            //Clean up the $stmt after use
//            mysqli_stmt_close($stmt);
//        }
//    }
//    
?>
    
</body>
</html>