<?php

namespace App\Http\Controllers;

use App\Models\modelbox;
use Illuminate\Http\Request;

class ModelboxController extends Controller
{


    function Model_box(){

        $data['modelbox_data'] = modelbox::all();

        if(!empty($data['modelbox_data'][0])){
            $data['id'] = $data['modelbox_data'][0]->id;
            $data['title'] = $data['modelbox_data'][0]->title;
            $data['descreption'] = $data['modelbox_data'][0]->descreption;
            $data['model_image'] = $data['modelbox_data'][0]->model_image;
            $data['link'] = $data['modelbox_data'][0]->link;
            $data['status'] = $data['modelbox_data'][0]->status;
        }else{
        $data['id'] ="";
        $data['title'] = "";
        $data['descreption'] = "";
        $data['model_image'] = "";
        $data['link'] = "";
        $data['status'] = "";
    }
   return view('liteadmin.modelbox', $data);

    }





    function model_box_mannege(Request $request){



        $id = $request->post('id');
         $title = $request->post('title');
        $descreption = $request->post('descreption');
        $link = $request->post('link');
        $status = $request->post('status');




        if(!empty($id)){
            $mannage_modelbox = modelbox::find($id);

        }else{

            $mannage_modelbox = new modelbox;

        }
        $mannage_modelbox->title = $title;
        $mannage_modelbox->descreption = $descreption;
        $mannage_modelbox->link = $link;
        $mannage_modelbox->status = $status;



        if($request->hasFile('model_image')){
            $oamege = $request->file('model_image');
            $iamage_ext = $oamege->extension();
            $filename = date('dmY').time().'.'.$iamage_ext;
            $dastorage_name = 'model_image/'.$filename;
            $oamege->storeAs('public/media/model_image/',$filename);
            $mannage_modelbox->model_image = $dastorage_name;

        }




        if ($mannage_modelbox->save()) {
            return response()->json(array('sucess'=>'data Saved'));
        }



    }

























}
