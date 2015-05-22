<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_detail extends CI_Controller {
	
	/**
	 * Deze functie laad alle hulp klassen en models.
	 *
	 *  -
	 * @author  Glenn Bertjens, Ali Eren, Emre Altinyay
	 *
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->auth = new stdClass;
		$this->load->library('flexi_auth');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('events_model');
		$this->load->model('profile_model');
	}
	
	/**
	 * Deze functie laad de event detail pagina.
	 *
	 *  -
	 * @author  Glenn Bertjens, Ali Eren, Emre Altinyay
	 * 
	 *@param int	$id		een id van een event
	 */
	public function index() 
	{
		/* Gegevens van datum worden opgehaald en in een variabel gestopt */
		$data = $this->input->post('datum');

		/* event functie wordt opgeroepen */
		$this->event(10);
	}

 	public function event($id){	

 		/* controle op login */
 		if($this->flexi_auth->is_logged_in() == true)
 		{

 			/* Gegevens van ingelogde user ophalen */
 			$data = array( 'data' => $this->flexi_auth->get_user_by_id_row());

 			/* haalt de foto van de user op */
 			$data_foto['foto'] = $this->profile_model->haalGegevensOp($data['data']->uacc_username);

 			/* gegevens en de foto worden in een array gestopt */
 			$data_totaal = array( 	'user_data' => $data,
 									'foto' => $data_foto);	

 			/* gegevens van gevraagde event wordt opgehaald */
 			$data['data'] = $this->events_model->haalEventOp($id);

 			//var_dump($data);

 			/* header word geladen */
 			$this->load->view('header_logged_in_other_view', $data_totaal);

 			/* event detail view word gelanden */
			$this->load->view('event_detail_view',$data);

			/* footer wordt gelanden */
			$this->load->view('footer_view');
 		}
 		else
 		{
 			/* als je niet ingelogd bent kan je event details niet opvragen */
 			redirect('fullpage');
 		}
 	} 
}