<?php

class MY_Controller extends CI_Controller {

  function __construct() {
    parent::__construct();
		$usr = $this->session->userdata('elite_token');
    if ($usr) {
        $priviledge = [];
        $data_priv = $this->Msetting->get_role_access();
        foreach($data_priv as $dt){
            $role_id = $dt->role_id;
            $priviledge[$role_id] = $list = $this->Msetting->get_priviledge($usr,$role_id);
        }
        $this->session->set_userdata(['priviledge_elite' => $priviledge]);
    }
  }
}
