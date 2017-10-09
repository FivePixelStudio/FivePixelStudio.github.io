<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function index()
	{
		// $this->load->view('plantillas/plantilla_header');
		// $this->load->view('inicio');
		// $this->load->view('plantillas/plantilla_footer');
	}
	public function caja()
	{
		$this->load->view('plantillas/plantilla_header');
		$this->load->view('monedero/cajero');
		$this->load->view('plantillas/plantilla_footer');
	}
	public function ajax()
	{
		$f_usuario = $this->input->post('f_usuario');
		echo "El valor enviado es: ".$f_usuario;
	}

	public function registro()
	{
		// CONTROL DE ACCESO Y SEGURIDAD
		if($this->session->userdata('log_estado') == 'OK'){ redirect(base_url()); }

		$this->load->view('plantillas/plantilla_header');

		if($this->session->userdata('log_estado') == 'OK'){
			echo "Usted ya esta registrado";
		}else{
			$this->load->view('usuario/registro');
		}

		$this->load->view('plantillas/plantilla_footer');
	}

	public function salir()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function validar_usuario_ajax()
	{
		$f_usuario = $this->input->post('f_usuario');

		$this->load->model('usuario_model');

		$usuario_validado = $this->usuario_model->validar_usuario($f_usuario);
		
		if($usuario_validado){
			echo 1;
		}else{
			echo 0;
		}

		if($this->input->post('f_usuario_pass')!=''){
		$f_usuario_pass = $this->input->post('f_usuario_pass');
		$f_usuario_pass = md5($f_usuario_pass);
		$pass_validado = $this->usuario_model->login($f_usuario,$f_usuario_pass);

		if($pass_validado){
			echo 1;
		}else{
			echo 0;
		}
		}
		// CONTROL DE SEGURIDAD 
		

		
	}

 	public function registrar_ajax()
 	{
 		
 		// CAPTURAR LOS DATOS ENVIADOS POR EL FORMULARIO
		// CREAR UN ARREGLO PARA LA DB

		$f_usuario              = $this->input->post('f_usuario');
		$f_usuario_correo       = $this->input->post('f_usuario_correo');
		$f_usuario_pass         = $this->input->post('f_usuario_pass');
		$f_usuario_pass_confirm = $this->input->post('f_usuario_pass_confirm');
		// CONTROLES DE SEGURIDAD
		// ======================
		// PASSWORD ESTE CONFIRMADO

		// CARGO EL MODELO
		$this->load->model('usuario_model');

		// CONTROL DE SEGURIDAD
		$error_count = 0;
		$error_text = "";

		if($f_usuario == '' || $f_usuario_correo == '' || $f_usuario_pass == ''){
			$error_text .= '<li class="error">Hay datos vacios.</li><br>';
			$error_count++;
		}else{
			if($f_usuario_pass != $f_usuario_pass_confirm){
				$error_text .= '<li class="error">Contraseñas Diferentes.</li><br>';
				$error_count++;
			}

			$usuario_validado = $this->usuario_model->validar_usuario($f_usuario);
			if($usuario_validado){
				$error_text .= '<li class="error">Usuario en uso.</li><br>';
				$error_count++;
			}

			$email_validado = $this->usuario_model->validar_email($f_usuario_correo);
			if($email_validado){
				$error_text .= '<li class="error">Correo Electrónico en uso.</li><br>';
				$error_count++;
			}
		}
		if($error_count > 0){
			$error = $error_text;
				
			echo $error;
		}

 	}

	public function registrar()
	{
		// CAPTURAR LOS DATOS ENVIADOS POR EL FORMULARIO
		// CREAR UN ARREGLO PARA LA DB

		$f_usuario              = $this->input->post('f_usuario_r');
		$f_usuario_correo       = $this->input->post('f_usuario_correo_r');
		$f_usuario_pass         = $this->input->post('f_usuario_pass_r');
		$f_usuario_pass_confirm = $this->input->post('f_usuario_pass_confirm_r');

		// CONTROLES DE SEGURIDAD
		// ======================
		// PASSWORD ESTE CONFIRMADO

		// CARGO EL MODELO
		$this->load->model('usuario_model');

		// CONTROL DE SEGURIDAD
		$error_count = 0;
		$error_text = "";

		if($f_usuario == '' || $f_usuario_correo == '' || $f_usuario_pass == ''){
			//$error_text .= '<li>Hay datos vacios.</li>';
			$error_count++;
		}else{
			if($f_usuario_pass != $f_usuario_pass_confirm){
				//$error_text .= '<li>Contraseñas Diferentes.</li>';
				$error_count++;
			}

			$usuario_validado = $this->usuario_model->validar_usuario($f_usuario);
			if($usuario_validado){
				//$error_text .= '<li>Usuario en uso.</li>';
				$error_count++;
			}

			$email_validado = $this->usuario_model->validar_email($f_usuario_correo);
			if($email_validado){
				//$error_text .= '<li>Correo Electrónico en uso.</li>';
				$error_count++;
			}
		}
		if($error_count > 0){
			$error = array(
				'error' => 1,
				'error_text' => $error_text
				);
			$this->session->set_userdata($error);
			redirect(base_url().'usuario/registro');
			exit();
		}

		$f_usuario_pass = md5($f_usuario_pass);

		$datos_registro = array(
			'usuario'     => $f_usuario, 
			'email'       => $f_usuario_correo, 
			'password'    => $f_usuario_pass,
			'vip'         => 0,
			'conexion'    => date('Y-m-d H:i:s'),
			'creado'      => date('Y-m-d H:i:s'),
			'actualizado' => date('Y-m-d H:i:s')
		);

		// CREACIÓN DE LA CUENTA EN DB
		$this->usuario_model->alta($datos_registro);

		// QUE ES LO QUE EJECUTO MYSQL?
		// echo $this->db->last_query();



		// INICIAR SESSION DEL USUARIO
		$datos_login = array(
			'log_estado'   => 'OK',
			'log_id'  	   => $this->db->insert_id(),
			'log_usuario'  => $f_usuario,
			'log_vip'      => 0,
			'log_coins'    => 0,
			'log_conexion' => date('Y-m-d H:i:s')
		);
		$this->session->set_userdata($datos_login);

		// REDIRECCIONAR A OTRO CONTROLADOR Y OTRA FUNCION
		redirect(base_url());
	}

	public function login()
	{
		// DATOS DE UN FORMULARIO
		$f_usuario      = $this->input->post('f_usuario');
		$f_usuario_pass = $this->input->post('f_usuario_pass');

		// CARGA EL MODELO DE DB
		$this->load->model('usuario_model');

		// BUSCO SI EXISTE EL USUARIO Y CONTRASEÑA
		$f_usuario_pass = md5($f_usuario_pass);
		$usuario_validado = $this->usuario_model->login($f_usuario, $f_usuario_pass);
		
		if($usuario_validado){
			// SI EXITE GENERO EL DATO EN SESSION
			$datos_login = array(
				'log_estado'   => 'OK',
				'log_id'  	   => $usuario_validado->id,
				'log_usuario'  => $usuario_validado->usuario,
				'log_vip'      => $usuario_validado->vip,
				'log_coins'    => $usuario_validado->coins,
				'log_conexion' => date('Y-m-d H:i:s')

			);
			$this->session->set_userdata($datos_login);
		}
		redirect();
	}

	public function perfil()
	{
		if($this->session->userdata('log_estado') != 'OK'){
			redirect();
		}
		$usuario_id = $this->session->userdata('log_id');

		
		$this->load->model('usuario_model');
		$this->load->model('pais_model');
		$this->load->model('genero_model');


		$datos_perfil = $this->usuario_model->obtener($usuario_id);
		$datos_paises = $this->pais_model->obtener_todos();
		$dato_genero = $this->genero_model->obtener_todos();

		//print_r($datos_paises);
		$datos = array(
			'usuario' => $datos_perfil,
			'paises' => $datos_paises,
			'generos' =>$dato_genero

		 );
		 $this->load->view('plantillas/plantilla_header');
		 $this->load->view('usuario/perfil',$datos);
		 $this->load->view('plantillas/plantilla_footer');

		
	}
	
	public function perfil_update()
	{
		if($this->session->userdata('log_estado') != 'OK'){
			redirect();
		}
		$this->load->model('usuario_model');
		$usuario_id = $this->session->userdata('log_id');
		$f_usuario = $this->input->post('f_usuario');
		$f_nombre = $this->input->post('f_nombre');
		$f_apellido = $this->input->post('f_apellido');
		$f_sexo = $this->input->post('f_sexo');
		$f_pais = $this->input->post('f_pais');
		$f_fechanac = $this->input->post('f_fechanac');

		$datos_perfil_update = array(
			'usuario'     => $f_usuario, 
			'nombre'       => $f_nombre, 
			'apellido'    => $f_apellido,
			'sexo'    => $f_sexo,
			'paises_id' => $f_pais,
			'fechanac'    => $f_fechanac
			);
		 $this->usuario_model->modifica($datos_perfil_update,$usuario_id);
		redirect("usuario/perfil");

	}
	
}






