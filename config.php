<?php

/* configuration */
// discord
$webhookURL = "https://INSERT YOUR SERVER WEBHOOK URL HERE//"; // open your discord server settings
$botusername = "ketumplang art bot"; // bot display name
$botavatarurl = "https://i.imgur.com/EtwNZlN.jpg"; // bot avatar


// behance
// get the api key https://www.behance.net/dev/apps
// read the documentations https://www.behance.net/dev/api/endpoints/
$behance_key = "INSERT YOUR BEHANCE API KEY HERE";
$fields_ = array("illustration", "character+design", "toy+design");
$warna_ = array("CCF3FC", "23C5EB", "7260F5", "0045BC", "0045BC", "7260F5", "1400A9", "5E00D2", "5E00D2", "D7B9FC", "CF3643", "820813", "A9C75F", "85AD23", "0",);
$fields = array_random($fields_);
$warna = array_random($warna_);
$post = rand(0,40);
/* end config */

?>