<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fullpage extends CI_Controller {
	
	/**
	 * Deze functie laad alle hulp klassen en models.
	 *
	 * @author  Pieter-Jan Grondelaers, Glenn Bertjens
	 *
	 */
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('contact_model');
		$this->load->model('events_model');
		$this->load->model('news_model');
        $this->load->model('profile_model');
		$this->auth = new stdClass;
		$this->load->library('flexi_auth');
		$this->load->library('session');		
	}
	
	/**
	 * Deze functie laad de home pagina.
	 * !!!HET DESIGN VAN DE HELE HOMEPAGINA IS VAN HET INTERNET SOURCE : ASHLEY BOOTSTRAP!!!
	 *
	 * @author  Pieter-Jan Grondelaers, Glenn Bertjens
	 *
	 */
	public function index(){
		if($this->flexi_auth->is_logged_in() == false){
			$data['data'] = $this->events_model->haalEventsOp();
			$data['css'] = 	
			$this->load->view('header_logged_out_view');
			$this->load->view('home_view');
			$leden['leden'] = $this->news_model->nieuwLeden();
        	$data3 = array ( 
            	'lid0' => $this->profile_model->haalGegevensOp($leden['leden'][0]['uacc_username']),
            	'lid1' => $this->profile_model->haalGegevensOp($leden['leden'][1]['uacc_username']),
            	'lid2' => $this->profile_model->haalGegevensOp($leden['leden'][2]['uacc_username'])
        	);           	
			$data_leden = array(
            	'leden' => $leden,
            	'data' => $data3
        	);
			$this->load->view('news_view', $data_leden);
			$this->load->view('about_view');
			$this->load->view('events_view', $data);
			$this->load->view('team_view');
			$this->form_validation->set_rules('name', 'Name', 'required|xss_clean|max_length[50]');			
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[50]');			
			$this->form_validation->set_rules('phone', 'Phone', 'required|is_numeric|max_length[50]');			
			$this->form_validation->set_rules('comments', 'Comments', 'required|max_length[250]');		
			$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');		
			if ($this->form_validation->run() == FALSE){
				$this->load->view('contact_view');
			}
			else{
				$form_data = array(
								'name' => set_value('name'),
								'email' => set_value('email'),
								'phone' => set_value('phone'),
								'comments' => set_value('comments')
				);	
				if ($this->contact_model->SaveForm($form_data) == TRUE){
					$this->load->view('contact_success_view');
				}
			}
			$this->load->view('footer_view');
		}
		else{
			redirect('/fullpage_logged_in');
		}
	
	}
}