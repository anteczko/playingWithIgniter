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
    public function getAdvertById($id){
        $builder=$this->table('adverts');
        $builder->where('id',$id);
        return $builder->get()->getResultArray();
    }
    public function getSearchedAdverts($title,$price,$sorting){
        $builder=$this->table('adverts');
        $builder->like('title',$title);
        $builder->where('price <=',$price);

        switch ($sorting){
            case 0:
                $builder->orderBy('price','ASC');
                break;
            case 1:
                $builder->orderBy('price','DESC');
                break;
        }
        $res=$builder->get()->getResultArray();
        return $res;
    }
    
}