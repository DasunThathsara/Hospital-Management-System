<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "hospital";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);



    $id = "";
    $name = "";
    $address = "";
    $tel = "";
    $did = "";

    $errorMessage = "";
    $successMessage = "";

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        // GET method: show the data of the doctor

        if(!isset($_GET["id"])){
            header("location: /Database%20Assignment/doctor.php#about");
            exit;
        }

        $id = $_GET["id"];

        // REad row of the selected doctor from database table
        $sql = "SELECT * FROM doctor WHERE id=$id";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();

        if(!$row){
            header("location: /Database%20Assignment/doctor.php#about");
            exit;
        }

        $name = $row["name"];
        $address = $row["address"];
        $tel = $row["tel"];
        $did = $row["did"];

    }
    else{
        // POST method: Update the data of the doctor
        $id = $_POST["id"];
        $name = $_POST["name"];
        $address = $_POST["address"];
        $tel = $_POST["tel"];
        $did = $_POST["did"];

        do{
            if(empty($id) || empty($name) || empty($address) || empty($tel) || empty($did)){
                $errorMessage = "All the fields are rquired";
                break;
            }

            $sql = "UPDATE doctor " .
                    "SET name = '$name', address = '$address', tel = '$tel', did = $did " .
                    "WHERE id=$id";

            $result = $connection->query($sql);

            if(!$result){
                $errorMessage = "Invalid query: " . $connection->error;
                break;
            }

            $successMessage = "Doctor updated successfully";

            header("location: /Database%20Assignment/doctor.php#about");
            exit;

        }while(false);
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
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="row mb-3">
                        <lable class="col-sm-3 col-form-lable">Name</lable>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <lable class="col-sm-3 col-form-lable">Address</lable>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="address" value="<?php echo $address; ?>" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <lable class="col-sm-3 col-form-lable">Tel</lable>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="tel" value="<?php echo $tel; ?>" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <lable class="col-sm-3 col-form-lable">DID</lable>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="did" value="<?php echo $did; ?>" />
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
                            <a href="/Database%20Assignment/doctor.php" class="btn btn-outline-primary">Back to list</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="/Database%20Assignment/JavaScript/script.js"></script>
</body>
</html>
