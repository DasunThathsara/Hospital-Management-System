<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "hospital";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);


    $dCode = "";
    $name = "";
    $type = "";
    $UP = "";
    $regNo = "";
    $qty = "";
    $date = "";
    $total = "";

    $errorMessage = "";
    $successMessage = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $dCode = $_POST["dCode"];
        $name = $_POST["name"];
        $type = $_POST["type"];
        $UP = $_POST["UP"];
        $regNo = $_POST["regNo"];
        $qty = $_POST["qty"];
        $date = $_POST["date"];
        $total = $qty * $UP;

        do{
            if(empty($dCode) || empty($name) || empty($type) || empty($UP) || empty($regNo) || empty($qty) || empty($date)){
                $errorMessage = "All the fields are rquired";
                break;
            }


            // Add new vendor_drug to database

            $sql = "INSERT INTO drug_vendor(regNo, dCode, qty, UP, date, total)" .
                    "VALUES ($regNo, $dCode, $qty, $UP, '$date', $total)";

            $sql1 = "INSERT INTO drug(dCode, name, type, UP)" .
                    "VALUES ($dCode, '$name', '$type', $UP)";

            $result1 = $connection->query($sql1);
            $result = $connection->query($sql);
            

            if(!$result && !$result1){
                $errorMessage = "Invalid query : " . $connection->error;
                break;
            }

            $dCode = "";
            $name = "";
            $type = "";
            $UP = "";
            $regNo = "";
            $qty = "";
            $date = "";
            $total = "";

            $successMessage = "vendor_drug aded successfully";

            header("location: /Database%20Assignment/login/admin/drug.php");
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
    <title>Suwa Sewana</title>

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
            <h3 class="heading" style="font-size: 40px; margin-bottom: 90px;">Add Drug</h3>

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
                        <lable class="col-sm-3 col-form-lable">Drug Code</lable>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="dCode" value="<?php echo $dCode; ?>" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <lable class="col-sm-3 col-form-lable">Name</lable>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <lable class="col-sm-3 col-form-lable">Type</lable>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="type" value="<?php echo $type; ?>" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <lable class="col-sm-3 col-form-lable">UP</lable>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="UP" value="<?php echo $UP; ?>" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <lable class="col-sm-3 col-form-lable">Vendor Reg No</lable>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="regNo" value="<?php echo $regNo; ?>" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <lable class="col-sm-3 col-form-lable">Qty</lable>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="qty" value="<?php echo $qty; ?>" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <lable class="col-sm-3 col-form-lable">date</lable>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" name="date" value="<?php echo $date; ?>" />
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
                            <a href="/Database%20Assignment/drug.php" class="btn btn-outline-primary">Back to list</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="/Database%20Assignment/JavaScript/script.js"></script>
</body>
</html>
