<?php

namespace App\Http\Controllers;
use App\Models\gallery;
use App\Models\videogagallery;
use App\Models\menu;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class gallerycontroller extends Controller
{



    function Image(){

        $gdata['gallery'] = menu::orderBy('created_at')->where(['menu_type'=>'image_gallery'])->get();


        return view('liteadmin.imagecategory',$gdata);

    }


    function delete_galley_group(Request $request){

        $gmenu_id =   $request->post('gmenu_id');

        $getimage  = gallery::where(['menu_id'=>$gmenu_id])->get();
        $file_name = $getimage[0]->file_name;
        $dlt_file ='public/media/'.$file_name;
        Storage::delete($dlt_file);




        $delete_ggroup = gallery::where(['menu_id'=>$gmenu_id])->delete();
        if($delete_ggroup){
            $detetemenu =menu::where(['id'=>$gmenu_id])->delete();
            if($detetemenu){
                return response()->json(array('sucess'=>'data successfully detected'));
                }else{
                    return response()->json(array('errors'=>'data cannot detected please check menu groups'));
                    }
                }else{
                    return response()->json(array('errors'=>'data cannot detected please check menu groups'));

                }
    }


    function viewimages($menu_id){

        $get_phptos['phoos'] = gallery::where(['menu_id'=>$menu_id])->get();

        $get_phptos['menu'] = menu::where(['id'=>$menu_id])->get();

        return view('liteadmin.viewimages',$get_phptos);

    }
    function delete_deletesingle(Request $request){

        $iamge_id =   $request->post('iamge_id');


        $getimage  = gallery::find($iamge_id);
$file_name = $getimage->file_name;
$dlt_file ='public/media/'.$file_name;
Storage::delete($dlt_file);

 $delete_ggroup = gallery::where(['id'=>$iamge_id])->delete();
        if($delete_ggroup){
            return response()->json(array('sucess'=>'data successfully detected'));
           }else{
            return response()->json(array('errors'=>'image cannot be deleted please try again'));

           }
    }


    function edit_img($id){
        $getimage['editimg']  = gallery::where(['id'=>$id])->get();

        return view('liteadmin.edit_img',$getimage);


    }

    function edit_img_save(Request $request,$id){
        $getimage  = gallery::find($id);
        $file_name = $getimage->file_name;

            $filemame_arr = explode('/',$file_name);
            $holderpath = array_pop($filemame_arr);
            $imparrtostr = implode('/',$filemame_arr);
             $dlt_file ='public/media/'.$file_name;
            Storage::delete($dlt_file);

        if($request->hasFile('file')){
            $strogepath = "public/media/".$imparrtostr;
            $oamege = $request->file('file');
            $iamage_ext = $oamege->extension();
            $filename = date('dmY').time().'.'.$iamage_ext;
             $dastorage_name = $imparrtostr.'/'.$filename;
            $oamege->storeAs($strogepath,$filename);
            $getimage ->file_name = $dastorage_name;
            if($getimage->save()){
                  $fileneme = $dastorage_name;
                return response()->json(array('sucess'=>'image successfully saved','file_name'=>$fileneme));

            }else{
                return response()->json(array('errors'=>'image cannot be uploaded please try again'));

            }
        }


    }





    function video(){

        $gdata['gallery'] = menu::orderBy('created_at')->where(['menu_type'=>'video_gallery'])->get();


        return view('liteadmin.videocategory',$gdata);

    }


    function delete_galley_video_group(Request $request){

        $gmenu_id =   $request->post('gmenu_id');
        $delete_ggroup = videogagallery::where(['menu_id'=>$gmenu_id])->delete();
        if($delete_ggroup){
            $detetemenu =menu::where(['id'=>$gmenu_id])->delete();
            if($detetemenu){
                return response()->json(array('sucess'=>'data successfully detected'));
                }else{
                    return response()->json(array('errors'=>'data cannot detected please check menu groups'));
                    }
                }else{
                    return response()->json(array('errors'=>'data cannot detected please check menu groups'));

                }
    }


    function viewvideo($menu_id){

        $get_phptos['phoos'] = videogagallery::where(['menu_id'=>$menu_id])->get();

        $get_phptos['menu'] = menu::where(['id'=>$menu_id])->get();

        return view('liteadmin.viewvideos',$get_phptos);

    }
    function delete_deletesingle_video(Request $request){

        $iamge_id =   $request->post('iamge_id');



$getimage  = videogagallery::find($iamge_id);
$file_name = $getimage->file_name;
$dlt_file ='public/media/'.$file_name;
Storage::delete($dlt_file);



        $delete_ggroup = videogagallery::where(['id'=>$iamge_id])->delete();
        if($delete_ggroup){
            return response()->json(array('sucess'=>'data successfully detected'));
           }else{
            return response()->json(array('errors'=>'image cannot be deleted please try again'));

           }
    }


    function edit_vod($id){
        $getimage['editimg']  = videogagallery::where(['id'=>$id])->get();

        return view('liteadmin.edit_vod',$getimage);


    }

    function edit_vod_save(Request $request,$id){
        $getimage  = videogagallery::find($id);
        $file_name = $getimage->file_name;

            $filemame_arr = explode('/',$file_name);
            $holderpath = array_pop($filemame_arr);
            $imparrtostr = implode('/',$filemame_arr);
             $dlt_file ='public/media/'.$file_name;
            Storage::delete($dlt_file);

        if($request->hasFile('file')){
            $strogepath = "public/media/".$imparrtostr;
            $oamege = $request->file('file');
            $iamage_ext = $oamege->extension();
            $filename = date('dmY').time().'.'.$iamage_ext;
             $dastorage_name = $imparrtostr.'/'.$filename;
            $oamege->storeAs($strogepath,$filename);
            $getimage ->file_name = $dastorage_name;
            if($getimage->save()){
                  $fileneme = $dastorage_name;
                return response()->json(array('sucess'=>'image successfully saved','file_name'=>$fileneme));

            }else{
                return response()->json(array('errors'=>'image cannot be uploaded please try again'));

            }
        }


    }














}
