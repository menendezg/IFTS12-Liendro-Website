<?php

    require_once("session.php");
    $session = new session();
    $db = new SQLite3("../db/taller-sierra.db");

    $username = $session->get('username');

    $current_password = $_POST["current_password"];
    $new_password = $_POST["new_password"];
    $repeat_password = $_POST["repeat_password"];

    $sql_password = "SELECT password FROM users WHERE username = '$username';";
    $result = $db->query($sql_password);
    $row = $result->fetchArray();

    if (password_verify($current_password, $row['password'])) {
        if ($new_password == $repeat_password) {

            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            $sql_update_password =<<<EOF
                UPDATE users 
                    SET password = '$hashed_password'
                    WHERE username = '$username';
EOF;
            $result2 = $db->exec($sql_update_password);

            if (count($result)>0) {
                $password_changed = 1;
            } else {
                $password_changed = 0;
            }
        } else {
            $password_changed = 2;
        }
    } else {
        $password_changed = 3;
    }

    
    $url = "../profile.php?password_changed=" . $password_changed;
    header('Location: ' . $url);

?>