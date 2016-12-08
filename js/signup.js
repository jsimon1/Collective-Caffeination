function validateForm(){
	//Begin by validating all necessary parts of the form have been filled out
	var userfName = document.forms["signup"]["first_name"].value;
	var userlName = document.forms["signup"]["last_name"].value;
	var userfb = document.forms["signup"]["fb_link"].value;
	var useremail = document.forms["signup"]["rpi_email"].value;

	if(userfName==""){
		alert("Please enter your first name");
		return false;
	}
	if(userlName==""){
		alert("Please enter your last name");
		return false;
	}
	if(userfb==""){
		alert("Please enter your Facebook link");
		return false;
	}
	if(useremail==""||useremail.indexOf("@rpi.edu")==-1){
		alert("Please enter a valid RPI-Email address");
		return false;
	}
	if(password==""||password.length()<6){
		alert("Please enter a valid password with at least 6 characters");
	}
	return true;
}