<?php
class gamecentral_security extends security_component{
	public function init($params){
		$this->controler->add_event_listener("pre_method",$this);
		$this->controler->add_event_listener("pre_theme",$this);
		$this->define_public_methods();
		parent::init(false);
		$this->user_class = "usuario";
	}
	private function define_public_methods(){
		$this->public_methods['main']['login'] =  1;
		$this->public_methods['main']['do_login'] =  1;
		$this->public_methods['hotels']['add_photo'] =  1;
		$this->public_methods['packages']['add_photo'] =  1;
		
		$this->public_methods['packages']['new_featured'] =  1;
		$this->public_methods['packages']['update_featured'] =  1;
		$this->public_methods['packages']['destroy_featured'] =  1;
		
		$this->public_methods['domains']['new_logo'] =  1;
		$this->public_methods['domains']['update_logo'] =  1;
		$this->public_methods['domains']['new_header'] =  1;
		$this->public_methods['domains']['update_header'] =  1;
		$this->public_methods['domains']['new_footer'] =  1;
		$this->public_methods['domains']['update_footer'] =  1;
		$this->public_methods['domains']['new_container'] =  1;
		$this->public_methods['domains']['update_container'] =  1;
		$this->public_methods['domains']['add_photo'] =  1;
		$this->public_methods['domains']['destroy_photo'] =  1;
		
	}
	public function pre_method(&$e){
		$this->verify_access($e);
		$this->load_user_info();
	}
	protected function load_user_info(){
		if(isset($this->session_id)){			
			$this->controler->user = new $this->user_class($this->session_id);
			$this->controler->user->read("id,email,tipo_usuario");
			return true;
		}else{
			return false;
		}
		
	}
	public function pre_theme($e){	
		if(isset($this->access_list->theme))
			$e->theme = $this->access_list->theme;			
	}
	public function verify_access($e){
		if(isset($this->public_methods[$e->controler][$e->action])){
			return true;
		}else if(!$this->verify_login()){
			header("location: /main/login/");
			exit(0);
			return false;
		}else{
			return true;
		}
		return false;
	}
	public function do_login(){	
		switch(parent::do_login("account")){
			case "success":				
				$location = "/";
			break;
			case "pass":
				$location = "/main/login/e=pass";
			break;
			case "username":
				$location = "/main/login/e=user";
			break;
		}
		header("Location: ".$location);
	}
	public function logout(){
		setcookie($this->controler->config->session_name,"", time() - 3600, "/");
		header("Location: /main/login/");
	}
}
?>
