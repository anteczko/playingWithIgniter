<?php

namespace App\Controllers;
#TODO import adverts model!!!!
use App\Models\AdvertModel;
use CodeIgniter\Controller;

class OlxAdvertsController extends BaseController
{
    public function index()
    {
        echo "Witamy na olixie!";

        $model=new AdvertModel();

        //$data['adverts']=$model->getAll();
        $data=[
            'adverts' => $model->getAll(),
        ];

        echo view('olx/overview',$data);
    }
}
