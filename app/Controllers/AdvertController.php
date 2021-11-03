<?php
namespace App\Controllers;

use App\Models\AdvertModel;
use CodeIgniter\Controller;

class AdvertController extends Controller
{
    public function index()
    {
        $this->search();
    }

    public function search($data=null){
        helper('displayWebsiteElement');
        if(empty($data)){
            $model = new AdvertModel();
            $data=['rows'=>$model->getAll()];
        }

        echo view('templates/websiteHeaderView');
        displayNavBar();
        displaySearchBar();
        echo view('adverts/allAdvertsView',$data);
    }

    public function add()
    {
        echo view('templates/websiteHeaderView');
        helper('displayWebsiteElement');
        displayNavBar();

        //TODO add redirtect for not logged in users
        echo view('templates/websiteHeaderView');
        echo view('forms/addAdvertView');
    }

    public function addAction()
    {
        helper('displayError');
        helper('displayWebsiteElement');
        $validation =  \Config\Services::validation();
        $advert=new AdvertModel();

        //TODO sanitize and escape provided fields


        if($this->request->getMethod() == 'post' && !empty(getSession()) &&
            $this->validate([
                'title' => 'required|min_length[12]|max_length[64]',
                'description' => 'required|min_length[16]|max_length[2048]',
                'price' => 'required|decimal|greater_than_equal_to[0]|less_than[10000000000]',
                'category' => 'required'
                #TODO add 'files' validation maybe?
        ])){
            //d($this->request->getBody());
            #TODO add advert to database
            $advert->save([
                'title' => filter_var($this->request->getPost('title'),FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES),
                'owner_id' => getSession()->get('id'),
                'description' => filter_var($this->request->getPost('description'),FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES),
                'price' => $this->request->getPost('price'),
                'category' => $this->request->getPost('category')
            ]);

            d($this->request->getFiles());

        }else{
            d($this->validator->getErrors());
            displayValidatorErrors($this->validator->getErrors());
        }
    }

    public function searchAction(){
        helper('displayError');
        $validation =  \Config\Services::validation();
        //TODO validate and sanitize all fields
        if($this->request->getMethod() == 'post'  &&
            $this->validate([
                'title' => 'permit_empty|min_length[1]|max_length[64]',
                'categories' => 'permit_empty',
                'price' => 'permit_empty|decimal|greater_than_equal_to[0]|less_than[10000000000]',
                'order' => 'required|in_list[desc,asc]',
            ])){
            // TODO!!!!! Sanitize all these fields!!!!
            $model = new AdvertModel();
            $data=['rows'=>$model->getSearchedAdvertsBy(
                $this->request->getPost('title'),
                $this->request->getPost('category'),
                $this->request->getPost('price'),
                $this->request->getPost('order'),
            )];

            $this->search($data);
        }else{
            d($this->validator->getErrors());
            displayValidatorErrors($this->validator->getErrors());
        }
    }



}
