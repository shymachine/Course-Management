$(document).ready(function() {
    $("#submit").click(function() {

        var staffid = $("#staffId").val();
        if($("#staffId").val() == ""){
            alert("Staff Id mandatory, please enter student Id");
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

       var Phonenumber = $("#phonenumber").val();
       if($("#phonenumber").val() == "") { 
           alert("Phone number is mandatory, please enter phone number");
           return;
       }
      
       var Degree = $("#degree").find(":selected").val(); 
       if($("#degree").find(":selected").val() == "Highest Degree") {
           alert("Please select highest degree");
           return;
       }

       var spec = $("#specialization").find(":selected").val();
       if($("#specialization").find(":selected").val() == "Specialization") {
           alert("Please select specialization");
           return;
       } 

       $.post("addStaffToDatabase.php", {staffId: staffid, fname: firstName, lname: lastName, passwd: password, email: Email,phonenumber: Phonenumber, degree: Degree, specialization: spec}, function(data, err) {
           alert(data);
      });
       $("#staffRegisForm")[0].reset();
     });
});
