<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student list</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
</head>
<body>
    
        <div class="col-md-12 col-xs-12">
          <div class="row ">
            <h2>User List</h2>
            <table  class="table table-bordered text-center">
                <thead class="bg-info">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Regd No</th>
                        <th>Roll No</th>
                        <!--<th>Phone No</th>-->
                        <th>DOB</th>
                        <th>YEAR</th>
                        <th>Gender</th>
                        <th>Password</th>
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody style="background-color:#639696;">
                    <?php
                    // Include database connection
                    include 'connection.php';
                    
                    // Fetch data from database
                    $sql = "SELECT * FROM form";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>".$row['ID']."</td>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>".$row['Email']."</td>";
                            echo "<td>".$row['RegdNo']."</td>";
                            echo "<td>".$row['RollNo']."</td>";
                           // echo "<td>".$row['phoneno']."</td>";//
                            echo "<td>".$row['DOB']."</td>";
                            echo "<td>".$row['YEAR']."</td>";
                            echo "<td>".$row['GENDER']."</td>";
                            echo "<td>".$row['PASSWORD']."</td>";
                            echo "<td>
                                    <a href='edit.php?id=".$row['ID']."' class='btn btn-primary btn-sm'>Edit</a>
                                    
                                    <a href='delete.php?id=".$row['ID']."' class='btn btn-danger btn-sm'>Delete</a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='11'>No users found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </div>
    
</body>
</html>
<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "student");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
