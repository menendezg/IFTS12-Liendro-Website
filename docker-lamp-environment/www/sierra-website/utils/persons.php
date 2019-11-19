<?php

    require_once("session.php");
    $session = new session();
    $db = new SQLite3('db/taller-sierra.db');
    var_dump($db);
    $person_id = $session->get_person_id($session->get('username'));

    $new_name = escapeString($_POST['first_name']);
    $new_surname = escapeString($_POST['last_name']);
    $new_dni = escapeString($_POST['dni']);
    $new_genre = escapeString($_POST['genre']);
    $new_phone = escapeString($_POST['phone']);

    $sql = "UPDATE name='$new_name',
                   surname='$new_surname',
                   dni=$new_dni,
                   genre='$new_genre',
                   phone_number=$new_phone
            WHERE person_id=$person_id";

    $result = $db->query($sql);

    if($result) {
        $status = 1;
    } else {
        $status = 0;
    }

    $url = "../profile.php" + "?status=" . $status;
    header('Location: '.$url);

?>