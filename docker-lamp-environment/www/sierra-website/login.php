<?php
  $TITLE = "SIERRMAX";
  require_once("utils/session.php");

	$session = new session();
	
	if(isset($_POST["iniciar"])) {		
	  $username = $_POST["username"];
	  $password = $_POST["password"];
		
	  if(validateUser($username, $password) == true) {			
			$session->set("username",$username);
			header("location: index.php");
		} else {
			echo "Credenciales incorrectas!";
		}
	}
	
	function validateUser($username, $password) {
		$db = new SQLite3("db/taller-sierra.db");
		$sql = "SELECT password FROM users WHERE username = '$username';";

		$result = $db->query($sql);

		if($result->numRows() > 0) {
			$row = $result->fetchArray();
			if(strcmp($password,$row[0]) == 0) {
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
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center">Conectarse</h5>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="form-signin">
              <div class="form-label-group">
                <input type="text" name='username' id="inputUsername" class="form-control" placeholder="Usuario" required autofocus>
                <label for="inputUsername">Nombre de usuario</label>
              </div>
              <div class="form-label-group">
                <input type="password" name='password' id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Contraseña</label>
              </div>
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" name="remember" id="rememberCheck">
                <label class="custom-control-label" for="rememberCheck">Mantenerme conectado?</label>
              </div>
              <button class="btn btn-primary btn-block text-uppercase" type="submit">Iniciar Sesión</button>
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
