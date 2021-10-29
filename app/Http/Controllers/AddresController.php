<?php

namespace App\Http\Controllers;

use App\Models\addres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AddresController extends Controller
{
 
    function footer_address(){
        $data['addres'] = addres::All();

        return view('liteadmin.footer_address',$data);
    }





    function mannage_footer_address($id=''){

        if(!empty($id)){
            $data['addess'] = addres::find($id);
            $data['title'] =  $data['addess']->title;
            $data['country'] =  $data['addess']->country;
            $data['state'] =  $data['addess']->state;
            $data['city'] =  $data['addess']->city;
            $data['line_one'] =  $data['addess']->line_one;
            $data['line_two'] =  $data['addess']->line_two;
            $data['line_three'] =  $data['addess']->line_three;
            $data['zip'] =  $data['addess']->zip;
            $data['email'] =  $data['addess']->email;
            $data['phone'] =  $data['addess']->phone;
            $data['land_line'] =  $data['addess']->land_line;
            $data['google_map'] =  $data['addess']->google_map;
            $data['id'] =  $data['addess']->id;



        }else{

            $data['title'] = '';
            $data['country'] = '';
            $data['state'] = '';
            $data['city'] =  '';
            $data['line_one'] =  '';
            $data['line_two'] = '';
            $data['line_three'] = '';
            $data['zip'] =  '';
            $data['email'] = '';
            $data['phone'] = '';
            $data['land_line'] ='';
            $data['google_map'] =  '';
            $data['id'] =  '';

        }


return view('liteadmin.mannage_footer_address',$data);

    }






function mannage_footer_address_process(Request $request){

    $title = $request->post('title');
    $country = $request->post('country');
    $state = $request->post('state');
    $city = $request->post('city');
    $line_one = $request->post('line_one');
    $line_two = $request->post('line_two');
    $line_three = $request->post('line_three');
    $zip = $request->post('zip');
    $email = $request->post('email');
    $phone = $request->post('phone');
    $land_line = $request->post('land_line');
    $google_map = $request->post('google_map');
    $status = 1;


    $id = $request->post('id');

        $validator = Validator::make($request->all(), [
        'title'=>'required',
        'country'=>'required',
        'state'=>'required',
        'city'=>'required'
  ]);
    if($validator->fails()) {
    return response()->json(array('errors'=>$validator->errors()));
 }else{
    if(!empty($id)){
        $banner_img  = addres::find($id);
    }else{
        $banner_img = new addres();

    }
    $banner_img->title = $title;
    $banner_img->country = $country;
    $banner_img->state = $state;
    $banner_img->city = $city;
    $banner_img->line_one = $line_one;
    $banner_img->line_two = $line_two;
    $banner_img->line_three = $line_three;
    $banner_img->zip = $zip;
    $banner_img->email = $email;
    $banner_img->phone = $phone;
    $banner_img->land_line = $land_line;
    $banner_img->google_map = $google_map;
    $banner_img->status = $status;


   

   if( $banner_img->save()){
    return response()->json(array('sucess'=>$banner_img));

   }
}
}




function detete_table_tr(Request $request){
    $events_id =   $request->post('id');
    $delete_ggroup = addres::where(['id'=>$events_id])->delete();
    if($delete_ggroup){
        return response()->json(array('sucess'=>'data successfully detected'));
       }else{
        return response()->json(array('errors'=>'dtta cannot be deleted please try again'));
        }

   }






}
