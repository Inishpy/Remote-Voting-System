<?php
    session_start();
    include('../api/connection.php');
    if(!isset($_SESSION['id'])){
        header("location: ../");
    }
    $data = $_SESSION['data'];

    if($_SESSION['status']==1){
        $status = '<b style="color: green">Voted</b>';
    }
    else{
        $status = '<b style="color: red">Not Voted</b>';
    }
?>


<html>
    <head>
        <title>Online voting system - Dashboard</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
        
            <center>
            <div id="headerSection">
            <a href="../"><button id="back-button"> Back</button></a>
            <a href="logout.php"><button id="logout-button">Logout</button></a>
            <h1>Online Voting System</h1>  
            </div>
            </center>
            <hr>

            
                <?php 
                $election = $_SESSION['election'];
                $_getparties = mysqli_query($connect, "select * from party");
                $parties = mysqli_fetch_all($_getparties, MYSQLI_ASSOC);
                ?>

            <div class="container">
                <div class="row">
                    <div class="col-4" >
                        <div id="voterdetails" >
                            <center><img src="../uploads/<?php echo $data['photo']?>" height="100" width="100"></center><br><br>
                            <b>Name : </b><?php echo $data['name'] ?><br><br>
                            <b>Aadhaar : </b><?php echo $data['Aadhaar'] ?><br><br>
                            <b>Address : </b><?php echo $data['address'] ?><br><br>
                            <b>Status : </b><?php echo $status ?>
                        </div>

                    </div>
                    <div class="col">
                        
                    <div class="container">


                    <div class="container" id="electionDetails">
                    Election Details
                    <br><br>
                        <div class="row">
                            <div class="col"><b >Description : </b><?php echo $election['Description']?></div>
                            <div class="col"><b>Date : </b><?php echo $election['Date']?></div>
                            <div class="w-100"></div>
                            <div class="col"><b>CountingDate : </b><?php echo $election['CountingDate']?></div>
                            <div class="col"><b>Start Time : </b><?php echo $election['StartTime']?></div>
                            <div class="w-100"></div>
                            <div class="col"><b>End Time : </b><?php echo $election['EndTime']?></div>
                        </div>
                    </div>




                    
                <br>
                <div id="candidatedetails">
                    <?php

                    if(isset($_SESSION['groups'])){
                        $groups = $_SESSION['groups'];
                        for($i=0; $i<count($groups); $i++){
                            ?>
                                <div style="border-bottom: 1px solid #bdc3c7; margin-bottom: 10px">
                                <img style="float: right" src="../uploads/<?php echo $parties[$groups[$i]['PartyId']]['PartySymbol']?>" height="80" width="80">
                                <b>Candidate Name : </b><?php echo $groups[$i]['Name']?><br><br>
                                <b>Party : </b><?php echo $parties[$groups[$i]['PartyId'] ]['Name']?><br><br>
                                
                                
                                <form method="POST" action="../api/vote.php">
                                <input type="hidden" name="gvotes" value="<?php echo $groups[$i]['VoteCount'] ?>">
                                <input type="hidden" name = "gid" value="<?php echo $data['Aadhaar']?>">
                                <input type="hidden" name = "cid" value="<?php echo $groups[$i]['Aadhaar']?>">
                                <input type="hidden" name = "electionid" value="<?php echo $election['ElectionId']?>">
                                <?php
                                
                                if($_SESSION['status']==0){
                                    ?>
                                    <button style="padding: 5px; font-size: 15px; background-color: #27ae60; color: white; border-radius: 5px;" type="submit">Vote</button>
                                    <?php
                                } 
                                
                                ?>
                                </form>
                                </div>
                            <?php
                        }
                        ?>
                               
                            <?php


                    }
                    else{
                        ?>
                            <div style="border-bottom: 1px solid #bdc3c7; margin-bottom: 10px">
                                <b>No Candidate available right now.</b>    
                            </div>
                        <?php
                    }  
                    ?>
                </div>


                    </div>
                    <div class="w-100"></div>
                    
                </div>
            </div>







            
    </body>





</html>