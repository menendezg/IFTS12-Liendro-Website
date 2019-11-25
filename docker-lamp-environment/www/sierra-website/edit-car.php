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
} else {
  $car_id = $_GET["id"];
  $db = new SQLite3('db/taller-sierra.db');
  $sql = "SELECT brand, model, color, patent, doors FROM cars WHERE car_id = '$car_id';";
  $result = $db->query($sql);
  if (count($result) == 0) {
    // show an error
  }

  $row = $result->fetchArray();
}

if ($session->is_admin($username)) {
  // is admin == true , the user
  // shold redirect to another webpage
  // to adminstrate the bookings
  // header('Location: some like adminwebsite.php');
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
      <h1 class="display-4 ml-4">EDICION DE AUTO</h1>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <!--left col-->
        <div class="text-center create-user">
          <i class="fa fa-car"></i>
        </div>
      </div>


      <div class="col-sm-9 custom_bottom">
        <div class="separator col-sm-12">DATOS DEL AUTO</div>
        <?
          if (($_GET["status"] == 1) && ($_GET["status"] != "")){
            echo "<div class='alert alert-success' style='margin-top: 12px;'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>¡Exito!</strong>, los datos se han actualziado correctamente.
                  </div>";
          } elseif (($_GET["status"] == 0) && ($_GET["status"] != "")) {
            echo "<div class='alert alert-danger' style='margin-top: 12px;'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>¡Error!</strong>, NO se pudieron actualizar los datos.
                  </div>";
          }
        ?>
        <form class="form custom-form" action="utils/cars-edit.php" method="POST">
          <div class="form-group row">

            <input type="hidden" name="car_id" value="<? echo $car_id; ?>">

            <div class="col-sm-6">
              <label for="brand">
                <h4>Marca</h4>
              </label>
              <input type="text" class="form-control" name="brand" id="brand" placeholder="Marca" value="<? echo $row[0]; ?>">
            </div>

            <div class="col-sm-6">
              <label for="model">
                <h4>Modelo</h4>
              </label>
              <input type="text" class="form-control" name="model" id="model" placeholder="Modelo" value="<? echo $row[1]; ?>">
            </div>

            <div class="col-sm-6">
              <label for="color">
                <h4>Color</h4>
              </label>
              <input type="text" class="form-control" name="color" id="color" placeholder="Color" value="<? echo $row[2]; ?>">
            </div>

            <div class="col-sm-6">
              <label for="patent">
                <h4>Patente</h4>
              </label>
              <input type="text" class="form-control" name="patent" id="patent" placeholder="Patente" value="<? echo $row[3]; ?>">
            </div>

            <div class="col-sm-6">
              <label for="doors">
                <h4>Puertas</h4>
              </label>
              <input type="text" class="form-control" name="doors" id="doors" placeholder="Puertas" value="<? echo $row[4]; ?>">
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