<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
    integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <title>SierraMax</title>
</head>

<body>

<?
    require_once 'components/nav.php';
?>

  

  <div class="">
    <div class="jumbotron jumbotron-services custom-jumbotron">
      <h1 class="display-4 ml-4">CONTACTENOS</h1>
    </div>
  </div>

  <div class="container">

    <h3 class="primary-title subpage-subtitle text-center" style="margin-bottom: 1.2em;">
      Escríbanos por consultas y pedidos de presupuestos
    </h3>

    <!--Form with header-->
    <form action="mail.php" method="post" class="custom_bottom">
      <div class="card border-fancy rounded-0">
        <div class="card-header p-0">
          <div class="bg-contact text-white text-center py-2" style="border-bottom: 1px solid #000;">
            <h3><i class="fa fa-envelope"></i> Contactanos</h3>
            <p class="m-0">Con gusto te ayudaremos</p>
          </div>
        </div>
        <div class="card-body p-3">

          <!--Body-->
          <div class="form-group">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-user text-primary"></i></div>
              </div>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Apellido y Nombre"
                required>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-envelope text-primary"></i></div>
              </div>
              <input type="email" class="form-control" id="nombre" name="email" placeholder="ejemplo@mail.com"
                required>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-comment text-primary"></i></div>
              </div>
              <textarea class="form-control" placeholder="Envianos tu Mensaje" required rows="6"></textarea>
            </div>
          </div>

          <div class="text-center">
            <input type="submit" value="Enviar" class="btn btn-primary btn-block rounded-0 py-2">
          </div>
        </div>

      </div>
    </form>
    <!--Form with header-->
  </div>

  <!--Google Map-->
    <div class="custom_bottom">
      <div class="contact-title">
        <h3 class="primary-title subpage-subtitle text-center" style="margin-bottom: 1.2em;">
            ¿Dónde estamos?
        </h3>
      </div>
      <div class="google-map">	
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3282.3254378787597!2d-58.45054178545383!3d-34.646483280448344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccbcf82ceea77%3A0x71ec3f853723e71b!2sPedernera%202790%2C%20C1406EFJ%20CABA!5e0!3m2!1ses-419!2sar!4v1570559186907!5m2!1ses-419!2sar"
                  frameborder="0"
                  style="border:0;"
                  id="map"
                  allowfullscreen="">
          </iframe>
      </div>
    </div>
    <script src="js/map.js"></script>
  <!--Google Map-->

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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>

</html>
