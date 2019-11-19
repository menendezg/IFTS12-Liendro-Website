<?php
    // session
    // Always in the init of php file when I want variables of session
    require_once("utils/session.php");
    $session = new session();
    
    $TITLE = "SIERRMAX";
    include('utils/utils.php');
if ($_SERVER['REQUEST_METHOD']== 'GET') {
    $action= $_GET["action"];
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
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <title><?php echo $TITLE ?></title>
  </head>

  <body>
    <!-- nav -->
    <?php
        require_once 'components/nav.php';
    ?>
    <div class="container">
        <div class="row justify-content-md-center login-form">
            <div class="col-sm-8">
                <div class="jumbotron">
                <h1 class="display-4">Turno <?php echo $action; ?> con exito!</h1>
                    <p class="lead">
                     Gracias por usar nuestros servicios.
                    </p>
                    <hr class="my-4">
                    <p>
                        Si deseas volver a crear otro turno podes hacerlo 
                        haciendo click en el boton debajo 
                    </p>
                    <a class="btn btn-primary" href="index.php" role="button">Volver al inicio</a>
                </div>
      </div>
    </div>
    </div>

<?php
    require_once 'components/footer.php'
?>
 
</body>
