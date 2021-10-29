<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;
use App\Models\menu;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{

function addnews(){

    $data['newsdata'] = menu::where(['status'=>1,'menu_type'=>'news'])->get();
    return view('liteadmin.addnews', $data);

}



function newsdata(Request $request){
     $news_id= $request->post('news_id');
    $menuid = $request->menuid;
    $description=$request->post('description');
   $title=$request->post('title');
   $is_home=$request->post('is_home');
   $is_home_top=$request->post('is_home_top');

   $stetus = 1;
    $validator = Validator::make($request->all(), [
        'menuid' => 'required',
        'title'=>'required',
        'description'=>'required'

  ]);


  if($validator->fails()) {
    return response()->json(array('errors'=>$validator->errors()));
 }else{

    if(!empty($news_id)){
        $summernote = news::find($news_id);
        $msg= "updated";

    }else{
        $summernote = new news;
        $msg= "inserted";


    }
$summernote->menu_id = $menuid;
$summernote->news_title = $title;
$summernote->status =  $stetus;
$summernote->description = $description;
$summernote->is_home = $is_home;
$summernote->is_home_top = $is_home_top;



if($request->hasFile('news_image')){
    $oamege = $request->file('news_image');
    $iamage_ext = $oamege->extension();
    $filename = date('dmY').time().'.'.$iamage_ext;
    $dastorage_name = 'news/'.$filename;
    $oamege->storeAs('public/media/news/',$filename);
    $summernote->news_image = $dastorage_name;
}
$summernote->save();
return response()->json(array('sucess'=>'Content Saved' ,'stetus'=>$msg));


}
}





function uploadckeditorimagefornews(Request $request){
    if($request->hasFile('upload')) {
           $originName = $request->file('upload')->getClientOriginalName();
           $fileName = pathinfo($originName, PATHINFO_FILENAME);
           $extension = $request->file('upload')->getClientOriginalExtension();

           $request->validate([
            'upload'=>'mimes:png,jpg,jpeg,pdf'
           ]);

           $fileName = $fileName.'_'.time().'.'.$extension;

           $request->file('upload')->move(public_path('storage/media/news'), $fileName);

           $CKEditorFuncNum = $request->input('CKEditorFuncNum');
           $url = asset('storage/media/news/'.$fileName);
           $msg = 'Image uploaded successfully';
           $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

           @header('Content-type: text/html; charset=utf-8');
           echo $response;
       }
   }

   function managenews(){
       $newsdata['news'] = news::orderBy('id', 'DESC')->get();
    return view('liteadmin.managenews', $newsdata);
   }


   function edit_news($newsid){
    $data['newsdata'] = menu::where(['status'=>1,'menu_type'=>'news'])->get();

    $data['newsofdata'] =news::where(['id'=>$newsid])->get();
    return view('liteadmin.edit_news', $data);
   }



   function stetus(Request $request,$ste){


    $inc_id = $request->post('inc_id');
    $updateste = news::find($inc_id);
    $updateste ->status = $ste;
    if($ste==0){
        $msg = "unpublished successfully";
    }else{
        $msg = "published successfully";

    }

    if($updateste->save()){

        return response()->json(array('sucess'=>$msg));


    }
   }




   function deletenewsdata(Request $request){
    $news_id =   $request->post('inc_id');
    $delete_ggroup = news::where(['id'=>$news_id])->delete();
    if($delete_ggroup){
        return response()->json(array('sucess'=>'data successfully detected'));
       }else{
        return response()->json(array('errors'=>'image cannot be deleted please try again'));
        }

   }




}
