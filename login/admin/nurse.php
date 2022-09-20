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
    <link rel="stylesheet" href="CSS/style.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <header>
    </header>
    
    <section class="showcase-area container-fluid full" id="home">
        <div class="container anmd" style="padding-top: 150px;" id="home">
            <div class="topic">Nurse</div>
            <center><a href="#about" class="btn2" style="text-decoration: none;">Go to list</a></center>
        </div>
    </section>

    <section class="about section" id="about">
        <div class="container anmd" id="home">
            <h3 class="heading" style="font-size: 40px; margin-bottom: 90px;">List of Nurses</h3>
            <div class="container my-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Tel</th>
                            <th>DEI ID</th>
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
                            $sql = "SELECT * FROM doctor";
                            $result = $connection->query($sql);

                            if(!$result){
                                die("Invalid query : " . $connection->error);
                            }

                            // Read data of each row
                            while($row = $result->fetch_assoc()){
                                echo "
                                    <tr>
                                        <td>$row[id]</td>
                                        <td>$row[name]</td>
                                        <td>$row[address]</td>
                                        <td>$row[tel]</td>
                                        <td>$row[did]</td>
                                        <td>
                                            <a href='doctor/edit.php?id=$row[id]' class='btn btn-primary btn-sm'>Edit</a>
                                            <a href='doctor/delete.php?id=$row[id]' class='btn btn-primary btn-sm'>Delete</a>
                                        </td>
                                    </tr>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
                <br />
                <br />
                <a href="doctor/create.php" class="btn btn-primary" role="button">New Doctor</a>
                <a href="/Database%20Assignment/index.php#about" class="btn btn-primary" role="button">Go to menu</a>
            </div>
        </div>
    </section>

    <script src="JavaScript/script.js"></script>
</body>
</html>
