<?php
    include("connection.php");

    $name = $_POST['name'];
    $aadhaar = $_POST['aad'];
    $pass = 0;
    $cpass = 0;
    $add = $_POST['add'];
    
    
    $role = $_POST['role'];
    $party = $_POST['party'];
    $constituency = $_POST['constituency'];

    if(mysqli_num_rows(mysqli_query($connect, "select * from citizens where aadhaar=$aadhaar")) == 0){
        echo '<script>
                alert("Aadhaar doesn\'t exist!");
                window.location = "../routes/candidateregister.php";
            </script>';

    }
    else{
        move_uploaded_file($tmp_name,"../uploads/$image");
        $insert = mysqli_query($connect, "insert into user (name, aadhaar, password, address, photo, status, votes, role) values('$name', '$aadhaar', '$pass', '$add', '$image', 0, 0, '$role') ");

        $insertintoCandidate = mysqli_query($connect, "insert into candidate (aadhaar, electionid, partyid, constituencyId, VoteCount, name) values('$aadhaar', 21, '$party', '$constituency', 0, '$name')");
        if($insert){
            echo '<script>
                    alert("Registration successfull!");
                    window.location = "../routes/Admin.php";
                </script>';
        }
    }
    
?>