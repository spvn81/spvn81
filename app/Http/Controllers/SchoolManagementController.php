<?php

namespace App\Http\Controllers;

use App\Models\schoolManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class SchoolManagementController extends Controller
{

    function management_data_table(){
        $data['mannage_school'] = schoolManagement::all();
        return view('liteadmin.school_mannagement',$data);
    }


    function school_management($id=''){

        if(!empty($id)){
            $data['geet_manngement'] = schoolManagement::find($id);
            $data['image'] = $data['geet_manngement']->image;
            $data['name'] = $data['geet_manngement']->name;
            $data['id'] = $data['geet_manngement']->id;
            $data['designation'] = $data['geet_manngement']->designation;




        }else{
            $data['name'] ='';
            $data['image'] ='';
            $data['id'] = '';
            $data['designation'] ='';
        }

        return view('liteadmin.school_management_manage',$data);
    }




function process_school_mannagement(Request $request){
    $name = $request->post('name');
    $id = $request->post('id');
    $designation = $request->post('designation');


    $status = 1;
    if(!empty($id)){
        $image_validate =  'mimes:png,jpg,jpeg';
    }else{
        $image_validate = 'required|mimes:png,jpg,jpeg';
    }


    $validator = Validator::make($request->all(), [
        'image' => $image_validate,
        'name' => 'required',
        'designation'=>'required'
    ]);




    if ($validator->fails()) {
        return response()->json(array('errors'=>$validator->errors()));

    }else{




        if(!empty($id)){

            $mannahe_data = schoolManagement::find($id);

        }else{
            $mannahe_data = new schoolManagement();
        }
        $mannahe_data ->name = $name;
        $mannahe_data ->status = $status;
        $mannahe_data ->designation = $designation;




        if($request->hasFile('image')){
            $oamege = $request->file('image');
            $iamage_ext = $oamege->extension();
            $filename = date('dmY').time().'.'.$iamage_ext;
            $dastorage_name = 'school-management/'.$filename;
            $oamege->storeAs('public/media/school-management/',$filename);
            $mannahe_data->image = $dastorage_name;
        }

        $mannahe_data->save();

        return response()->json(array('sucess'=>'done','data'=>$mannahe_data));


    }



}



function Delete(Request $request){
    $id = $request->post('id');


$getimage  = schoolManagement::find($id);
$file_name = $getimage->image;
$dlt_file ='public/media/'.$file_name;
Storage::delete($dlt_file);



    $delete_data = schoolManagement::where(['id'=>$id])->delete();
   if($delete_data){
    return response()->json(array('sucess'=>'deleted'));
    }else{
        return response()->json(array('errors'=>'sorry'));
        }
}



function stetus($currentstetus,$id){

    $stetus = schoolManagement::find($id);
    $stetus->status = $currentstetus;
    $stetus->save();
    session()->flash('msg','status update done');
    return redirect('myadm/school-management-Section');

    }




}
