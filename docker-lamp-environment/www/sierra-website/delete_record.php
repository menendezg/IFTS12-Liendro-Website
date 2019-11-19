<?php
// session
// Always in the init of php file when I want variables of session
require_once("utils/session.php");
$session = new session();
//prevnt and control
if (!$session->get('username')) {
    header('Location: login.php');
}

// prevent and control
$username = $session->get('username');
if (!$session->is_admin($username)) {
    header('Location: login.php');
}
if ($_SERVER['REQUEST_METHOD']== 'GET') {
    $turn_id= $_GET["id"];
    $record= $session->get_turn_by_id($turn_id);
}
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $turn_id= $_POST["record_to_delete"];
    $record= $session->delete_turn_by_id($turn_id);
    if ($record) {
        header('Location: thanks.php?action=Borrado');
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
   

    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="jumbotron custom-jumbotron">
            <h1 class="display-4 primary-title subpage-title" style="text-align: left!important;">
                Turnos
            </h1>
            <p class="lead">
            Bienvenido <?php echo $username; ?>, estos son todos los turnos agendados
            </p>
          </div>
        </div>
      </div>
      <div class="row justify-content-center custom-top custom_bottom">
        <div class="col-sm-8">
     <form action="delete_record.php" method="POST">
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
        if (!empty($record)) {
            while ($row = $record->fetchArray()) {
                echo"
                    <input type='hidden' name='record_to_delete' value={$row{'turn_id'}}>              
                    <li class='list-group-item turns-status'>
                    <span>
                          <i class='fa fa-clock-o'></i>
                          <b>Fecha:</b> {$row{'date'}}
                        </span>
                        <span class='status'>
                          <i class='fa fa-flag'></i>
                          <b>Status:</b> <status>{$row{'status'}}</status>
                        </span>
                        
                        <br>
                        
                        <span class='second-row'>
                          <i class='fa fa-car'></i>
                          <b>Auto:</b> {$row{'brand'}} {$row{'model'}}
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
        <p>Esta seguro que desea borrar el registro? Presione aceptar para confirmar
           o cancelar  para volver al inicio</p>
        <button type="submit" class="btn btn-danger">BORRAR</button>
     </form>
    <br>
    
    <button type="button" class="btn btn-primary">Primary</button>
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
  <
