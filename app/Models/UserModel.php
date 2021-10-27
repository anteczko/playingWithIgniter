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
     * checks if user exists by provided field name and it's value
     */
    public function ifUserExistsBy($fieldName,$value){

    }


}