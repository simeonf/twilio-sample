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
    

loggit($_GET);
header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
<Say>Hello World</Say>
</Response>