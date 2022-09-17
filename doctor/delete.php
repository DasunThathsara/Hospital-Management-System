<?php
    if(isset($_GET["id"])){
        $id = $_GET["id"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "hospital";

        // Create connection
        $connection = new mysqli($servername, $username, $password, $database);

        $sql = "DELETE FROM doctor WHERE id=$id";
        $connection->query($sql);
    }
    
    header("location: /Database%20Assignment/doctor.php#about");
    exit;
?>