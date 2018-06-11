<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 date_default_timezone_set("America/Mexico_city");

class Eltorreon extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('eltorreon_model');
		$this->load->library('session');
		$this->load->helper(array('download', 'file', 'url', 'html', 'form'));
		$this->load->library('email');

	}

	public function index()
	{
		$this->load->view('paginaPrincipal');
	}
	public function vistaLogin()
	{
		$this->load->view('login/vistaLogin');
	}
	public function registrarme()
	{
		$this->load->view('login/registrarme');

	}
	public function login(){
					if($this->input->post()){
						$Usuario= $this->eltorreon_model->login($this->input->post('Usuario'),($this->input->post('Password')));

						if(!is_object($Usuario)){

							 $this->session->set_flashdata('resp','El usuario y/o contraseña son incorrectos');
							 $this->session->set_flashdata('user', $this->input->post('Usuario'));
							 $this->session->set_flashdata('psw', $this->input->post('Password'));
							
							redirect('eltorreon/vistaLogin');
						}else{
							$date=date("Y-m-d H:i:s");

							$this->session->set_userdata('Usuario',$Usuario->Nombre);
							$this->session->set_userdata('IdCliente',$Usuario->IdCliente);


							$fechaHora=$date;
							$this->eltorreon_model->update($fechaHora,$Usuario->IdCliente);

							redirect('eltorreon/templateAdmin');
						}
					}
					else{
							$this->session->set_flashdata('resp','El usuario y/o contraseña son incorrectos');
							redirect('eltorreon/vistaLogin','refresh');
					}
		

	}//FIN LOGIN
	public function logout(){
		$this->session->sess_destroy();
		 redirect('eltorreon/index');
	}
	//FUNCIONES ADMINISTRADOR
	public function templateAdmin()
	{
		if($this->session->userdata('Usuario')){
			$cliente = $this->eltorreon_model->accesoTclientes($this->session->userdata('IdCliente'));	
				$data['registro'] = $cliente;
			$productos = $this->eltorreon_model->verTproductos();
	 			$data['productos']=$productos;

		$this->load->view('admin/adminPrincipal');
		$this->load->view('admin/productos',$data);
		}else
		{
			redirect('eltorreon/index');
		}
		

	}
	 public function productos()
	 {
	 	if($this->session->userdata('Usuario')){
	 	$cliente = $this->eltorreon_model->accesoTclientes($this->session->userdata('IdCliente'));	
				$data['registro'] = $cliente;
	 	$productos = $this->eltorreon_model->verTproductos();
	 		$data['productos']=$productos;
	 	$this->load->view('admin/adminPrincipal');
	 	$this->load->view('admin/productos',$data);
	 	$this->load->view('admin/producAgregados',$data);
	 	}else
	 	{
	 		redirect('eltorreon/index');
	 	}
		

	 }
	  public function agregarProducto()
	 {	
			if ($this->session->userdata('Usuario')) {
			
			$IdCliente = $this->input->post('IdCliente');
			$idProducto = $this->input->post('idProducto');
			$Cantidad = $this->input->post('Cantidad');
			$Codigo = $this->input->post('Codigo');
			$Nombre = $this->input->post('Nombre');
			$Categoria = $this->input->post('Categoria');
			$Precio = $this->input->post('Precio');
			$Descripcion = $this->input->post('Descripcion');
						
      

			$this->eltorreon_model->inserTemProducto($IdCliente,$idProducto,$Cantidad,$Codigo,$Nombre,$Categoria,$Precio,$Descripcion);

				$this->session->set_flashdata('mensaje','El Producto se Agrego Correcamente');
				redirect('Eltorreon/productos'); 
				}else{
					redirect('eltorreon/index'); 
				}
			
			}	
}
	 	
	 