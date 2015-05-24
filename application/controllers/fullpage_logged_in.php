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

	public function display($year= null, $month = null)
	{
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

			/* Controle of user admin is of niet */
			if($data['data']->uacc_group_fk == 2) 
			{
				/* header van admin wordt geladen */
				$this->load->view('admin/header_logged_in_view', $data_totaal);
			}
			else 
			{
				/* gewone header wordt geladen */
				$this->load->view('header_logged_in_view', $data_totaal);
			}
		
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
			$this->load->view('team_view');
			$this->load->view('contact_view');
			$this->load->view('footer_view');

			
			/* bij klikken op Maak event */
			if($this->input->post('submit') == 'Maak Event')
			{
				$this->maakEvent($data['data']->uacc_username);
				
			}

			/* bij klikken op Contact */
			if($this->input->post('submit') == 'Submit')
			{
				$contact = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'comments' => $this->input->post('comments')
					);
				$this->contact($contact);
			}	
		}
	}

	public function maakEvent($username) 
	{
		/* Validatie regels */
		$this->form_validation->set_rules('naam', 'Naam', 'trim|xss_clean|required');
		$this->form_validation->set_rules('locatie', 'Locatie', 'trim|xss_clean|required');
		$this->form_validation->set_rules('adres', 'Adres', 'trim|xss_clean|required');
		$this->form_validation->set_rules('tijd', 'Tijd', 'trim|xss_clean|required');
		$this->form_validation->set_rules('datum', 'Datum', 'trim|xss_clean|required');
		$this->form_validation->set_rules('maand', 'Maand', 'trim|xss_clean|required');
		$this->form_validation->set_rules('info', 'Info', 'trim|xss_clean|required');
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');	

		$userId = $this->profile_model->checkUsername($username);

		/* controle op validatie */
		if ($this->form_validation->run() == FALSE)
		{
			redirect('fullpage_logged_in');
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
				'info' => $this->input->post('info'),
				'user_id' => $userId
				);

			/* gegevens worden in events tabel toegevoegd */
			$this->events_model->voegEventToe($data);
			redirect('fullpage_logged_in');
					
		}
	}

	public function delete()
	{
		/* Validatie Regel */
		$this->form_validation->set_rules('datum', 'Datum', 'trim|xss_clean|required');
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');	

		/* controle op validatie */
		if ($this->form_validation->run() == FALSE)
		{
			redirect('fullpage_logged_in');
		}
		else
		{
			/* Bij events voeg een kolom toe met user id !! */
			$datum = $this->input->post('datum');
			$data = $this->events_model->haalEventOpDatum($datum);

			/* Gegevens van ingelogde user ophalen */
			$userData = array( 'data' => $this->flexi_auth->get_user_by_id_row());


			$userId = $this->profile_model->checkUsername($userData['data']->uacc_username);

			if (empty($data)) 
			{
				redirect('fullpage_logged_in');
			} 
			else if($data['user_id'] == $userId || $userData['data']->uacc_group_fk == 2)
			{
				if ($this->events_model->verwijderEvent($datum) == TRUE) 
				{
					redirect('fullpage_logged_in');
				}
			} 
			else
			{
				redirect('fullpage_logged_in');
			}	
		}
	}

	public function contact($data) 
	{


		/* Contact pagina validatie regels */
		$this->form_validation->set_rules('name', 'Name', 'required|xss_clean|max_length[50]');			
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[50]');			
		$this->form_validation->set_rules('phone', 'Phone', 'required|is_numeric|max_length[50]');			
		$this->form_validation->set_rules('comments', 'Comments', 'required|max_length[250]');
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');	

		/* controle op validatie */
		if ($this->form_validation->run() == FALSE)
		{
			redirect('fullpage_logged_in');
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
			$this->contact_model->SaveForm($form_data);
			
		}
	}
}

