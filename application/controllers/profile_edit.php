<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profile_edit extends CI_Controller {
	
	/**
	 * Deze functie laad alle hulp klassen en models.
	 *
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
	 * Deze functie laad de profile edit pagina.
	 *
	 * @author  Glenn Bertjens
	 *
	 */
	public function index(){		
		if($this->flexi_auth->is_logged_in() == true){
			$data3 = array( 'data' => $this->flexi_auth->get_user_by_id_row());
			$data_foto['foto'] = $this->profile_model->haalGegevensOp($data3['data']->uacc_username);
			$data_totaal = array( 	'user_data' => $data3,
									'foto' => $data_foto
			);
			//Deze regex is van het internet gehaald source: http://ellislab.com/forums/viewthread/60881/
			$ddmmyyy='(0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])[- \/.](19|20)[0-9]{2}';
			$this->form_validation->set_rules('Naam', 'Naam', 'trim|xss_clean');
			$this->form_validation->set_rules('Voornaam', 'Voornaam', 'trim|xss_clean');
			$this->form_validation->set_rules('Woonplaats', 'Woonplaats', 'trim|xss_clean');
			$this->form_validation->set_rules('Geboortedatum', 'Geboortedatum', 'trim|xss_clean');
			$user = array( 'userinfo' => $this->flexi_auth->get_user_by_id_row());
			$id = $user['userinfo']->uacc_username;
			$data2 = array('profileInfo' => $this->profile_model->haalGegevensOp($id));
			$this->load->view('header_logged_in_other_view', $data_totaal);
			$this->load->view('profile_edit_view',$data2);
			$this->load->view('footer_view');
				if($this->input->post('submit')== 'Update'){
					if(preg_match("/$ddmmyyy$/", $this->input->post('Geboortedatum'))|| $this->input->post('Geboortedatum') == '') {
						if ($this->form_validation->run() == FALSE){
					
						}else{
							if($data2['profileInfo'][0]['naam'] !== '' && $this->input->post('Naam') == '' ){
								$data_naam = $data2['profileInfo'][0]['naam'];
							}else{
								$data_naam = $this->input->post('Naam');
							}
							if($data2['profileInfo'][0]['voornaam'] !== '' && $this->input->post('Voornaam') == '' ){
								$data_voornaam = $data2['profileInfo'][0]['voornaam'];
							}else{
								$data_voornaam = $this->input->post('Voornaam');
							}
							if($data2['profileInfo'][0]['woonplaats'] !== '' && $this->input->post('Woonplaats') == '' ){
								$data_woonplaats = $data2['profileInfo'][0]['woonplaats'];
							}else{
								$data_woonplaats = $this->input->post('Woonplaats');
							}
							if($data2['profileInfo'][0]['geboortedatum'] !== '' && $this->input->post('Geboortedatum') == '' ){
								$data_geboortedatum = $data2['profileInfo'][0]['geboortedatum'];
							}else{
								$data_geboortedatum = $this->input->post('Geboortedatum');
							}
						$data = array(
							'voornaam' => $data_voornaam,
							'naam' => $data_naam,
							'woonplaats' => $data_woonplaats,
							'geboortedatum' => $data_geboortedatum
						);			
						$this->profile_model->UpdateGegevens($data,$id);
						redirect('/profile');
					}
				}
			}
		}else{
			redirect('fullpage');
		}
	}
}
