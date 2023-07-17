<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoriesController extends Controller
{
    public function liststories(){

        return view('frontend.story');
    }
}
