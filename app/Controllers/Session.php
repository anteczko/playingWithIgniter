<?php

namespace App\Controllers;

class Session extends BaseController
{
	public function __construct(){
		//parent::__construct();
		//$this->load->library('session');
	}

	public function index()
	{
		echo "<h1>Hello world</h1>";
	}

	public function getSession(){
		echo "<h1>Getting session!</h1>";
        $session = \Config\Services::session();

		$session->set('item','testowanko');
		echo $session->get('item');
		$session->set('name','antos');
		echo $session->get('name');
    }
}
