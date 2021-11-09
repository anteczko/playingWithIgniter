<?php
namespace App\Controllers;

use App\Models\AdvertModel;
use App\Models\CategoryModel;
use App\Models\PictureModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class AdvertController extends Controller
{
    public function index()
    {
        helper('display_website_element');
        helper('display_error_helper');
        displayNavBar();
        displaySearchBar();

        $session = \Config\Services::session();
        $errors=$session->getFlashdata('errors');
        $errorMessage=$session->getFlashdata('errorMessage');
        if(! empty($errors)){
            //displayValidatorErrorsInModal($errors);
            modalShow("loginModal");
        }
        else if(! empty($errorMessage)){
            //displayErrorInModal($errorMessage);
            modalShow("loginModal");
        }

        $categoryModel=new CategoryModel();
        $data=['categories'=>$categoryModel->findAll()];
        echo view('categories/categoriesBar',$data);
        $this->displaySearch();
    }

    public function search($data=null){
        helper('display_website_element');
        displayNavBar();
        displaySearchBar();


        $this->displaySearch($data);
    }

    public function displaySearch($data=null){
        if(empty($data)){
            $model = new AdvertModel();
            $picture=new PictureModel();
            $data=['rows'=>$model->getAll(),
                'picture'=>$picture->getAll()];
        }
        echo view('adverts/allAdvertsView',$data);
    }

    /**
     * It redirects to view that shows sully certain advert, with it's owner information etc
     */
    public function showSingleAdvert($advertId){
        #TODO add error handling in case of undefined id specified
        helper('display_website_element');
        displayNavBar();
        $user = new UserModel();
        $advert = new AdvertModel();
        $picture=new PictureModel();

        $advertRow=$advert->getAdvertById($advertId);
        $userRow=$user->getUserById($advertRow['owner_id']);

        $data=['row'=>$advertRow,
                'picture'=>$picture->getPictureByAdvertId($advertId),
                'user'=>$userRow];
        //echo view("adverts/singleAdvertView",$data);
        echo view("adverts/fullSingleAdvertView",$data);
    }

    public function add()
    {
        helper('display_error');
        helper('display_website_element');

        if (!empty(getUsername())) {
            echo view('templates/websiteHeaderView');
            displayNavBar();

            echo view('templates/websiteHeaderView');
            $categoriesModel=new CategoryModel();
            $data=['categories'=>$categoriesModel->getAll()];
            echo view('forms/addAdvertView',$data);
        }else
            return redirect()->to(base_url("/users/login"));
    }

    public function addAction()
    {
        helper('display_error');
        helper('display_website_element');
        helper('form');
        helper('string');
        helper('date');
        $validation =  \Config\Services::validation();
        $advert=new AdvertModel();

        //TODO sanitize and escape provided fields

        if(!empty(getSession())){
            if($this->request->getMethod() == 'post' &&
                $this->validate([
                    'title' => 'required|min_length[12]|max_length[64]',
                    'description' => 'required|min_length[16]|max_length[2048]',
                    'price' => 'required|decimal|greater_than_equal_to[0]|less_than[10000000000]',
                    'category' => 'required|integer',
                    'picture' => 'max_size[picture,12000]|mime_in[picture,image/png,image/jpg,image/jpeg|ext_in[picture,jpg,png,jpeg]'
                    #TODO add 'files' validation maybe?
                ])){
                //d($this->request->getBody());

                if(! empty($this->request->getPost("isPromoted"))){
                    $promotedValue=date("Y-m-d", strtotime("+1 week"));
                }else $promotedValue=null;


                $advert->save([
                    'title' => filter_var($this->request->getPost('title'),FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES),
                    'owner_id' => getSession()->get('id'),
                    'description' => filter_var($this->request->getPost('description'),FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES),
                    'price' => $this->request->getPost('price'),
                    'category_id' => $this->request->getPost('category'),
                    'promoted_to' => $promotedValue
                ]);
                #TODO add file into database etc
                $picture=new PictureModel();

                $file=$this->request->getFile('picture');
                var_dump($file->getPath());
                $name=$this->request->getFile('picture')->getRandomName();
                //$name=$this->request->getFile('picture')->getFilename();

                $advertId=$advert->db->insertID();
                $picture->save([
                    'advert_id' => $advertId,
                    'name' => $name
                ]);

                $this->request->getFile('picture')->store('/images/',$name);
                //$this->request->getFile('picture')->move('images/',$name);

                #TODO add redirect to page of newly added advert
                d("added file with name");
                d($name);
                d($this->request->getPost('isPromoted'));
                return redirect()->to(base_url("/adverts/".$advertId));
            }else{
                d($this->validator->getErrors());
                displayValidatorErrors($this->validator->getErrors());
            }
        }else{
            return redirect()->to(base_url("/users/login"));
        }

    }

    public function searchAction(){
        helper('display_error');
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
            $picture=new PictureModel();
            $data=['rows'=>$model->getSearchedAdvertsBy(
                $this->request->getPost('title'),
                $this->request->getPost('category'),
                $this->request->getPost('price'),
                $this->request->getPost('order'),
            ),'picture'=>$picture->getAll()];

            $this->search($data);
        }else{
            d($this->validator->getErrors());
            displayValidatorErrors($this->validator->getErrors());
        }
    }

    public function searchCategory($category){
        $model = new AdvertModel();
        $picture=new PictureModel();
        $categoryModel = new CategoryModel();


        $categoryId=$categoryModel->getCategoryIdByName($category);

        $data=['rows'=>$model->getAdvertsByCategoryId($categoryId),'picture'=>$picture->getAll()];

        $this->search($data);
    }



}
