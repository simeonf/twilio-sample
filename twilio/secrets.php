<?php
require("loggit.php");
$phone = $_GET['Caller']; // phone number of caller

header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

if(!isset($_GET['ACTION']) or $_GET['ACTION'] == 'index'): // front page of our app
?><Response>
    <Gather timeout="10" finishOnKey="#" method="GET" action="secrets.php?ACTION=menu">
     <Say>Please choose from one of the following menu options followed by the #:</Say>
     <Pause />
     <Say>Press 1 to set your secret.</Say>
     <Say>Press 2 to retrieve your secret.</Say>
    </Gather>
   </Response>
<?php
elseif($_GET['ACTION'] == 'menu' and $_GET['Digits'] == '1'): // input your secret
?>       
  <Response>
    <Gather timeout='10' finishOnKey='#' method="GET" action='secrets.php?ACTION=save'>
      <Say>Please enter a number, followed by the #</Say>
    </Gather>
  </Response>
<?php
elseif($_GET['ACTION'] == 'menu' and $_GET['Digits'] == '2'): // get your secret and go back to beginning
    $obj = get_data();
    $secret = $obj[$phone];
?>
    <Response><Say>Your number was <?php echo $secret; ?>!</Say>
        <Redirect method="GET">secrets.php?ACTION=index</Redirect>
    </Response>
<?php
elseif($_GET['ACTION'] == 'save'):  // set secret and redirect to beginning
    $obj = get_data();
    $obj[$phone] = $_GET['Digits'];
    save_data($obj);
?>    
    <Response>
        <Redirect method="GET">secrets.php?ACTION=index</Redirect>
    </Response>
<?php
endif;
?>
