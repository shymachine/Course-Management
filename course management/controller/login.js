$(document).ready(function() {
    $("#login_form").submit(function(){
	var usrName = $("#name").val();
	var passWord = $("#passwd").val();
        $.post("../model/login_model.php", {'username': usrName, 'password': passWord});
    });
});
