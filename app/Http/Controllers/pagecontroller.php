<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu;
use App\Models\cmsdata;


class pagecontroller extends Controller
{
    function viewallpages(){

        $data['getdata'] = menu::join('cmsdatas','cmsdatas.menu_id','=','menus.id')
        ->where('menus.menu_type','!=','home')
        ->get();
        return view('liteadmin.pages',$data);
    }



    function delete_page(Request $request){
        $id = $request->post('id');
        $delete_menu_pages = cmsdata::where(['id'=>$id])->delete();
       if($delete_menu_pages){
        return response()->json(array('sucess'=>'deleted'));
        }else{
            return response()->json(array('errors'=>'sorry'));
            }
}



}
