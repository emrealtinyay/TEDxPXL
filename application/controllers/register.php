<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register extends CI_Controller {

	/**
	 * Deze functie laad alle hulp klassen en models.
	 *
	 * @author  Glenn Bertjens
	 *
	 */
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('profile_model');
		$this->load->library('flexi_auth');
		//$this->load->library('session');
	
	}
	
	/**
	 * Deze functie laad de register pagina.
	 *
	 * @author  Glenn Bertjens
	 *
	 */
	public function index(){

		/* validatie regels */
		$this->form_validation->set_rules('register_gebruikersnaam', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean');
		$this->form_validation->set_rules('register_wachtwoord', 'Password', 'trim|required|matches[register_wachtwoordbevestigen]');
		$this->form_validation->set_rules('register_wachtwoordbevestigen', 'Password Confirmation', 'trim|required');
		$this->form_validation->set_rules('register_emailadres', 'Email', 'trim|required|valid_email|xss_clean');	
		
		/* views worden gelanden */
		$this->load->view('header_logged_out_other_view');
		$this->load->view('register_view');
		
		/* hier moet nog een controle gemaakt worden, als email of gebruikersnaam al bestaat !! */
		/* als er geklikt wordt op register */
		if($this->input->post('register_user')== 'Register')
		{		
			/* controle van validatie */
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('register_failed_view');
			}
			else
			{
				/* ingevoerde gegevens worden in variabelen gestopt */
				$email = $this->input->post('register_emailadres');
				$gebruikersnaam = $this->input->post('register_gebruikersnaam');

				/* profile model wordt geladen */
				$this->load->model('profile_model');

				/* id's worden opgevraagd (als id 0 is dan bestaat ze niet anders krijg je het id van bestaande terug) */
				$controleUsername = $this->profile_model->checkUsername($gebruikersnaam);
				$controleEmail = $this->profile_model->checkEmail($email);

				/* controle of username al bestaat */
				if($controleUsername == 0)
				{	
					/* controle of email al bestaat */
					if($controleEmail == 0)
					{
						/* functie van flexi auth wordt opgeroepen */
						$this->flexi_auth->insert_user($email, $gebruikersnaam, $this->input->post('register_wachtwoord'), false, false,true);

						/* gebruikersnaam wordt in een array gestopt */
						$data = array( 'username' => $this->input->post('register_gebruikersnaam'));

						/* gebruikersnaam wordt in userdata toegevoegd */
						$this->profile_model->VoegGebruikerToe($data);
						redirect('/fullpage');
					}
					else 
					{
						echo 'email bestaat al';
					}
				}
				else 
				{
					echo 'gebruikersnaam bestaat al';
				}

				
			}
		}
		$this->load->view('footer_view');
	
	}
}
