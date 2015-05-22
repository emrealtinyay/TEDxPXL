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
		/* huidige jaar wordt in een variabele gestopt */
		$year = date('Y');

		/* huidige maand wordt in een variabele gestopt */
		$month = (int) date('m');

		/* functie display word opgeroepen */ 
		$this->display($year, $month);
	}

	public function display($year= null, $month = null){
		/* Als jaar niet bestaat krijgt die automatisch het huidig jaar */
		if(!$year) 
		{
			$year = date('Y');
		}

		/* Als maand niet bestaat krijgt die automatisch het huidig maand */
		if(!$month) 
		{
			$month = date('m');
		}

		/* mycal_model wordt geladen */
		$this->load->model('mycal_model');

		/* calendar wordt gegeneerd met de gegevens van doorgegeven maand en jaar */
		$data1['calendar'] = $this->mycal_model->generate($year, $month);

		/* controle op login */
		if($this->flexi_auth->is_logged_in() == true)
		{
			/* Gegevens van ingelogde user ophalen */
			$data = array( 'data' => $this->flexi_auth->get_user_by_id_row());

			/* haalt de foto van de user op */
			$data_foto['foto'] = $this->profile_model->haalGegevensOp($data['data']->uacc_username);

			/* gegevens en de foto worden in een array gestopt */
			$data_totaal = array( 	
				'user_data' => $data,
				'foto' => $data_foto
				);	

			//$data1['data'] = $this->events_model->haalEventsOp();
			/* Header word geladen */
		 	$this->load->view('header_logged_in_view', $data_totaal);
			
			/* home view wordt gelanden */
			$this->load->view('home_view');
			
			/* nieuwe leden worden in een array gestopt */
			$leden['leden'] = $this->news_model->nieuwLeden();

			/* username van de leden worden opgehaald (nieuwe leden) */
        	$data3 = array ( 
            	'lid0' => $this->profile_model->haalGegevensOp($leden['leden'][0]['uacc_username']),
            	'lid1' => $this->profile_model->haalGegevensOp($leden['leden'][1]['uacc_username']),
            	'lid2' => $this->profile_model->haalGegevensOp($leden['leden'][2]['uacc_username'])
        	);

        	/* alle gegevens van nieuwe leden worden in 1 array gestopt */           	
			$data_leden = array(
            	'leden' => $leden,
            	'data' => $data3
        	);
			
			/* views worden geladen */
			$this->load->view('news_view', $data_leden);
			$this->load->view('about_view');
			$this->load->view('events_logged_in_view',$data1);

			/* Validatie regels */
			$this->form_validation->set_rules('naam', 'Naam', 'trim|xss_clean|required');
			$this->form_validation->set_rules('locatie', 'Locatie', 'trim|xss_clean|required');
			$this->form_validation->set_rules('adres', 'Adres', 'trim|xss_clean|required');
			$this->form_validation->set_rules('tijd', 'Tijd', 'trim|xss_clean|required');
			$this->form_validation->set_rules('datum', 'Datum', 'trim|xss_clean|required');
			$this->form_validation->set_rules('maand', 'Maand', 'trim|xss_clean|required');
			$this->form_validation->set_rules('info', 'Info', 'trim|xss_clean|required');

			/* bij klikken op Maak event */
			if($this->input->post('submit') == 'Maak Event')
			{
				/* controle op validatie */
				if ($this->form_validation->run() == FALSE)
				{
					redirect('fullpage');
				}
				else
				{
					/* Bij events voeg een kolom toe met user id !! */
					/* echo $data['data']->uacc_username; */
					/* ingevoerde gegevens worden in een array gestopt */
					$data = array (
					'naam' => $this->input->post('naam') ,
					'locatie' => $this->input->post('locatie') ,
					'adres' => $this->input->post('adres'),
					'tijd' => $this->input->post('tijd') ,
					'datum' => $this->input->post('datum') ,
					'maand' => $this->input->post('maand') ,
					'info' => $this->input->post('info')
					);

					/* gegevens worden in events tabel toegevoegd */
					$this->events_model->voegEventToe($data);
					redirect('fullpage');
					
				}
			}

			/* bij klikken op Delete event */
			if($this->input->post('submit') == 'Delete Event')
			{
				/* controle op validatie */
				if ($this->form_validation->run() == FALSE)
				{
					redirect('fullpage');
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

			/* Contact pagina validatie regels */
			$this->form_validation->set_rules('name', 'Name', 'required|xss_clean|max_length[50]');			
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[50]');			
			$this->form_validation->set_rules('phone', 'Phone', 'required|is_numeric|max_length[50]');			
			$this->form_validation->set_rules('comments', 'Comments', 'required|max_length[250]');
			$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');	

			/* bij klikken op Contact */
			if($this->input->post('submit') == 'Submit')
			{
				/* controle op validatie */
				if ($this->form_validation->run() == FALSE)
				{
					$this->load->view('contact_view');
				}
				else
	            {
	            	/* gegevens worden in een array gestopt met nog extra controle (set_value) */
					$form_data = array(
						'name' => set_value('name'),
						'email' => set_value('email'),
						'phone' => set_value('phone'),
						'comments' => set_value('comments')
						);		
					if ($this->contact_model->SaveForm($form_data) == TRUE)
					{
						$this->load->view('contact_success_view');
					}	
				}
			}	
		$this->load->view('footer_view');
		}
	}
}

