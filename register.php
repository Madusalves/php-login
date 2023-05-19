<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="popo.ico" type="image/x-icon">
    <link rel="stylesheet" href="main.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">

        <?php 
        
        include("php/config.php");
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];
           

            // verifying the unique email
            $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

            if(mysqli_num_rows($verify_query) !=0 ){
               echo "<div class='message'>
                         <p>This email is used, Try another One Please!</p>
                     </div> <br>";
               echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
            }
            else{
   
               mysqli_query($con,"INSERT INTO users(Username,Email,Age,Password) VALUES('$username','$email','$age','$password')") or die("Erroe Occured");
   
               echo "<div class='message'>
                         <p>Registration successfully!</p>
                     </div> <br>";
               echo "<a href='index.php'><button class='btn'>Login Now</button>";
            
   
            }
   
            }else{


        ?>

            <header>Sign Uo</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off">
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age"  autocomplete="off">
                </div>


                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"  autocomplete="off">
                </div>

                <div class="field ">
                    <input type="submit"class="btn" name="submit" value="login" required>
                </div>
                <div class="links">
                    Already a member? <a href="index.php">Sing in now</a>
                </div>
        </div>
        <?php } ?>
    </div>
</body>
</html>