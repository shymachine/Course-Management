$(document).ready(function() {
    $("#btn").click(function() {
        if($("#unitid").val() == "") {
            alert("Enter unit Id");
            return false;
        }

        if($("#studentId").val() == "") {
            alert("Enter student Id");
            return false;
        }
    });
});
