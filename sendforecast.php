# Update code on lines 5, 8, and 18!
# I use sleep() in the code because sometimes the texts I receive are missing data. Figured it just needs more time to get it.
<?php
	// sms email addresses. they're specific to your cell phone carrier so you'll have to check on their website on how to format your email
	$mail_to = "8885551234@yourphonecarrier.com";

	// get current forecast
	$json_string = file_get_contents("http://api.wunderground.com/api/yourapi/forecast/q/VA/23464.json");
	sleep(15); 
	$fc = json_decode($json_string, true); // textual forecast
	$w_now = $fc['forecast']['txt_forecast']['forecastday'][0]['fcttext']; 

	// the high and low for today if you need them:
	// $high = $fc['forecast']['simpleforecast']['forecastday'][0]['high']['fahrenheit'];
	// $low = $fc['forecast']['simpleforecast']['forecastday'][0]['low']['fahrenheit'];

	// get current temperature. api url above does not include actual current temp
	$json_string2 = file_get_contents("http://api.wunderground.com/api/yourapi/geolookup/conditions/q/VA/23464.json");
	sleep(15);
	$curr_tmp = json_decode($json_string2)->{'current_observation'}->{'temp_f'};

	// create message (remember sms has a character limit)
	$message = round($curr_tmp) . "F. " . $w_now;

	// send email
	mail($mail_to, '', $message);
?>
