<?php
function get_url($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}    
    // Go to the meetup.com account page to see member id.
    $id = "8473295";
    // Go to http://www.meetup.com/meetup_api/key/ for your API key
    $key = "33505274b224c38287a213473374a27";
    $url = "https://api.meetup.com/2/member/$id?key=$key";
    echo get_url($url);
  

