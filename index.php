<?php

function send($phoneNumber,$message)
{
    $username="cfbal";
    $password="2018";
    $xml="
    <SMS-InsRequest>
    <CLIENT user=\"$username\" pwd=\"$password\" />
    <INSERTMSG text=\"$message\">
    <TO>$phoneNumber</TO>
    </INSERTMSG>
    </SMS-InsRequest>";
      
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.postaguvercini.com/api_xml/Sms_insreq.asp");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: text/xml; charset=iso-8859-9',
    'Connection: Keep-Alive'
    ));
    $result = curl_exec($ch);
    curl_close($ch);
}

send(050000000,"test mesajı");

?>