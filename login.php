<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to AppStock | Login</title>
    <link rel="stylesheet" href="login.css">
    
    <script src="https://kit.fontawesome.com/6d5b5d6689.js" crossorigin="anonymous"></script>
    
</head>
<body>

    <?php
        require_once './dbaccess.php';
        session_start();
        

        
        try{
            if(isset($_POST['submit'])){
                $user = $_POST['username'];
                $pass = $_POST['password'];
                $dbconnect = new Dbaccess();
                $sqlQuery = "SELECT username, password FROM users WHERE username = ? AND password = ?";
                $dbconnect->query("$sqlQuery");
                $dbconnect->execute_var2("$user","$pass");
                $res=$dbconnect->resultset();
                $rowNum = $dbconnect->rowCount();
                if( $rowNum > 0 ){
                    echo "youre loged in";
                        
                        $_SESSION['username'] = $_POST['username'];
                        $_SESSION['submit'] = $_POST['submit'];
                        header('location: ./index.php');
                    
                }
                else{
                    //echo "WRONG PASSWORD";
                    header('location: ./login.php?errors=pass or username');
                }
            }
        }
        catch(PDOException $error){
            //$message = $error->getMessage();
            echo $error->getMessage();
        }
    ?>

    <div class="container1">
        <div class="nav">
            <div class="title">login </div>
            <div class="signup"><a href="signup.php" class="signupLink">Signup</a> </div>
        </div>
        
        <div class="login">
            <div class="pic"></div>
            <div class="form">
                <form action="login.php" method="POST">
                    <i class="fas fa-users user"></i>
                    <label for="username">Nom d'utilisateur:</label>
                    <input type="text" name="username" id="username" required>
                    <label for="password">Mot de passe:</label>
                    <input type="password" name="password" id="password" required>
                    <button type="submit" name='submit'>Se connecter</button>
                </form>
            </div>
        </div>
        <div class="copyright">&copy; AppStock All right reserved </div>
    </div>
</body>

</html>






