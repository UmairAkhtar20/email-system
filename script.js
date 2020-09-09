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