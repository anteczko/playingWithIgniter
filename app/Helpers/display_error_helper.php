<?php
    function displayError($error)
    {
        echo view('templates/websiteHeaderView');
        echo view('errors/registerErrorView', ['errors' => $error = ["Error!" => $error] ]);
    }

    function displayValidatorErrors($error)
    {
        echo view('templates/websiteHeaderView');
        echo view('errors/registerErrorView', ['errors' => $error]);
    }



?>