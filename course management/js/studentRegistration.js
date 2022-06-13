$(document).ready(function() {
        $("#studentRegisForm").submit(function() {
        var studentid = $("#studentId").val();
        if($("#studentId").val() == ""){
            alert("Student Id mandatory, please enter student Id");
            return;
         }
   
         var firstName = $("#fname").val();
         if($("#fname").val() == "") { 
             alert("First name is mandatory, please enter first name");
             return; 
         }
       
        var lastName = $("#lname").val();
        if($("#lname").val() == "") { 
            alert("Last name is mandatory, please enter last name");
            return;
        }

        var passWord = $("#passwd").val();
        if(($("#passwd").val() == "") || ($("#passwd").val().length < 6) || ($("#passwd").val().length > 12) || (!$("#passwd").val().match(/[A-z]/)) || (!$("#passwd").val().match(/[A-z]/)) || (!$("#passwd").val().match(/\d/)) || (!$("#passwd").val().match(/[!@#$%\^&*(){}[\]<>?/|\-]/))) { 
            alert("Password must be greater than 6 character and less than 12 characters.It must contain one lower case, one upper case, one numeric and one special character");
            return;
        }

        if($("#confirmpasswd").val() == "") {
            alert("Please re-type the password");
            return;
        }else if(!($("#confirmpasswd").val() === $("#passwd").val())) {
            alert($("#confirmpasswd").val());
            alert($("#passwd").val()); 
            alert("Passwords donot match");
            return;
        }

        var Email = $("#email").val();
        if($("#email").val() == "") {
            alert("Email Address is mandatory, please enter valid email address");
            return;
        }else { 
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!regex.test($("#email").val())) { 
                alert("Please enter valid email address");
                return;
            }
        }
        $("#studentRegisForm")[0].reset();
        
        if($("#dob").val() == "") {
            var DOB = null;
        } else {
            var DOB = $("#dob").val();
        }
        if($("#phonenumber").val() == "") {
            var phoneNumber = null;
        } else {
            var phoneNumber = $("#phonenumber").val();
        }
        if ($("#address").val() == "" ) {
            var Address = null;
        } else {
            var Address = $("#address").val();
        }
 
        $.post("addStudentToDatabase.php", {studentId: studentid, fname: firstName, lname: lastName, email: Email, passwd: passWord, dob: DOB, phonenumber: phoneNumber, address: Address},
               function(data, err) {
               alert(data);
        });

    });
});
