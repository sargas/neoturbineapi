<?php

// yay for our header!
// call like cal/bdays.ics (or whatever you want the ics file to be called)
if(preg_match("/ics/",$_SERVER["PATH_INFO"])) header('Content-type: text/calendar');
else header('Content-type: text'); //debug mode

//little helper to avoid a lot of \n's
function o($message) { print $message . "\n"; }

o("BEGIN:VCALENDAR");
o("VERSION:2.0");

// yippi for nt software!!
o("PRODID:-//Neoturbine API//NONSGML Calendaring Solutions For You and Me//EN");

$people = array(
	array("nick" => "sargas",
		"name" => "Joseph Jon Booker",
		"birthday" => "19881108"),
	array("nick" => "linolium",
		"name" => "Joel Isaac Stewart Kitching",
		"birthday" => "19890102")
	);


foreach ($people as $person) {
	o("BEGIN:VEVENT");
	o( "SUMMARY:". $person['name']."'s (".$person['nick'].") Birthday" );
	o( "DESCRIPTION:".$person['name']."'s (".$person['nick'].") Birthday" );
	o( "DTSTART:".$person['birthday'] );
	o( "DTEND:20280119" ); //end of 32-bit time as we know it
	o( "RRULE:FREQ=YEARLY" );
	o("END:VEVENT");
}

//and now, we bid adu
o("END:VCALENDAR");
?>
