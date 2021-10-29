<?php

namespace App\Http\Controllers;

use App\Models\topper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;



class TopperController extends Controller
{



    function toppers_section(){

        $data['topper'] = topper::all();


        return view('liteadmin.toppers',$data);

    }




    function addtitle(){
            $data['topperrs_heading'] = DB::table('topperrs_heading')->where(['status'=>1])->get();

        if(!empty($data['topperrs_heading'][0])){
            $data['id'] = $data['topperrs_heading'][0]->id;
            $data['title'] = $data['topperrs_heading'][0]->title;

        }else{
            $data['id'] = "";
            $data['title'] = "";
        }


        return view('liteadmin.addtitle_toppers',$data);
    }




    function addtitle_process(Request $request){

          $title_toppers = $request->post('title_toppers');
          $id = $request->post('id');
if(!empty($id)){

    DB::table('topperrs_heading')->where('id',$id)->update(['title'=>$title_toppers]);


}else{

    DB::insert('insert into topperrs_heading (title,status) values (?,?)', [$title_toppers,1]);


}
}









function manage_toppers($id=''){

    if(!empty($id)){
        $data['geet_manngement'] = topper::find($id);
        $data['image'] = $data['geet_manngement']->image;
        $data['name'] = $data['geet_manngement']->name;
        $data['id'] = $data['geet_manngement']->id;
        $data['marks'] = $data['geet_manngement']->marks;
        $data['total_marks'] = $data['geet_manngement']->total_marks;
        $data['alignment'] = $data['geet_manngement']->alignment;
        $data['status'] = $data['geet_manngement']->status;





    }else{
        $data['image'] = "";
        $data['name'] = "";
        $data['id'] = "";
        $data['marks'] = "";
        $data['total_marks'] = "";
        $data['alignment'] = "";
        $data['status'] ="";
    }

    return view('liteadmin.manage-toppers',$data);
}




function process_school_topers(Request $request){
$name = $request->post('name');
$id = $request->post('id');
$marks = $request->post('marks');
$total_marks = $request->post('total_marks');
$alignment = $request->post('alignment');
$status = 1;
if(!empty($id)){
    $image_validate =  'mimes:png,jpg,jpeg';
}else{
    $image_validate = 'required|mimes:png,jpg,jpeg';
}


$validator = Validator::make($request->all(), [
    'image' => $image_validate,
    'name' => 'required',
    'marks'=>'required',
    'total_marks'=>'required',
    'alignment'=>'required'
]);




if ($validator->fails()) {
    return response()->json(array('errors'=>$validator->errors()));

}else{




    if(!empty($id)){

        $mannahe_data = topper::find($id);

    }else{
        $mannahe_data = new topper();
    }
    $mannahe_data ->name = $name;
    $mannahe_data ->marks = $marks;
    $mannahe_data ->total_marks = $total_marks;
    $mannahe_data ->alignment = $alignment;
    $mannahe_data ->status = $status;

    if($request->hasFile('image')){
        $oamege = $request->file('image');
        $iamage_ext = $oamege->extension();
        $filename = date('dmY').time().'.'.$iamage_ext;
        $dastorage_name = 'school-toppers/'.$filename;
        $oamege->storeAs('public/media/school-toppers/',$filename);
        $mannahe_data->image = $dastorage_name;
    }

    $mannahe_data->save();

    return response()->json(array('sucess'=>'done','data'=>$mannahe_data));


}



}



function Delete(Request $request){
$id = $request->post('id');


$getimage  = topper::find($id);
$file_name = $getimage->image;
$dlt_file ='public/media/'.$file_name;
Storage::delete($dlt_file);





$delete_data = topper::where(['id'=>$id])->delete();
if($delete_data){
return response()->json(array('sucess'=>'deleted'));
}else{
    return response()->json(array('errors'=>'sorry'));
    }
}



function stetus($currentstetus,$id){

$stetus = topper::find($id);
$stetus->status = $currentstetus;
$stetus->save();
session()->flash('msg','status update done');
return redirect('myadm/toppers-section');

}




















}
