<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends controller
{
    public function index()
    {
        return view('home');        
    }
}