
<?php

echo "Mail sending script";
$from_name = 'bdbroadbandeals';
$from = 'support@bdbroadbanddeals.com';
$to = 'zubair@zubairitexpert.com';
$subject = 'Mail subject';
$uid = 1212121212;
$message = "this is a demo message";


$create_date = new \DateTime();
        
        $headers = "From: ".str_replace(":", "", $from_name)." <".$from.">\r\n";
        $headers .= "Reply-To: ".$from."\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
echo "testing...";
        // message
        $nmessage = $message;
        
        try{   
        @mail($to, $subject, $nmessage, $headers);
        echo "mail sent";
        } catch(Exception $ex){
                echo "sorry to send mail";
        }

?>