$(document).ready(function() {
    $('#table11').Tabledit({
        editButton: true,
        deleteButton: true,
        url:'managestaff_action.php',
        columns:{
           identifier:[0, 'staff_id'],
           editable:[[4, 'campus'], [7, 'available_days'], [8, 'available_time']]
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
