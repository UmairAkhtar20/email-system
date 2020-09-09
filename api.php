<?php include("connec.php"); ?>
<?php 

if(isset($_REQUEST['action'])){
    $action=$_REQUEST['action'];
    if($action=="signup"){
        $usernname=$_REQUEST['username'];
        $email=$_REQUEST['email'];
        $password=$_REQUEST['password'];
        $sql="INSERT INTO users (username,password,email) VALUES ('$usernname','$password','$email')";
        $result=mysqli_query($conn,$sql);
        if($result==true){
            $msg="account created !!!";
            
        }
        else{
            $msg="error";
        }
        echo json_encode($msg);


    }

}







?>