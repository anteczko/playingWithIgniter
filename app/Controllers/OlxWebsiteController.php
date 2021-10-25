<?php

namespace App\Controllers;
#TODO import adverts model!!!!
use App\Models\CategoryModel;
use App\Models\UserModel;
use App\Helpers\WebsiteParts;
use CodeIgniter\Controller;

class OlxWebsiteController extends BaseController
{

    public function index()
    {
        echo "Witamy na olixie!";
        echo "pozdorwienia od website cotnrollera!";
    }


}
