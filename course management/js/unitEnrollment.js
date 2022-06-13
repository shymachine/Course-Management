$(document).ready(function() {
    $("#enrol").click(function() {
        if($("#unitid").val() != "KIT501") {
            alert("Please enter KIT501 in unit id");
            return;
        }

        if($("#studentId").val() == "") {
            alert("Please enter valid student Id");
            return;
        }
       
        $("#display").append("Enrollment is successful");
    });
});
