# File calls getforecast.php, puts output into a file, forecast.txt, and sends an email text specified recipients.
#
# Replace code on lines 6, 11, 12, and 20

<?php
	$forecast = exec('php /path/to/weather/getforecast.php'); // get forecast, store in variable 

	sleep(20); // prevents sending blank forecast, gives it time for $forecast to be populated with data

	// create email
	$email_txt = "To:8884569999@yourcellcarrier.com
From:yourreturnemail@gmail.com

";

	$email_txt = $email_txt . $forecast;
	file_put_contents('forecast.txt', $email_txt); 

	// send forecast
	exec("/usr/sbin/ssmtp 8884569999@yourcellcarrier.com < forecast.txt");
?>
