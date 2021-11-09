<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class WebsiteController extends Controller
{
    public function modal()
    {
        helper('display_error_helper');
        displayInModal();

    }
}