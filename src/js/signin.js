$(document).ready(function(){
    function check(){
        var username = $("#id_username").val()
        var password = $("#id_password").val()
        var u = username.length
        var p = password.length
        if ( u === 0 || p === 0) {
            $("#id_submit").attr("disabled", "true").css("cursor", "default").css("opacity", "0.3");
        } else if ( u > 0 && p > 0) {
            $("#id_submit").css("opacity", "1").css("cursor", "pointer").removeAttr("disabled");
        }
    }

    setInterval(check, 500); 
});