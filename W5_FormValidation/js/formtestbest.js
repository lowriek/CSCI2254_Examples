	function setmeup(){
		var named = document.getElementById("enteredname");
		named.onblur = validatename;   // when you lose focus
		named.onfocus = namecue;
	}
	
	function namecue(){
		writetoelement("nameerror",
						"This is where you enter your name",
						"green");
	}
	
	function displaydata(){
		var namevalid = validatename();
		var activityvalid = validateactivity();
		var languagevalid = validatelanguages();
		var gradyearvalid = validategradyear();
		
		if (!namevalid || !activityvalid || !languagevalid || !gradyearvalid){
			writetoelement("allaboutyou", 
					"Please enter your name and activity, and select a grad year", "purple");
			return false;
		}
		var str = displayname() + "<br>" + displayactivity() + "<br>";
		str += displaylanguages() + "<br>";
		str += displaygradyear() + "<br>";
		str += displaycomments() + "<br>";
		writetoelement("allaboutyou", str, "purple");
		return false;
	}
	function validatename(){
		var named = document.getElementById("enteredname");
		var nameent = named.value;
		var tomatch = /^\w{2,}$/;
		if (!tomatch.test(nameent)) {
			writetoelement("nameerror",
						"Hey, you know, your name should be longer than that!",
						"red");
			return false;
		}
		writetoelement("nameerror","","red");
		return true;
	}
		
	function displayactivity(){
		var activityselected=document.forms["mytestform"].activity.value;
		return "You like to " + activityselected;
	}
	
	function displayname(){
		var named = document.getElementById("enteredname");
		return "Your name is " + named.value;
	}
	function validateactivity(){
		var a=document.getElementById("myactivity");
		if (a.selectedIndex == 0){
			writetoelement("activityreport",
						"Please select an activity",
						"red");
			return false;
		}
		writetoelement("activityreport",
						"",
						"red");
		return true;
	}
	function validatelanguages(){
		var languages=["knowsJava", "knowsPHP", "knowsHTML"];
	
		for(var i=0;i<languages.length;i++){
			if(document.getElementById(languages[i]).checked){ 
				writetoelement("languagereport",
						"",
						"green");	
				return true;
			}
		}
		writetoelement("languagereport",
						"Please select at least one language ",
						"green");
		return false;
	}

	function displaylanguages(){
		var languagesknown1=document.forms["mytestform"].knowsJava;
		var languagesknown2=document.forms["mytestform"].knowsC;
		var languagesknown3=document.forms["mytestform"].knowsPHP;
		var languagelist="";
		
		if (languagesknown1.checked)
			languagelist= languagesknown1.value;

		if (languagesknown2.checked)
			if (languagelist)
				languagelist += ", " + languagesknown2.value;
			else
				languagelist= languagesknown2.value;
		
		if (languagesknown3.checked)
			if (languagelist)
				languagelist += ", " + languagesknown3.value;
			else
				languagelist= languagesknown3.value;
			
		if (!languagelist) languagelist = "None";
		
			
		return "Your languages are: " + languagelist;
	}
	
	function displaygradyear(){
		var gradyear = document.forms["mytestform"].gradyear;
		var gradyearlength = gradyear.length;
		var calyear = 2014;		
		for (var i=0; i < gradyearlength; i++){
			if (gradyear[i].checked) {
				calyear = calyear + i;
				return "Your grad year is " + calyear;
			}
		}
		return "";
	}
	
	function validategradyear(){
		var gradyear = document.forms["mytestform"].gradyear;
		var gradyearlength = gradyear.length;
				
		for (var i=0; i < gradyearlength; i++){
			if (gradyear[i].checked) {
				return true;
			}
		}
		return false;
	}
	
	function displaycomments(){
		var comments = document.forms["mytestform"].comments.value;
		if (comments)
			return "Your comments are " + comments ;
		else
			return "No comments!";
	}
	
	function writetoelement(elementname, message, color){
		var resultloc=document.getElementById(elementname);
		resultloc.style.color = color;
		resultloc.innerHTML =  message;
    }