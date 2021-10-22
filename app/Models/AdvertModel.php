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
    public function getSearchedAdverts($title,$price,$sorting){
        $builder=$this->table('adverts');
        $builder->like('title',$title);
        $builder->where('price <=',$price);
        if($price) $builder->orderBy('price','DESC');
        else $builder->orderBy('price','ASC');
        $res=$builder->get()->getResultArray();
        return $res;
    }
    
}