<?php

$t = 1.3557996E+12;
$off = -28800000;
$t = ($t - $off)/1000; // microseconds to seconds

$dt = date(DATE_RSS, $t);
echo $dt;
$date = new DateTime($dt);
    $timezones  = array(
        'GMT' => 'GMT', 
        'CET' => 'CET', 
        'EST' => 'EST', 
        'PST' => 'PST'
    );

    foreach ($timezones as $timezone => $code) {
        $date->setTimezone(new DateTimeZone($code));
        $return[$timezone] = $date->format(DATE_RSS);
    }
var_dump($return);
