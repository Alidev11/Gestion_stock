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
        //session_start();
        try{
            if(isset($_POST['submit'])){
                $user = $_POST['username'];
                $pass = $_POST['password'];
                $dbconnect = new Dbaccess();
                $sqlQuery = "INSERT INTO users(username,password) VALUES('$user','$pass')";
                $dbconnect->query("$sqlQuery");
                $dbconnect->execute();
            }
                
        }
        catch(PDOException $error){
            echo $error->getMessage();
        }
    ?>

    <div class="container1">
        <div class="nav">
            <div class="title">Signup </div>
        </div>
        
        <div class="login">
            <div class="pic"></div>
            <div class="form">
                <form action="signup.php" method="POST">
                    <i class="fas fa-users user"></i>
                    <label for="username">Nom d'utilisateur:</label>
                    <input type="text" name="username" id="username" required>
                    <label for="password">Mot de passe:</label>
                    <input type="password" name="password" id="password" required>
                    <button type="submit" name='submit'>S'inscrire</button>
                </form>
            </div>
        </div>
        <div class="copyright">Copyright &copy; AppStock All right reserved </div>
    </div>
</body>

</html>






