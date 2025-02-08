<?php
// Include database connection
include 'connection.php';

// Check if ID parameter is set
if(isset($_GET['id'])) {
    // Retrieve user data based on ID
    $id = $_GET['id'];
    // Sanitize the ID to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $id);
    // Construct the SQL query with proper formatting
    $sql = "SELECT * FROM form WHERE ID='$id'";
    
    // Attempt to execute the SQL query
    $result = mysqli_query($conn, $sql);
    if(!$result) {
        // If there's an error in the SQL query, handle it
        echo "Error: " . mysqli_error($conn);
    } else {
        // Fetch the user data
        $row = mysqli_fetch_assoc($result);

        // Check if form is submitted
        if(isset($_POST['submit'])) {
            // Retrieve form data
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $regdNo = mysqli_real_escape_string($conn, $_POST['regdNo']);
            $rollNo = mysqli_real_escape_string($conn, $_POST['rollNo']);
          //  $phoneNo = mysqli_real_escape_string($conn, $_POST['phoneno']);
            $dob = mysqli_real_escape_string($conn, $_POST['dob']);
            $year = mysqli_real_escape_string($conn, $_POST['year']);
            $gender = mysqli_real_escape_string($conn, $_POST['gender']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            // Update record in the database
            $update_sql = "UPDATE form SET 
                name='$name', 
                Email='$email', 
                RegdNo='$regdNo', 
                RollNo='$rollNo', 
               <-- phoneno='$phoneNo', -->
                DOB='$dob', 
                YEAR='$year', 
                GENDER='$gender', 
                PASSWORD='$password'
                WHERE ID='$id'";

            if(mysqli_query($conn, $update_sql)) {
                echo "Record updated successfully";
                header("Location: asignIn.php"); // Redirect back to user list
                exit();
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add Bootstrap Icons library -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Registation.css"/>
    <style>
        body {
            background-color: #768976;
        }
        .card-registration {
            border-radius: 15px;
            background-color: #6c777b;
        }
        /* Style for eye icon inside input */
        .input-group-append {
            cursor: pointer;
        }
        .input-group-text {
            background-color: transparent;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card shadow-sm card-registration">
                    <div class="card-body">
                        <h3 class="mb-4 pb-2 text-center text-white">Edit User</h3>
                        <form method="POST">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $row['name']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="regdNo" placeholder="Registration No" value="<?php echo $row['RegdNo']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="rollNo" placeholder="Roll No" value="<?php echo $row['RollNo']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $row['Email']; ?>" required>
                            </div>
                           <!-- <div class="mb-3">
                                <input type="tel" class="form-control" name="phoneno" placeholder="Phone No (10 digits)" pattern="[0-9]{10}" value="<?php echo $row['phoneno']; ?>" required>
                            </div>-->
                            <div class="mb-3">
                                <input type="date" class="form-control" name="dob" placeholder="Date of Birth" value="<?php echo $row['DOB']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <select class="form-select" name="year" required>
                                    <option value="">Select Year</option>
                                    <option name="year" value="First year" <?php if($row['YEAR'] == 'First year') echo 'selected'; ?>>First year</option>
                                    <option name="year" value="Second year" <?php if($row['YEAR'] == 'Second year') echo 'selected'; ?>>Second year</option>
                                    <option name="year" value="Third year" <?php if($row['YEAR'] == 'Third year') echo 'selected'; ?>>Third year</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="d-block text-white" name="gender">Gender:</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="Male" <?php if($row['GENDER'] == 'Male') echo 'checked'; ?> required>
                                    <label class="form-check-label text-white">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="Female" <?php if($row['GENDER'] == 'Female') echo 'checked'; ?> required>
                                    <label class="form-check-label text-white">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="Trans" <?php if($row['GENDER'] == 'Trans') echo 'checked'; ?> required>
                                    <label class="form-check-label text-white">Trans</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $row['PASSWORD']; ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
