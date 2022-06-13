$(document).ready(function() {
    $("#unitlist").Tabledit({
        editButton: true,
        deleteButton: true,
        url:'editcourselist_action.php',
        columns:{
            identifier:[0, 'id'],
            editable:[[3, 'coordinator'], [4, 'semester']]
        }
    });

    $("#addunit").submit(function() {
        var unitcode = $("#unitCode").val();
        
        if($("#unitCode").val() == '') {
            alert("Unit Code is required");
            return false;
        }

        var unitname = $("#unitName").val();

        if($("#unitName").val() == '') {
            alert("Unit Name is required");
            return false;
        }

       var coordinator = $("#coordinator").val();

       if($("#coordinator").val() == '') {
           alert("Coordinator is required");
           return false;
       }

       var semester = $("#semester").val();
       if($("#semester").val() == '') {
           alert("Semester is required");
           return false;
       }

       $.post("addunittodatabase.php", {unitcode: unitcode, unitname: unitname, coordinator: coordinator, semester: semester}, function(data,err) {
             alert(data);
       });

    });
});
