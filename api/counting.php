<?php


    include("connection.php");

    $countingDate = mysqli_fetch_array(mysqli_query($connect,  "select * from elections where electionid=21"))['CountingDate'];

    $currentDate = date("d-m-y");
    $st_Date = strtotime($currentDate);

    if($countingDate == $st_Date){
        echo '<script>
        alert("Out of Counting date");
        window.location = "../routes/Admin.php";
    </script>';
    }
    else{
        echo '<script>
        
        window.location = "../routes/Count.php";
    </script>';
        

    }

?>