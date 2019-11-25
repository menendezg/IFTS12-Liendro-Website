<?php
// session
// Always in the init of php file when I want variables of session
require_once("utils/session.php");
$session = new session();

$db = new SQLite3('db/taller-sierra.db');

//prevnt and control
if (!$session->get('username')) {
    header('Location: login.php');
}

// prevent and control
$username = $session->get('username');
if (!$session->is_admin($username)) {
    header('Location: login.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $car_id= $_GET["id"];
    $sql = "SELECT brand, model, color, patent, status, name, surname FROM cars, persons WHERE cars.person_id = persons.person_id AND car_id='$car_id';";
    $result = $db->query($sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_id= $_POST["record_to_delete"];
    $sql = "DELETE FROM cars WHERE cars.car_id = '$car_id';";
    var_dump($sql);
    $result2 = $db->exec($sql);
    if (count($result2)>0) {
      header('Location: thanks_car.php?action=Eliminado');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Oswald&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title>SierraMax</title>
  </head>

  <body>
    <?php
    require_once 'components/nav.php';
?>
   
    <div class="">
      <div class="jumbotron jumbotron-services custom-jumbotron">
        <h1 class="display-4 ml-4">ELIMINAR AUTO</h1>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <p class="lead lead-white">
            Bienvenido <b style="color: white;"><?php echo $username; ?></b>, el siguiente auto va a eliminarse:
          </p>
        </div>
      </div>
      <div class="row justify-content-center custom-top custom_bottom">
        <div class="col-sm-8">
     <form action="cars-delete.php" method="POST">
        <ul class="list-group">
        <?php
        //TODO:
        // Style the following lists

        // note: we are doing this ugly way because turns always return with 1 element
        // i dont know why. This means: If you have 1 turn, return 1 element but
        // if you dont have turns return 1 too.
        // to better understand  check session->get_turns.
        
        // so we doing this. because fetch array return false if he can't do his magic.
        // fetch array make an associative array.
        // an that runs ok. So if row is false. we handle the message with no schedule.
        // but if row is ok we handle the turns in diferents elements.
        //
        if (!empty($result)) {
            while ($row = $result->fetchArray()) {
                echo"
                      <input type='hidden' name='record_to_delete' value='$car_id'>              
                      <li class='list-group-item turns-status'>
                        <span class='customer'>
                          <i class='fa fa-user-circle'></i>
                          <b>Dueño:</b> {$row{'surname'}} {$row{'name'}}
                        </span>
                        <div class='turn-separator'></div>
                                              <br>
                        <span>
                          <i class='fa fa-car'></i>
                          <b>Auto:</b> {$row{'brand'}} {$row{'model'}}
                        </span>
                        <span class='status-all'>
                          <i class='fa fa-flag'></i>
                          <b>Status:</b> <status>{$row{'status'}}</status>
                        </span>
                        
                        <br>
                        
                        <span class='second-row'>
                          <i class='fa fa-tint'></i>
                          <b>Color:</b> {$row{'color'}}
                        </span>
                        <span class='patent-item'>
                          <b>Patente:</b> 
                          <patent class='patent'>{$row{'patent'}}</patent>
                        </span>
                      </li>";
            }
        }
?>

        </ul>
        <p class="lead-red">Esta seguro que desea eliminar el auto? Presione Eliminar para confirmar
           o Cancelar para volver atrás.</p>
        <button type="submit" class="btn btn-danger">
          <i class='fa fa-trash'></i>
          Eliminar
        </button>
        &nbsp; <a class="btn btn-primary" href="see_all_cars.php" role="button">
                  <i class="fa fa-times-circle"></i>
                  Cancelar
                </a>
     </form>

   </div>
      </div>
     

      
      <div class="row justify-content-center custom_bottom"></div>
    </div>

    <!-- footer -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 footer">
          <p class="text-center footer-text">
            Copyright &copy;
            <script language="JavaScript" type="text/javascript">
              now = new Date();
              theYear = now.getYear();
              if (theYear < 1900) theYear = theYear + 1900;
              document.write(theYear);
            </script>
            All rights reserved by
            <a href="https://lozanotux.github.io/">IFTS Nº 12</a>
          </p>
        </div>
      </div>
    </div>

    <!-- endfooter -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>