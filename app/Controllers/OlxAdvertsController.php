<?php

namespace App\Controllers;
#TODO import adverts model!!!!
use App\Models\AdvertModel;
use CodeIgniter\Controller;

class OlxAdvertsController extends BaseController
{
    public function index()
    {
        $this->displayAll();
    }
    public function displayAll(){
        echo "<h1>Witamy na olixie!</h1>";
        echo view('olx/searchHeader');
        $model=new AdvertModel();
        $data=[
            'adverts' => $model->getAll(),
        ];
        echo view('olx/advertOverview',$data);
    }
    public function displaySearchedAdverts(){
        if($this->request->getMethod() === 'post'){
            d("We gotta make some queries");

            echo "<h1>Witamy na olixie!</h1>";
            echo view('olx/searchHeader');
            $model=new AdvertModel();
            $builder=$this->table('adverts');
            $data=$builder->like('title',$this->request->getPost('title'))->get();
            //$data=[ 'adverts' => $model->getAll(), ];

        echo view('olx/advertOverview',$data);
        }else{
            $this->displayAll();
        }
    }
    public function add(){
        echo view('olx/addAdvert');
    }
    public function actionAdd(){
        $model=new AdvertModel();
        echo view('templates/loginHeader');

        if($this->request->getMethod() == 'post'){
            $session = \Config\Services::session();

            if(empty($session->get('nick'))){
                d("please log in!!!");
            }else{
                //var_dump($this->request);

                d($this->request->getPost('title'));
                $model->save([
                   'title'=>$this->request->getPost('title'),
                   'description'=>$this->request->getPost('description'),
                   'price'=>$this->request->getPost('price',FILTER_SANITIZE_ENCODED)
                ]);
            }  
        }
    }
    
}
