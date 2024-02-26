<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HompageController extends Controller
{
    public function index()
        {
            //Ambil data gallery dengan judul post slider
            $Gallery = Post::where('title','Slider')->first()->galleries->where('status','active');
            return view('welcome');
        }
}

