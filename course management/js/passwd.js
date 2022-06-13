$(document).ready(function() {
    $("#changepassword").submit(function() {
        var password = $("#passwd").val();
        
        if(($("#passwd").val() == "") || ($("#passwd").val().length < 6) || ($("#passwd").val().length > 12) || (!$("#passwd").val().match(/[A-z]/)) || (!$("#passwd").val().match(/[A-z]/)) || (!$("#passwd").val().match(/\d/)) || (!$("#passwd").val().match(/[!@#$%\^&*(){}[\]<>?/|\-]/))) {
            alert("Password must be greater than 6 character and less than 12 characters.It must contain one lower case, one upper case, one numeric and one special character");
            return;
        }
        if($("#confirmpasswd").val() == "") {
            alert("Please re-type the password");
            return;
        }else if(!($("#confirmpasswd").val() === $("#passwd").val())) {
            alert("Passwords donot match");
            return;
        }
 
        $.post("password.php", {passwd: password},
               function(data, err) {
          alert(data);
        });

    });
});
