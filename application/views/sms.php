<?php
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Sms><?php echo $_REQUEST['From'] ?>, thanks for the text!</Sms>
</Response>