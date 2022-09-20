<?php
    if(isset($_GET["id"])){
        $id = $_GET["id"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "hospital";

        // Create connection
        $connection = new mysqli($servername, $username, $password, $database);

        $sql = "DELETE FROM in_patient WHERE PID=$id";
        $connection->query($sql);

        $sql = "DELETE FROM out_patient WHERE PID=$id";
        $connection->query($sql);

        $sql = "DELETE FROM patient WHERE PID=$id";
        $connection->query($sql);
    }
    
    header("location: /Database%20Assignment/doctor.php#about");
    exit;
?>