<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register extends CI_Controller {

	/**
	 * Deze functie laad alle hulp klassen en models.
	 *
	 * @author  Glenn Bertjens
	 *
	 */
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('profile_model');
		$this->load->library('flexi_auth');
		//$this->load->library('session');
	
	}
	
	/**
	 * Deze functie laad de register pagina.
	 *
	 * @author  Glenn Bertjens
	 *
	 */
	public function index(){
		$this->form_validation->set_rules('register_gebruikersnaam', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean');
		$this->form_validation->set_rules('register_wachtwoord', 'Password', 'trim|required|matches[register_wachtwoordbevestigen]');
		$this->form_validation->set_rules('register_wachtwoordbevestigen', 'Password Confirmation', 'trim|required');
		$this->form_validation->set_rules('register_emailadres', 'Email', 'trim|required|valid_email|xss_clean');	
		$this->load->view('header_logged_out_other_view');
		$this->load->view('register_view');
		
		/* hier moet nog een controle gemaakt worden, als email of gebruikersnaam al bestaat !! */
		if($this->input->post('register_user')== 'Register'){		
			if ($this->form_validation->run() == FALSE){
				$this->load->view('register_failed_view');
			}else{
				/* Controle als email of gebruikersnaam al bestaat !!*/
				$this->flexi_auth->insert_user($this->input->post('register_emailadres'), $this->input->post('register_gebruikersnaam'), $this->input->post('register_wachtwoord'), false, false,true);
				$data = array( 'username' => $this->input->post('register_gebruikersnaam'));
				$this->profile_model->VoegGebruikerToe($data);
				redirect('/fullpage');
			}
		}
		$this->load->view('footer_view');
	
	}
}
