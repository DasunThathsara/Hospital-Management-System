<?php
    if(isset($_GET["regNo"])){
        $regNo = $_GET["regNo"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "hospital";

        // Create connection
        $connection = new mysqli($servername, $username, $password, $database);

        $sql = "DELETE FROM vendor WHERE regNo=$regNo";
        $connection->query($sql);
    }
    
    header("location: /Database%20Assignment/vendor.php#about");
    exit;
?>