<?php
    function displayNavBar()
    {
        echo view('templates/websiteHeaderView');
        echo view('templates/navBar');
    }

    function displaySearchBar()
    {
        echo view('templates/searchBar');
    }

/**
 * @param $str - string to short
 * @param $len - length of shortened string (32 by default)
 */
    function Short_to($str,$len=64)
    {
        return substr($str,0,$len);
    }

    function getUsername()
    {
        $session = \Config\Services::session();
        return $session->get('username');
    }

    function getSession()
    {
        $session = \Config\Services::session();
        return $session;
    }

?>