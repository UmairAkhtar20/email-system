<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script>
        $(document).ready(function (){
            $(".signupbtn").on('click',function(){
                Signin();
            });
        });


    </script>
</head>
<body>
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="email"><b>UserName</b></label>
    <input type="text" placeholder="Enter UserName" name="user" id="user" >


    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" >

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw">

    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>

    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <a href="login.php"><button type="button" class="cancelbtn">LogIn</button> </a>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</body>
</html>