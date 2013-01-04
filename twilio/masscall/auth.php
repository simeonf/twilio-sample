<?php
header("content-type: text/xml");
//$phone = $_GET['Caller']; // phone number of caller
$secret = $_POST['Digits'];
if($secret == "1234"){
        echo "<Response>
                <Redirect method='GET'>record.php</Redirect>
              </Response>";
        }else{
        echo "<Response>
                <Redirect method='GET'>index.php</Redirect>
              </Response>";
        }
