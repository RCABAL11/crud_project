<?php
include "db_conn.php";

if(isset($_POST["submit"])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $MI = $_POST['MI'];
    $Age = $_POST['Age'];
    $Address = $_POST['Address'];

    $sql = "INSERT INTO `students`(`Lastname`, `Firstname`, `MI`, `Age`, `Address`) VALUES ('$firstname','$lastname','$MI','$Age','$Address')";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: index.php?msg= New record created successfully");
    }else{
        echo "Failed: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class = "navbar navbar-light justify-content-center fs-3 mb-5" style = "background-color: #f0f0f0">
    STUDENT INFORMATION
</nav>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Add New User</h3>
        </div>
    </div>
    
    <div class="container d-flex justify-content-center ">
        <form action="" method="post" style="width: 50vw; min-width: 300px;">
            <div class="row mb-3">
                
                <div class="col-md-4 col-offset-4">
                    <label for="" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                </div>

                <div class="col-md-4 col-offset-4">
                    <label for="" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                </div>

                <div class="col">
                    <label for="" class="form-label">MI</label>
                    <input type="text" class="form-control" name="MI" placeholder="MI">
                </div>

                <div class="col">
                    <label for="" class="form-label">Age</label>
                    <input type="text" class="form-control" name="Age" placeholder="Age" required>
                </div>

                <div>
                    <label for="" class="form-label">Address</label>
                    <input type="text" class="form-control" name="Address" placeholder="Address" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-success mt-2" name="submit">Submit</button>
                    <a href="index.php" class="btn btn-danger mt-2">Cancel</a>
                </div>
            </div>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>