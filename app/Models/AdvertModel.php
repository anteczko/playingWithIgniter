<?php
namespace App\Models;
use CodeIgniter\Model;


class AdvertModel extends Model{
    protected $table = 'adverts';
    protected $allowedFields = ['id','owner_id','title','description','original_price','original_currency_id','price','creation_timestamp','sold_timestamp','category_id','promoted_to'];

    public function getAll(){
        return $this->table('adverts')->get()->getResultArray();
    }

    /**
     * Function for testing pr
     */
    public function getSingleAdvert(){
        return $this->getAll()[0];
    }

    /**
     *
     */
    public function getSearchedAdvertsBy($title,$category_id,$price,$order){
        //TODO finish this function
        $builder=$this->table('adverts');

        $builder->like('title',$title);

        if(! empty($price))
            $builder->where('price <=',$price);


        if($category_id!="default") {
            $builder->where('category_id', $category_id);
        }



        if($order=="asc")
            $builder->orderBy('price','ASC');
        else
            $builder->orderBy('price','DESC');

        return $this->get()->getResultArray();
    }

    public function getAdvertById($id){
        $builder=$this->table('adverts');
        return $builder->where('id',$id)->get()->getFirstRow('array');
    }

    public function getAdvertsByCategoryId($id){
        $builder=$this->table('adverts');
        return $builder->where('category_id',$id)->get()->getResultArray();
    }


}