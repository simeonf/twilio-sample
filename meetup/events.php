<?php
    require("./url.php");
    // Member ID here, got it by using API on myself to see what Groups I'm part of
    $id = "3128712";
    // Go to http://www.meetup.com/meetup_api/key/ for your API key
    $key = "33505274b224c38287a213473374a27";
    // see http://www.meetup.com/meetup_api/docs/2/groups/
    $url = "https://api.meetup.com/2/events?key=$key&group_id=$id";
    $json = get_url($url);
    $json = json_decode($json);
    foreach($json->results as $record){
        $time = ($record->time + $record->utc_offset)/1000; //micro to seconds
        echo $record->id . ": " . $record->name . " on " . date("F jS Y", $time) . "<br>";
    }
  

