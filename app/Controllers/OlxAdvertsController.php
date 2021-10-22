<?php

namespace App\Controllers;
#TODO import adverts model!!!!
use App\Models\AdvertModel;
use App\Models\CategoryModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class OlxAdvertsController extends BaseController
{
    public function index()
    {
        $this->displayAll();
    }
    public function displayAll(){
        $session = \Config\Services::session();

        $user=new UserModel();
        $sessionData=[
            'nick'=>$user->getSession()->get('nick'),
        ];
        d($sessionData);
        echo view('olx/navigationPanel',$sessionData);
        echo view('BootstrapView');
        $catModel=new CategoryModel();

        $headerData=[
            'categories'=>$catModel->getCategories(),
        ];
        echo view('olx/searchHeader',$headerData);
        $model=new AdvertModel();
        $data=[
            'adverts' => $model->getAll(),
        ];
        echo view('olx/advertOverview',$data);
    }
    public function displaySearchedAdverts(){
        $user=new UserModel();
        $sessionData=[
            $user->getSession(),
        ];

        echo view('olx/navigationPanel',$sessionData);
        echo view('BootstrapView');
        if($this->request->getMethod() === 'post'){

            $catModel=new CategoryModel();

            $headerData=[
                'categories'=>$catModel->getCategories(),
            ];
            echo view('olx/searchHeader',$headerData);
            $model=new AdvertModel();
            //$builder=$this->table('adverts');
            //$data=$builder->like('title',$this->request->getPost('title'))->get();
            //$data=[ 'adverts' => $model->getAll() ];
            //d($data);
            $data=[ 'adverts' => $model->getSearchedAdverts(
                $this->request->getPost('title'),
                $this->request->getPost('price'),
                $this->request->getPost('sorting')
            ) ];
            //$data=$model->getSearchedAdverts();

            echo view('olx/advertOverview',$data);

        }else{
            $this->displayAll();
        }
    }
    public function add(){
        echo view('BootstrapView');
        echo view('olx/addAdvert');
    }
    public function actionAdd(){
        echo view('BootstrapView');
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
