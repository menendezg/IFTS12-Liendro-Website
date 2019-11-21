<?php 
    function sanitize_my_email($field) {
        $field = filter_var($field, FILTER_SANITIZE_EMAIL);
        if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
    $to_email = 'lozanotux@gmail.com';
    $subject = 'Correo desde WEB [' . $_POST["email"] . "]";
    $message = 'Enviado Por: ' . $_POST["name"] . "<" . $_POST["email"] . ">\n\nMensaje: " . $_POST["message"];
    $headers = 'From: ' . $_POST["email"];
    //check if the email address is invalid $secure_check
    $secure_check = sanitize_my_email($to_email);
    if ($secure_check == false) {
        $execution_code = 0;
    } else { //send email 
        mail($to_email, $subject, $message, $headers);
        $execution_code = 1;
    }

    $url = "../contact.php?sended=" . $execution_code;
    header('Location: ' . $url);
?>