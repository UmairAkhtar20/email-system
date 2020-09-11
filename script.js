function Signin(){
    var username=$("#user").val();
    var psw=$("#psw").val();
    var email=$("#email").val();  
    var data={"action":"signup","username":username,"email":email,"password":psw};
    var settings={
        Type:"post",
        dataType:"json",
        url:"api.php",
        data:data,
        success:function(r){
            alert(r);
           

        },
        error:function(r){
            alert(r);

        }
    };
    $.ajax(settings);

}
function sendmsg(){
    var sendto=$("#sendto").val();
    var subject=$("#subject").val();
    var msg=$("#msg").val();
    var data={"action":"sendmsg","sendto":sendto,"subject":subject,"msg":msg};
    var settings={
        Type:"post",
        url:"api.php",
        data:data,
        dataType:"json",
        success:function(r){
            alert(r);
        },
        error:function(r){
            alert(r);
        }

    };
    $.ajax(settings);

}
function inbox(){
    var data={"action":"inbox"};
    var settings={
        Type:"post",
        url:"api.php",
        data:data,
        dataType:"json",
        success:function(response){
                $(".inbox").empty();
           for(var i=0;i<response.data.length;i++){
               var data=response.data[i];
               var div=$("<a href='javascript:void(0)' class='w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey one ' w3_close();' id='firstTab'>");
               div.append("<div class='w3-container '>");
               div.append("<img class='w3-round w3-margin-right' src='avatar.png' style='width:15%;''><span class='w3-opacity w3-large spanname' sendby='"+data.send_by_user+ "'>"+data.send_by_user+"</span>");
               div.append("<h6  class='subject'subject='"+data.subject+"' senton='"+data.sent_on+"'>Subject: "+data.subject+"</h6>");
               div.append("<p class='msg' msg='"+data.msg+"'> </p>");
               div.append("</div>");
               div.append("</a>");
               $(".inbox").append(div);
           }

        },
        error:function(r){
            alert(r);
        }

    };
    $.ajax(settings);


}
function sent(){
    var data={"action":"sent"};
    var settings={
        Type:"post",
        url:"api.php",
        data:data,
        dataType:"json",
        success:function(response){
                $(".sent").empty();
           for(var i=0;i<response.data.length;i++){
               var data=response.data[i];
               var div=$("<div class='w3-container'>");
               div.append(" <img class='w3-round w3-margin-right' src='avatar.png' style='width:15%;'><span class='w3-opacity w3-large'>SENT to:"+data.sent_to+"</span>");
               div.append("<br><span>SENT ON :"+data.sent_on+"</span>");
               div.append("<h6>Subject: "+data.subject+"</h6>");
             //  div.append("<p> MSG:"+data.msg+"</p>");
               div.append("</div>");
               $(".sent").append(div);
           }
        },
        error:function(r){
            alert(r);
        }

    };
    $.ajax(settings);
}
function option(){
    var data={"action":"option"};
    var settings={
        Type:"post",
        url:"api.php",
        data:data,
        dataType:"json",
        success:function(response){
                $(".sendto").empty();
           for(var i=0;i<response.data.length;i++){
               var data=response.data[i];
               var div=$("<option>"+data.username+"</option>");
               $(".sendto").append(div);
           }
        },
        error:function(r){
            alert(r);
        }

    };
    $.ajax(settings);
}
function inboxshow(sendby,subject,sendon,msg){
    
    var div=$("<div  class='w3-container person'>");
    div.append("<br>");
    div.append("<img class='w3-round  w3-animate-top' src='avatar.png' style='width:20%;'>");
    div.append("<h5 class='w3-opacity'>Subject:"+subject+"</h5>");
    div.append("<h4><i class='fa fa-clock-o'></i> From "+sendby+" ,ON "+sendon+"</h4>");
    div.append("<a class='w3-button w3-light-grey' href='#'>Reply<i class='w3-margin-left fa fa-mail-reply'></i></a>");
    div.append("<a class='w3-button w3-light-grey' href='#'>Forward<i class='w3-margin-left fa fa-arrow-right'></i></a>");
    div.append("<hr>");
    div.append("<p>"+msg+"</p>");
    div.append("<p>Best Regards, <br>"+sendby+"</p>");
    div.append("</div>");
    $(".person").empty();
    $(".w3-main").append(div);

}