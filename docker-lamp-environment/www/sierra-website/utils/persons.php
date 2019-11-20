<?php

    require_once("session.php");
    $session = new session();
    $db = new SQLite3("../db/taller-sierra.db");

    $username = $session->get('username');
    $sql = "SELECT person_id from users WHERE username = '$username';";
    $result = $db->query($sql);
if (count($result)>0) {
    $row = $result->fetchArray();
    $person_id = $row['person_id'];
}

    $new_name = $_POST["first_name"];
    $new_surname = $_POST["last_name"];
    $new_dni = $_POST["dni"];
    $new_genre = $_POST["genre"];
    $new_phone = $_POST["phone"];

    //$sql2 = "UPDATE persons SET name='$new_name', surname='$new_surname', dni='$new_dni', genre='$new_genre', phone_number='$new_phone' WHERE person_id='$person_id'";


    $sql2 =<<<EOF
            UPDATE
                persons
            SET
                name='$new_name', 
                surname='$new_surname', 
                dni='$new_dni', 
                genre='$new_genre', 
                phone_number='$new_phone' 
            WHERE person_id='$person_id'
EOF;

    $result2 = $db->exec($sql2);
    
if (count($result)>0) {
    $status = 1;
} else {
    $status = 0;
}

    $url = "../profile.php?status=" . $status;
    header('Location: ' . $url);
