<?php
namespace App\Models;
use CodeIgniter\Model;

class PictureModel extends Model{
    protected $table = 'pictures';
    protected $allowedFields = ['id','advert_id','name'];

    public function getAll(){
        return $this->table('pictures')->get()->getResultArray();
    }

    public function getPictureByAdvertId($advertId){
        $builder=$this->table('pictures');

        $builder->where('advert_id',$advertId);
        return $builder->get()->getResultArray();
    }

}