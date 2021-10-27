<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller{
    public function index(){
        $model = new UserModel();
        $data=['userData'=>$model->getUserData()];
        echo view('users/allUsersView',$data);
    }

    /**
     * displays form to register new user
     */
    public function register(){
        echo view('templates/websiteHeaderView');
        echo view('forms/registerUserView');
    }

    public function registerAction(){
        $model = new UserModel();

        if($this->request->getMethod() == 'post' &&
            $this->validate([
                'username' => 'required|min_length[3]|max_length[32]',
                'password' => 'required|min_length[3]|max_length[60]',
                'repeatPassword' => 'required|min_length[3]|max_length[60]|matches[password]',
                'email' => 'required|valid_email',
                'phoneNumber' => 'permit_empty|integer'
            ])){
            $model->save([
                'username' => esc($this->request->getPost('username')),
                'password' => esc($this->request->getPost('password')),
                'repeatPassword' => esc($this->request->getPost('repeatPassword')),
                'email' => esc($this->request->getPost('email')),
                'phone_number' => $this->request->getPost('phoneNumber'),
            ]);
            d("User registered secussfully!!!!");
            d($model->getUserData());
        }else {
            d("error!");
            d($this->validator->getErrors());
            $this->displayError($this->validator->getErrors());
        }
    }

    public function login(){
        //TODO add a code to log in
        echo view('templates/websiteHeaderView');
        echo view('forms/loginUserView');
    }

    /**
     * IMPORTANT!!!
     * I want users to be able to log in using email, or username!
     * Here 'username' may be a valid email adress!!! Be carefull!
     */
    public function loginAction(){
        $model=new UserModel();

        if($this->request->getMethod() === 'post'){
            $validation =  \Config\Services::validation();

            d("specified data");
            d($this->request->getBody());

            $usernameOrEmail=$this->request->getPost('username');

            if($validation->check($usernameOrEmail,'valid_email')){
                d("it is an email");

            }else if($validation->check($usernameOrEmail,'required|min_length[3]|max_length[32]')){
                d("it is an login");
            }else{
                d("Some weird error");
                d($this->validator->getErrors());
            }
            $this->validator->reset();
        }
    }

    public function displayError($error){
        echo view('templates/websiteHeaderView');
        echo view('errors/registerErrorView',['errors'=>$error]);
    }


}
