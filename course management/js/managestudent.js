$(document).ready(function() {
    $('#studenttable').Tabledit({
        editButton: true,
        deleteButton: true,
        url:'managestudent_action.php',
        columns:{
           identifier:[0, 'student_id'],
           editable:[[3, 'email_address']]
        },
        restoreButton:false,
        onSuccess:function(data, textStatus, jqXHR)
        {	
            if(data.action == 'delete')
            {
                $('#'+data.id).remove();
            }
        }
    });
});
