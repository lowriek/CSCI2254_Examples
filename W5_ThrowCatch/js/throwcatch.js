$(document).ready(function() {

  $('#divide').click(function () {
  	var numerator = $('#numerator').val();
  	var denominator = $('#denominator').val();
  
	var quotient;
	try {
		quotient = doDivide(numerator, denominator);
    } catch (err) {
    	alert(err);
    }
    $('#quotient').text(quotient);
    
  });
  
  function doDivide(n,d){
  	if (isNaN(n)) {
  		throw "Bad Numerator";
  	}
  	if (isNaN(d)) {
  		throw "Bad Denominator";
  	}
  	var quot = n/d;
  	if (quot == Infinity || quot == -Infinity) {
  		throw "Overflow";
  	}
  	return quot;
  }
  
});
