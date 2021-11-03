<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    public function index()
    {
        helper('displayWebsiteElement');
        displayNavBar();
        displaySearchBar();
        $model = new UserModel();
        $data = ['userData' => $model->getUserData()];
        echo view('users/allUsersView', $data);
    }

    /**
     * displays form to register new user
     */
    public function register()
    {
        helper('displayWebsiteElement');
        displayNavBar();
        echo view('forms/registerUserView');
    }

    public function registerAction()
    {
        helper('displayError');
        $model = new UserModel();

        if ($this->request->getMethod() == 'post' &&
            $this->validate([
                'username' => 'required|min_length[3]|max_length[32]',
                'password' => 'required|min_length[3]|max_length[60]',
                'repeatPassword' => 'required|min_length[3]|max_length[60]|matches[password]',
                'email' => 'required|valid_email',
                'phoneNumber' => 'permit_empty|integer'
            ])) {
            $model->save([
                'username' => esc($this->request->getPost('username')),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT, ['cost' => 12]),
                //'email' => esc($this->request->getPost('email')),
                'email' => filter_var($this->request->getPost('email'), FILTER_SANITIZE_EMAIL),
                'phone_number' => $this->request->getPost('phoneNumber'),
            ]);
            #TODO add success redirect
            d("User registered secussfully!!!!");
            d($model->getUserData());
        } else {
            #TODO add error of nusuccessfull login
            d("error!");
            d($this->validator->getErrors());
            displayValidatorErrors($this->validator->getErrors());
        }
    }

    public function login()
    {
        helper('displayWebsiteElement');
        displayNavBar();
        //TODO add a code to log in
        echo view('forms/loginUserView');
    }

    /**
     * IMPORTANT!!!
     * I want users to be able to log in using email, or username!
     * Here 'username' may be a valid email adress!!! Be carefull!
     */
    public function loginAction()
    {
        helper('displayError');
        $model = new UserModel();

        if ($this->request->getMethod() === 'post') {
            $validation = \Config\Services::validation();
            $usernameOrEmail = filter_var($this->request->getPost('username'), FILTER_SANITIZE_EMAIL);

            if ($model->isValidEmail($usernameOrEmail) || $model->isValidLogin($usernameOrEmail)) {
                $user = $model->getUserByEmailOrUsername($usernameOrEmail);
                if (!empty($user)) {
                    if (password_verify($this->request->getPost('password'), $user->password)) {
                        //d("login successfull");
                        $this->setSession($user->id,$user->username);
                        #TODO add redirect
                        helper('url');
                        return redirect()->to(base_url('/adverts'));
                    } else {
                        displayError("Password specified is not correct");
                    }
                }
            } else {
               displayError("user by that username nor email doesn't exist");
            }
        }
    }
    public function logout(){
        $this->deleteSession();
        return redirect()->to(base_url("/adverts"));
    }
    private function setSession($id,$username)
    {
        $session = \Config\Services::session();
        $session->start();
        $session->set('username',$username);
        $session->set('id',$id);
    }
    public function getSession()
    {
        $session = \Config\Services::session();
        return $session;
    }
    public function deleteSession(){
        $session = \Config\Services::session();
        $session->destroy();
    }


}
