$(document).ready(function() {
    $("#lecturerlist").Tabledit({
        editButton: true,
        deleteButton: true,
        url:'managelecture_action.php',
        columns: {
            identifier:[0, 'id'],
            editable:[[3, 'campus'], [4, 'lecturer']]
        }
    });

});
