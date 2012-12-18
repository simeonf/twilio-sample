<?php

function loggit($o){
    $fh = fopen("./log.txt", "a");
    if (flock($fh, LOCK_EX)) {  // exclusive lock
        fwrite($fh, print_r($o, true)); // get text version of array, object, etc
        fwrite($fh, "\n"); // Add a newline between entries
        fflush($fh);
        flock($fh, LOCK_UN);    // release the lock
    }
    fclose($fh);
}

function save_data($o){
    // Ought to flock on lockfile to read/write to files at the same time!
    $fh = fopen("./data.txt", "w");
    fwrite($fh, serialize($o));
    fclose($fh);
}

function get_data(){
    $o = array();
    $str = file_get_contents("./data.txt");
    if($str != ""){ 
        $o = unserialize($str);
    }
    return $o;
}
