$(document).ready( function() {

	$( "#enteredname" ).focus( function() { 
		$( "#nameerror" ).css('color', 'green');
		$( "#nameerror" ).text( "This is where you enter your name." );
	});
	
	$( "#enteredname" ).blur( function() { 
		var tomatch = /^\w{2,}$/;
		if ( !tomatch.test( $( "#enteredname" ).val() ) ) {
			$( "#nameerror" ).css('color', 'red');
			$( "#nameerror" ).text( "Your name is too short!");
		} else {
			$("#nameerror").text("" );
		}
	});
	
	
	$("#OK").click(function(){
		var myname  = "My name is " + $("#enteredname").val();
		var myclass = ".  I am a "  +  $('input[name=gradyear]').val();
		var mylanguages;
	
		mylanguages = $('#knowsJava').is(':checked') ? 
							$("#knowsJava").val() : "";
		mylanguages = $('#knowsHTML').is(':checked') ? 
							mylanguages ? mylanguages + ", " + $("#knowsHTML").val() : 
							$("#knowsHTML").val()  : 
							mylanguages;
		mylanguages = $('#knowsJQ').is(':checked') ? 
							mylanguages ? mylanguages + " and " + $("#knowsJQ").val() : 
							$("#knowsJQ").val()  : 
							mylanguages;
		mylanguages = mylanguages ? ".  I know " + mylanguages : ".  I know nothing";
		
		var myactivity = ".  I like to " + $('#myactivity').val();

		$("#allaboutyou").text( myname
								+ myclass
								+ mylanguages 
								+ myactivity);
	});
});