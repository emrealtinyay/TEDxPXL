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
		
		/* Validatie regels */
		$this->form_validation->set_rules('naam', 'Naam', 'trim|xss_clean');
		$this->form_validation->set_rules('locatie', 'Locatie', 'trim|xss_clean');
		$this->form_validation->set_rules('adres', 'Adres', 'trim|xss_clean');
		$this->form_validation->set_rules('tijd', 'Tijd', 'trim|xss_clean');
		$this->form_validation->set_rules('datum', 'Datum', 'trim|xss_clean');
		$this->form_validation->set_rules('maand', 'Maand', 'trim|xss_clean');
		$this->form_validation->set_rules('info', 'Info', 'trim|xss_clean');

		/* Haalt contact gegevens op */
		$data2['contact'] = $this->contact_model->HaalContactGegevensOp();

		/* Controle is ingelogd ? */
		if($this->flexi_auth->is_logged_in() == true)
		{
			/* Gegevens van ingelogde user ophalen */
			$user = array( 'userinfo' => $this->flexi_auth->get_user_by_id_row());
			
			/* Controle of het admin is of niet */
			if($group = $user['userinfo']->uacc_group_fk == 2)
			{
				/* haalt de foto van de user op */
				$data_foto['foto'] = $this->profile_model->haalGegevensOp($user['userinfo']->uacc_username);

				/* gegevens en de foto worden in een array gestopt */
				$data_totaal = array( 	'user_data' => $user,
										'foto' => $data_foto);

				/* Header word geladen */
				$this->load->view('header_logged_in_other_view',$data_totaal);

				/* admin view word geladen met contact gegevens */
				$this->load->view('admin_view',$data2);

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

						/* admin pagina wordt opnieuw geladen */
						redirect('admin');
					}
				}

				/* bij klikken op Delete User */
				if($this->input->post('submit1') == 'Delete User')
				{
					/* User wordt verwijderd van user_account tabel */
					$this->flexi_auth->delete_user($this->input->post('ID'));

					/* User wordt verwijderd van userdata tabel */
					$this->profile_model->DeleteUser($this->input->post('ID'));	
				}

				/* bij klikken op Delete Contact */
				if($this->input->post('submit2') == 'Delete Contact')
				{
					/* Contact wordt verwijderd van contact_table tabel */
					$this->contact_model->DeleteContact($this->input->post('ID'));		
				}
			}
			else
			{
				/* als het geen admin is wordt fullpage geladen */
				redirect('fullpage');
			}
		}
		else
		{
			/* als je niet ingelogd bent wordt fullpage geladen */
			redirect('fullpage');
		}

		/* footer view wordt geladen */
		$this->load->view('footer_view');	
	}	
}