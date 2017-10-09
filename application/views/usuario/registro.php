<div class="container">
	<div class="row">
		<div class="col-sm-6">

			<?php echo $this->session->userdata('error_text'); ?>
			
			<h2>FORMULARIO</h2>
			<form action="<?php echo base_url(); ?>usuario/registrar" class="registrarse" method="POST" role="form">
				<div class="form-group">
					<div class="row">
						<div class="col-sm-6">
							<label for="f_usuario_r">Usuario</label>
							<div><input onkeyup="validar_usuario();" type="text" class="form-control" id="f_usuario_r" name="f_usuario_r" placeholder="Usuario"> <span style="float:right; margin-top:-32px; padding-right: 10px; font-size: 20px;" id="registro_error"></span></div>

						</div>
						<div class="col-sm-6"> 
							<label for="f_usuario_correo_r">Correo Electrónico</label>
							<input type="text" class="form-control" onchange="validar_email();" id="f_usuario_correo_r" name="f_usuario_correo_r" placeholder="Correo Electrónico" >
							<span style="float:right; margin-top:-32px; padding-right: 10px; font-size: 20px;" id="email_error"></span>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-sm-6">
							<label for="f_usuario_pass_r">Contraseña</label>
							<input type="password" class="form-control" id="f_usuario_pass_r" name="f_usuario_pass_r" placeholder="Contraseña">
						</div>
						<div class="col-sm-6">
							<label for="f_usuario_pass_confirm_r">Confirmación de Contraseña</label>
							<input type="password" class="form-control" id="f_usuario_pass_confirm_r" name="f_usuario_pass_confirm_r" placeholder="Confirmación de Contraseña">
						</div>
					</div>
				</div>
				<div class="text-right">
				<button type="button" onclick="validar_registro();" class="btn btn-primary">Registrarme</button>
				</div>
			</form>
			<br>	
			<div id="error_ajax">
				
			</div>
		</div>
		<div class="col-sm-6">
			<h2>REGISTRO DE USUARIO</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident natus voluptatem itaque error doloremque iusto voluptas, praesentium eveniet est! Labore asperiores fuga doloribus ad dignissimos nostrum delectus quos officiis, minima.</p>
		</div>
	</div>
</div>

<style>
	/*.form-control:focus {outline:none;border:1px solid #CCC;}*/

	

</style>

<script>
 

	function validar_usuario()
	{
		//$('#f_usuario').removeClass('input_rojo');

		var datos_registro = {
			f_usuario:$('#f_usuario_r').val()
		}
		$('#registro_error').html('<span style="color:#ccc;"><i class="fa fa-spinner fa-pulse  fa-fw"></i></span>');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>usuario/validar_usuario_ajax",
			data: datos_registro,
			success: function(result)
			{
				$('#registro_error').html("");
        		if(result == 1){
        			$('#registro_error').html('<span style="color:red;"><i class="fa fa-times" aria-hidden="true"></i></span>');
        			//$('#f_usuario').addClass('input_rojo');
        		}else{
        			$('#registro_error').html('<span style="color:green;"><i class="fa fa-check" aria-hidden="true"></i></span>');


        			//$('#f_usuario').addClass('input_verde');

        			
        		}
    		}
    	});	
	}

	function validar_email() {
	var datos_email = {
			f_usuario_correo:$('#f_usuario_correo_r').val()
			}
    var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
    	
	    console.log(datos_email.f_usuario_correo);
    	console.log(pattern.test(datos_email.f_usuario_correo));

    	if(!pattern.test(datos_email.f_usuario_correo)) {$('#email_error').html('<span style="color:red;"><i class="fa fa-times" aria-hidden="true"></i></span>');}
    	else{
    		$('#email_error').html('<span style="color:green;"><i class="fa fa-check" aria-hidden="true"></i></span>');
    	}
};

	function validar_registro()
	{

		var datos_registro_ajax = {
			f_usuario: 				$('#f_usuario_r').val(),
			f_usuario_correo: 		$('#f_usuario_correo_r').val(),
			f_usuario_pass: 		$('#f_usuario_pass_r').val(),
			f_usuario_pass_confirm: $('#f_usuario_pass_confirm_r').val()
		}

		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>usuario/registrar_ajax",
			data: datos_registro_ajax,
			success: function(result){
        		
        		$('#error_ajax').html(result);
        		$('#error_ajax').removeClass('hide');
        		if(result=='')
        		{
        			$('.registrarse').submit();
        		}
    		}
    	});
		
	}






        

</script>











