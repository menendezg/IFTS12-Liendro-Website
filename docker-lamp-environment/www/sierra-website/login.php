<?php
    $TITLE = "SIERRMAX";
    include('utils/utils.php');

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
    <title><? echo $TITLE ?></title>
  </head>

  <body>
    <!-- nav -->
<?
    require_once 'components/nav.php';
?>
    <div class="container">
    <div class="row justify-content-md-center login-form">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center">Iniciar Sesion</h5>
            <form action='login-controller.php' method='POST' class="form-signin">
              <div class="form-label-group">
                <input type="email" name='email' id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address</label>
              </div>
              <div class="form-label-group">
                <input type="password" name='password' id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
<?
    require_once 'components/footer.php'
?>
 
</body>
