<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\cmsdata;
use App\Models\gallery;
use App\Models\videogagallery;
class MenuController extends Controller
{



    function menupage(){
        $getmenu['menu'] = menu::all();
        return view('liteadmin.menupage',$getmenu);
    }


    function mannagemenu($id=''){
        if(empty($id)){
            $getmenu['id']='';
            $getmenu['menu']='';
            $getmenu['menu_slug']='';
            $getmenu['menu_image']='';
            $getmenu['menu_parent']=menu::all();
            $getmenu['menu_parent_id']='';
            $getmenu['menu_type']= '';
            $getmenu['is_home_page']= '';
            $getmenu['dont_show_in_nav_bar']= '';



            }else{
            $get_menu=menu::where('id','=',$id)->get();
            $getmenu['id']= $get_menu[0]->id;
            $getmenu['menu']=$get_menu[0]->menu;
            $getmenu['menu_parent_id']=$get_menu[0]->menu_parent_id;
            $getmenu['menu_slug']=$get_menu[0]->menu_slug;
            $getmenu['menu_image']=$get_menu[0]->menu_image;
            $getmenu['menu_type']=$get_menu[0]->menu_type;
            $getmenu['menu_parent']=menu::where('id','!=',$id)->get();
            $getmenu['is_home_page']= $get_menu[0]->is_home_page;
            $getmenu['dont_show_in_nav_bar']= $get_menu[0]->dont_show_in_nav_bar;


        }
        return view('liteadmin.mannagemenu', $getmenu);
    }


    function mannagemenuorm(Request $request){


        $menu_id = $request->post('menu_id');
        $menu = $request->post('menu');
        $menu_slug = $request->post('menu_slug');
        $menu_parent_id = $request->post('menu_parent_id');
        $menu_type = $request->post('menu_type');
        $is_home_page = $request->post('is_home_page');
        $dont_show_in_nav_bar = $request->post('dont_show_in_nav_bar');



        $status = 1;


        $validator = Validator::make($request->all(), [
            'menu' => 'required',
            'menu_slug' => 'required|regex:/^[a-zA-Z0-9\s]+$/|unique:menus,menu_slug,'.$menu_id,
            'menu_image'=>'mimes:png,jpg,jpeg',
            'menu_type'=>'required'
      ]);


      if($validator->fails()) {
         return response()->json(array('errors'=>$validator->errors()));
      }else{

if(!empty($menu_id )){
    $mannage_menu = menu::find($menu_id);
    $idm = $menu_id;


}else{
    $mannage_menu = new menu();
    $idm  =  $mannage_menu->id;
}
if($request->hasFile('menu_image')){
    $oamege = $request->file('menu_image');
    $iamage_ext = $oamege->extension();
    $filename = date('dmY').time().'.'.$iamage_ext;
    $dastorage_name = 'menu/'.$filename;
    $oamege->storeAs('public/media/menu/',$filename);
    $mannage_menu->menu_image = $dastorage_name;
}


$mannage_menu->menu = $menu;
$mannage_menu->menu_slug = $menu_slug;
$mannage_menu->menu_parent_id = $menu_parent_id;
$mannage_menu->menu_type = $menu_type;
$mannage_menu->status = $status;
$mannage_menu->is_home_page = $is_home_page;
$mannage_menu->dont_show_in_nav_bar = $dont_show_in_nav_bar;
$mannage_menu->save();
$msg = "Details Saved";
return response()->json(array('sucess'=> $msg,'id'=>$idm));
}
    }


