<?php
namespace App\Controllers;

use App\Models\AdvertModel;
use App\Models\PictureModel;
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
            $picture=new PictureModel();
            $data=['rows'=>$model->getAll(),
                'picture'=>$picture->getAll()];
        }

        echo view('templates/websiteHeaderView');
        displayNavBar();
        displaySearchBar();
        echo view('adverts/allAdvertsView',$data);
    }

    /**
     * It redirects to view that shows sully certain advert, with it's owner information etc
     */
    public function showSingleAdvert($advertId){
        #TODO add error handling in case of undefined id specified
        helper('displayWebsiteElement');
        displayNavBar();
        $model = new AdvertModel();
        $picture=new PictureModel();

        $data=['row'=>$model->getAdvertById($advertId),
                'picture'=>$picture->getPictureByAdvertId($advertId)];
        //echo view("adverts/singleAdvertView",$data);
        echo view("adverts/fullSingleAdvertView",$data);
    }

    public function add()
    {
        helper('displayError');
        helper('displayWebsiteElement');

        if (!empty(getUsername())) {
            echo view('templates/websiteHeaderView');
            displayNavBar();

            echo view('templates/websiteHeaderView');
            echo view('forms/addAdvertView');
        }else
            return redirect()->to(base_url("/users/login"));
    }

    public function addAction()
    {
        helper('displayError');
        helper('displayWebsiteElement');
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
                    'category' => 'required',
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
                    'category' => $this->request->getPost('category'),
                    'promoted_to' => $promotedValue
                ]);
                #TODO add file into database etc
                $picture=new PictureModel();

                $file=$this->request->getFile('picture');
                var_dump($file->getPath());
                $name=$this->request->getFile('picture')->getRandomName();
                //$name=$this->request->getFile('picture')->getFilename();

                $picture->save([
                    'advert_id' => $advert->db->insertID(),
                    'name' => $name
                ]);

                $this->request->getFile('picture')->store('/images/',$name);
                //$this->request->getFile('picture')->move('images/',$name);

                #TODO add redirect to page of newly added advert
                d("added file with name");
                d($name);
                d($this->request->getPost('isPromoted'));

            }else{
                d($this->validator->getErrors());
                displayValidatorErrors($this->validator->getErrors());
            }
        }else{
            return redirect()->to(base_url("/users/login"));
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



}
