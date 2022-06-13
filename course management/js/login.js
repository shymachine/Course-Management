$(document).ready(function() {
    $("#login").submit(function() {
        var username = $("#uname").val();
        var passwd = $("#passwd").val();

        if($("#uname").val() == "") {
            alert("Username is the email id, enter username");
            return false;
        }

        if($("#passwd").val() == "") {
            alert("Enter password");
            return false;
        }

    });

    $("#logout").click(function() {
        $.post("sign_out.php");
    });
});
