$(document).ready(function() {
    $("#unitdetail").submit(function() {
        if($("#courselist").find(":selected").val() === "Info") {
            alert("Select Course");
            return false;
        }

        if($("#course").find(":selected").val() === "Info") {
            alert("Select Unit");
            return false;
        }
    });

    $("#enrolform").submit(function() {
        var unitCode = $("#unitCode").val();
        var unitName = $("#unitName").val();
        
        $.post("enrolUnit.php", {unitcode: unitCode, unitname: unitName},
               function(data, err) {
               alert(data);
         });
    });
}); 
