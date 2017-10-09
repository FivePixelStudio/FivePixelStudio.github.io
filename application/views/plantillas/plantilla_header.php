<?php define("BASE_ASSETS", base_url().'assets/') ?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>GamePanel</title>
    <!-- Bootstrap -->
    <link href="<?php echo BASE_ASSETS; ?>bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_ASSETS; ?>font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo BASE_ASSETS; ?>plantillas/plantilla_base/style.css">

  </head>
  <body>
      <!--Base sin css -->
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a  href="<?php echo base_url(); ?>">
        <img src="<?php echo BASE_ASSETS; ?>plantillas/plantilla_base/img/logo_menu.png" class="img-responsive" alt="Image">
      </a>
    </div>

        
    <div class="collapse navbar-collapse navbar-ex1-collapse">

      <ul class="nav navbar-nav navbar-right">
        <?php if($this->session->userdata('log_estado') == 'OK'){ ?>
        <li ><a data-toggle="modal" href="#" ><i class="fa fa-superpowers" aria-hidden="true"></i> Coins <?php echo $this->session->userdata('log_coins');  ?> </a></li>
        <?php } ?>

        <?php if($this->session->userdata('log_estado') == 'OK'){ ?>
        <li><a data-toggle="modal" href="<?php echo base_url(); ?>usuario/perfil"><i class="fa fa-user-circle-o" aria-hidden="true"> </i> <?php echo $this->session->userdata('log_usuario');  ?>  </a></li>
        <?php } ?>

        <?php if($this->session->userdata('log_estado') == 'OK'){ ?>
        <li><a data-toggle="modal" href="<?php echo base_url(); ?>usuario/salir"><i class="fa fa-power-off" aria-hidden="true"></i>
         Salir</a></li>
        <?php }else{ ?>

        <li><a data-toggle="modal" href="<?php echo base_url(); ?>usuario/registro">Registrarse</a></li>
        <?php } ?>

         <?php if($this->session->userdata('log_estado') != 'OK'){ ?>
        <li><a data-toggle="modal" href="#Login-modal"><i class="fa fa-sign-in" aria-hidden="true"></i> Conectarse</a></li>
        <?php } ?>

      </ul>
    </div>
    </div>
      </div>
</nav>

<div class="cuerpo_general">
