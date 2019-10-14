<?php 
//WIP. We cant send mails really if we dont use a third party api with auth. 
//We can check this with teacher because this part could be ugly with 
/*this configs.*/


    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $formcontent="From: $name \n Message: $message";
    $recipient = "emailaddress@here.com";
    $subject = "Contact Form";
    $mailheader = "From: $email \r\n";
    echo $subject, $formcontent, $mailheader;
    mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
    echo "Thank You!";
?>
