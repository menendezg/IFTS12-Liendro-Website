<?php
  $TITLE = "SIERRMAX";
  require_once("utils/session.php");
  $session = new session();
  if (isset($_GET['logout'])) {
      $session->end_session();
      header("location: logout.php");
  }
  
  if (isset($_POST["username"])) {
      $username = $_POST["username"];
      $password = $_POST["password"];
          
      if (validateUser($username, $password) == true) {
          $session->set("username", $username);

          // If remember is checked, save the username and password as cookie.
          $cookie_time = 60 * 60 * 24 * 30; // 30 days
          $cookie_time_Onset = $cookie_time + time();

          if (isset($_REQUEST['remember'])) {
            setcookie("username", $username, $cookie_time_Onset);
            setcookie("password", $password, $cookie_time_Onset);
          } else {
            $cookie_time_fromOffset = time() - $cookie_time;
            setcookie("username", '', $cookie_time_fromOffset);
            setcookie("password", '', $cookie_time_fromOffset);
          }

          header("location: index.php");
      } else {
          $error_message='CREDENCIALES INCORRECTAS';
      }
  }
    
  function validateUser($username, $password) {
      $db = new SQLite3("db/taller-sierra.db");
      $sql = "SELECT password FROM users WHERE username = '$username';";
      $result = $db->query($sql);

      if (count($result) >0) {
          $row = $result->fetchArray();
          // The password_verify() function takes 2 arguments:
          // 1st arg: the password in plain text taked from the input form
          // 2nd arg: tha hash stored in the database
          // If the password and hash (encripted password) match, return true
          // else, return false.
          if (password_verify($password, $row[0])) {
              return true;
          } else {
              return false;
          }
      } else {
          return false;
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
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center">Conectarse</h5>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="form-signin">
              <div class="form-label-group">
                <label for="inputUsername">Nombre de usuario</label>
                <input type="text" name='username' id="inputUsername" 
                       class="form-control" placeholder="Usuario" required autofocus
                       value="<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username']; ?>">
              </div>
              <div class="form-label-group">
                <label for="inputPassword">Contraseña</label>
                <input type="password" name='password' id="inputPassword" 
                       class="form-control" placeholder="Password" required
                       value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>">
              </div>
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" name="remember" id="rememberCheck"
                       <?php if(isset($_COOKIE['username'])) { echo "checked='checked'"; } ?> value="1">
                <label class="custom-control-label" for="rememberCheck">Recordar mis credenciales?</label>
              </div>
            <?php
            if (isset($error_message)) {
            ?>
            <h5 class="card-title text-center wrong-credentials">
                <?php echo($error_message) ?>
            </h5>
            <?php
            } else {
                //nothing we are fine
            ?>    
            <?php
            }
            ?>  
            <button class="btn btn-primary btn-block text-uppercase" type="submit">Iniciar Sesión</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
<?php
    require_once 'components/footer.php'
?>
 
</body>
