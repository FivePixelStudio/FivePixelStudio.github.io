
</div>

<div class="modal fade" id="Login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Ingresa a tu cuenta</h4>
      </div>
      <div class="modal-body">
          <form class="login_form" method="POST" action="<?php echo base_url(); ?>usuario/login">
          <label for="f_usuario">Nombre de Usuario</label>
          <input type="text" class="form-control" id="f_usuario" name="f_usuario" placeholder="Usuario"><br>
          <label for="f_usuario_pass">Contraseña</label>
          <input type="password" class="form-control" id="f_usuario_pass" name="f_usuario_pass" placeholder="Contraseña">
          <br>  
          <div class="text-right">
          <input type="button" name="login" onclick="validar_inicioSesion();" class=" login loginmodal-submit btn-info btn " value="Login">
          </div>
          </form>
          <br>
          <div class="errors" id="usuario_error"></div>
      </div>
          <div class="login-help">
          <a href="<?php echo base_url()?>usuario/registro ">Registrarse</a> - <a href="#">Olvidaste tu contraseña?</a>
          </div>
    </div>
  </div>
</div>


  <footer>
    <div class="container">
    	
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo">
          <a href="#"><img src="<?php echo BASE_ASSETS; ?>plantillas/plantilla_base/img/logo_footer.png" class="img-responsive" alt=""></a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 text-center navbar-footer">
          <ul class="list-inline">
            <li><a href="#">Principal</a></li>
            <li><a href="#">Staff</a></li>
            <li><a href="#">Contáctenos</a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 text-center social-footer">
          <div class="social">
            <ul class="list-inline">
              <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
      </div> <!-- Fin footer -->
    </div>
  </footer>

  <div class="copyright-footer text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        	Copyright © <?php echo date('Y'); ?> GAME PANEL <br>
          <span>Diseñado y Programado por <a href="#">GamePanel.com</a></span>
        </div>
      </div>
    </div>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo BASE_ASSETS; ?>/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo BASE_ASSETS; ?>bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

    <script>
      function validar_inicioSesion(){
        var datos_validacion = {
      f_usuario:$('#f_usuario').val(),
      f_usuario_pass:$('#f_usuario_pass').val()
        }
      console.log(datos_validacion);
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>usuario/validar_usuario_ajax",
        data: datos_validacion,

        success: function(result)
        { 
          console.log(result);
          
              if(result == 11){
                $( ".login_form" ).submit();
                $('#usuario_error').html('');
                 $('#usuario_error').removeClass('error');
              }else if(result == 00){
               $('#usuario_error').addClass('error');
               $('#usuario_error').html('el usuario no existe');
              }else 
              {
                $('#usuario_error').addClass('error');
                $('#usuario_error').html('contraseña incorrecta');
              }
          }
        }); 
      }
    </script>

    <style>
      .error{
        background-color: #F77;
        border-radius: 5px;
        padding: 10px;
        list-style-type: none;

      }
    </style>
  </body>
</html>