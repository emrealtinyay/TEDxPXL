<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
	
	/**
	 * Deze functie laad alle hulp klassen en models.
	 *
	 * @author  Pieter-Jan Grondelaers
	 *
	 */
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('flexi_auth');
	}
	
	/**
	 * Deze functie gaat iemand inloggen.
	 *
	 * @author  Pieter-Jan Grondelaers
	 *
	 */
	public function index(){	
		$this->form_validation->set_rules('login_naam', 'Email', 'required|valid_email|max_length[50]|xss_clean');
		$this->form_validation->set_rules('login_wachtwoord', 'Password', 'required'); 	
		if($this->flexi_auth->is_logged_in() == false){
		if ($this->form_validation->run() == FALSE){
			redirect('fullpage');
		}else{
			if($this->flexi_auth->login($this->input->post('login_naam'),$this->input->post('login_wachtwoord'),false) == true){
				redirect('/fullpage_logged_in');
			}
			else{
				redirect('fullpage');
			}	
		}
		}
		else{
			redirect('fullpage_logged_in');
		}
	}
}