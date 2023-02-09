<?php
    include("connection.php");

    $name = $_POST['name'];
    $aadhaar = $_POST['aad'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $add = $_POST['add'];
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $role = $_POST['role'];

    if($cpass!=$pass){
        echo '<script>
                alert("Passwords do not match!");
                window.location = "../routes/register.php";
            </script>';
    } elseif(mysqli_num_rows(mysqli_query($connect, "select * from citizens where aadhaar=$aadhaar")) == 0){
        echo '<script>
                alert("Aadhaar doesn\'t exist!");
                window.location = "../routes/register.php";
            </script>';

    }
    else{
        move_uploaded_file($tmp_name,"../uploads/$image");
        $insert = mysqli_query($connect, "insert into user (name, aadhaar, password, address, photo, status, votes, role) values('$name', '$aadhaar', '$pass', '$add', '$image', 0, 0, '$role') ");

        $insertinto = mysqli_query($connect, "insert into voter (aadhaar, voted) values('$aadhaar', 0)");

        if($insert){
            echo '<script>
                    alert("Registration successfull!");
                    window.location = "../";
                </script>';
        }
    }
    
?>