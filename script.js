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
