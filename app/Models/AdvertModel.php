<?php
namespace App\Models;
use CodeIgniter\Model;


class AdvertModel extends Model{
    protected $table = 'adverts';
    protected $allowedFields = ['id','owner_id','title','description','original_price','original_currency_id','price','creation_timestamp','sold_timestamp','category_id'];

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
    public function getSearchedAdvertsBy($title,$category,$price,$order){
        //TODO finish this function
        $builder=$this->table('adverts');

        $builder->like('title',$title);

        if(! empty($price))
            $builder->where('price <=',$price);

        if( !empty($category) && $category>=0 )
            $builder->where('category',$category);

        if($order=="asc")
            $builder->orderBy('price','ASC');
        else
            $builder->orderBy('price','DESC');

        return $this->get()->getResultArray();
    }


}