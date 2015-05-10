<?php 
// Define variables

$fullname = "";
$phoneNumber = "";
$email = "";
$country = "";
$tour = "";
$peopleTravelling = "";
$hours = "";
$message = "";

// Define error variables
$fullnameError = "";
$phonenumberError = "";
$emailError = "";
$countryError = "";
$tourError = "";
$peopleError = "";
$hoursError = "";
$messageError = "";

// When the submit button is press do this

if (isset($_POST['submit'])) {
	$fullname = trim($_POST['fullname']);
	$phoneNumber = trim($_POST['phone']);
	$email = trim($_POST['email']);
	$country = trim($_POST['country']);
	$tour = $_POST['tour'];
	$peopleTravelling = $_POST['people'];
	$hours = $_POST['hours'];
	$message = trim($_POST['message']);


	function checkFullname($fullname){
		global $fullnameError;
		if (empty($fullname)) {
			$fullnameError = "Please enter your full name";
			return false;
		} else {
			$fullnameError = "Fullname allgood";
			return true;
		}
	}

	function checkPhoneNumber($phoneNumber){
		global $phonenumberError;
		if (empty($phoneNumber)) {
			$phonenumberError = "Phone number is empty";
			return false;
		} else if(!preg_match("/^[0-9]+$/", $phoneNumber)) {
			$phonenumberError = "Please enter a valid phone number";
			return false;
		}

		$phonenumberError = "Phone Number Allgood";
			return true;
	}

	function checkEmail($email) {
		global $emailError;
		if (empty($email)) {
			$emailError = "Email is empty";
			return false;
			
		} else if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$email)) {
				$emailError = "Email is invalid";
				return false;
		}

		$emailError = "Email Allgood";
		return true;
		
	}

	function checkCountry($country){
		global $countryError;
		if (empty($country)) {
			$countryError = "Please enter a country";
			return false;
		}
		$countryError = "Country Allgood";
		return true;
	}

	function checkTour($tour){
		global $tourError;
		if ($tour === "pleaseselect") {
			$tourError = "Please choose an option from the drop down list";
			return false;
		}
		$tourError = "Nice!";
		return true;
	}

	function checkPeople($peopleTravelling){
		global $peopleError;
		if ($peopleTravelling === "pleaseselect") {
			$peopleError = "Please choose an option from the drop down list";
			return false;
		}
		$peopleError = "Well done!";
		return true;
	}

	function checkHours($hours){
		global $hoursError;
		if ($hours === "pleaseselect") {
			$hoursError = "Please choose an option from the drop down list";
			return false;
		}
		$hoursError = "Well done!";
		return true;
	}

	function checkMessage($message){
		global $messageError;
		if (empty($message)) {
			$messageError = "Please enter a message";
			return false;
		} else {
			$messageError = "Message Allgood";
			return true;
		}
	}
//This function checks all of my functions above to make sure they are all true, if they all are it will send it to the next page, if any of them are false it won't let the user go to the next page until the information they provide in the textbox's etc is valid.
	function checkAll($fullname, $phoneNumber, $email, $country, $tour, $peopleTravelling, $hours, $message){
		if (checkFullname($fullname) & checkPhoneNumber($phoneNumber) & checkEmail($email) & checkCountry($country) & checkTour($tour) & checkPeople($peopleTravelling) & checkHours($hours) & checkMessage($message)) {
			header("Location: send.html");
			return true;
		} else {
			echo "Failed";
			return false;
		}
	}

	checkAll($fullname, $phoneNumber, $email, $country, $tour, $peopleTravelling, $hours, $message);

}
	
	



 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Fly To The Limit - Make a booking!</title>
	<meta charset="UTF-8">
	<meta name="description" content="Book your flight with Fly to the Limit today! Choose from our many options: Scenic, stunt, gliding, helicopter and charter flights">
	<meta name="keywords" content="Book now, Adventure Flights, scenic flights, stunt flights, gliding, helicopter flgihts, charter flights">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	

	<!-- Google fonts below -->
	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
	

