<?php
namespace App\Controllers;
use App\Models\CategoryModel;
use CodeIgniter\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categoryModel=new CategoryModel();
        $data=['categories'=>$categoryModel->findAll()];
        echo view('categories/categoriesBar',$data);
    }
}