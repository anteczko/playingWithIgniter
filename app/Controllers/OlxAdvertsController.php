<?php

namespace App\Controllers;
#TODO import adverts model!!!!
use App\Models\AdvertModel;
use App\Models\CategoryModel;
use App\Models\UserModel;


class OlxAdvertsController extends BaseController
{
    public function index()
    {
        $this->displayAdverts();
    }

    public function fullAdvertView($id){
        //TODO put code here that shows viewmodel
        $advert=new AdvertModel();
        $data=['adverts'=>$advert->getAdvertById($id)];
        echo view('BootstrapView');
        echo view('olx/fullAdvertView',$data);

    }
/*
 * Function displays subsite with all adverts listed, it checks for potential POST in case if user was searching and alters data placed into view
 */
    public function displayAdverts(){
        $user = new UserModel();
        $sessionData=[
            'nick'=> $user->getSession()->get('nick'),
        ];

        $catModel=new CategoryModel();
        $headerData=[
            'categories'=>$catModel->getCategories(),
        ];

        if($this->request->getMethod() === 'post'){
            $model=new AdvertModel();
            $data=[ 'adverts' => $model->getSearchedAdverts(
                $this->request->getPost('title'),
                $this->request->getPost('price'),
                $this->request->getPost('sorting')
            ) ];
        }else{
            $model=new AdvertModel();
            $data=['adverts'=>$model->getAll()];
            //$this->displayAll();

        }

        echo view('BootstrapView');
        echo view('olx/navigationPanel',$sessionData);
        echo view('olx/searchHeader',$headerData);
        echo view('olx/advertOverview',$data);
    }
    public function add(){
        $user = new UserModel();
        $sessionData=[
            'nick'=> $user->getSession()->get('nick'),
        ];
        echo view('olx/navigationPanel',$sessionData);

        $category=new CategoryModel();
        $advertData=['categories'=>$category->getCategories()];
        echo view('olx/addAdvert',$advertData);
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
                   'title'=>$this->request->getPost('title',FILTER_SANITIZE_ENCODED),
                   'description'=>$this->request->getPost('description',FILTER_SANITIZE_ENCODED),
                   'price'=>$this->request->getPost('price',FILTER_SANITIZE_ENCODED),
                    'category'=>$this->request->getPost('category'),
                ]);
            }  
        }
    }
    
}
