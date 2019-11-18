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
    
    
if (!$session->get('username')) {
    header('Location: login.php');
}

$username = $session->get('username');
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
        <h1 class="display-4 ml-4">TURNOS</h1>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <p class="lead">
            Bienvenido <b style="color: white;"><?php echo $username; ?></b>, este es tu panel de turnos.
          </p>
        </div>
      </div>

      <div class="row justify-content-center custom-top custom_bottom">
        <div class="col-sm-8">
        <ul class="list-group">
        <?php
        //TODO:
        // Style the following lists

        $turns=$session->get_turns($username);
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
                echo "<li class='list-group-item text-center'> Fecha: {$row{'date'}} Status: {$row{'status'}}</li>";
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
