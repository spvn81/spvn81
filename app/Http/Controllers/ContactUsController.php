<?php

namespace App\Http\Controllers;

use App\Models\contactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
function contact(){

$data['contactUs'] = contactUs::all();

return view('liteadmin.contact',$data);
}


function readstatus(Request $request){
    $msgid = $request->post('msgid');
    $readstetus = contactUs::find($msgid);
    $readstetus ->readstatus = 1;
    if($readstetus->save()){
        return response()->json(array('stetus'=>'readed'));
    }

}


function delete_deletesingle_contcat(Request $request){

    $contact_us =   $request->post('inc_id');
    $delete_ggroup = contactUs::where(['id'=>$contact_us])->delete();
    if($delete_ggroup){
        return response()->json(array('sucess'=>'data successfully detected'));
       }else{
        return response()->json(array('errors'=>'query cannot be deleted please try again'));

       }
}





}
