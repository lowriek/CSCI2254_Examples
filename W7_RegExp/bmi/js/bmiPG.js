function calculateBMI(){
	
		var weight=Number(document.forms["bmicalculator"].weight.value);
		var feet=Number(document.forms["bmicalculator"].feet.value);
		var inches=Number(document.forms["bmicalculator"].inches.value);
		var height = feet*12 + inches;
		
		var bmi = weight / (height * height) * 703;	
		bmi = Math.round(bmi*100)/100;
		
		var resultloc=document.getElementById("bmiresult");
		var img = document.getElementById("bmiresultimg");
		
		if (isNaN(bmi)) {
			resultloc.innerHTML = "Invalid input, try again!";
			img.src="initial.gif";
			img.name="initial";
		} else if (bmi < 18.5) {
			resultloc.innerHTML = "Your BMI is " + bmi + " You are underweight";
			img.src="underweight.gif";
			img.name="underweight";
		} else if (bmi < 25) {
			resultloc.innerHTML = "Your BMI is " + bmi + " You are normal weight";
			img.src="normalweight.gif";
			img.name="normalweight";
		} else if (bmi < 30) {
			resultloc.innerHTML = "Your BMI is " + bmi + " You are over weight";
			img.src="overweight.gif";
			img.name="overweight";
		} else if (bmi < 40) {
			resultloc.innerHTML = "Your BMI is " + bmi + " You are obese";
			img.src="obese.gif";
			img.name="obese";
		} else {
			resultloc.innerHTML = "Your BMI is " + bmi + " You are morbidly obese";
			img.src="morbidlyobese.gif";
			img.name="morbidlyobese";
		}
		return false;
	}