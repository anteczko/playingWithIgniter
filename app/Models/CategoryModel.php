<?php
namespace App\Models;
use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table='categories';
    protected $allowedFields=['id','name','description'];

    public function getAll()
    {
        return $this->findAll();
    }

    public function getCategoryIdByName($name)
    {
        $builder=$this->table('categories');
        return $builder->where('name',$name)->get()->getFirstRow('array')['id'];
    }
}