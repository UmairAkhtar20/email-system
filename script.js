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
                var obj={};
                obj=response.data;
                var source = $("#inboxmsg").html();
                var template = Handlebars.compile(source);
                var obj1 = { DataList: obj };

                var html = template(obj1);
                $(".inbox").append(html);


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
                var obj={};
                obj=response.data;
                var source = $("#sentmsg").html();
                var template = Handlebars.compile(source);
                var obj1 = { DataList: obj };

                var html = template(obj1);
                $(".sent").append(html);

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
                var obj={};
                obj=response.data;
                
                var source = $("#option").html();
                var template = Handlebars.compile(source);
                var obj1 = { DataList: obj };

                var html = template(obj1);
                $("#sendto").append(html);

        },
        error:function(r){
            alert(r);
        }

    };
    $.ajax(settings);
}
function inboxshow(sendby,subject,sendon,msg){
    debugger;
    var obj={};
    obj.sendby=sendby;
    obj.subject=subject;
    obj.sendon=sendon;
    obj.msg=msg;
    var source = $("#inboxshow").html();
    var template = Handlebars.compile(source);
    var html = template(obj);   
    $(".w3-main").empty();
    $(".w3-main").append(html); 

}