    function stetus($currentstetus,$id){

        $stetus = menu::find($id);
        $stetus->status = $currentstetus;
        $stetus->save();
        session()->flash('msg','status update done');
        return redirect('myadm/addmenu');

        }





function cms(){

    $cms['menudata'] = menu::where('status','=',1)->where('menu_type','!=','news')
    ->where('menu_type','!=','other')
    ->where('menu_type','!=','product')
   
    ->get();
    return view('liteadmin.cms',$cms);
}



function cmsdata(Request $request){
    $menuid = $request->menuid;
    $description=$request->post('description');
   $title=$request->post('title');
   $is_data=$request->post('is_data');

   $stetus = 1;
   $conentofid = $request->conentofid;
    $validator = Validator::make($request->all(), [
        'menuid' => 'required',
        'title'=>'required',

  ]);


  if($validator->fails()) {
    return response()->json(array('errors'=>$validator->errors()));
 }else{

    $update_is_data = menu::find($menuid);
    $update_is_data->is_data = $is_data;
    $update_is_data->save();
  if (empty($conentofid)){
    $summernote = new cmsdata;
}else{
    $summernote = cmsdata::find($conentofid);
}
$summernote->title = $request->title;
$summernote->content = $description;
$summernote->menu_id = $menuid;
$summernote->title = $title;
$summernote->stetus =  $stetus;
$summernote->save();
return response()->json(array('sucess'=>'Content Saved'));
}
}


    function menu_delete(Request $request){
        $id = $request->post('id');
        $delete_menu = menu::where(['id'=>$id])->delete();
       if($delete_menu){
        return response()->json(array('sucess'=>'deleted'));
        }else{
            return response()->json(array('errors'=>'sorry'));
            }
}



function mannagecontent_get(Request $request){
 $menu_id = $request->menu_id;
 $get_menu_data[] = menu::where(['id'=>$menu_id])->get();
$get_menu_data[] = cmsdata::where(['menu_id'=>$menu_id])->get();
return response()->json(array($get_menu_data));
}


function imageupload(Request $request,$id,$menu){

     $foldername = $menu;

    if($request->hasFile('file')){
        $is_data = 1;
        $oamege = $request->file('file');
        $iamage_ext = $oamege->extension();
        $filename = microtime().date('dmY').time().'.'.$iamage_ext;
        $dastorage_name = 'gallery/'.$foldername.'/'.$filename;
        $oamege->storeAs('public/media/gallery/'.$foldername,$filename);
        $gallery = new gallery();
        $gallery->menu_id = $id;
        $gallery->file_name = $dastorage_name;
        $gallery->save();
        $update_is_data = menu::find($id);
        $update_is_data->is_data = $is_data;
        $update_is_data->save();


    }

}

function uploadckeditorimage(Request $request){
 if($request->hasFile('upload')) {
        $originName = $request->file('upload')->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $request->file('upload')->getClientOriginalExtension();
        $fileName = $fileName.'_'.time().'.'.$extension;

        $request->file('upload')->move(public_path('storage/media/cms'), $fileName);

        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $url = asset('storage/media/cms/'.$fileName);
        $msg = 'Image uploaded successfully';
        $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

        @header('Content-type: text/html; charset=utf-8');
        echo $response;
    }
}



function videoupload(Request $request,$id,$menu){
$foldername = $menu;
if($request->hasFile('file')){
        $oamege = $request->file('file');
        $iamage_ext = $oamege->extension();
        $filename = microtime().date('dmY').time().'.'.$iamage_ext;
        $dastorage_name = 'videogallery/'.$foldername.'/'.$filename;
        $oamege->storeAs('public/media/videogallery/'.$foldername,$filename);
        $gallery = new videogagallery();
        $gallery->menu_id = $id;
        $gallery->file_name = $dastorage_name;
        $gallery->save();

    }

}



function mannagemenu_arrange(){

 $getmenudata['menu'] = menu::where('menu_parent_id',0)->orWhere('menu_parent_id',null)->get();
return view('liteadmin.arangemenu',$getmenudata);
}

function arrange_menus_save(Request $request){

    $menuid = $request->post('menuid');
    $alinement = $request->post('alinement');
    foreach($menuid  as $key=>$val){

        $savedata = menu::find($val);
        $savedata->alinement = $alinement[$key];
        $savedata->save();

    }

}




}
