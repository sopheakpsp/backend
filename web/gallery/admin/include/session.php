<?php 

class Session{

	private $signed_in = false;
	public $user_id;
	public $count;
	public $message;

	function __construct(){
		session_start();
		$this->check_the_login();
		$this->visitor_count();
		$this->check_message();
	}

	public function is_signed_in(){
		return $this->signed_in;
	}

	public function login($user){
		if($user){
			$this->user_id = $_SESSION['user_id'] = $user->id;
			$this->signed_in = true;
		}
	}

	private function check_the_login(){
		if(isset($_SESSION['user_id'])){
			$this->user_id = $_SESSION['user_id'];
			$this->signed_in = true;
		}
		else{
			unset($this->user_id);
			$this->signed_in = false;
		}
	}

	public function logout(){
		unset($this->user_id);
		unset($_SESSION['user_id']);
		$this->signed_in = false;
		redirect("login.php");
	}

	public function visitor_count(){
		if (isset($_SESSION['count'])) {
			return $this->count = $_SESSION['count']++;
		}
		else{
			return $_SESSION['count'] = 1;
		}
	}

	public function message($msg=""){
		if(!empty($msg)){
			$_SESSION['msg'] = $msg;
		}
		else{
			return $this->message;
		}
	}

	public function check_message(){
		if(isset($_SESSION['msg'])){
			$this->message = $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		else{
			return $this->message;
		}
	}

}

$session = new Session();
$message = $session->message();



 ?>