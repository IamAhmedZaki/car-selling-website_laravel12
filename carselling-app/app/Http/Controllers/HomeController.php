<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home.index',[
            'name'=>'Ahmed',
            'surname'=>'Zaki',
            'hobbies'=>['football','cricket','volleyball'],
        ]);
    }
}