</head>
<body>



	<div id="main_container"><!-- This is the main container that containers all the content on the page -->
		<div id="top_bar"><!-- This is the main navigation bar that you seen at the top of each page -->
			<div class="weather_updates">
				<b>Latest weather updates:</b> Wanaka - Sunny - 20 degrees 
			</div>
				<div class="phone_number_container">
						0800 456 456
				</div>
				
				<div class="icon_container">
					<a href="http://www.facebook.com" target="_blank"><img src="img/facebook.png" alt="Facebook"></a>
					<a href="http://www.twitter.com" target="_blank"><img src="img/twitter.png" alt="Twitter"></a>
				</div>
					

		</div>

			<div id="background"></div><!-- This containers the main picture and logo that is seen on the home page -->
				
				<div id="nav"><!-- This is the main navigation bar that you seen at the top of each page -->
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="tours.html">Tours & Prices</a></li>
						<li><a href="pilots.html">Meet our Pilots</a></li>
						<li><a href="gallery.html">Gallery</a></li>
						<li><a href="booking.php" class="current">Book Now!</a></li>
						<li><a href="contact.html">Contact Us</a></li>
					</ul>
				</div>
					
				
							<form id="contact_form" action="booking.php" method="post" onsubmit="return checkBookingPageForm()">
								<h2>Make a booking:</h2>

								<label for="fullName">Full Name:*</label> <input type="text" name="fullname" id="fullName" onblur="checkFullName()" value="<?php echo $fullname;?>">
								
								<span id="fullNameError" class="error"><?php echo $fullnameError; ?></span>

								<label for="phoneNumber">Phone Number:*</label> <input type="text" id="phoneNumber" onblur="checkPhoneNumber()" name="phone" value="<?php echo $phoneNumber; ?>">
								<span id="phoneNumberError" class="error"><?php echo $phonenumberError; ?></span>
							
								<label for="email">Email Address:*</label> <input type="text" id="email" onblur="checkEmail()" name="email" value="<?php echo $email; ?>">
								<span id="emailError" class="error"><?php echo $emailError; ?></span>
								
								<label for="country">Home Country*</label> <input type="text" id="country" onblur="checkCountry()" name="country" value="<?php echo $country; ?>">
								
								<span id="countryError" class="error"><?php echo $countryError; ?></span>
								
								<h2>Tour Details:</h2>

								<label for="tour">Tour:*</label> 
									<select class="tour_options" id="tour" onblur="getTour()" onchange="totalPrice(); checkCharter()" name="tour">
										
										<option value="pleaseselect"<?php echo "selected"; ?>>-- Please Select --</option>
										<optgroup label="Scenic Flights (Depart/return Queenstown airport)">
										<option <?php if($tour=="299") echo 'selected="selected"'; ?>value="299">Queenstown - 1 hour - $299pp</option>
										<option value="399">Franz Josef - 2 hours - $399pp</option>
										<option value="299">Wanaka - 1 hour - $299pp </option>
										</optgroup>
									
										<optgroup label="Scenic Flights (Depart/return Wanaka airport)">
										<option value="299">Wanaka - 1 hour - $299pp </option>
										<option value="299">Queenstown - 1 hour - $299pp</option>
										<option value="399">Franz Josef - 2 hours - $399pp</option>
										</optgroup>
										
										<optgroup label="Gliding Flight (Depart/return Queenstown airport)">
										<option value="1200">Queenstown - 1 hour (3 hours recommended) - $1200pp</option>									
										</optgroup>
										
										<optgroup label="Gliding Flight (Depart/return Wanaka airport)">
										<option value="1200">Wanaka - 1 hour (3 hours recommended) - $1200pp</option>									
										</optgroup>
														
										<optgroup label="Stunt Flying (Depart/return Queenstown airport)">
										<option value="399">Queenstown - 1 hour - $399pp</option>
										</optgroup>
															
										<optgroup label="Stunt Flying (Depart/return Wanaka airport)">
										<option value="399">Wanaka - 1 hour - $399pp</option>
										</optgroup>
										
										<optgroup label="Helicopter Flights (Depart/return Queenstown airport)">
										<option value="399">Queenstown - 1 hour - $399pp</option>
										<option value="399">Wanka - 1 hour - $399pp</option>
										<option value="699">Franz Josef - 1 hour - $699pp</option>									
										</optgroup>
										
										<optgroup label="Helicopter Flights (Depart/return Wanaka airport)">
										<option value="399">Wanka - 1 hour - $399pp</option>
										<option value="399">Queenstown - 1 hour - $399pp</option>
										<option value="699">Franz Josef - 1 hour - $699pp</option>									
										</optgroup>
										
										<optgroup label="Charter & Custom Flights:">
										<option value="charter">Please select this option and send us a detailed message with the details of the trip</option>
										</optgroup>

									</select>

					<div id="second_options">

								<span id="tourError" class="error"><?php echo $tourError; ?></span>
								
								<label for="people">People Travelling?*</label> 
									<select class="tour_options_small" id="people" onblur="checkPeople()" onchange="totalPrice()" name="people">
										<option value="pleaseselect">-- Please Select --</option>
										<option <?php if($peopleTravelling=="1") echo 'selected="selected"'; ?>>1</option>
										<option <?php if($peopleTravelling=="2") echo 'selected="selected"'; ?>>2</option>
										<option <?php if($peopleTravelling=="3") echo 'selected="selected"'; ?>>3</option>
										<option <?php if($peopleTravelling=="4") echo 'selected="selected"'; ?>>4</option>
										<option <?php if($peopleTravelling=="5") echo 'selected="selected"'; ?>>5</option>
										<option <?php if($peopleTravelling=="6") echo 'selected="selected"'; ?>>6</option>
									</select>
								<span id="peopleError" class="error"><?php echo $peopleError; ?></span>
								
								<label for="hours" id="label_hours">How many hours?*</label> 
									<select class="tour_options_small" id="hours" onblur="checkHours()" onchange="totalPrice()" name="hours">
										<option value="pleaseselect">-- Please Select --</option>
										<option <?php if($hours=="1") echo 'selected="selected"'; ?>>1</option>
										<option <?php if($hours=="2") echo 'selected="selected"'; ?>>2</option>
										<option <?php if($hours=="3") echo 'selected="selected"'; ?>>3</option>
										<option <?php if($hours=="4") echo 'selected="selected"'; ?>>4</option>
										<option <?php if($hours=="5") echo 'selected="selected"'; ?>>5</option>
										<option <?php if($hours=="6") echo 'selected="selected"'; ?>>6</option>
									</select>
								<span id="hoursError" class="error"><?php echo $hoursError; ?></span>

								<b>Total Cost:</b>
								
								<span id="total_price">Please select an option from each drop down box above to see the total price</span>
					</div>
								
								<br><br>
								
								<label class="message" for="message">Message: (Please provide your preferred pickup date and time below)</label> 
								
								<br><br>
								<textarea id="msg" onblur="checkMessage()" name="message"><?php echo $message; ?></textarea>
								<span id="messageError" class="error2"><?php echo $messageError; ?></span>
								<input type="reset" value="Reset" onclick="resetTotal()"><input type="submit" value="Send" name="submit">

							</form>

					
							<div id="footer"><!-- This is the footer section of the page -->
								<div class="footer_left_col">
									<img src="img/logosmall.png" class="logo_small"><br/>
										<span class="bottom_call">Call Us: 0800 456 456</span>

											<div id="bottom_nav">
												<ul>
													<li class="fb"><a href="#">Like us on Facebook</a></li>
													<li class="twitt"><a href="#">Follow us on Tiwtter</a></li>
												</ul>
											</div>
								</div>
								
								<div class="footer_right_col">
									<div id="bottom_nav_right">
										<ul>
											<li><a href="index.html">Home</a></li>
											<li><a href="tours.html">Tours & Prices</a></li>
											<li><a href="pilots.html">Meet our Pilots</a></li>
											<li><a href="gallery.html">Gallery</a></li>
											<li><a href="booking.html" class="current">Book Now!</a></li>
											<li><a href="contact.html">Contact Us</a></li>
											<li><a href="sitemap.html">Site Map</a></li>
										</ul>
									</div>
								</div>
							</div>

					
	</div>
	<script src="js/checkForm.js"></script>
</body>
</html>