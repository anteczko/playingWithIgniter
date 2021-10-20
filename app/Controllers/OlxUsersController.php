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
    public function register()
    {
        echo view('olx/registration');
    }
    public function login()
    {
        echo view('olx/login');
    }
    public function logout(){
        $model=new UserModel();
        $model->deleteSession();
        return redirect()->to('/olx/users');
    }
    public function create()
    {
        $model=new UserModel();

        if($this->request->getMethod() === 'post' && $this->request->getPost('password') === $this->request->getPost('repeatPassword'))
        {
            if($model->ifExists($this->request->getPost('username'))){
                echo view('users/errorUserExists');
            }
            else
            {
                $model->save([
                    'nick'=>$this->request->getPost('username',FILTER_SANITIZE_ENCODED),
                    'password'=>$this->request->getPost('password',FILTER_SANITIZE_ENCODED),
                    'repeatPassword'=>$this->request->getPost('repeatPassword',FILTER_SANITIZE_ENCODED),
                ]);
                echo "<h1>uploaded!!</h1>";
            }
        }
    }
    public function loginUser()
    {
        $model=new UserModel();

        if($this->request->getMethod() === 'post')
        {
            if($model->ifExists($this->request->getPost('username')))
            {
                if($model->validateCridentials($this->request->getPost('username'),$this->request->getPost('password')))
                {
                    echo view('users/loginUserSuccess');
                    $model->getSession($this->request->getPost('username'));
                    
                    $session = \Config\Services::session();
                }
            }else
            {
                echo view('users/errorUserNotExists');
            }
        
        }
    }
    public function testing()
    {
        $model=new UserModel();
        $model->testing();
    }

}
