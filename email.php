<?php session_start(); ?>
<?php include("connec.php"); ?>
<?php $username=$_SESSION['name']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Home page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href='https://fonts.googleapis.com/css?family=RobotoDraft' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="handlebars.js" type="text/javascript"></script>
<script src="script.js"></script>
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "RobotoDraft", "Roboto", sans-serif}
.w3-bar-block .w3-bar-item {padding: 16px}
</style>
<script src="jquery.js"></script>
<script >

        $(document).ready(function(){
          $("#sendmsg").on('click',function(){
            sendmsg();
            });

            $(".w3-button").on('click',function(){
              inbox();
              
            });
            $(".send").on('click',function () {
              sent();
            });
            $(".option").on('click',function (){
              option();
            });
            

            $(".inbox").on('click','.one', function(){
              var sendby=$(this).find(".spanname").attr("sendby");
              var subject=$(this).find(".subject").attr("subject");
              var sendon=$(this).find(".subject").attr("senton");
              var msg=$(this).find(".msg").attr("msg");
              
              inboxshow(sendby,subject,sendon,msg);
            }); 
        });


</script>
</head>
<body>

<!-- Side Navigation -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-white w3-animate-left w3-card" style="z-index:3;width:320px;" id="mySidebar">
  <a href="javascript:void(0)" style="background-color:red;"class="w3-bar-item w3-button w3-border-bottom w3-large"><span style="width:60%;"> <b class="boldname">Welcome:<?php echo $username ?></b> </span></a>
  <a href="javascript:void(0)" onclick="w3_close()" title="Close Sidemenu" 
  class="w3-bar-item w3-button w3-hide-large w3-large">Close <i class="fa fa-remove"></i></a>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-dark-grey w3-button w3-hover-black w3-left-align option" onclick="document.getElementById('id01').style.display='block'">New Message <i class="w3-padding fa fa-pencil"></i></a>
  <a id="myBtn" onclick="myFunc('Demo1')" href="javascript:void(0)" class="w3-bar-item w3-button"><i class="fa fa-inbox w3-margin-right"></i>Inbox<i class="fa fa-caret-down w3-margin-left"></i></a>
  <div id="Demo1" class="w3-hide w3-animate-left inbox">

  </div>
  <a href="javascript:void(0)" id="myBtn2" onclick="myFunc('Demo2')" class="w3-bar-item w3-button send w3-dark-grey w3-button w3-hover-black w3-left-align"><i class="fa fa-paper-plane w3-margin-right"></i>Sent<i class="fa fa-caret-down w3-margin-left"></i></a>
    <div id="Demo2"class="w3-hide w3-animate-left sent" > 

    </div>
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-hourglass-end w3-margin-right"></i>Drafts</a>
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-trash w3-margin-right"></i>Trash</a>
  <a href="login.php" class="w3-bar-item w3-button" ><i class="fa fa-sign-out w3-margin-right"></i>Signout</a>
</nav>

<!-- Modal that pops up when you click on "New Message" -->
<div id="id01" class="w3-modal" style="z-index:4">
  <div class="w3-modal-content w3-animate-zoom">
    <div class="w3-container w3-padding w3-red">
       <span onclick="document.getElementById('id01').style.display='none'"
       class="w3-button w3-red w3-right w3-xxlarge"><i class="fa fa-remove"></i></span>
      <h2>Send Mail</h2>
    </div>
    <div class="w3-panel">
      <label>To</label>
      <select class="sendto" id="sendto">
       
      </select>
      <label>Subject</label>
      <input  id="subject"class="w3-input w3-border w3-margin-bottom" type="text">
      <input  id="msg"class="w3-input w3-border w3-margin-bottom" style="height:150px" placeholder="What's on your mind?">
      <div class="w3-section">
        <a class="w3-button w3-red" onclick="document.getElementById('id01').style.display='none'">Cancel  <i class="fa fa-remove"></i></a>
        <a  id="sendmsg"class="w3-button w3-light-grey w3-right" onclick="document.getElementById('id01').style.display='none'">Send  <i class="fa fa-paper-plane"></i></a> 
      </div>    
    </div>
  </div>
</div>

<!-- Overlay effect when opening the side navigation on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Close Sidemenu" id="myOverlay"></div>

<!-- Page content -->
<div class="w3-main" style="margin-left:320px;">
<i class="fa fa-bars w3-button w3-white w3-hide-large w3-xlarge w3-margin-left w3-margin-top" onclick="w3_open()"></i>
<a href="javascript:void(0)" class="w3-hide-large w3-red w3-button w3-right w3-margin-top w3-margin-right" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-pencil"></i></a>

    
</div>

 <script>
 var openInbox = document.getElementById("myBtn");
openInbox.click();
var openInbox2 = document.getElementById("myBtn2");
openInbox2.click();

function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

function myFunc(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show"; 
    x.previousElementSibling.className += " w3-red";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-red", "");
  }
}
</script>

<script id="inboxshow" type="text/x-handlebars-template">
<div class="w3-container person'">
<br>
<img class='w3-round  w3-animate-top' src='avatar.png' style='width:20%;'>
<h5 class='w3-opacity'>Subject:{{subject}}</h5>
<h4><i class='fa fa-clock-o'></i> From "{{sendby}}" ,ON {{sendon}}</h4>
<a class='w3-button w3-light-grey' href='#'>Reply<i class='w3-margin-left fa fa-mail-reply'></i></a>
<a class='w3-button w3-light-grey' href='#'>Forward<i class='w3-margin-left fa fa-arrow-right'></i></a>
<hr>
<p>"{{msg}}"</p>
<p>Best Regards, <br>"{{sendby}}"</p>

</div>
   
</script>
<script id="option" type="text/x-handlebars-template" >
{{#each DataList}}
<option>{{username}}</option>
{{/each}}
</script>
<script id="sentmsg" type="text/x-handlebars-template">
{{#each DataList}}
<div class='w3-container'>
<img class='w3-round w3-margin-right' src='avatar.png' style='width:15%;'><span class='w3-opacity w3-large'>SENT to:{{sent_to}}</span>
<br><span>SENT ON :{{sent_on}}</span>
<h6>Subject: {{subject}}</h6>
<p> MSG:{{msg}}</p>" 
</div>
{{/each}}
</script>
<script id="inboxmsg" type="text/x-handlebars-template">
{{#each DataList}}
  <a href='javascript:void(0)' class='w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey one  'w3_close();' id='firstTab'>
    <div class='w3-container '>
    <img class='w3-round w3-margin-right' src='avatar.png' style='width:15%;''><span class='w3-opacity w3-large spanname' sendby='{{send_by_user}}'>{{send_by_user}}</span>
    <h6  class='subject'subject='{{subject}}' senton='{{sent_on}}'>Subject:{{subject}}</h6>
    <p class='msg' msg='{{msg}}'> </p>
    </div>    
  </a>
  {{/each}}
</script>


</body>
</html> 