$(document).ready(function() {
   $("#usertable").Tabledit({
       editButton: true,
       deleteButton: true,
       url:'changerole_action.php',
       columns: {
           identifier:[0, 'userid'],
           editable:[[1, 'role']]
       }
   }); 
});
