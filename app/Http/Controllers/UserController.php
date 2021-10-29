<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

function login(){

if(session()->has('USER_LOGIN')){
return redirect('myadm/dashboard');
}else{
    return view('liteadmin.login');
}
}



function login_auth(Request $request)
{
    $data = array();



    $validator = Validator::make($request->all(), [
        'email' => 'required',
        'password' => 'required',
    ]);




    if ($validator->fails()) {
        return response()->json(array('errors'=>$validator->errors()));

    }else{
        $email = $request->post('email');
        $password = $request->post('password');
        $get_user_data = user::where(['email'=>$email])->get();
        //password verification
        if (!empty($get_user_data[0]->pasword)) {
            $passoerd_hash =$get_user_data[0]->pasword;
            $check_hash = Hash::check($password, $passoerd_hash);
            if ($check_hash) {
                $data[] = array('stetus'=>'sucesslogin');
                $usertype = $get_user_data[0]->usertype;
                $username = $get_user_data[0]->username;

                $request->session()->put('USER_LOGIN',true);
                $request->session()->put('USER_TYPE',$usertype);
                $request->session()->put('USER_NAME',$username);

                $value = $request->session()->get('admin');
                return response()->json(['sucess'=>array('userlogin'=>'ok')]);

            } else {

                    return response()->json(['errors'=>array('password'=>'invalid password')]);

            }
        } else {
            return response()->json(['errors'=>array('email'=>'invalid user id')]);
        }
    }





}



}
