<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    public function index()
    {
        helper('display_website_element');
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
        helper('display_website_element');
        displayNavBar();
        echo view('forms/registerUserView');
    }

    public function registerAction()
    {
        helper('display_error');
        $model = new UserModel();

        if ($this->request->getMethod() == 'post' &&
            $this->validate([
                'username' => 'required|min_length[3]|max_length[32]',
                'password' => 'required|min_length[3]|max_length[60]',
                'repeatPassword' => 'required|min_length[3]|max_length[60]|matches[password]',
                'email' => 'required|valid_email',
                'phoneNumber' => 'permit_empty|integer'
            ])) {
            $inserted=$model->save([
                'username' => esc($this->request->getPost('username')),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT, ['cost' => 12]),
                //'email' => esc($this->request->getPost('email')),
                'email' => filter_var($this->request->getPost('email'), FILTER_SANITIZE_EMAIL),
                'phone_number' => $this->request->getPost('phoneNumber'),
            ]);
            #TODO add success redirect
            //d("User registered secussfully!!!!");
            //d($model->getUserData());
            $id=$model->db->insertID();
            $this->setSession($id,esc($this->request->getPost('username')));
            return redirect()->to(base_url("/adverts"));
        } else {
            #TODO add error of nusuccessfull login
            //d("error!");
            //d($this->validator->getErrors());
            $session = \Config\Services::session();
            $session->setFlashdata('errors',$this->validator->getErrors());
            return redirect()->to(base_url("/adverts"));
        }
    }

    public function login()
    {
        helper('display_website_element');
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
        helper('display_error');
        $model = new UserModel();

        $errorMessage="";
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
                        //displayError("Password specified is not correct");
                        $errorMessage="Password specified is not correct";
                    }
                }else{
                    $errorMessage="User by that name doesn't exist";
                }
            } else {
                $errorMessage="User by that username nor email doesn't exist";
            }

            if(! empty($errorMessage)){
                $session = \Config\Services::session();
                $session->setFlashdata('errorMessage',$errorMessage);
                return redirect()->to(base_url("/adverts"));
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
