<?php
namespace App\Models;
use CodeIgniter\Model;


class UserModel extends Model{
    protected $table = 'users';
    protected $allowedFields = ['id','username','password','email','phone_number','role'];

    public function getUserData(){
        return $this->table('users')->get()->getResultArray();
    }

    /**
     * returns user provided email or username, you may never know!
     */
    public function getUserByEmailOrUsername($name){
        $byEmail=$this->where('email',$name)->get()->getFirstRow();

        if(! empty($byEmail)){
            return $byEmail;
        }else{
            $byUsername=$this->where('username',$name)->get()->getFirstRow();
            if(! empty($byUsername)){
                return $byUsername;
            }
        }
        return null;
    }

    public function isValidEmail($email){
        $validation =  \Config\Services::validation();
        return $validation->check($email,'valid_email');
    }

    public function isValidLogin($username){
        $validation =  \Config\Services::validation();
        return $validation->check($username,'required|min_length[3]|max_length[32]');
    }



}