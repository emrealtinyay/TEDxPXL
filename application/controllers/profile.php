<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profile extends CI_Controller {
	
	/**
	 * Deze functie laad alle hulp klassen en models.
	 *
	 *  -
	 * @author  Glenn Bertjens
	 *
	 */
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->auth = new stdClass;
		$this->load->library('flexi_auth');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('profile_model');
	}
	
	/**
	 * Deze functie laad de profile pagina.
	 *
	 *  -
	 * @author  Glenn Bertjens
	 *
	 */
	public function index(){
		/* controle op login */
		if($this->flexi_auth->is_logged_in() == true)
		{
			/* gegevens van ingelogd user opvragen */
			$data = array( 'data' => $this->flexi_auth->get_user_by_id_row());

			/* foto van ingelogde user opvragen */
			$data_foto['foto'] = $this->profile_model->haalGegevensOp($data['data']->uacc_username);

			/* alle gegevens in een array stoppen */
			$data_totaal = array( 	'user_data' => $data,
									'foto' => $data_foto
			);

			/* id opvragen */
			$id = $data['data']->uacc_username;

			/* profiel gegevens ophalen van ingelogde user */
			$data = array('profileInfo' => $this->profile_model->haalGegevensOp($id));

			/* views laden */
			$this->load->view('header_logged_in_other_view', $data_totaal);
			$this->load->view('profile_view',$data);
			$this->load->view('footer_view');
		}else{
			redirect('fullpage');
		}
	}
}
