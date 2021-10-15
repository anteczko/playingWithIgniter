<?php

namespace App\Controllers;
#TODO import adverts model!!!!
use App\Models\UserModel;
use CodeIgniter\Controller;


class OlxUsersController extends BaseController
{
    public function index()
    {
        echo "Witamy na olixie!";
        echo "pozdorwienia od user cotnrollera!";

        echo view('olx/login');
    }
    public function create()
    {
        $model=new UserModel();
        echo "<h1>Logowanko </h1>";

        if($this->request->getMethod() === 'post' && $this->request->getPost('password') === $this->request->getPost('repeatPassword'))
        {
            if($model->ifExists($this->request->getPost('username'))){
                echo view('users/errorUserExists');
            }
            else
            {
                $model->save([
                    'nick'=>$this->request->getPost('username'),
                    'password'=>$this->request->getPost('password'),
                    'repeatPassword'=>$this->request->getPost('repeatPassword'),
                ]);
                echo "<h1>uploaded!!</h1>";
            }
        }
    }

}
