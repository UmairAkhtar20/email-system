<?php include("connec.php");?>
<?php session_start();?>
<?php
$msg="";
  $login="";
  if(isset($_REQUEST['btnsubmit'])){
      $login=$_REQUEST['uname'];
      $pass=$_REQUEST['psw'];

      $sql="SELECT * FROM users where username='$login'and password='$pass'";
      $result=mysqli_query($conn,$sql);
      
      $resultf=mysqli_num_rows($result);
     
      if($resultf==1){
          $row=mysqli_fetch_assoc($result);
          $_SESSION['adminid']=$row["ID"];
          $_SESSION['name']=$row['username'];
         // echo "heloo";
          header("Location:email.php");
      }
      else{
          $msg="invlid user ";
      }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <script src="jquery.js"></script>
    <script src="script.js"></script>
</head>
<body>
<form action="" method="post">
  <div class="imgcontainer">
    <img src="email-logo1.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" >

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" >

    <button type="submit" id='btnsubmit' name='btnsubmit'>Login</button>
    <a href="signup.php"><button type="submit">Create New Account</button></a>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>

</form>
</body>
</html>