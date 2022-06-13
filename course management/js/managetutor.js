$(document).ready(function() {
    $('#addtutor').submit(function() {
        var staffId = $('#staffid').val();
        var firstName = $('#fname').val();
        var lastName = $('#lname').val();
        var unitCode = $('#unitcode').val();
        var unitName = $('#unitname').val();
        var Campus = $('#campus').val();

        if($('#staffid').val() == '') {
            alert("Staff Id required");
            return false;
        }

        if($('#fname').val() == '') {
            alert("First Name required");
            return false;
        }

        if($('#lname').val() == '') {
           alert("Last Name required");
           return false;
        }

        if($('#unitcode').val() == '') {
            alert("Unit code is required");
            return false;
        }

        if($('#unitname').val() == '') {
            alert("Unit name is required");
            return false;
        }

       if($('#campus').val() == '') {
           alert("Campus name is required");
           return false;
       }

        $.post("addTutor.php", {staffid: staffId, fname: firstName, lname: lastName, unitcode: unitCode, unitname: unitName, campus: Campus},
              function(data, err) {
            alert(data);
        });
    });
});
