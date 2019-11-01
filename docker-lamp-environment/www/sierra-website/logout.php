<?php
$TITLE = "SIERRMAX";
session_start();
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
    <?
        require_once 'components/nav.php';
    ?>
    <div class="container">
        <div class="row justify-content-md-center login-form">
            <div class="col-sm-8">
                <div class="jumbotron">
                    <h1 class="display-4">Hasta pronto!</h1>
                    <p class="lead">
                     Gracias por usar nuestros servicios.
                     Volvenos a visitar te esperamos
                    </p>
                    <hr class="my-4">
                    <p>
                     Te gusto como trabajamos? Comparti en tus redes sociales
                     como quedo tu auto y taggeanos. Nos estas ayudando a seguir 
                     brindando la calidad que nos caracteriza. 
                    </p>
                    <a class="btn btn-primary" href="index.php" role="button">Volver al inicio</a>
                </div>
      </div>
    </div>
    </div>

<?
    require_once 'components/footer.php'
?>
 
</body>
