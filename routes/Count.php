<?php
    include('../api/connection.php')
?>

<html>
    <head>
        <title>Vote count</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
        <?php
            $candidate = mysqli_query($connect, "select * from candidate");
            $candidates = mysqli_fetch_all($candidate, MYSQLI_ASSOC);

            
        ?>
        
            <center>
            <div id="headerSection">
            <h1>Vote Count</h1>  
            </div>
            <hr>

            <div >

            <?php 
            for($i=0; $i<count($candidates); $i++){

            ?>
            <div class="container" id="countsection">
                <div class="row">
                    <div class="col" id="countsection"><?php echo $candidates[$i]['Name']?></div>
                    <div class="col" id="countsection"><?php echo $candidates[$i]['VoteCount']?></div>
                    
                </div>
            </div>
             <?php
            }
            ?>   
            </div>

            </center> 
    </body>
</html>