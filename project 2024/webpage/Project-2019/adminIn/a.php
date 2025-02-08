<?php
    include('admin.php');
    if (isset($_POST['sub'])) {
        $email = $_POST['username'];
        $password = $_POST['password'];

        $sql = "select * from admin where user_name = '$email' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){  
        header("Location:asignIn.php");
           echo '<script>
                 windows.location.href=""
                 </script>';
        }  
        else{  
            echo  '<script>
                        window.location.href = "admin.php";
                        alert("Login failed. Invalid username or password!!")
                    </script>';
        }     
    }
    ?>