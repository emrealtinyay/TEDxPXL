<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
	
	/**
	 * Deze functie laad alle hulp klassen en models.
	 *
	 *  -
	 * @author  Glenn Bertjens, Ali Eren, Emre Altinyay
	 *
	 */
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('flexi_auth');
	}
	
	/**
	 * Deze functie gaat iemand inloggen.
	 *
	 *  -
	 * @author  Glenn Bertjens, Ali Eren, Emre Altinyay
	 *
	 */
	public function index(){

		/* Validatie regels */
		$this->form_validation->set_rules('login_naam', 'Email', 'required|valid_email|max_length[50]|xss_clean');
		$this->form_validation->set_rules('login_wachtwoord', 'Password', 'required'); 	

		/* controle op login */
		if($this->flexi_auth->is_logged_in() == false)
		{
			/* controle op validatie */
			if ($this->form_validation->run() == FALSE)
			{
				redirect('fullpage');
			}
			else
			{
				/* login functie van flexi auth wordt opgeroepen */
				if($this->flexi_auth->login($this->input->post('login_naam'),$this->input->post('login_wachtwoord'),false) == true)
				{
					redirect('/fullpage_logged_in');
				}
				else
				{
					redirect('fullpage');
				}	
			}
		}
		else
		{
			redirect('fullpage_logged_in');
		}
	}

	public function reset_password() 
	{	
		/* controle op email, username bestaan en dat ze niet leeg zijn */
		if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['username']) && !empty($_POST['username']))
		{
			
			/* validatie regels */
			$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|xss_clean');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');

			/* controle op validatie */ 
			if($this->form_validation->run() == FALSE) 
			{
				/* een view als email verkeerd is ingevoerd */
			} 
			else 
			{
				/* ingevoerde gegevens worden in een array gestopt */
				$email = $this->input->post('email');
				$username = $this->input->post('username');

				/* profile model wordt geladen */
				$this->load->model('profile_model');

				/* email wordt gecontroleerd (als het niet bestaat wordt er 0 teruggeven en anders het id van user) */
				$controleEmail = $this->profile_model->checkEmail($email);

				/* username wordt gecontroleerd (als het niet bestaat wordt er 0 teruggeven en anders het id van user) */
				$controleUsername = $this->profile_model->checkUsername($username);
				
				/* als een van beiden niet bestaan */
				if($controleEmail == 0 || $controleUsername == 0) 
				{
					echo 'view voor email of gebruikersnaam bestaat niet';
				} 
				else  
				{	
					/* controle of gebruikersnaam en email van hetzelfde user zijn */
					if($controleUsername == $controleEmail) 
					{	
						/* functie wordt opgeroepen */
						$this->send_reset_password_email($email, $username);

						/* views worden gelande */
						$this->load->view('header_logged_out_other_view');
						$this->load->view('reset_password_sent_view', array('email' => $email));
						$this->load->view('footer_view');	
					}
					else 
					{
						echo 'gebruikersnaam en email komen niet overeen';
					}
				}
			}
		} 
		else 
		{ 
			/* als email, username niet bestaan */
			$this->load->view('reset_password_view');
		}
	}

	private function send_reset_password_email($email, $name) 
	{
		/* configuratie van email classen (ingebouwd in codeigniter) */
		$conf = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'charset' =>  'iso-8859-1',
			'smtp_user' => 'alirn.93@gmail.com',
			'smtp_pass' => 'Alieren75'
			);

		/* library email wordt geladen */
		$this->load->library('email', $conf);
		
		/* dit die ik omdat @ bij url word vervangen door %40 */
		/* email wordt in 2 delen gesplits voor @ en na @ en in een array gestopt */
		$split = explode('@', $email);

		/* email wordt zonder at in een variabel gezet vb: ali@eren.be => alieren.be */
		$code = $split[0].$split[1];

		/* code wordt gehast */
		$emailCode = md5($this->config->item('salt').$code);

		/* email configuraties */
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype('html');
		$this->email->from('alirn.93@gmail.com', 'TedxPxl');
		$this->email->to($email);
		$this->email->subject('Please reset your password at TedxPxl');
		$message ='<!DOCTYPE  html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
					"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html>
					<meta http-equiv="Content-Type" content="text/html; charset-utf-8"/>
					</head><body>';
		$message .='<p>Dear '.$name.',</p>';
		$message .='<p>We want to help you reset your password! Please <strong><a href="'.base_url().'index.php/login/update_changePassword/'.$email.'/'.$emailCode.'">click here</a></strong> to reset your password.</p>';
		$message .='<p>Thank you!</p>';
		$message .='<p>The Team at TedxPxl</p>';
		$message .='</body></html>';

		$this->email->message($message);

		/* als email niet verzonden wordt, wordt er een foutmelding getoond */
		if(!$this->email->send()) 
		{
			show_error($this->email->print_debugger());
		}
	}

	public function update_changePassword($email, $emailCode) 
	{
		/* als email en emailcode bestaan */
		if(isset($email, $emailCode)) 
		{	
			/* profile_model wordt geladen */
			$this->load->model('profile_model');

			/* dit die ik omdat @ bij url word vervangen door %40 */
			/* email wordt in 2 gesplits voor %40 en na %40 */
			$split = explode('%40', $email);

			/* email wordt zonder at in een variabel gezet vb: ali%40eren.be => alieren.be */
			$code = $split[0].$split[1];

			/* code wordt gehast */
			$emailCheck = md5($this->config->item('salt').$code);

			/* controle of hashs overeenkomen */
			/* als ze niet overeenkomen dan is er in de url iets veranderd geweest bij email gedeelte */
			if($emailCheck == $emailCode) 
			{
				/* id van user wordt opgevraagd dank zij email */
				$id = $this->profile_model->checkEmail($split[0].'@'.$split[1]);

				/* kolom changePassword wordt j van de user */
				$this->profile_model->update_changePassword($id, 'j');

				/* views worden geladen */
				$this->load->view('header_logged_out_view');
				$this->load->view('update_password_view', array('email' => $split[0].'@'.$split[1], 'message' => ''));
				$this->load->view('footer_view');
			}

			/* bij het klikken op update werd hash emailcode vervangen door update_password daarom doe ik deze controle */
			else if($emailCode == 'update_password') 
			{	
				/* controle of niks leeg is */
				if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password_conf'])) 
				{
					/* vul alle velden in */
					$this->load->view('header_logged_out_view');
					$this->load->view('update_password_view', array('email' => $split[0].'@'.$split[1], 'message' => 'alle velden invullen aub'));
					$this->load->view('footer_view');
				} 
				/* controle op wachtwoorden */
				else if($_POST['password'] != $_POST['password_conf'])
				{
					/* wachtwoorden komen niet overeen */
					$this->load->view('header_logged_out_view');
					$this->load->view('update_password_view', array('email' => $split[0].'@'.$split[1], 'message' => 'wachtwoorden komen niet overeen'));
					$this->load->view('footer_view');
				}
				else 
				{	
					/* ingevoerde gegevens worden in variabelen gestopt */
					$email = $this->input->post('email');
					$password = $this->input->post('password');
					$passwordConf = $this->input->post('password_conf');

					/* xss clean maken van ingevoerde inhoud */
					$this->security->xss_clean($email);
					$this->security->xss_clean($password);
					$this->security->xss_clean($passwordConf);

					/* id van user opvragen door middel van email */
					$id = $this->profile_model->checkEmail($email);

					/* haal de kollom changePassword op van de user */
					$hulp = $this->profile_model->get_changePassword($id);

					/* ga na of kollom changePassword op j staat */
					if($hulp == 'j') 
					{
						/* laad flexi_auth model*/
						$this->load->model('flexi_auth_model');

						/* id ophalen */
						$id = $this->profile_model->checkEmail($split[0].'@'.$split[1]);

						/* nieuwe password in een array stoppen */
						$data = array(
							'uacc_password' => $password
							);

						/* functie van flexi auth model wordt opgeroepen */
						$this->flexi_auth_model->update_user($id, $data);

						/* changepassword kollom naar n wijzigen */
						$this->profile_model->update_changePassword($id, 'n');

						/* views laden */
						$this->load->view('header_logged_out_view');
						$this->load->view('reset_password_sent_view', array('email' => $split[0].'@'.$split[1]));
						$this->load->view('footer_view');	
					} 
					else 
					{
						/* hacker, probeert een anders email adres zijn wachtwoord te veranderen */
						redirect('fullpage');
					} 
					
				}
			} 
			else 
			{
				redirect('fullpage');
			}

		}
	}
}