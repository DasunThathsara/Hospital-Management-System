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
    $MCR = "";
    $joinned_date = "";
    $resign_date = "";

    $errorMessage = "";
    $successMessage = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $empNo = $_POST["empNo"];
        $name = $_POST["name"];
        $address = $_POST["address"];
        $tel = $_POST["tel"];
        $working_status = $_POST["working_status"];
        $MCR = $_POST["MCR"];
        $joinned_date = $_POST["joinned_date"];
        $resign_date = $_POST["resign_date"];

        do{
            if(empty($empNo) || empty($address) || empty($tel) || empty($working_status) || empty($MCR) || empty($joinned_date) || empty($resign_date)){
                $errorMessage = "All the fields are rquired";
                break;
            }


            // Add new nurse to database

            
            //--------------------------------
            $sql = "INSERT INTO employee(empNo, name, addresss, tel, working_status)" .
                    "VALUES ($empNo, '$name', '$address', '$tel', '$working_status')";

            $result = $connection->query($sql);

            if(!$result){
                $errorMessage = "Invalid query : " . $connection->error;
                break;
            }

            

            //--------------------------------
            $sql = "INSERT INTO medical_employee(empNo, MCR, joined_date, resign_date, type)" .
                    "VALUES ($empNo, $MCR, '$joinned_date', '$resign_date', 'nurse')";

            $result = $connection->query($sql);

            if(!$result){
                $errorMessage = "Invalid query : " . $connection->error;
                break;
            }

            //--------------------------------
            $sql = "INSERT INTO nurse(empNo)" .
                    "VALUES ($empNo)";

            $result = $connection->query($sql);

            if(!$result){
                $errorMessage = "Invalid query : " . $connection->error;
                break;
            }


            $empNo = "";
            $name = "";
            $address = "";
            $tel = "";
            $working_status = "";
            $MCR = "";
            $joinned_date = "";
            $resign_date = "";

            $successMessage = "Nurse aded successfully";

            header("location: /Database%20Assignment/login/admin/nurse.php#about");
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
    <title>Dasun Thathsara</title>

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
            <h3 class="heading" style="font-size: 40px; margin-bottom: 90px;">Add Doctor</h3>

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
                        <lable class="col-sm-3 col-form-lable">MCR</lable>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="MCR" value="<?php echo $MCR; ?>" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <lable class="col-sm-3 col-form-lable">Joinned Date</lable>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" name="joinned_date" value="<?php echo $joinned_date; ?>" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <lable class="col-sm-3 col-form-lable">Resign Date</lable>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" name="resign_date" value="<?php echo $resign_date; ?>" />
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
                            <a href="/Database%20Assignment/login/admin/nurse.php" class="btn btn-outline-primary">Back to list</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="/Database%20Assignment/JavaScript/script.js"></script>
</body>
</html>
