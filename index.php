<?php

include "db_conn.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

   <!-- data tables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />

    <!--Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <?php
    if(isset($_GET["msg"])){
        $msg = $_GET["msg"];
        echo '<div class="alert alert-warning alert-dismissable fade show" role="alert">
            ' . $msg . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
?>
         <h1 style = "text-align: center">Student Information System</h1>
        
        <div>
        <a href="add.php" class="btn btn-primary mb-2">Add Student</a>
        </div>

    <table id="myTable" class = "table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr class="table-dark">
                <th>SID</th>
                <th>Lastname</th>
                <th>Firstname</th>
                <th>MI</th>
                <th>Age</th>
                <th>Address</th>
                <th>Action</th>
            </tr>

        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM students";
        $students = $conn->query($sql) or die ($conn->error);
        $row = $students->fetch_assoc();
        ?>
            <?php do{ ?>
            <tr>
                <td><?php echo $row['SID'];?></td>
                <td><?php echo $row['Lastname'];?></td>
                <td><?php echo $row['Firstname'];?></td>
                <td><?php echo $row['MI'];?></td>
                <td><?php echo $row['Age'];?></td>
                <td><?php echo $row['Address'];?></td>
                <td>
                <a href="edit.php?SID=<?php echo $row["SID"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                <a href="delete.php?SID=<?php echo $row["SID"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                </td>
            </tr>
            <?php }while($row = $students->fetch_assoc())?>
        </tbody>

    </table>
    <!-- Bootstrap -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
     <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

   <!-- data tables -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
     $(document).ready( function () {
       $('#myTable').DataTable();
     });
   </script>
</body>
</html>