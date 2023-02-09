<?php
    session_start();
    include("connection.php");

    $votes = $_POST['gvotes'];
    $total_votes= $votes+1;
    $gid = $_POST['gid'];
    $cid = $_POST['cid'];
    
    $eid = $_POST['electionid'];
    
    $status = 1;
    $voted = 1;

    $datetime = strtotime(date("h:m:s"));

    $update_votes = mysqli_query($connect, "update candidate set votecount='$total_votes' where aadhaar='$cid'");
    $update_status_ = mysqli_query($connect, "update user set status='$status' where aadhaar='$gid'");
    $update_status = mysqli_query($connect, "update voter set voted='$voted' where aadhaar='$gid'");

    $voteCheck = mysqli_query($connect, "select * from vote where aadhaar='$gid'");

    if(mysqli_num_rows($voteCheck) == 0){
        $update_vote = mysqli_query($connect, "insert into vote (aadhaar,typeofvote, candidateid, electionid) values( '$gid', 'citizen', '$cid', '$eid')");

    }
    else{
        echo '<script>
                    alert("Vote with Given Aadhaar exists");
                    window.location = "../routes/dashboard.php";
                </script>';

    }


    if($update_status and $update_votes and $update_status_){
        $getGroups = mysqli_query($connect, "select * from candidate");
        $groups = mysqli_fetch_all($getGroups, MYSQLI_ASSOC);
        $_SESSION['groups'] = $groups;
        $_SESSION['status'] = 1;
        echo '<script>
                    alert("Voting successfull!");
                    window.location = "../routes/dashboard.php";
                </script>';
    }
    else{
        echo '<script>
                    alert("Voting failed!.. Try again.");
                    window.location = "../routes/dashboard.php";
                </script>';
    }
    
?>