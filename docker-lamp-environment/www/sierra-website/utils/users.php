<?php

    require_once("session.php");
    $session = new session();
    $db = new SQLite3("../db/taller-sierra.db");

    // First create the person, but before select the last person_id available
    $sql_personid = "SELECT MAX(person_id)+1 AS 'availablepid' FROM persons;";
    $result = $db->query($sql_personid);
    if (count($result)>0) {
        $row = $result->fetchArray();
        $person_id = (int)$row['availablepid'];
    }

    $name = $_POST["first_name"];
    $surname = $_POST["last_name"];
    $dni = (int)$_POST["dni"];
    $genre = $_POST["genre"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    $sql_insert =<<<EOF
        INSERT INTO persons (person_id, name, surname, dni, genre, phone_number, email)
            VALUES ($person_id, '$name', '$surname', $dni, '$genre', '$phone', '$email');
EOF;

    $result2 = $db->exec($sql_insert);
    if (!$result2) {
        $status = 2;
        echo $db->lastErrorMsg();
    } else {
        $status = 1;
    }

    // Then, create the user
    $sql_userid = "SELECT MAX(user_id)+1 AS 'availableuid' FROM users;";
    $result3 = $db->query($sql_userid);
    if (count($result3)>0) {
        $row = $result3->fetchArray();
        $user_id = (int)$row['availableuid'];
    }

    $username = $_POST["nick"];
    $password = $_POST["password"];
    $admin = (int)$_POST["admin"];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql_createuser =<<<EOF
        INSERT INTO users (user_id, username, password, is_administrator, person_id)
            VALUES ($user_id, '$username', '$hashed_password', $admin, $person_id);
EOF;

    if ($status == 1) {
        $result4 = $db->exec($sql_createuser);
        if (!$result4) {
            $sql_delete = "DELETE FROM persons WHERE person_id = $person_id;";
            $result_delete = $db->exec($sql_delete);
            if (count($result_delete)>0) {
                $status = 2;
            } else {
                $status = 0;
            }
            echo $db->lastErrorMsg();
        } else {
            $status = 1;
        }
    }
    
    if (count($result4)>0) {
        $status = 1;
    } else {
        $status = 0;
    }

    $url = "../create_user.php?status=" . $status;
    header('Location: ' . $url);

?>