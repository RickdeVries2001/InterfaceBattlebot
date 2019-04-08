<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>
<!--CREATE TABLE `user_cmd` (
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(11),
  `cmd_id` varchar(11),
  `cmd` varchar(11)
);-->


<!--

SELECT t1.user_id, t1.cmd, users.username
FROM user_cmd t1
INNER JOIN
(
    SELECT user_id, MAX(id) AS max_id
    FROM user_cmd
    GROUP BY user_id
) t2
    ON t1.user_id = t2.user_id AND t1.id = t2.max_id
JOIN users on t1.user_id = users.ID;

-->

<?php
require 'dbConn.php';
if(isset($_GET['q'])){
    $sql=
        "SELECT t1.user_id, t1.cmd, users.username
        FROM user_cmd t1
        INNER JOIN
        (
            SELECT user_id, MAX(id) AS max_id
            FROM user_cmd
            GROUP BY user_id
        ) t2
            ON t1.user_id = t2.user_id AND t1.id = t2.max_id
        JOIN users on t1.user_id = users.ID;";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)) {
        echo "<div class='teamname'>". $row['username']. ":</div><div class='teamcmd' id='". $row['username']. "'>";
        echo $row['cmd'] . "</div>";
    }
    mysqli_close($conn);
}
?>
</body>
</html>