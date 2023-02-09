<?php
    session_start();
    include("connection.php");

    $aadhar = $_POST['aad'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];

    $check = mysqli_query($connect, "select * from user where aadhaar='$aadhar' and password='$pass' and role='$role' ");

    if(mysqli_num_rows($check)>0){
        
        echo '<script>
                window.location = "../routes/Candidate_Registration.php";
            </script>';
    }
    else{
        echo '<script>
                alert("Invalid credentials!");
                window.location = "../routes/Admin.php";
            </script>';
    }
    
?>