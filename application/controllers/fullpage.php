<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fullpage extends CI_Controller {
	
	/**
	 * Deze functie laad alle hulp klassen en models.
	 *
	 *  -, Glenn Bertjens
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
	 *  -, Glenn Bertjens
	 * @author Glenn Bertjens, Ali Eren, Emre Altinyay
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
		$data['calendar'] = $this->mycal_model->generate($year, $month);

		/* controle op login */
		if($this->flexi_auth->is_logged_in() == false){
			//$data['data'] = $this->events_model->haalEventsOp();
			
			/* header wordt geladen */	
			$this->load->view('header_logged_out_view');

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
			$this->load->view('events_view',$data);
			$this->load->view('team_view');

			/* Validatie regels */
			$this->form_validation->set_rules('name', 'Name', 'required|xss_clean|max_length[50]');			
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[50]');			
			$this->form_validation->set_rules('phone', 'Phone', 'required|is_numeric|max_length[50]');			
			$this->form_validation->set_rules('comments', 'Comments', 'required|max_length[250]');		
			$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');	

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
					/* als succes vol gesaved is */
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