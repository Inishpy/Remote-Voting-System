<?php
    session_start();
    include("connection.php");

    $aadhar = $_POST['aad'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];

    $check = mysqli_query($connect, "select * from user where aadhaar='$aadhar' and password='$pass' and role='$role' ");

    $getElections = mysqli_query($connect, "select * from elections where electionid=21");
    $election = mysqli_fetch_array($getElections);
    $_SESSION['election'] = $election;

    $currentDate = date("d-m-y");
    $st_Date = strtotime($currentDate);
    $st_date = strtotime($election['Date']); 
    
    $st_start = strtotime($election['StartTime']);
    $st_end = strtotime($election['EndTime']);
    $st_Time = strtotime(date("h:m:s"));
   
    if($st_Date == $st_date){
        echo '<script>
                alert("Elections starts on 15th");
                window.location = "../";
            </script>';

    }
    elseif($st_Time < $st_start && $st_Time > $st){
        echo '<script>
                alert("Login outside Election time");
                window.location = "../";
            </script>';

    }
    elseif(mysqli_num_rows($check)>0){
        $getGroups = mysqli_query($connect, "select * from candidate");
        if(mysqli_num_rows($getGroups)>=0){
            $groups = mysqli_fetch_all($getGroups, MYSQLI_ASSOC);
            $_SESSION['groups'] = $groups;
            
        }
        

        $data = mysqli_fetch_array($check);
        $_SESSION['id'] = $data['id'];
        $_SESSION['status'] = $data['status'];
        $_SESSION['data'] = $data;
        echo '<script>
                window.location = "../routes/dashboard.php";
            </script>';
    }
    else{
        echo '<script>
                alert("Invalid credentials!");
                window.location = "../";
            </script>';
    }
    
?>