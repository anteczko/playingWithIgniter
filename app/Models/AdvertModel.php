<?php
namespace App\Models;

use CodeIgniter\Model;

class AdvertModel extends Model
{
    protected $table='adverts';
    protected $allowedFields = ['id','owner_id','title','description','price','creation_timestamp','sell_timestamp','category'];

    public function getAll()
    {
        return $this->findAll();
    }
    public function getSearchedAdverts(){
        $builder=$this->table('adverts');

    }
    
}