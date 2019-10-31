<?php
    // session
    // Always in the init of php file when I want variables of session
    require_once("utils/session.php");
    $session = new session();
    
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
    <title><?php echo $TITLE ?></title>
  </head>

  <body>
    <!-- nav -->
    <?php
        require_once 'components/nav.php';
        require_once 'components/carousel.php';
    ?>

    <div class="container">
      <div class="row custom_bottom">
        <div class="col-sm-6">
          <h1 class="branding-title">Bienvenido a tu taller ideal</h1>
          <p class="branding-paragraph">
            Cuando se descompone tu automóvil recurres a un familiar o amigo para
            que te recomiende a su mecánico de confianza. Pues para facilitar esta
            búsqueda, SierraMax le ayuda a encontrar todo lo que esta buscando de
            una manera rapida y sencilla. LLevando a recomendarnos de boca en boca
            a otro nivel.
          </p>
          <a href="#LEARN_MORE" class="fancy-btn">
            <div class="fancy-btn-inner">
                <i class="fa fa-play"></i>
            </div>
            <small><b>LEER MÁS</b></small>
          </a>
        </div>
        <div class="col-sm-6 nopadding">
          <img src="img/car_landing.jpg" class="img-landing" width="100%" />
        </div>
      </div>

      <div class="row justify-content-center custom_bottom">
        <div class="col-sm-4">
          <div class="card">
            <img
              src="img/entrega-auto.jpg"
              class="card-img-top fill-in"
              alt="..."
              height="200"
            />
            <div class="card-body dark-card">
              <h5 class="card-title">Compromiso de Entrega</h5>
              <p class="card-text">
                Tenemos 30 años en el rubro, y sabemos lo importante que es contar con tu auto.
                Por este motivo las fechas que brindamos de entrega, son nuestro principal objetivo.
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <img
              src="img/profesionales-auto.png"
              class="card-img-top fill-in"
              alt="..."
              height="200"
            />
            <div class="card-body dark-card">
              <h5 class="card-title">Profesionalismo</h5>
              <p class="card-text">
                Nuestros empleados son especialistas en sus tareas, contando con la experiencia y capacitaciones constantes.
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <img
              src="img/materiales-primera.jpg"
              class="card-img-top fill-in"
              alt="..."
              height="200"
            />
            <div class="card-body dark-card">
              <h5 class="card-title">Materiales de Primera</h5>
              <p class="card-text">
                Nuestros proveedores cuentan con los productos más eficientes, para lograr las reparaciones y 
                acabados profesionales. Estamos atentos a mejoras constantes para brindar mejores resultados.
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center custom_bottom">
        <div class="col-sm-4">
          <div class="card">
            <img
              src="img/cuidado-pintura-home.jpg"
              class="card-img-top fill-in"
              alt="..."
              height="200"
            />
            <div class="card-body dark-card">
              <h5 class="card-title">Acabados de Pintura</h5>
              <p class="card-text">
                La terminación del auto es muy importante en cada trabajo, por este motivo tenemos 
                procedimientos estrictos para lograr un mejor acabado.
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <img
              src="img/soldadura-home.jpg"
              class="card-img-top fill-in"
              alt="..."
              height="200"
            />
            <div class="card-body dark-card">
              <h5 class="card-title">Arreglos sobre Chapa</h5>
              <p class="card-text">
                Nuestro fuerte son los arreglos artesanales sobre la chapa, 
                los cuales fueron ganados por decadas trabajando con vehiculos.
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <img
              src="img/clasico-home.jpg"
              class="card-img-top fill-in"
              alt="..."
              height="200"
            />
            <div class="card-body dark-card">
              <h5 class="card-title">Restauración de Clasicos</h5>
              <p class="card-text">
                Somos amante de los fierros en todos los sentidos, 
                veni! presupuesta con nosotros tu restauración.
              </p>
            </div>
          </div>
        </div>
      </div>
   </div>
<?php
    require_once 'components/footer.php'
?>
 
    </body>
</html>
