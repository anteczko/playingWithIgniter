<?php
namespace App\Controllers;

use App\Models\AdvertModel;
use CodeIgniter\Controller;

class AdvertController extends Controller{
    public function index(){
        $model = new AdvertModel();
        $data=['rows'=>$model->getAll()];
        echo view('templates/universalView',$data);
    }




}
