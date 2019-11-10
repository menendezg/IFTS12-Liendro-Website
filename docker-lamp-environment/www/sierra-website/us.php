<?php
    // session
    // Always in the init of php file when I want variables of session
    require_once("utils/session.php");
    $session = new session();
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
          <div class="jumbotron jumbotron-us custom-jumbotron text-center">
            <h1 class="display-4" style="opacity: 0;">show</h1>
            <p class="lead">
            
            </p>
          </div>
        </div>
      </div>

      <div class="row justify-content-center custom_bottom">
        <h1 class="display-4 primary-title subpage-title">Cuidando Autos Desde Hace 25 Años</h1>

        <div class="col-sm-6">
          <h3 class="primary-title subpage-subtitle">Miles de vehiculos atentidos</h3>
          <p class="primary-text-color paragraph-justify subpage-p">
              Desde su fundación en el año de 1980, en el barrio de Soldati (Ciudad Autonoma de Buenos Aires)
              nuestro equipo de trabajo se dedica a cuidar su auto como si fuese propio.
          </p>
          <p class="primary-text-color paragraph-justify">
              Tenemos la experiencia de trabajo en todo tipo de vehiculos: clasicos, deportivos, camionetas, 
              camiones, competición, etc.
          </p>
        </div>
        <div class="col-sm-6">
          <h3 class="primary-title subpage-subtitle">Atención a particulares y aseguradoras</h3>
          <p class="primary-text-color paragraph-justify">
              Nuestros servicios se encuentran a la medida de cada cliente.
              Trabajamos con todas las compañias de seguro y de forma particular.
          </p>
          <p class="primary-text-color paragraph-justify">
              Contamos con varios medios de pago para facilitar tus arreglos.
          </p>
        </div>
      </div>
    </div>
    
    <!-- OUR TEAM -->
    <div class="container">
      <h1 class="display-4 primary-title text-center subpage-title" style="margin-bottom: .5em;">Nuestro Equipo de Profesionales</h1>
      <div class="row justify-content-center custom_bottom our-team">
          <div class="col-sm-4">
            <div class="card text-center">
              <img
                src="img/emp1.jpg"
                class="card-img-top fill-in"
                alt="..."
                height="200"
              />
              <div class="card-body dark-card">
                <h5 class="card-title">Carlos Lopez</h5>
                <h6 class="card-position">Chapista</h6>
                <p class="card-text position-desc">
                  Carlos es el mejor chapista y sus habilidades reparando
                  han dado mucho que hablar.
                </p>
              </div>
              <div class="card-mail">
                  <a href="mailto:carlos.lopez@mail.com">carlos.lopez@mail.com</a>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card text-center">
              <img
                src="img/emp2.jpg"
                class="card-img-top fill-in"
                alt="..."
                height="200"
              />
              <div class="card-body dark-card">
                <h5 class="card-title">Jose Pintor</h5>
                <h6 class="card-position">Mecánico</h6>
                <p class="card-text position-desc">
                  Mecanico hay uno solo y Jose es el unico capaz de
                  solucionar cualquier inconveniente.
                </p>
              </div>
              <div class="card-mail">
                  <a href="mailto:jose.pintor@mail.com">jose.pintor@mail.com</a>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card text-center">
              <img
                src="img/emp3.jpg"
                class="card-img-top fill-in"
                alt="..."
                height="200"
              />
              <div class="card-body dark-card">
                <h5 class="card-title">Raul Tubito</h5>
                <h6 class="card-position">Auxiliar</h6>
                <p class="card-text position-desc">
                  Auxiliar mas capaz que Raul no existe, capacidad
                  de trabajo en equipo y manos que no tienen comparación.
                </p>
              </div>
              <div class="card-mail">
                  <a href="mailto:raul.tubito@mail.com">raul.tubito@mail.com</a>
              </div>
            </div>
          </div>
        </div>

        <!-- <div class="row justify-content-center custom_bottom"></div> -->
      </div>

      <!-- OUR CUSTOMERS -->
      <div class="container custom_bottom">
          <h1 class="display-4 primary-title text-center subpage-title" style="margin-bottom: .3em;">Nuestros Clientes</h1>
          <div class="row">
            <div class="col-lg-2 col-sm-4 col-6 mb-4">
              <img src="img/customer1.jpg" alt="..." class="img-fluid">
            </div>
            <div class="col-lg-2 col-sm-4 col-6 mb-4">
              <img src="img/customer2.jpg" alt="..." class="img-fluid">
            </div>
            <div class="col-lg-2 col-sm-4 col-6 mb-4">
              <img src="img/customer3.jpg" alt="..." class="img-fluid">
            </div>
            <div class="col-lg-2 col-sm-4 col-6 mb-4">
              <img src="img/customer4.jpg" alt="..." class="img-fluid">
            </div>
            <div class="col-lg-2 col-sm-4 col-6 mb-4">
              <img src="img/customer1.jpg" alt="..." class="img-fluid">
            </div>
            <div class="col-lg-2 col-sm-4 col-6 mb-4">
              <img src="img/customer2.jpg" alt="..." class="img-fluid">
            </div>
            <div class="col-lg-2 col-sm-4 col-6 mb-4">
              <img src="img/customer3.jpg" alt="..." class="img-fluid">
            </div>
            <div class="col-lg-2 col-sm-4 col-6 mb-4">
              <img src="img/customer4.jpg" alt="..." class="img-fluid">
            </div>
          </div>
      </div>
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
</html>
