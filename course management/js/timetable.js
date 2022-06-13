$(document).ready(function() {
    $("#timetable1").Tabledit({
        editButton: true,
        deleteButton: true,
        url:'timetable_action.php',
        columns: {
            identifier:[0, 'id'],
            editable: [[1, 'Nine_Eleven'], [2, 'Eleven_One'], [3, 'One_Three'], [4, 'Three_Five']]
        }
    });
});
