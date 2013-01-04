<?php
header("content-type: text/xml");
?>
<Response>
  <Say>The following message was left for you:</Say>
  <Play><?php echo $_GET['url']; ?></Play>
  <Say>Thanks for listening. Goodbye!</Say>
  <Hangup/>
</Response>  