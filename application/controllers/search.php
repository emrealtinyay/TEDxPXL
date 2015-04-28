<?php
class Search extends CI_Controller{
    
    /**
	 * Deze functie laad alle hulp klassen en models.
	 *
	 * @author  Glenn Bertjens
	 *
	 */
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('profile_model');
		$this->load->model('search_model');
		$this->load->library('flexi_auth');
	}
    
    /**
	 * Deze functie laad de profile pagina.
	 *
	 * @author  Glenn Bertjens
	 *
	 */
	public function index(){
		if($this->input->post('search')== 'Go!'){
			$data = array(
				'profielen' => array(), 'aantalGebruikers' => null,
				'forumitems' => array(), 'aantalForumitems' => null,
				'events' => array(), 'aantalEvents' => null,
				'user' => $this->flexi_auth->get_user_identity()
			);
		if ($this->flexi_auth->is_logged_in()){
			$data3 = array( 'data' => $this->flexi_auth->get_user_by_id_row());
			$data_foto['foto'] = $this->profile_model->haalGegevensOp($data3['data']->uacc_username);
			$data_totaal = array( 	'user_data' => $data3,
									'foto' => $data_foto);
			$this->load->view('header_logged_in_other_view', $data_totaal);
			if($this->input->post('zoekterm') != ""){
				$zoekterm = $this->input->post('zoekterm');
				$query = $this->search_model->select_profiel($zoekterm);
				$i = 0;
				foreach ($query as $row){
					$data['profielen'][$i] = $row;
					$i++;
				}
				$data['aantalGebruikers'] = $i;
				$query = $this->search_model->select_forum($zoekterm);
				$i = 0;
				foreach ($query as $row) {
					$data['forumitems'][$i] = $row;
					$i++;
				}
				$data['aantalForumitems'] = $i;		
				$query = $this->search_model->select_events($zoekterm);
				$i = 0;
				foreach ($query as $row) {
					$data['events'][$i] = $row;
					$i++;
				}
				$data['aantalEvents'] = $i;	
				$this->load->view('search_view', $data);
				$this->load->view('footer_view');
			}
			else{
				redirect('fullpage');
			}
			
		}else{
			$this->load->view('header_logged_out_other_view');
			$this->load->view('search_logout_view');
			$this->load->view('footer_view');
		}
	}
	}
}
?>