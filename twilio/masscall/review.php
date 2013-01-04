<?php
header("content-type: text/xml");
if(@$_POST['Digits'] == '1'){
  // Make a phone call
  $c = curl_init(); 
  $password = '0144837eed01a90796f261ce74cd1bf1'; // Use your own twilio auth token, i regenerated mine so this won't work
  curl_setopt($c, CURLOPT_URL, "https://api.twilio.com/2010-04-01/Accounts/ACf19be4dd11ab1ac1065f73d9047d1e9d/Calls");
  curl_setopt($c, CURLOPT_USERPWD,  "ACf19be4dd11ab1ac1065f73d9047d1e9d:" . $password);
  curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($c, CURLOPT_POST, true);

  $data = array(
    'From' => '209 846-2151',
    'To' => '209 548-9938',
    'Url' => 'http://simeonfranklin.com/masscall/play.php?url=' . $_GET['url'],
    'Method' => 'GET',
  );

  curl_setopt($c, CURLOPT_POSTFIELDS, $data);
  $output = curl_exec($c);
  $info = curl_getinfo($c);
  curl_close($c);
  echo "<Response><Say>Broadcast initiated! Goodbye.</Say><Hangup/></Response>";
  exit();
}
elseif(@$_POST['Digits'] == '2'){
  echo "<Response><Redirect method='GET'>record.php</Redirect></Response>";
  exit();
}
if(@$_POST['RecordingUrl']):
?>
<Response>
<Gather action="review.php?url=<?php echo $_POST['RecordingUrl']; ?>" method="POST" finishOnKey='#'>
  <Say>The message you recorded is:</Say>
  <Play><?php echo $_POST['RecordingUrl']; ?></Play>
  <Say>Press 1 and # to send out message.</Say>
  <Say>Press 2 and # to re record.</Say>
</Gather>
</Response>
<?php endif; ?>