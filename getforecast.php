# This file uses the weather underground API to fetch the current forecast and outputs it. Example output:
# 
# GM Human! Current temp is 71F. Forecast: mostly cloudy. Highs in the mid 80s.
# 
# The weather underground API can be found at https://www.wunderground.com/weather/api/
# Update API url on lines 9 and 13 with yours

<?php
	$json_string = file_get_contents("http://api.wunderground.com/api/YOUR_API_HERE/forecast/q/VA/23464.json"); // forecast query
	$fc = json_decode($json_string, true); 
	$w_now = $fc['forecast']['txt_forecast']['forecastday'][0]['fcttext']; 	// current forecast
  
	$json_string2 = file_get_contents("http://api.wunderground.com/api/YOUR_API_HERE/geolookup/conditions/q/VA/23464.json"); // conditions query
	$curr_tmp = json_decode($json_string2)->{'current_observation'}->{'temp_f'};	// current temperature in F

	// message to generate
	echo "GM Human! Current temp is " . round($curr_tmp) . "F. Forecast: " . lcfirst($w_now);
?>
