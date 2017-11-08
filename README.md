# weatherSMS

Greetings. The purpose of this app is to familiarize myself with using API's. I've always known of how they work but I've never actually used one. This is a simple experimental app that is created to text myself the current forecast at 7:00 AM every weekday. Didn't spend a large amount of time on it but it works. 

Feel free to use this application however you want. It will require a few things:
- Basic linux and PHP knowledge
- A hosting server that supports PHP
- A hosting server that allows you to set up cronjobs
- Sign up for Weather Underground's API at https://www.wunderground.com/weather/api. It is free.
- Update code on lines 5, 8, and 18 in sendforecast.php
- At this point, you can test out the scripts by running "php sendforecast.php". More than likely, you can comment out the sleep() functions so you don't wait forever.
- If using your own nix based server, set up a mail server. I decided to use SSMTP on my raspberry pi. http://www.algissalys.com/network-security/send-email-from-raspberry-pi-command-line
- Add a cronjob for automated emails. Mine are sent every weekday morning at 7:00AM. 
- Example of my crontab:

```
MAILTO=""
0 7 * * 1-5 php /path/to/your/sendforecast.php
```
That's it! I'm always open to suggestions and ways to improve.
 
