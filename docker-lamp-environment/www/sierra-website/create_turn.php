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


$users = $session->get_all_users();
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $users_list = $_POST["users_list"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $date_time = $date.' '.$time;
    $ret= $session->save_turn($users_list, $date_time);
    if ($ret) {
        header('Location: thanks.php');
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
            Bienvenido <?php echo $username; ?>, este tu panel de administrcion
            de turnos
            </p>
            <p>
                Por favor recordar las siguientes instrucciones a la hora 
                de utilizar el sistema <br>
                1. selecciona la fecha deseada <br>
                2. selecciona el usuario por nombre y apellido
            </p>
          </div>
        </div>
      </div>

      <div class="row justify-content-center custom_bottom">
        <div class="col-sm-8">
            <form action="create_turn.php" method="POST">
                <p>Seleccione la fecha deseada</p>
                <div class="row">
                    <div class="col">
                        <input type="date" name='date' class="form-control" type="">
                    </div>
                </div>
                <p>Seleccione la hora y minutos deseados ( de 0900 a 1800 )</p>
                <div class='row'>
                    <div class='col'>
                     <input type="time" name="time" id="appt" name="appt"
                     min="09:00" max="18:00" required>
                    </div>
                 </div>
                <br>

                <div class="row">  
                    <div class="col">
                        <select class="custom-select mr-sm-2" name="users_list">
                        <option selected>Escoge el nombre del usuario</option>
                        <?php
                        while ($row=$users->fetchArray()) {
                            echo "<option value={$row{'person_id'}}> Nombre: {$row{'name'}} Apellido: {$row{'surname'}}</option>";
                        }
                        ?>
                        </select> 
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Crear</button>
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
  </body>
