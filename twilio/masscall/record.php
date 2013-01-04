<?php
header("content-type: text/xml");
?>
<Response>
<Say>Please record your message now:</Say>
<Record method="POST" timeout="10"  maxLength="60" playBeep="true" action="review.php" finishOnKey="#"/>
</Response>
