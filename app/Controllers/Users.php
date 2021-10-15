<?php

namespace App\Controllers;
use App\Models\UserModel;

class Users extends BaseController
{
	public function index()
	{
		echo "<h1>Hello users!!!</h1>";
		$model=new UserModel();
	    $data = [
		'users'  => $model->getUsers(),
		'id' => 'Users archive',
	    ];
	    echo view('users/overview', $data);
	    echo view('templates/footer', $data);
	}
	public function view($id=null)
	{
		$model=new UserModel();
		$data['users']=$model->getUsers($id);

		if(empty($data['users']))
		{
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the users item: '. $nick);
		}

		$data['id']=$data['users']['id'];
		
	    echo view('users/view', $data);
	    echo view('templates/footer', $data);
	}
}