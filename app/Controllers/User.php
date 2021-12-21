<?php

namespace App\Controllers;

class User extends BaseController
{
    public function dashboard()
    {

        $data = [
            'title' => 'My Profile'
        ];

        return view('admin/dashboard', $data);
    }
    
    public function index()
    {

        $data = [
            'title' => 'My Profile'
        ];

        return view('user/index', $data);
    }
    

}
