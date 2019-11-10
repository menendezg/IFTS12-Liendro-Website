<?php
// session
// Always in the init of php file when I want variables of session
require_once("utils/session.php");
$session = new session();
if($session->get('username'))
    {
        $name = $_SESSION['username'];
}

$links = [
    "index.php" => "INICIO",
    "us.php" => "Nosotros",
    "services.php" => "Servicios",
    "contact.php" => "Contacto",
];


// Explanation of this line 
// 
// this line do the following. 
// Basename is function to get the name with the url 
// relative to the project. 
// that means withot www and running ok. 
// with this line we get the name of te php file of we are. 
// Why we are doing this?
// With this, the nav, can hightlight when you are in the page dinamically 
// this mean, if you click " nosotros " the for each,  will check in the parameters
// if the url is the same and colorize dinamically
//
$current_file_name = basename($_SERVER['PHP_SELF']);

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark customnav">
      <a class="navbar-brand" href="index.php">
        <img class="img-fluid img-logo" width="200px" src="img/sierramax_logo2.png">
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarText"
        aria-controls="navbarText"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav">
        
        <?php 
            foreach($links as $url=>$value): 
                if($current_file_name == $url){
                ?>
                    <li class="nav-item active">
                    <a class="nav-link" 
                    href=<?echo $url;?>><?echo $value;?>
                    <span class="sr-only">(current)</span>
                    </a>
                    </li>
                
                <? }
                else {    ?>
                    <li class="nav-item">
                    <a class="nav-link" 
                    href=<?echo $url;?>><?echo $value;?>
                    <span class="sr-only">(current)</span>
                    </a>
                    </li>
 
               <?
                }    
            endforeach;
        

            // Check the following logic is for show the link to booking

        
            if($session->get('username')) {
        ?>    
                <a href="booking.php" class="nav-link">
                    <span>Turnos</span>
                </a>
        <?php
            }

            if($session->get('username')) {
        ?>    
        <a href="login.php?logout" class="logout-btn">
          <span>
            <i class="fa fa-power-off"></i>
            Cerrar Sesión
            </span>
        </a>
        <?
        }
        else {
        ?>
        <a href="login.php" class="signup-btn">
              <span>Iniciar Sesión</span>
            </a>
        <?
        }
        ?>
            
         </li>
        </ul>
      </div>
    </nav>

