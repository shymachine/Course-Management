//$.ajaxSetup({
  //  cache: false
//});

$(document).ready(function() {
    $(function() {
        $.get("../model/units_model.php",function(data, status) {
	    //Make the table header
	    var tableStr = '<thead><tr><th>Unit Code</th><th>Unit Name</th><th>Coordinator</th><th>Semester</th><th>Campus</th><th>Description</th></tr></thead><tbody>';
	    const obj = JSON.parse(data);
	    
	    obj.forEach(row => {
		tableStr += '<tr>';
                for(const prop in row){
		    if(row.hasOwnProperty(prop)) {
		        tableStr += '<td>';
			tableStr += row[prop];
			tableStr += '</td>';
		    }
		}
		tableStr += '</tr>';
	    });
	    tableStr += '</tbody>';
	    $("#unitlist").append(tableStr);
	});
    });

});
