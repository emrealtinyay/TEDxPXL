<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class event_detail extends CI_Controller {
	
	/**
	 * Deze functie laad alle hulp klassen en models.
	 *
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
	 * @author  Glenn Bertjens, Ali Eren, Emre Altinyay
	 * 
	 *@param int	$id		een id van een event
	 */
 	public function event($id){	
 		if($this->flexi_auth->is_logged_in() == true){
 			$data3 = array( 'data' => $this->flexi_auth->get_user_by_id_row());
 			$data_foto['foto'] = $this->profile_model->haalGegevensOp($data3['data']->uacc_username);
 			$data_totaal = array( 	'user_data' => $data3,
 									'foto' => $data_foto);	
 			$data['data'] = $this->events_model->haalEventOp($id);
 			$this->load->view('header_logged_in_other_view', $data_totaal);
			$this->load->view('event_detail_view',$data);
			$this->load->view('footer_view');
 		}else{
 			$data['data'] = $this->events_model->haalEventOp($id);
 			$this->load->view('header_logged_out_other_view');
 			$this->load->view('event_detail_view',$data);
 			$this->load->view('footer_view');
 		}
 	} 
}