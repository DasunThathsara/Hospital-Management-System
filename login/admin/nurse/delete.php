<?php
    if(isset($_GET["id"])){
        $id = $_GET["id"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "hospital";

        // Create connection
        $connection = new mysqli($servername, $username, $password, $database);

        $sql = "DELETE FROM nurse WHERE empNo=$id";
        $connection->query($sql);

        $sql = "DELETE FROM medical_employee WHERE empNo=$id";
        $connection->query($sql);

        $sql = "DELETE FROM employee WHERE empNo=$id";
        $connection->query($sql);
    }
    
    header("location: /Database%20Assignment/login/admin/nurse.php#about");
    exit;
?>