<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "hospital";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);


    $empNo = "";
    $name = "";
    $address = "";
    $tel = "";
    $working_status = "";
    $contractNo = "";
    $start_date = "";
    $end_date = "";

    $errorMessage = "";
    $successMessage = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $empNo = $_POST["empNo"];
        $name = $_POST["name"];
        $address = $_POST["address"];
        $tel = $_POST["tel"];
        $working_status = $_POST["working_status"];
        $contractNo = $_POST["contractNo"];
        $start_date = $_POST["start_date"];
        $end_date = $_POST["end_date"];

        do{
            if(empty($empNo) || empty($address) || empty($tel) || empty($working_status) || empty($contractNo) || empty($start_date) || empty($end_date)){
                $errorMessage = "All the fields are rquired";
                break;
            }


            // Add new cleaner to database

            
            //--------------------------------
            $sql = "INSERT INTO employee(empNo, name, addresss, tel, working_status)" .
                    "VALUES ($empNo, '$name', '$address', '$tel', '$working_status')";

            $result = $connection->query($sql);

            if(!$result){
                $errorMessage = "Invalid query : " . $connection->error;
                break;
            }

            

            //--------------------------------
            $sql = "INSERT INTO non_medical_employee(empNo, type)" .
                    "VALUES ($empNo, 'cleaner')";

            $result = $connection->query($sql);

            if(!$result){
                $errorMessage = "Invalid query : " . $connection->error;
                break;
            }

            //--------------------------------
            $sql = "INSERT INTO cleaner(empNo, contractNo, start_date, end_date)" .
                    "VALUES ($empNo, '$contractNo', '$start_date', '$end_date')";

            $result = $connection->query($sql);

            if(!$result){
                $errorMessage = "Invalid query : " . $connection->error;
                break;
            }


            $empNo = "";
            $name = "";
            $address = "";
            $tel = "";
            $contractNo = "";
            $start_date = "";
            $end_date = "";

            $successMessage = "CLeaner aded successfully";

            header("location: /Database%20Assignment/login/admin/clearner.php#about");
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
    
    <section class="about section" id="about">
        <div class="container anmd" id="home">
            <h3 class="heading" style="font-size: 40px; margin-bottom: 90px;">Add Cleaner</h3>

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
                        <lable class="col-sm-3 col-form-lable">empNo</lable>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="empNo" value="<?php echo $empNo; ?>" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <lable class="col-sm-3 col-form-lable">name</lable>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <lable class="col-sm-3 col-form-lable">address</lable>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="address" value="<?php echo $address; ?>" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <lable class="col-sm-3 col-form-lable">tel</lable>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="tel" value="<?php echo $tel; ?>" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <lable class="col-sm-3 col-form-lable">working_status</lable>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="working_status" value="<?php echo $working_status; ?>" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <lable class="col-sm-3 col-form-lable">Contract Number</lable>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="contractNo" value="<?php echo $contractNo; ?>" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <lable class="col-sm-3 col-form-lable">Start Date</lable>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" name="start_date" value="<?php echo $start_date; ?>" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <lable class="col-sm-3 col-form-lable">End Date</lable>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" name="end_date" value="<?php echo $end_date; ?>" />
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
                            <a href="/Database%20Assignment/login/admin/clearner.php" class="btn btn-outline-primary">Back to list</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="/Database%20Assignment/JavaScript/script.js"></script>
</body>
</html>
