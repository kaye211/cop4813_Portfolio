function enter() {
	var firstname = document.getElementById('fname').value;
	var lastname = document.getElementById("lname").value;

		if(document.getElementById('male').checked = true)
		{
			genderSelection = 'male';
		}
		if(document.getElementById('female').checked = true)
		{
			genderSelection = 'female';
		}

	var educationlevel = document.getElementById('education');
	var educationselect = education.options[education.selectedIndex].value;
	var food = document.getElementById("food").value;
	var music = document.getElementById("music").value;
	var movie = document.getElementById("movie").value;
	var powerlvl = document.querySelectorAll('.checkbox');

	errorcheck(firstname,lastname,educationlevel,educationselect,food,music,movie,powerlvl);
}

function errorcheck(firstname,lastname,educationlevel,educationselect,food,music,movie,powerlvl) {
	if(firstname == "" || lastname == "" || educationselect == "default" || food == "" || music == "" || movie =="") {
		alert("Please enter valid information.");
	} else {
		if (powerlvl) {
			alert('Thank you '+firstname+' for all that information! Wait... YOUR POWER LEVEL IS OVER 9000!?!');
		}
		else {
			alert('Thank you '+firstname+' for all that information!');
		}
	}
} 