<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasun Thathsara</title>

    <!-------------------  external js  ------------------->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!-------------------  external css  ------------------->
    <link rel="stylesheet" href="/Database%20Assignment/CSS/style.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <header>
    </header>
    
    <section class="showcase-area container-fluid full" id="home">
        <div class="container anmd" style="padding-top: 150px;" id="home">
            <div class="topic">Doctor</div>
            <center><a href="#about" class="btn2" style="text-decoration: none;">Go to list</a></center>
        </div>
    </section>

    <section class="about section" id="about">
        <div class="container anmd" id="home">
            <h3 class="heading" style="font-size: 40px; margin-bottom: 90px;">List of Doctors</h3>
            <div class="container my-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>empNo</th>
                            <th>Speciality</th>
                            <th>DEA</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Tel</th>
                            <th>Working Status</th>
                            <th>MCR</th>
                            <th>Joinned Date</th>
                            <th>Resign Date</th>
                            <th>Type</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <!--------------- PHP Code --------------->
                        <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $database = "hospital";

                            // Create connection
                            $connection = new mysqli($servername, $username, $password, $database);

                            // Check connection
                            if($connection->connect_error){
                                die("COnnection failed : " . $connection->connect_error);
                            }

                            // Read all row from database table
                            $sql = "SELECT employee.*, medical_employee.MCR, medical_employee.joined_date, medical_employee.resign_date, medical_employee.type, doctor.speciality, doctor.DEA
                                    FROM employee
                                    JOIN medical_employee
                                    ON employee.empNo = medical_employee.empNo
                                    JOIN doctor
                                    ON employee.empNo = doctor.empNo
                                    WHERE medical_employee.type = 'doctor'";
                            $result = $connection->query($sql);

                            if(!$result){
                                die("Invalid query : " . $connection->error);
                            }

                            // Read data of each row
                            while($row = $result->fetch_assoc()){
                                echo "
                                    <tr>
                                        <th>$row[empNo]</th>
                                        <th>$row[speciality]</th>
                                        <th>$row[DEA]</th>
                                        <th>$row[name]</th>
                                        <th>$row[addresss]</th>
                                        <th>$row[tel]</th>
                                        <th>$row[working_status]</th>
                                        <th>$row[MCR]</th>
                                        <th>$row[joined_date]</th>
                                        <th>$row[resign_date]</th>
                                        <th>Doctor</th>
                                    </tr>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
                <br />
                <a href="/Database%20Assignment/login/users/nurse/dashboard.php" class="btn btn-primary" role="button">Go to menu</a>
            </div>
        </div>
    </section>

    <script src="/Database%20Assignment/JavaScript/script.js"></script>
</body>
</html>
