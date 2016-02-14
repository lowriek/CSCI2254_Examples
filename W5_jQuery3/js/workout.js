$(document).ready(function() {
  $('#logworkout').click(function () {
  
  	var workoutdate = $('#newworkoutdate').val();
  	var newworkoutdescription = $('#newworkoutdescription').val();
  	
  	var newworkouttype = $('#Strength').is(':checked') ? " Strength " : "";
  	newworkouttype    += $('#Flexibility').is(':checked') ? " Flexibility" : "";
	newworkouttype    += $('#Cardio').is(':checked') ? " Cardio" : "";
							
  	var newworkoutduration = $('#newworkoutduration').val();
  	
  	$("#workouttable tr:last").after('<tr><td class="time">' + workoutdate + '</td>' + 
  							     '<td class="description">' + newworkoutdescription + '</td>' + 
  							     '<td ="type">' + newworkouttype + '</td>'+
  							     '<td class="duration">' + newworkoutduration + '</td></tr>');
  	});
  } );
