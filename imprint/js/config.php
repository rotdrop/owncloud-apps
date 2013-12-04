<?php
// Trick the CSP in order to configure js variables and stuff from PHP code

// Set the content type to Javascript
header("Content-type: text/javascript");

// Disallow caching
header("Cache-Control: no-cache, must-revalidate"); 
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 

$language = OCP\Config::getUserValue(OCP\User::getUser(), 'core', 'lang', 'en');

$array = array(
  "IMPRINT.language" => "'".$language."'",
  );

// Echo it
foreach ($array as  $setting => $value) {
	echo($setting ."=".$value.";\n");
}

print <<< __EOT__
$(document).ready(function() {
});
__EOT__

?>
