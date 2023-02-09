<?php

    session_start();
    include("../api/connection.php");
    $_getparties = mysqli_query($connect, "select * from party");
    $parties = mysqli_fetch_all($_getparties, MYSQLI_ASSOC);

    $_getconstituency = mysqli_query($connect, "select * from constituencies");
    $constituencies = mysqli_fetch_all($_getconstituency, MYSQLI_ASSOC);

    

?>


<html>
    <head>
        <title>Online voting system - Registratrion</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
    </head>
    <body>
        <center>
        <center>
            <div id="headerSection">
            <a href="../routes/admin.php"><button id="back-button"> Back</button></a>
            <a href="../api/counting.php"><button id="logout-button">Vote Count</button></a>
            <h1>Online Voting System</h1>  
            </div>
            </center>
            <hr>
            

            <h2>Candidate Registration</h2>
                <form action="../api/candidateregister.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="name" placeholder="Name" required>&nbsp
                    <input type="number" name="aad" placeholder="Aadhaar" required><br><br>
                    <br><br>
                    <input style="width: 31%" type="text" name="add" placeholder="Address" required><br>
                    <br>
                    <div id="upload" style="width: 30%">
                        Select your Party:
                        <select name="party">
                            <?php
                            for($i=0; $i<count($parties); $i++){
                            ?>

                                <option value="<?php echo $i+1 ?>"><?php echo $parties[$i]['Name'] ?> </option>

                                <?php
                            }
                            ?>
                            
                            
                        </select><br>                   
                    </div><br>
                    <div id="upload" style="width: 30%">
                        Select your Constituency:
                        <select name="constituency">
                            <?php
                            for($i=0; $i<count($constituencies); $i++){
                                ?>

                                <option value="<?php echo $constituencies[$i]['ConstituencyId'] ?>"><?php echo $constituencies[$i]['Name'] ?> </option>

                                <?php
                            }
                            ?>
                            
                            
                        </select><br>
                                           
                    </div>
                    <br>
                    <div id="upload" style="width: 30%">
                        Select your role:
                        <select name="role">
                            <option value="2">Candidate</option>
                            
                        </select><br>                   
                    </div><br>
                    <button id="loginbtn" type="submit" name="registerbtn">Register</button><br><br>
                    
                </form>
            </center>
    </body>
</html>