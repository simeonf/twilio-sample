<?php
    require("./url.php");
    // Go to the meetup.com account page to see member id.
    $id = "8473295";
    // Go to http://www.meetup.com/meetup_api/key/ for your API key
    $key = "33505274b224c38287a213473374a27";
    // see http://www.meetup.com/meetup_api/docs/2/groups/
    $url = "https://api.meetup.com/2/groups?key=$key&member_id=$id";
    $json = get_url($url);
    $json = json_decode($json);
    foreach($json->results as $record){
        echo $record->id . ": " . $record->name . "<br>";
    }
  

