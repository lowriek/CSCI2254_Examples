$(document).ready(function() {

  $('#logworkout').click(function () {
  
  	var workoutstats = new Array();
  	workoutstats = workouttotals();
  	
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

    $('#workouttimes').text(++workoutstats[1]);
    $('#workoutminutes').text(workoutstats[0] + parseInt(newworkoutduration));
  });
  
  function workouttotals(){
  	var totalminutes = 0;
 	var count = 0;
 	
  	$('.duration').each(function() {
  		var cminutes = $(this).text();
  		totalminutes += parseInt(cminutes);
  		count ++;
  	});
  	return ([totalminutes, count]);
  }
});
