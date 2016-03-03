function calculateBMI(){
		
		var weight = Number(document.bmicalculator.weight.value);
		var feet   = Number(document.bmicalculator.feet.value);
		var inches = Number(document.bmicalculator.inches.value);
		var height = feet * 12 + inches;

		bmi = weight / (height * height) * 703;
		
		if (bmi < 18.5) {
			alert("Your BMI is " + bmi + " You are underweight");
		} else if (bmi < 25) {
			alert("Your BMI is " + bmi + " You are normal weight");
		} else if (bmi < 30) {
			alert("Your BMI is " + bmi + " You are over weight");
		} else if (bmi < 40) {
			alert("Your BMI is " + bmi + " You are obese");
		} else {
			alert("Your BMI is " + bmi + " You are morbidly obese");
		}
		return false;
	}
