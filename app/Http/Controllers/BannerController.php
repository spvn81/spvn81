<?php

namespace App\Http\Controllers;

use App\Models\banner;
use Illuminate\Http\Request;
use App\Models\menu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class BannerController extends Controller
{
    function Banners(){

        $dat['banners'] = banner::orderBy('id', 'DESC')->get();

        return view('liteadmin.banner',$dat);

    }



    function mannagebanner($id=''){


        $data['menu'] = menu::where(['status'=>1])->get();

        if(!empty($id)){
            $data['banner'] = banner::find($id);
            $data['banner_id'] =  $data['banner']->id;
            $data['alt'] = $data['banner']->alt;
            $data['banner_image'] = $data['banner']->banner_image;
            $data['background_img'] = $data['banner']->background_img;
            $data['menu_id'] = $data['banner']->menu_id;
            $data['banner_image_description'] = $data['banner']->banner_image_description;


        }else{
            $data['banner_id'] =   '';
            $data['alt'] =   '';
            $data['banner_image'] =   '';
            $data['menu_id'] =   '';
            $data['background_img'] = '';
            $data['banner_image_description'] = '';

        }

        return view('liteadmin.managebanner', $data);

    }



    function processbanner(Request $request){

        $alt = $request->post('alt');
        $menu_id = $request->post('menu_id');
        $banner_image_description = $request->post('banner_image_description');

        $status = 1;
        $banner_id = $request->post('banner_id');
            if(!empty($banner_id)){
                    $banner_image_validate = 'mimes:png,jpg,jpeg';
                }else{
                    $banner_image_validate = 'required|mimes:png,jpg,jpeg';

                }

            $validator = Validator::make($request->all(), [
            'banner_image'=>$banner_image_validate,
            'background_img'=>'mimes:png,jpg,jpeg,svg'
      ]);
        if($validator->fails()) {
        return response()->json(array('errors'=>$validator->errors()));
     }else{
        if(!empty($banner_id)){
            $banner_img  = banner::find($banner_id);
        }else{
            $banner_img = new banner();

        }


        if($request->hasFile('banner_image')){
            $oamege = $request->file('banner_image');
            $iamage_ext = $oamege->extension();
            $filename = date('dmY').time().'.'.$iamage_ext;
            $dastorage_name = 'banner/'.$filename;
            $oamege->storeAs('public/media/banner/',$filename);
            $banner_img->banner_image = $dastorage_name;
        }


        if($request->hasFile('background_img')){
            $oamege = $request->file('background_img');
            $iamage_ext = $oamege->extension();
            $filename = date('dmY').time().'.'.$iamage_ext;
            $dastorage_name = 'banner/'.$filename;
            $oamege->storeAs('public/media/banner/',$filename);
            $banner_img->background_img = $dastorage_name;
        }
        $banner_img->alt = $alt;
        $banner_img->menu_id = $menu_id;
        $banner_img->status = $status;
        $banner_img->banner_image_description = $banner_image_description;

       if( $banner_img->save()){
        return response()->json(array('sucess'=>$banner_img));

       }
    }
}



function stetus($changestetsu,$id){

    $stetus = banner::find($id);
    $stetus->status = $changestetsu;
    $stetus->save();
    session()->flash('msg','status update done');
    return redirect('myadm/Banners');

    }



    function delete_banner(Request $request){
        $bannerid = $request->post('inc_id');
        $getdata = banner::find($bannerid);
        $banner_image =  $getdata->banner_image;
        $background_img =  $getdata->background_img;
        $bannerimg = 'public/media/'.$banner_image;
         $backimgg = 'public/media/'.$background_img;
        Storage::delete([$bannerimg,$backimgg]);
        $delete_banner = banner::where(['id'=>$bannerid])->delete();
        if($delete_banner){
            return response()->json(array('sucess'=>'data successfully detected'));
           }else{
            return response()->json(array('errors'=>'query cannot be deleted please try again'));

           }

    }


}
