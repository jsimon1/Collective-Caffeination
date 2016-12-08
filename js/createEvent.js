$(document).ready(function() {
	$(document).ready(function() {
        $('select').material_select();
        $("#startT").change(function() {
        var val = $(this).val();
        if (val == "AM") {
            $("#hour1").html("<option value = '0' disabled selected>What time is your event starting?</option><option value = '9'>9</option><option value = '10'>10</option><option value = '11'>11</option><option value = '12'>12</option>");
        } else if (val == "PM") {
            $("#hour1").html("<option value = '0' disabled selected>What time is your event starting?</option><option value = '12'>12</option><option value = '1'>1</option><option value = '2'>2</option><option value = '3'>3</option><option value = '4'>4</option><option value = '5'>5</option><option value = '6'>6</option>");
        }
    });

    $("#endT").change(function() {
        var val = $(this).val();
        if (val == "AM") {
            $("#hour2").html("<option value = '0' disabled selected>What time is your event starting?</option><option value = '9'>9</option><option value = '10'>10</option><option value = '11'>11</option><option value = '12'>12</option>");
        } else if (val == "PM") {
            $("#hour2").html("<option value = '0' disabled selected>What time is your event starting?</option><option value = '12'>12</option><option value = '1'>1</option><option value = '2'>2</option><option value = '3'>3</option><option value = '4'>4</option><option value = '5'>5</option><option value = '6'>6</option>");
        }
    });
    });
});
$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
});
function validateForm(){
	//Testing to make sure a location and number of people are selected
	var userLoc = document.forms["createEvent"]["loc"].value;
	if(userLoc == ""){
		alert("Please select a location for your event");
		return false;
	}
	var userCapac = document.forms["createEvent"]["capacity"].value;
	if(userCapac == ""){
		alert("Please select how many people can go to your event");
		return false;
	}

	//Testing to make sure date is valid
	var userDate = document.forms["createEvent"]["uDate"].value;
	if(userDate==""){
		alert("Please select a date for your event");
		return false;
	}
	var firstSpace = userDate.indexOf(" ");
	var comma = userDate.indexOf(",");
	var month = userDate.substring(firstSpace, comma);
	var day = userDate.substring(0,firstSpace);
	var year = userDate.substring(comma+2);
	var curr = new Date();
	var currDate = curr.getDate();
	var error = false;
	//Testing yearYear()){
	if(year<curr.getFullYear()){
		error = true;
	}
	else if(year==curr.getFullYear()){
		if(month=="January"&&curr.getMonth()==0){ //Testing all months in same year and then the date if month is equal to current month
			if(currDate>day){
				error=true;
			}
		}
		if((month=="February"&&curr.getMonth()>1)||(month=="February"&&curr.getMonth()==1&&currDate>day)){
			error=true;
		}
		if((month=="March"&&curr.getMonth()>2)||(month=="March"&&curr.getMonth()==2&&currDate>day)){
			error=true;
		}
		if((month=="April"&&curr.getMonth()>3)||(month=="April"&&curr.getMonth()==3&&currDate>day)){
			error=true;
		}
		if((month=="May"&&curr.getMonth()>4)||(month=="May"&&curr.getMonth()==4&&currDate>day)){
			error=true;
		}
		if((month=="June"&&curr.getMonth()>5)||(month=="February"&&curr.getMonth()==5&&currDate>day)){
			error=true;
		}
		if((month=="July"&&curr.getMonth()>6)||(month=="July"&&curr.getMonth()==6&&currDate>day)){
			error=true;
		}
		if((month=="August"&&curr.getMonth()>7)||(month=="August"&&curr.getMonth()==7&&currDate>day)){
			error=true;
		}
		if((month=="September"&&curr.getMonth()>8)||(month=="September"&&curr.getMonth()==8&&currDate>day)){
			error=true;
		}
		if((month=="October"&&curr.getMonth()>9)||(month=="October"&&curr.getMonth()==9&&currDate>day)){
			error=true;
		}
		if((month=="November"&&curr.getMonth()>10)||(month=="November"&&curr.getMonth()==10&&currDate>day)){
			error=true;
		}
		if(month=="December"&&curr.getMonth()==11){
			if(currDate>day){
				error=true;
			}
		}
	}

	if(error){
		alert("Please choose a valid day");
		return false;
	}

	//Testing to make sure time inputs are logical
	var userStart = document.forms["createEvent"]["startT"];
	userStart = userStart.options[userStart.selectedIndex].value;
	var userEnd = document.forms["createEvent"]["endT"];
	userEnd = userEnd.options[userEnd.selectedIndex].value;
	var userHour1 = document.forms["createEvent"]["hour1"];
	userHour1 = userHour1.options[userHour1.selectedIndex].value;
	var userHour2 = document.forms["createEvent"]["hour2"];
	userHour2 = userHour2.options[userHour2.selectedIndex].value;
	if(userStart=="PM"&&userEnd=="AM"){
		alert("Please make sure your times are correct");
		return false;
	}
	
	if(userStart==userEnd){
		if(userHour1>userHour2){
			alert("Please make sure your times are correct");
			return false;
		}
	}
	
	return true;
}