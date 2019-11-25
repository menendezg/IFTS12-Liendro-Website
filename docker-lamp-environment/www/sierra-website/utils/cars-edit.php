<?php

    require_once("session.php");
    $session = new session();
    $db = new SQLite3("../db/taller-sierra.db");

    $car_id = $_POST["car_id"];
    $brand = $_POST["brand"];
    $model = $_POST["model"];
    $color = $_POST["color"];
    $patent = $_POST["patent"];
    $doors = $_POST["doors"];

    $sql2 =<<<EOF
            UPDATE
                cars
            SET
                brand='$brand', 
                model='$model', 
                color='$color', 
                patent='$patent', 
                doors='$doors' 
            WHERE car_id='$car_id'
EOF;

    $result2 = $db->exec($sql2);
    
if (count($result2)>0) {
    $status = 1;
} else {
    $status = 0;
}

    $url = "../edit-car.php?status=" . $status . "&id=" . $car_id;
    header('Location: ' . $url);
