<?php
	namespace controllers;	
	use libs\Controller;
	use libs\View;

	class Usuario extends Controller{

		public function __construct(){
			try{
			parent::__construct();
			$this->loadModel();			
		}
		catch (Exception $e) {
						View::renderErrors(array($e->getMessage()));
					}
		}

		public function usuario_inicio(){
			try{
			$this->view->render(explode("\\",get_class($this))[1], "usuario_inicio",$this->getErrores());
		}
		catch (Exception $e) {
						View::renderErrors(array($e->getMessage()));
					}
		}		

		public function guardar_usuario($params=array()){
			try{
				echo "<script language='javascript'>";
				echo "alert('HOLAA')";
				echo "</script>";
				if(isset($params['usuario']) && isset($params['contrasenya']) && isset($params['nombre']) && isset($params['apellidos'])) {
					//$this->guardarProducto($params);
					//echo "lol";
					//print_r($params);
					$this->guardarUsuario($params);
					//$proveedores=$this->model->listarInventarios();
					//$this->crearProveedor($params);				
				}
				$this->view->render(explode("\\",get_class($this))[1], "guardar_usuario",$this->getErrores());
			}
			catch (Exception $e) {
				View::renderErrors(array($e->getMessage()));
			}
		}

		public function guardarUsuario($params){
			try {
				echo "<script language='javascript'>";
				echo "alert('HOLAA')";
				echo "</script>";
				$usuario = $params['usuario'];
				$contrasenya = $params['contrasenya'];
				$nombre = $params['nombre'];
				$apellidos = $params['apellidos'];

				if (count($this->errores)==0) {
					try {
						$this->model->crearUsuario($usuario,$contrasenya,$nombre,$apellidos);
					} catch (Exception $e) {
						$this->errores['global']=$e->getMessage();
					}
				}
				
			} catch (Exception $e) {
				View::renderErrors(array($e->getMessage()));
			}
		}

		public function index(){
			try{
			$this->view->render(explode("\\",get_class($this))[1], "index",$this->getErrores());
		}
		catch (Exception $e) {
						View::renderErrors(array($e->getMessage()));
					}
		}


	}