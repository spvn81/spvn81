<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gallery;
use App\Models\videogagallery;
use App\Models\menu;
use App\Models\news;


class dashboard extends Controller
{
    function dashboard(){

        $data['totelpages'] =menu::count();
        $data['totalimages'] =gallery::count();
        $data['totalvideos'] =videogagallery::count();
        $data['news'] =news::count();


        return view('liteadmin.dashboard',$data);
        }

}
