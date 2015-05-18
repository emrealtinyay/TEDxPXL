<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {
	
	/**
	 * Deze functie laad alle hulp klassen en models.
     *
	 * @author  Glenn Bertjens, Ali Eren, Emre Altinyay
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
		$this->auth = new stdClass;
		$this->load->library('flexi_auth');
		$this->load->library('session');
		$this->load->model('contact_model');
		$this->load->model('profile_model');	
	}
	
	/**
	 * Deze functie laad de admin pagina.
     *
	 * @author  Glenn Bertjens, Ali Eren, Emre Altinyay
	 *
	 */
	public function index(){
		$this->form_validation->set_rules('naam', 'Naam', 'trim|xss_clean');
		$this->form_validation->set_rules('locatie', 'Locatie', 'trim|xss_clean');
		$this->form_validation->set_rules('adres', 'Adres', 'trim|xss_clean');
		$this->form_validation->set_rules('tijd', 'Tijd', 'trim|xss_clean');
		$this->form_validation->set_rules('datum', 'Datum', 'trim|xss_clean');
		$this->form_validation->set_rules('maand', 'Maand', 'trim|xss_clean');
		$this->form_validation->set_rules('info', 'Info', 'trim|xss_clean');
		$data2['contact'] = $this->contact_model->HaalContactGegevensOp();
		if($this->flexi_auth->is_logged_in() == true){
			$user = array( 'userinfo' => $this->flexi_auth->get_user_by_id_row());
			if($group = $user['userinfo']->uacc_group_fk == 2){
				$data3 = array( 'data' => $this->flexi_auth->get_user_by_id_row());
				$data_foto['foto'] = $this->profile_model->haalGegevensOp($data3['data']->uacc_username);
				$data_totaal = array( 	'user_data' => $data3,
										'foto' => $data_foto);
				$this->load->view('header_logged_in_other_view',$data_totaal);
				$this->load->view('admin_view',$data2);
				if($this->input->post('submit') == 'Maak Event'){
					if ($this->form_validation->run() == FALSE){
						redirect('fullpage');
					}else{
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
						redirect('admin');
					}
				}
				if($this->input->post('submit1') == 'Delete User'){
					$this->flexi_auth->delete_user($this->input->post('ID'));
					$this->profile_model->DeleteUser($this->input->post('ID'));	
				}
				if($this->input->post('submit2') == 'Delete Contact'){
					$this->contact_model->DeleteContact($this->input->post('ID'));		
				}
			}else{
				redirect('fullpage');
			}
		}else{
			redirect('/fullpage');
		}
		$this->load->view('footer_view');	
	}	
}