<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "hospital";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);


    $name = "";
    $PID = "";
    $BID = "";
    $WID = "";
    $DID = "";

    $errorMessage = "";
    $successMessage = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST["name"];
        $PID = $_POST["PID"];
        $BID = $_POST["BID"];
        $WID = $_POST["WID"];

        do{
            if(empty($name) || empty($BID) || empty($PID) || empty($WID)){
                $errorMessage = "All the fields are rquired";
                break;
            }


            // Add new patient to database

            $sql1 = "INSERT INTO patient(PID, name, type)" .
                    "VALUES ($PID, '$name', 'in')";

            $sql2 = "INSERT INTO in_patient(PID, BID, WID)" .
                    "VALUES ($PID, $BID, $WID)";
            
            //$sql3 = "INSERT INTO doctor_patient(empNo, PID)" .
            //        "VALUES ($empNo, $PID)";

            $result1 = $connection->query($sql1);
            $result2 = $connection->query($sql2);
            //$result3 = $connection->query($sql3);

            if(!$result1 && !$result2){
                $errorMessage = "Invalid query : " . $connection->error;
                break;
            }

            $name = "";
            $PID = "";
            $BID = "";
            $WID = "";

            $successMessage = "Patient aded successfully";

            header("location: /Database%20Assignment/login/admin/patient.php#about");
            exit;

        }while (false);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suwa Sahana</title>

    <!-------------------  external js  ------------------->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
                <div class="topic">Patient</div>
                <center>
                    <a href="#about1" class="btn2" style="text-decoration: none;">In Patient</a>
                    &nbsp;&nbsp;
                    <a href="/Database%20Assignment/login/admin/patient/createo.php" class="btn2" style="text-decoration: none;">Out Patient</a>
                </center>
        </div>
    </section>
    
    <section class="about section" id="about1">
        <div class="container anmd" id="home">
            <h3 class="heading" style="font-size: 40px; margin-bottom: 90px;">Add In Patient</h3>

            <div class="container my-5">
                <?php
                    if(!empty($errorMessage)){
                        echo "
                            <div class='alert-warning alert-dismissible fade show' role='alert'>
                                <strong>$errorMessage</strong>
                            </div>
                        ";
                    }
                ?>
                <form method="post">
                <div class="row mb-3">
                        <lable class="col-sm-3 col-form-lable">Patient ID</lable>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="PID" value="<?php echo $PID; ?>" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <lable class="col-sm-3 col-form-lable">Name</lable>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <lable class="col-sm-3 col-form-lable">Bed ID</lable>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="BID" value="<?php echo $BID; ?>" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <lable class="col-sm-3 col-form-lable">Ward ID</lable>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="WID" value="<?php echo $WID; ?>" />
                        </div>
                    </div>


                    <?php
                        if(!empty($successMessage)){
                            echo "
                                <div class='row mb-3'>
                                    <div class='row mb-3 col-sm-12'>
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            <strong>$successMessage</strong>
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-lable='Close'></button>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    ?>                    

                    <div class="row mb-3">
                        <div class="offset-sm-3 col-sm-3 d-grid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                        <div class="offset-sm-3 col-sm-3 d-grid">
                            <a href="/Database%20Assignment/login/admin/patient.php" class="btn btn-outline-primary">Back to list</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="/Database%20Assignment/JavaScript/script.js"></script>
</body>
</html>
