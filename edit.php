<?php
include "db_conn.php";

$id = $_GET["SID"];

if(isset($_POST["submit"])){
$firstname = $_POST['Firstname'];
$lastname = $_POST['Lastname'];
$MI = $_POST['MI'];
$age = $_POST['Age'];
$address = $_POST['Address'];

$sql = "UPDATE `students` SET `Firstname`='$firstname', `Lastname`='$lastname',`MI`='$MI',`Age`='$age',`Address`='$address' WHERE `SID` = $id";

$result = mysqli_query($conn, $sql);

if($result) {
    header("Location: index.php?msg=Data edited successfully");

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
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<nav class = "navbar navbar-light justify-content-center fs-3 mb-5" style = "background-color: #f0f0f0">
   STUDENT INFORMATION
</nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3> EDIT USER INFO</h3>
        </div>
    </div>
    <?php
    $sql = "SELECT * FROM `students` WHERE SID = $id LIMIT 1";
    $result = mysqli_query($conn, $sql) or die ($conn->error);
    $row = mysqli_fetch_assoc($result);
    ?>

    <form action="" method="POST">
        <div class="row mb-3">
            <div class="col-md-4 col-offset-4">
                <label for="" class="form-label">First Name</label>
                <input type="text" class="form-control" name="Firstname"  value="<?php echo $row['Firstname']?>">
            </div>
            <div class="col-md-4 col-offset-4">
                <label for="" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="Lastname" value="<?php echo $row['Lastname']?>">
            </div>
            <div class="col-md-4 col-offset-4">
                <label for="" class="form-label">MI</label>
                <input type="text" class="form-control" name="MI" value="<?php echo $row['MI']?>">
            </div>
            <div class="col-md-4 col-offset-4">
                <label for="" class="form-label">Age</label>
                <input type="text" class="form-control" name="Age" value="<?php echo $row['Age']?>">
            </div>
            <div class="col-md-4 col-offset-4">
                <label for="" class="form-label">Address</label>
                <input type="text" class="form-control" name="Address" value="<?php echo $row['Address']?>">
            </div>
            <div>
                    <button type="submit" class="btn btn-success mt-2" name="submit">Submit</button>
                    <a href="index.php" class="btn btn-danger mt-2">Cancel</a>
                </div>

        </div>
    </form>
</body>
</html>