$(document).ready(function() {
    $("#dashboard_signout").click(function(){
        $.post("../model/logout_model.php");
    });
});
