<?php
// Include database connection
include 'connection.php';

// Check if ID parameter is set
if(isset($_GET['id'])) {
    // Retrieve ID from URL parameter
    $id = $_GET['id'];
    // Sanitize the ID to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $id);
    // Construct the SQL query for deletion
    $delete_sql = "DELETE FROM form WHERE ID='$id'";
    if(mysqli_query($conn, $delete_sql)) {
        echo "Record deleted successfully";
        header("Location: asignIn.php"); // Redirect back to user list
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
