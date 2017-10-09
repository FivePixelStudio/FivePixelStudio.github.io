<div class="wrapper">
  <div class="container">

    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
	      <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
	        <li role="presentation" class="active">
	          <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
	            <span class="text">perfil</span>
	          </a>
	        </li>
	        <li role="presentation" class="next">
	          <a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">
	            <span class="text">mis juegos</span>
	          </a>
	        </li>
	        <li role="presentation" class="dropdown">
	          <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDrop1-contents">
	            <span class="text">cajero</span>
	            <span class="caret">
	            </span>
	          </a>
	          <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
	            <li>
	              <a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">
	                <span>monedero</span>
	              </a>
	            </li>
	            <li>
	              <a href="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">
	                <span>transacciones</span>
	              </a>
	            </li>
	          </ul>
	        </li>
	        
	      </ul>
     	 <div id="myTabContent" class="tab-content">
		<div class="row">
			<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
				<?php //echo $this->session->userdata('error_text'); ?>
					<br><br>
				<div class="col-sm-6 hide" id="configurar" >
					
					<form id="perfil_form" action="<?php echo base_url(); ?>usuario/perfil_update" method="POST" role="form">
					
					<div class="hide">
					<label for="f_usuario">Nombre de Usuario <span id="usuario_disponibilidad"></span></label>
					<input onkeyup="validar_nombre_usuario();" type="text" class="form-control" id="f_usuario" name="f_usuario" value="<?php echo $usuario->usuario;?>" ></div>
					</br>
					<label for="f_nombre">Nombre</label>
					<input type="text" class="form-control" id="f_nombre" name="f_nombre" value="<?php echo $usuario->nombre;?>">
					</br>
					<label for="f_apellido">Apellido</label>
					<input type="text" class="form-control" id="f_apellido" name="f_apellido" value="<?php echo $usuario->apellido;?>">
					</br>
					<label for="f_sexo">Sexo</label>
					<select class="form-control" name="f_sexo" id="f_sexo">
						<!-- <option value='0'>Hombre</option>
						<option value='1'>Mujer</option>
						<option value='2'>Otro</option> -->
						<?php foreach ($generos as $genero) {
							if ($genero->id == $usuario->sexo) {
								echo '<option value="'.$genero->id.'" selected>'.$genero->genero.'</option>';
							}else{
								echo '<option value="'.$genero->id.'">'.$genero->genero.'</option>';	
							}
						} ?>


					</select>
					</br>
					<label for="f_pais">Pais</label>
					<select class="form-control" name="f_pais" id="f_pais">
						
						<?php foreach ($paises as $pais) {
							if ($pais->id == $usuario->paises_id) {
								echo '<option value="'.$pais->id.'" selected>'.$pais->nombre.'</option>';
							}else{
								echo '<option value="'.$pais->id.'">'.$pais->nombre.'</option>';	
							}
						} ?>
						
					</select>
					</br>
					<label for="f_fechanac">Fecha de nacimiento</label>
					<input type="date" class="form-control" id="f_fechanac" name="f_fechanac" value="<?php echo $usuario->fechanac;?>">
					</br>
					<div class="text-right" >
					<button type="button" id="guardar" class="btn btn-info" onclick="subir_datos_validos();">guardar</button>
					</div>
					</form>
				</div>

			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id="datos_perfil">
				<img src="<?php echo BASE_ASSETS; ?>plantillas/plantilla_base/img/usuario_default.jpg"  style="max-height:50%; width:250px;float:left; margin:5px;" class="img-responsive" alt="Image">

				

				<div class="text-right" >
				<h1><?php echo $usuario->usuario ?></h1>
				<h3>Coins <?php echo $this->session->userdata('log_coins'); ?></h3></div>
				
			</div>
			<div class="col-sm-6 text-right">
				<button type="button" class="btn btn-info" id="btn-config" onclick="abrir_config();"><i class="fa fa-cog" aria-hidden="true" ></i> Configurar Perfil</button>
			</div>
		</div>
		
        <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
          
        </div>
        <div role="tabpanel" class="tab-pane fade" id="dropdown1" aria-labelledby="dropdown1-tab">
         
        </div>
        <div role="tabpanel" class="tab-pane fade" id="dropdown2" aria-labelledby="dropdown2-tab">
         
        </div>
        <div role="tabpanel" class="tab-pane fade" id="samsa" aria-labelledby="samsa-tab">
         
        </div>
</div>
      </div>
    </div>
  </div>
</div>
<script>
	var configurar=false;
	var errors=0;
	function abrir_config(){
		if(configurar)
		{
			configurar=false;
			$('#configurar').addClass('hide');
			$('#btn-config').removeClass('hide');
			$('#datos_perfil').removeClass('hide');
			
		}
		else
		{
			configurar=true;
			$('#configurar').removeClass('hide');
			$('#datos_perfil').addClass('hide');
			$('#btn-config').addClass('hide');
			}
	}
	function subir_datos_validos()
	{
		if(errors==0){
		$('#perfil_form').submit();}
	}
	function validar_nombre_usuario()
	{	$('#btn-config').addClass('hide');
			$('#datos_perfil').addClass('hide');
			

	
		var datos_validacion = 
			{
				f_usuario:$('#f_usuario').val()
			}
		if($('#f_usuario').val() != '<?php echo $usuario->usuario;?>')
		{
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>usuario/validar_usuario_ajax",
				data: datos_validacion,
				success: function(result){
	        		if(result == 1){
	        			$('#usuario_disponibilidad').html('<span style="color:red;"> usuario no disponible </span>');
	        			errors=1;
	        			$('#f_usuario').addClass('error');

	        		}else{
	        			$('#usuario_disponibilidad').html('<span style="color:green;"> usuario disponible</span>');
	        			errors=0;
	        			$('#f_usuario').removeClass('error');

	        		}
	    		}
	    	});	
		}
	}
</script>

<style>
	
	.error
	{
		background-color: #a77;
	}
</style>