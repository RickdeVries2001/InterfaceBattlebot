<?php
    include "dbConn.php";
    $cmd = isset($_POST["command"])? $_POST["command"] : "";
    $user_id = 989;
    
    if(isset($_POST['w']))
    {
        $cmd = 'F';
    }else if(isset($_POST['a']))
    {
        $cmd = 'L';
    }else if(isset($_POST['s']))
    {
        $cmd = 'B';
    }else if(isset($_POST['d']))
    {
        $cmd = 'R';
    }else if(isset($_POST['q']))
    {
        $cmd = 'S';
    }
    
    if ($cmd != "")
    {

        $SQLstring2 = "INSERT INTO user_cmd (user_id, cmd) VALUES(?, ?)";
        if ($stmt = mysqli_prepare($conn, $SQLstring2))
        {
            mysqli_stmt_bind_param($stmt, 'is', $user_id, $cmd);
            $QueryResult2 = mysqli_stmt_execute($stmt);
            if ($QueryResult2 === FALSE)
            {
                echo "<p>Unable to execute the query.</p>"
                . "<p>Error code "
                . mysqli_errno($conn)
                . ": "
                . mysqli_error($conn)
                . "</p>";
            } else {
                if($cmd == "F"){
                    echo 'forward';
                }
                if($cmd == "L"){
                    echo 'left';
                }
                if($cmd == "R"){
                    echo 'right';
                }
                if($cmd == "B"){
                    echo 'back';
                }
                if($cmd == "S"){
                    echo 'stop';
                }

            }
            //Clean up the $stmt after use
            mysqli_stmt_close($stmt);
        }
    }

?>