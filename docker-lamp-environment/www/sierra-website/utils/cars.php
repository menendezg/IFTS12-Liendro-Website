<?php

    require_once("session.php");
    $session = new session();
    $db = new SQLite3("../db/taller-sierra.db");

    // First create the person, but before select the last person_id available
    $sql_carid = "SELECT MAX(car_id)+1 AS 'availablecarid' FROM cars;";
    $result = $db->query($sql_carid);
    if (count($result)>0) {
        $row = $result->fetchArray();
        $car_id = (int)$row['availablecarid'];
    }

    $brand = $_POST["brand"];
    $model = $_POST["model"];
    $doors = (int)$_POST["doors"];
    $color = $_POST["color"];
    $patent = $_POST["patent"];
    $person_id = $_POST["personid"];

    $sql_insert =<<<EOF
        INSERT INTO cars (car_id, brand, model, color, patent, doors, status, person_id)
            VALUES ($car_id, '$brand', '$model', '$color', '$patent', '$doors', 'NUEVO', '$person_id');
EOF;

    $result2 = $db->exec($sql_insert);
    if (!$result2) {
        $status = 0;
        echo $db->lastErrorMsg();
    } else {
        $status = 1;
    }

    $url = "../create_car.php?status=" . $status;
    header('Location: ' . $url);

?>