<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fullpage_logged_in extends CI_Controller {

	/**
	 * Deze functie laad alle hulp klassen en models.
	 *
	 *  -, Glenn Bertjens
	 * @author  Glenn Bertjens, Ali Eren, Emre Altinyay
	 *
	 */
	function __construct(){
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
	 * Deze functie laad de home pagina voor wie ingelogt is.
	 *
	 *  -, Glenn Bertjens
	 * @author  Glenn Bertjens, Ali Eren, Emre Altinyay
	 *
	 */
	public function index(){
		$year = date('Y');
		$month = (int) date('m');
		$this->display($year, $month);
	}

	public function display($year= null, $month = null){
		if(!$year) 
		{
			$year = date('Y');
		}
		if(!$month) 
		{
			$month = date('m');
		}

		$this->load->model('mycal_model');
		
		if($day = $this->input->post('day')) 
		{
			$this->mycal_logged_in_model->add_calendar_data(
				"$year-$month-$day",
				$this->input->post('data')
			);
		}

		$data1['calendar'] = $this->mycal_model->generate($year, $month);

		if($this->flexi_auth->is_logged_in() == true){
			$data = array( 'data' => $this->flexi_auth->get_user_by_id_row());
			$data_foto['foto'] = $this->profile_model->haalGegevensOp($data['data']->uacc_username);
			$data_totaal = array( 	'user_data' => $data,
									'foto' => $data_foto
			);		
			//$data1['data'] = $this->events_model->haalEventsOp();
		 	$this->load->view('header_logged_in_view', $data_totaal);
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

			/* Events pagina */
			$this->load->view('events_logged_in_view',$data1);


			$this->form_validation->set_rules('naam', 'Naam', 'trim|xss_clean|required');
			$this->form_validation->set_rules('locatie', 'Locatie', 'trim|xss_clean|required');
			$this->form_validation->set_rules('adres', 'Adres', 'trim|xss_clean|required');
			$this->form_validation->set_rules('tijd', 'Tijd', 'trim|xss_clean|required');
			$this->form_validation->set_rules('datum', 'Datum', 'trim|xss_clean|required');
			$this->form_validation->set_rules('maand', 'Maand', 'trim|xss_clean|required');
			$this->form_validation->set_rules('info', 'Info', 'trim|xss_clean|required');

			if($this->input->post('submit') == 'Maak Event'){
				if ($this->form_validation->run() == FALSE){
					//redirect('fullpage');
					echo $data['data']->uacc_username;
				}
				else
				{
					/* Bij events voeg een kolom toe met user id !! */
					$data = array (
					'naam' => $this->input->post('naam') ,
					'locatie' => $this->input->post('locatie') ,
					'adres' => $this->input->post('adres'),
					'tijd' => $this->input->post('tijd') ,
					'datum' => $this->input->post('datum') ,
					'maand' => $this->input->post('maand') ,
					'info' => $this->input->post('info')
					);
					$this->events_model->voegEventToe($data);
					//redirect('fullpage');
					
				}
			}

			$this->load->view('team_view');

			/* Contact pagina */
			$this->form_validation->set_rules('name', 'Name', 'required|xss_clean|max_length[50]');			
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[50]');			
			$this->form_validation->set_rules('phone', 'Phone', 'required|is_numeric|max_length[50]');			
			$this->form_validation->set_rules('comments', 'Comments', 'required|max_length[250]');
			$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');		
			if ($this->form_validation->run() == FALSE){
				$this->load->view('contact_view');
			}
			else
            {
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
	}
}

