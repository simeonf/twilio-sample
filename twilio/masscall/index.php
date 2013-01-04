<?php
header("content-type: text/xml");
?>
<Response>
  <Gather timeout='10' finishOnKey='#' method='POST' action="auth.php">
   <Say>Please enter a passcode to proceed. Type # to finish</Say>
 </Gather>
</Response>