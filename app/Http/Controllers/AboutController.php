<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about(){
        return view('about.about');
    }

    public function index(){
        return view('about.index');
    }
    public function contact(){
        return view('about.contact');
    }
}
