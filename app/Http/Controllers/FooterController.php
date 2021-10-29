<?php

namespace App\Http\Controllers;

use App\Models\footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\contactUs;


class FooterController extends Controller
{

function category(){
    $data['footer_cat']  = DB::table('footer_categories')->get();
    return view('liteadmin.footercategiry', $data);
}


 
function mannagecategory($id=''){

if(!empty($id)){
     $data['category'] = DB::table('footer_categories')->where(['id'=>$id])->get();

     $data['catname'] = $data['category'][0]->category;
     $data['cat_id'] = $data['category'][0]->id;


}else{



    $data['catname'] = '';
    $data['cat_id'] ='';

}


    return view('liteadmin.mannagecategryfooter',$data);

}


function process_data(Request $request){

$category = $request->post('category');
$status = 1;
$cat_id  = $request->post('cat_id');

    $validator = Validator::make($request->all(), [
        'category' => "required|unique:footer_categories,category,$cat_id",

  ]);

  if($validator->fails()){
    return response()->json(array('errors'=>$validator->errors()));

  }else{

    if(!empty($cat_id)){
        $mannage_category = DB::table('footer_categories')->where(['id'=>$cat_id])->update(   ['category' => $category , 'status' => $status]);
        $msg = 'data updated';


    }else{
        $mannage_category =  DB::table('footer_categories')->insert(
            ['category' => $category , 'status' => $status]);
            $msg = 'data inserted';
    }

    return response()->json(array('status'=>'sucess','msg'=>$msg));

  }

}


function mannagefooterlinks(){

    $data['categories_footer']  = DB::table('footer_categories')->where(['status'=>1])->get();
    $data['menu']  = DB::table('menus')->where(['status'=>1])->get();


     $data['footer_links'] = DB::table('footers')->leftjoin('footer_categories','footer_categories.id','=','footers.catgory_id')
                                                ->leftjoin('menus','menus.id','=','footers.menu_id')
                                                ->select('footers.id as footer_id','footer_categories.category','menus.menu','footers.menu_order' )
                                                ->get();



    return view('liteadmin.managefooterlinks', $data);
}




function process_data_footrlinks(Request $request){




$catgory_id = $request->post('catgory_id');
$status = 1;
$menu_id  = $request->post('menu_id');

    $validator = Validator::make($request->all(), [
        'menu_id' => "required",
        'catgory_id' => "required"

  ]);

  if($validator->fails()){
    return response()->json(array('errors'=>$validator->errors()));

  }else{

    $ckeck = DB::table('footers')->where(['catgory_id'=>$catgory_id,'menu_id'=>$menu_id])->count();
    if($ckeck>0){

        return response()->json(array('errors'=>array('msg'=>'already matching available')));


    }else{


         $mannage_footerlinks =  DB::table('footers')->insert(
        ['catgory_id' => $catgory_id ,'menu_id'=>$menu_id, 'status' => $status]);
        $msg = 'data inserted';
        return response()->json(array('status'=>'sucess','msg'=>$msg));

    }






  }

}




function arrange_configfooter_save(Request $request){


    $footer_id = $request->post('footer_id');
    $alinement = $request->post('menu_order_footer');
    if (!empty($footer_id)) {
        foreach ($footer_id  as $key=>$val) {
            $mannage_category = DB::table('footers')->where(['id'=>$val])
        ->update(['menu_order'=> $alinement[$key] ]);
        }
    }

}



function delete_cat(Request $request){


        $id = $request->post('id');
        $delete_menu_footer = DB::table('footer_categories')->where(['id'=>$id])->delete();
       if($delete_menu_footer){
        return response()->json(array('sucess'=>'deleted'));
        }else{
            return response()->json(array('errors'=>'sorry'));
            }





}



function configfooter_del(Request $request){


    $id = $request->post('id');
    $delete_menu_footer = DB::table('footers')->where(['id'=>$id])->delete();
   if($delete_menu_footer){
    return response()->json(array('sucess'=>'deleted'));
    }else{
        return response()->json(array('errors'=>'sorry'));
        }





}







function send_details(Request $request){


    $email = $request->post('email');
    $fullname = $request->post('fullname');
    $mobile = $request->post('mobile');
    $msg = $request->post('msg');
    $subject = $request->post('subject');


    $validator = Validator::make($request->all(), [
        'fullname' => 'required',
        'mobile'=>'required',
        'msg'=>'required',


  ]);


  if($validator->fails()) {
    return response()->json(array('errors'=>$validator->errors()));
 }else{


    $dave_contactUs = new contactUs();
    $dave_contactUs ->email  = $email;
    $dave_contactUs ->fullname  = $fullname;
    $dave_contactUs ->mobile  = $mobile;
    $dave_contactUs ->msg  = $msg;
    $dave_contactUs ->subject  = $subject;
    if(  $dave_contactUs ->save()){
        return response()->json(array('sucess'=>'Saved'));

    }

 }



}








}
