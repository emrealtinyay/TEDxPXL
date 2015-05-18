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
		$this->form_validation->set_rules('login_naam', 'Email', 'required|valid_email|max_length[50]|xss_clean');
		$this->form_validation->set_rules('login_wachtwoord', 'Password', 'required'); 	
		if($this->flexi_auth->is_logged_in() == false){
		if ($this->form_validation->run() == FALSE){
			redirect('fullpage');
		}else{
			if($this->flexi_auth->login($this->input->post('login_naam'),$this->input->post('login_wachtwoord'),false) == true){
				redirect('/fullpage_logged_in');
			}
			else{
				redirect('fullpage');
			}	
		}
		}
		else{
			redirect('fullpage_logged_in');
		}
	}

	public function reset_password() 
	{
		if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['username']) && !empty($_POST['username']))
		{
			$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|xss_clean');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');

			if($this->form_validation->run() == FALSE) 
			{
				/* een view als email verkeerd is ingevoerd */
			} 
			else 
			{
				$email = $this->input->post('email');
				$username = $this->input->post('username');
				$this->load->model('profile_model');
				$controleEmail = $this->profile_model->checkEmail($email);
				$controleUsername = $this->profile_model->checkUsername($username);
				
				if($controleEmail == 0 || $controleUsername == 0) 
				{
					echo 'view voor email of gebruikersnaam bestaat niet';
				} 
				else  
				{
					if($controleUsername == $controleEmail) 
					{
						$this->send_reset_password_email($email, $username);
						$this->load->view('header_logged_out_view');
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

			$this->load->view('reset_password_view');
		}
	}

	private function send_reset_password_email($email, $name) 
	{
		$conf = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'alirn.93@gmail.com',
			'smtp_pass' => 'Alieren75'
			);
		$this->load->library('email', $conf);
		$email_code = md5($this->config->item('salt').$name);

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
		$message .='<p>We want to help you reset your password! Please <strong><a href="'.base_url().'index.php/login/reset_password_form/'.$email.'/'.$email_code.'">click here</a></strong> to reset your password.</p>';
		$message .='<p>Thank you!</p>';
		$message .='<p>The Team at TedxPxl</p>';
		$message .='</body></html>';

		$this->email->message($message);
		if(!$this->email->send()) 
		{
			show_error($this->email->print_debugger());
		}
	}

	public function reset_password_form($email, $email_code) 
	{
		if(isset($email, $email_code)) 
		{
			$email = trim($email);
			$email_hash = sha1($email, $email_code);
			$this->load->view('header_logged_out_view');
			$this->load->view('update_password_view', array('email_hash' => $email_hash, 'email_code' => $email_code, 'email' => $email));
			$this->load->view('footer_view');
		}
	}

	public function update_password() 
	{
		/* tweede chek als er tussendoor iemand in de url zelf een email in tikt kan je iemand anders zijn wachtwoord wijzigen */
		if(!isset($_POST['email'], $_POST['email_hash']) || $_POST['email_hash'] !== sha1($_POST['email'].$_POST['email_code'])) 
		{
			echo "nnee";
		}
		else 
		{
			$this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
			$this->form_validation->set_rules('password_conf', 'Password Confirmation', 'required|xss_clean');

			if($this->form_validation->run() == FALSE) 
			{
				echo 'velden moeten ingevuld worden';
			} 
			else 
			{
				$pas1 = $this->input->post('password');
				$pas2 = $this->input->post('password_conf');

				if($pas1 == $pas2) 
				{
					echo 'wachtwoord uploaded';
				}
				else 
				{
					echo 'wachtwoorden komen niet overeen';
				}
			}
		}
	}
}