<html>
    <head>
        <title>Online voting system - Admin Login</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
    </head>
    <body>
        
            <center>
            <div id="headerSection">
            <h1>Admin Login</h1>  
            </div>
            <hr>

            <div id="loginSection">
                <h2>Login</h2>
                <form action="../api/adminlogin.php" method="POST">
                    <input type="number" name="aad" placeholder="Enter Aadhaar" required><br><br>
                    <input type="password" name="pass" placeholder="Enter password" required><br><br>
                    <select name="role" style="width: 15%; border: 2px solid black">
                        <option value="3">Admin</option>
                        
                    </select><br><br>                  
                    <button id="loginbtn" type="submit" name="loginbtn">Login</button><br><br>
                   
                </form>
            </div>

            </center> 
    </body>
</html>