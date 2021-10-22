<?php

namespace App\Controllers;
#TODO import adverts model!!!!
use App\Models\CategoryModel;
use CodeIgniter\Controller;

class OlxcategoriesController extends BaseController
{
    public function getAll()
    {
        $model=new CategoryModel();
        return $model->getCategories();
    }


}
