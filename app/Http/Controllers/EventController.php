<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\menu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class EventController extends Controller
{




    function addevents(){

        $data['eventsdata'] = menu::join('events','menus.id','=','events.menu_id')->where(['menus.status'=>1,'menus.menu_type'=>'events'])->get();
        return view('liteadmin.events', $data);

    }



    function process_evenmt_data(Request $request){

         $events_id= $request->post('events_id');
        $menu_id = $request->post('menuid');
        $event_name=$request->post('event_name');
        $event_type=$request->post('event_type');
        $event_duration=$request->post('event_duration');
        $eventscontent=$request->post('eventscontent');

        $event_start=$request->post('event_start');
        $event_emd=$request->post('event_emd');
        $descreption=$request->post('descreption');
        $is_home=$request->post('is_home');
        $is_home_top=$request->post('is_home_top');
        $status   = 1;


        $validator = Validator::make($request->all(), [
            'menuid' => 'required',
            'event_name'=>'required',
            'event_start'=>'required',
            'event_emd'=>'required',
            'image' => 'mimes:jpg,jpeg,png,bmp,gif |max:4096',



      ]);


      if($validator->fails()) {
        return response()->json(array('errors'=>$validator->errors()));
     }else{

        if(!empty($events_id)){
            $summernote = event::find($events_id);
            $msg= "updated";

        }else{
            $summernote = new event;
            $msg= "inserted";


        }
        $summernote->menu_id = $menu_id;

    $summernote->event_name = $event_name;
    $summernote->event_type = $event_type;
    $summernote->event_duration = $event_duration;
    $summernote->descreption = $eventscontent;
    $summernote->event_start = $event_start;
    $summernote->event_emd = $event_emd;
    $summernote->is_home = $is_home;
    $summernote->is_home_top = $is_home_top;
    $summernote->status = $status;





    if($request->hasFile('image')){
        $oamege = $request->file('image');
        $iamage_ext = $oamege->extension();
        $filename = date('dmY').time().'.'.$iamage_ext;
        $dastorage_name = 'events/'.$filename;
        $oamege->storeAs('public/media/events/',$filename);
        $summernote->image = $dastorage_name;
    }
    $summernote->save();
    return response()->json(array('sucess'=>'Content Saved' ,'stetus'=>$msg,'itemdata'=>$summernote));


    }
    }





    function uploadckeditorimageforevents(Request $request){
        if($request->hasFile('upload')) {
               $originName = $request->file('upload')->getClientOriginalName();
               $fileName = pathinfo($originName, PATHINFO_FILENAME);
               $extension = $request->file('upload')->getClientOriginalExtension();

               $request->validate([
                'upload'=>'mimes:png,jpg,jpeg,pdf'
               ]);

               $fileName = $fileName.'_'.time().'.'.$extension;

               $request->file('upload')->move(public_path('storage/media/events'), $fileName);

               $CKEditorFuncNum = $request->input('CKEditorFuncNum');
               $url = asset('storage/media/events/'.$fileName);
               $msg = 'Image uploaded successfully';
               $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

               @header('Content-type: text/html; charset=utf-8');
               echo $response;
           }
       }

       function manageevents($id=''){

        if(!empty($id)){
            $data['events_edit'] = event::where(['id'=>$id])->get();
            $data['id'] = $data['events_edit'][0]->id;
            $data['menu_id'] = $data['events_edit'][0]->menu_id;
            $data['event_name'] = $data['events_edit'][0]->event_name;
            $data['event_type'] = $data['events_edit'][0]->event_type;
            $data['event_duration'] = $data['events_edit'][0]->event_duration;
            $data['event_start'] = $data['events_edit'][0]->event_start;
            $data['event_emd'] = $data['events_edit'][0]->event_emd;
            $data['image'] = $data['events_edit'][0]->image;
            $data['descreption'] = $data['events_edit'][0]->descreption;
            $data['is_home'] = $data['events_edit'][0]->is_home;
            $data['is_home_top'] = $data['events_edit'][0]->is_home_top;



        }else{


            $data['id'] = '';
            $data['menu_id'] = '';
            $data['event_name'] = '';
            $data['event_type'] = '';
            $data['event_duration'] = '';
            $data['event_start'] = '';
            $data['event_emd'] = '';
            $data['image'] = '';
            $data['descreption'] = '';
            $data['is_home'] = '';
            $data['is_home_top'] = '';

        }

           $data['menu'] = menu::where(['menu_type'=>'events','status'=>1])->get();

        return view('liteadmin.manageevents', $data);
       }





function delete_img(Request $request){

    $id = $request->post('id');
 $delete_img = event::find($id);

$image_filepath = 'public/media/'.$delete_img->image;
Storage::delete([$image_filepath]);
$delete_img->image = '';
$delete_img ->save();
return response()->json(array('sucess'=>'deleted',$delete_img));

}




       function detete_table_tr(Request $request){
        $events_id =   $request->post('id');
        $delete_ggroup = event::where(['id'=>$events_id])->delete();
        if($delete_ggroup){
            return response()->json(array('sucess'=>'data successfully detected'));
           }else{
            return response()->json(array('errors'=>'dtta cannot be deleted please try again'));
            }

       }






       function stetus(Request $request,$ste){


        $inc_id = $request->post('inc_id');
        $updateste = event::find($inc_id);
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












}
