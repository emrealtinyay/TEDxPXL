<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logout extends CI_Controller {
	
	/**
	 * Deze functie laad alle hulp klassen en models.
	 *
	 *  -
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
	 * Deze functie gaat de sessie stoppen en je uitloggen.
	 *
	 *  -
	 *
	 */
	public function index(){		
		if($this->flexi_auth->is_logged_in() == true){
			$this->flexi_auth->logout(false);
			redirect('/fullpage');
		}	
	}
}