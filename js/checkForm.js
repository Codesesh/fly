function checkFullName() { // Checks to see if the user has entered their name into the textbox
	var fullName = document.getElementById("fullName").value;
	if (fullName == "") {
		document.getElementById("fullNameError").innerHTML = "Please enter your full name";
		return false;
	} else {
		document.getElementById("fullNameError").innerHTML = "";
		return true;
	}
}

function checkPhoneNumber() { // Checks to see if the phonenumber textbox is empty, also checks to make sure that only numbers are entered
	
	var regExp = /[0-9]$/;
	var phoneNumber = document.getElementById("phoneNumber").value;

	if (phoneNumber.match(regExp)) {
		document.getElementById("phoneNumberError").innerHTML = "";
		return true;
	} else if (phoneNumber == "") {
		document.getElementById("phoneNumberError").innerHTML = "Field is empty, please enter phone number";
		return false;
	} else {
	 	document.getElementById("phoneNumberError").innerHTML = "Please enter a valid phone number";
	 	return false;
	}
	

}

function checkEmail() { // Checks to see if the email is empty, also checks the email value against a regular expression to make sure it is a valid email address

	var regExp = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])$/;
	var email = document.getElementById("email").value;
	
	if (email.match(regExp)) {
		document.getElementById("emailError").innerHTML = "";
		return true;
	} else if (email == "") {
		document.getElementById("emailError").innerHTML = "Field is empty, please enter your email address";
		return false;
	} else {
	 	document.getElementById("emailError").innerHTML = "Please enter a valid email address";
	 	return false;
	}

}

function checkMessage() { // Checks to see if the message texterea is empty.
	var msg = document.getElementById("msg").value;
	if (msg == "") {
		document.getElementById("messageError").innerHTML = "Please enter a message";
		return false;
	} else {
		document.getElementById("messageError").innerHTML = "";
		return true;
	}
}

// This functions below are being used on the booking.html page

function checkCountry() { // Checks to see if the country textbox is empty
	var msg = document.getElementById("country").value;
	if (msg == "") {
		document.getElementById("countryError").innerHTML = "Please enter where you are from";
		return false;

	} else {
		document.getElementById("countryError").innerHTML = "";
		return true;
	}
}

function checkPeople() { // Checks to see if the the user has chosen a value from the drop box
	var people = document.getElementById("people").value;
	if (people == "pleaseselect") {
		document.getElementById("peopleError").innerHTML = "Please choose the amount of people that will be travelling";
		return false;
	} else {
		document.getElementById("peopleError").innerHTML = "";
		return true;
	}
}

function checkHours() { // Checks to see if the the user has chosen a value from the drop box
	var hours = document.getElementById("hours").value;
	if (hours == "pleaseselect") {
		document.getElementById("hoursError").innerHTML = "Please select how many hours you would like";
		return false;
	} else {
		document.getElementById("hoursError").innerHTML = "";
		return true;
	}
}

function getTour() { // Checks to see if the the user has chosen a value from the drop box
	var tour = document.getElementById("tour").value;
	if (tour == "pleaseselect") {
		document.getElementById("tourError").innerHTML = "Please which tour/flight you would like";
		return false;
	} else {
		document.getElementById("tourError").innerHTML = "";
		return true;
	}
	
}

function totalPrice() { // Gets the value of what tour the user chooses, how many passengers and hours they want then multiplys them all to get the total price
	var tour = document.getElementById("tour").value;
	var people = document.getElementById("people").value;
	var hours = document.getElementById("hours").value;

	var totalCost = parseInt(tour) * parseInt(people) * parseInt(hours);


	if (tour != "pleaseselect") {
		if (people != "pleaseselect") {
			if (hours != "pleaseselect") {
				document.getElementById("total_price").style.color = "green";
				document.getElementById("total_price").style.fontWeight = "bold";
				document.getElementById("total_price").style.fontSize = "20px";
				document.getElementById("total_price").innerHTML = "$" + totalCost.toFixed(2);
			}
		}
	}
	
}


function checkCharter() { // If the "Charter/custom" flight value is chosen out of the drop down box it will hide the people and hours drop down box.
	var tour = document.getElementById("tour").value;
	var hours = document.getElementById("hours").value;

	if (tour == "charter") {
		document.getElementById("second_options").style.display = "none";
	} else {
		document.getElementById("second_options").style.display = "block";
	}
}

function resetTotal() { // Resets the total price field if the "reset" button is clicked
	document.getElementById("total_price").innerHTML = "";
}


function checkBookingPageForm() { // Validates the entire booking.html form and it sends the user to send.html if all the fields are valid
	if (checkFullName() & checkPhoneNumber() & checkEmail() & checkCountry() & getTour() & checkPeople() & checkHours() & checkMessage()) {
		return true;
	}
return false;
}



function checkContactPageForm() { // Validates the entire contact.html form and it sends the user to send.html if all the fields are valid
	if (checkPhoneNumber() & checkFullName() & checkPhoneNumber() & checkEmail() & checkMessage()) {
		window.location.href="send.html";
		return true;
	}
return false;
}	



// The functions below are another way of validating the forms on the 2x pages I have. I am just commenting them out below so I can reference them later if needed.


// The function below validates the entire form on the contact.html page

// function checkForm() {
// 	if (checkFullName()) {
// 		if (checkPhoneNumber()) {
// 			if (checkEmail()) {
// 				if (checkMessage()) {
// 					return true;
// 				}
// 			}
// 		}
// 	} 
// return false;
// }

// // The function below validates the entire form on the booking.html page

// function checkForm2() {
	
// 	if (checkFullName()) {
// 		if (checkPhoneNumber()) {
// 			if (checkEmail()) {
// 				if (checkCountry()) {
// 					if (getTour()) {
// 						if (checkPeople()) {
// 							if (checkHours()) {
// 								if (checkMessage()) {
// 									return true;
// 								}
// 							}
// 						}
// 					}
// 				}
// 			}
// 		}
// 	}
// 	return false;
// }





