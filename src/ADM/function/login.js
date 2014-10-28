$(function(){
    var textfield = $("input[name=usuario]");
    $('button[type="submit"]').click(function(e) {
        e.preventDefault();
        //little validation just to check username
        if (textfield.val() != "") {
            //$("body").scrollTo("#output");
            $("#output").addClass("alert alert-success animated fadeInUp").html("Seja bem-vindo(a) " + "<span style='text-transform:uppercase'>" + textfield.val() + "</span>");
            $("#output").removeClass(' alert-danger');
            $("input").css({
                "height":"0",
                "padding":"0",
                "margin":"0",
                "opacity":"0"
            });
            //change button text
            $('button[type="submit"]').html("continue")
                .removeClass("btn-info")
                .addClass("btn-default").click(function(){
                    $("input").css({
                        "height":"auto",
                        "padding":"10px",
                        "opacity":"1"
                    }).val("");
                });

            //show avatar
            $(".avatar").css({
                //"background-image": "url('http://api.randomuser.me/0.3.2/portraits/women/35.jpg')"
                "backgroundColor": "#006700"
            });
        } else {
            //remove success mesage replaced with error message
            $("#output").removeClass(' alert alert-success');
            $("#output").addClass("alert alert-danger animated fadeInUp").html("Digite um usuário");
        }
        //console.log(textfield.val());

    });
});

//$("#senha").on("keyup",function(){alert("hai");
//    if($(this).val())
//        $(".glyphicon-eye-open").show();
//    else
//        $(".glyphicon-eye-open").hide();
//});
//$(".glyphicon-eye-open").mousedown(function(){
 //   $("#senha").attr('type','text');
//}).mouseup(function(){
//    $("#senha").attr('type','password');
//}).mouseout(function(){
//    $("#senha").attr('type','password');
//});
