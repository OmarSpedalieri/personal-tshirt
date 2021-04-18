<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Creation;
use App\Tshirt;

class CreationController extends Controller{
  
   
    public function home(){
        $tshirts = Tshirt::all();
        return view('pages.home', compact('tshirts'));

       
    }
   
   
    public function index(){

        $creations = Creation::all();
        return view('pages.creation-index', compact('creations'));
    }  


}
