<?php
// session
// Always in the init of php file when I want variables of session
require_once("utils/session.php");
$session = new session();

// the followins line redirect to the first slide if
// the user not logged in and he is trying to enter
// by cache or writing in the browser the url.




//===========================================================================
// remember: like php is not strict the follwing line maybe not return true 
// but is evaluated at same way. 
// 
// this means if get->(username) return something i dot do anything. 
// but if return false, I will redirect to login.

$username = $session->get('username');

if (!$session->get('username')) {
  header('Location: login.php');
}

if (!$session->is_admin($username)) {
  header('Location: login.php');
};

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- favicon -->
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="img/favicon.ico" type="image/x-icon">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <title>SierraMax</title>
</head>

<body>
  <!-- NAVBAR -->
  <?php
  require_once 'components/nav.php';
  ?>

  <!-- PROFILE SECTION -->
  <div class="">
    <div class="jumbotron jumbotron-services custom-jumbotron">
      <h1 class="display-4 ml-4">CREAR USUARIO</h1>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <!--left col-->
        <div class="text-center create-user">
          <i class="fa fa-user-plus"></i>
        </div>
      </div>


      <div class="col-sm-9 custom_bottom">
        <div class="separator col-sm-12">DATOS DEL USUARIO</div>
        <?
          if (($_GET["status"] == 1) && ($_GET["status"] != "")){
            echo "<div class='alert alert-success' style='margin-top: 12px;'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>¡Exito!</strong>, el usuario se creó correctamente.
                  </div>";
          } elseif (($_GET["status"] == 0) && ($_GET["status"] != "")) {
            echo "<div class='alert alert-danger' style='margin-top: 12px;'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>¡Error!</strong>, hubo un error tratando de crear el usuario.
                  </div>";
          }
        ?>
        <form class="form custom-form" action="utils/users.php" method="POST">
          <div class="form-group row">

            <div class="col-sm-6">
              <label for="nick">
                <h4>Usuario (nick)</h4>
              </label>
              <input type="text" class="form-control" name="nick" id="nick" placeholder="nick09">
            </div>

            <div class="col-sm-6">
              <label for="nick">
                <h4>Contraseña</h4>
              </label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
            </div>

            <div class="col-sm-6">
              <label for="nick">
                <h4>Tipo de Usuario</h4>
              </label>
              <select class="custom-select mr-sm-2" name="admin">
                <option selected>Seleccione una opción</option>
                <option value="1"> Administrador</option>
                <option value="0"> Usuario Normal</option>
              </select> 
            </div>
            <div class="col-sm-6"></div>

            <div class="col-sm-6">
              <label for="first_name">
                <h4>Nombre</h4>
              </label>
              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Juan">
            </div>

            <div class="col-sm-6">
              <label for="last_name">
                <h4>Apellido</h4>
              </label>
              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Perez">
            </div>

            <div class="col-sm-6">
              <label for="dni">
                <h4>DNI</h4>
              </label>
              <input type="text" class="form-control" name="dni" id="dni" placeholder="12345678">
            </div>

            <div class="col-sm-6">
              <label for="genre">
                <h4>Sexo</h4>
              </label>
              <input type="text" class="form-control" name="genre" id="genre" placeholder="Masculino/Femenino">
            </div>

            <div class="col-sm-6">
              <label for="phone">
                <h4>Telefono</h4>
              </label>
              <input type="text" class="form-control" name="phone" id="phone" placeholder="+54 9 11 23456789">
            </div>

            <div class="col-sm-6">
              <label for="email">
                <h4>Correo Electronico</h4>
              </label>
              <input type="email" class="form-control" name="email" id="email" placeholder="ejemplo@mail.com">
            </div>
          </div>

          <div class="form-group buttons">
            <br>
            <button class="btn btn-success" type="submit">
              <i class="fa fa-check-circle"></i>
              Guardar
            </button>
            <button class="btn btn-secondary" type="reset" onClick="this.form.reset()">
              <i class="fa fa-repeat"></i>
              Reiniciar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--/END PROFILE-->


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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>