<?php include("connec.php"); ?>
<?php session_start(); ?>
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
    if($action=="sendmsg"){
       $sendto=$_REQUEST['sendto'];
       $sendfrom=$_SESSION['name'];
       $subject=$_REQUEST['subject'];
       $msg=$_REQUEST['msg'];
       $sendon=date('Y-m-d H:i:s');
       $sendbyid=$_SESSION['adminid'];
       $sql="INSERT INTO sending_msg (sent_to,subject,msg,sent_on,send_by_user,send_by_userid)
        VALUES ('$sendto','$subject','$msg','$sendon','$sendfrom','$sendbyid')";
       $result=mysqli_query($conn,$sql);
       if($result==true){
           $msg="msg send !!!";
           
       }
       else{
           $msg="error";
       }
       echo json_encode($msg);

       

    }

}







?>