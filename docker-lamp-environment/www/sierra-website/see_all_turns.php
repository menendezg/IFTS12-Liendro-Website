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
$turns = $session->get_all_turns();
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
        <h1 class="display-4 ml-4">CONSULTA DE TURNOS</h1>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <p class="lead lead-white">
            Bienvenido <b style="color: white;"><?php echo $username; ?></b>, estos son todos los turnos agendados.
          </p>
        </div>
      </div>

      <div class="row justify-content-center custom-top custom_bottom">
        <div class="col-sm-8">
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
        if (!empty($turns)) {
            while ($row = $turns->fetchArray()) {
                echo "<li class='list-group-item turns-status'>
                       <div class='delete-record-row'>
                          <a href='delete_record.php?id={$row{'turn_id'}}' style='color: red;'><i class='fa fa-trash'></i> Borrar Turno</a>
                          <a href='delete_record.php?id={$row{'turn_id'}}&state=Listo' style='color: green;'><i class='fa fa-flag'></i> Cambiar a Listo</a>
                          <a href='delete_record.php?id={$row{'turn_id'}}&state=Trabajando' style='color: blue;'><i class='fa fa-cog'></i> Cambiar a Trabajando</a>
                        </div>

                         <span class='customer'>
                          <i class='fa fa-user-circle'></i>
                          <b>Cliente:</b> {$row{'surname'}} {$row{'name'}}
                        </span>
                        <div class='turn-separator'></div>
                                              <br>
                        <span>
                          <i class='fa fa-clock-o'></i>
                          <b>Fecha:</b> {$row{'date'}}
                        </span>
                        <span class='status-all'>
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
  </body>
