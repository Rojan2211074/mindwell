<?php
$to= "lalpower77@gmail.com";
$from="mindwell@socialmediasathi.com";
$message="Hellooo";
$subject="GELLP";
$headers="From: $from";
if(mail($to,$subject,$message,$headers)){
    echo"Mail Sent";
}else{
    echo"GG";
}

?>