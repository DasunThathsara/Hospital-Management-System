<?php
    if(isset($_GET["id"])){
        $id = $_GET["id"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "hospital";

        // Create connection
        $connection = new mysqli($servername, $username, $password, $database);

        $sql = "DELETE FROM cleaner WHERE empNo=$id";
        $connection->query($sql);

        $sql = "DELETE FROM non_medical_employee WHERE empNo=$id";
        $connection->query($sql);

        $sql = "DELETE FROM employee WHERE empNo=$id";
        $connection->query($sql);
    }
    
    header("location: /Database%20Assignment/login/admin/clearner.php#about");
    exit;
?>