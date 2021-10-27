<?php
namespace App\Models;
use CodeIgniter\Model;


class AdvertModel extends Model{
    protected $table = 'adverts';
    protected $allowedFields = ['id','owner_id','title','description','original_price','original_currency_id','price','creation_timestamp','sold_timestamp','category_id'];

    public function getAll(){
        return $this->table('adverts')->get()->getResultArray();
    }


}