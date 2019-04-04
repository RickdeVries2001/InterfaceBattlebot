//deze werkt alleen in een <script> tag
            MyInput = document.getElementById("richtingbox").innerHTML;
            
            function GetKeyInput(){
                x = event.which || event.keyCode;
                input = document.getElementById("besturingsvak").value;
                
                    
                document.getElementById("besturingsvak").value = "";
                if(x > 0){
                }
                if(x == 87){
                    if(MyInput.includes("forward")){
                    }else{
                        document.getElementById("forward").submit();
                    }
                }
                else if(x == 83 && MyInput != "back"){
                    if(MyInput.includes("back")){
                    }else{
                        document.getElementById("back").submit();     
                    }
                }
                else if(x == 65 && MyInput != "left"){
                    if(MyInput.includes("left")){
                    }else{
                        document.getElementById("left").submit();
                    }
                }
                else if(x == 68 && MyInput != "right"){ 
                    if(MyInput.includes("right")){
                    }else{ 
                        document.getElementById("right").submit();
                    }
                }
            }               
            
            
            function Stop(){
                document.getElementById("stop").submit();
            }
            
            MyInput = document.getElementById("richtingbox").innerHTML;

            window.setInterval(function(){
                document.getElementById("besturingsvak").select();  
            }, 50);

