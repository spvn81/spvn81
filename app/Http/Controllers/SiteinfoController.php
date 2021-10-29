<?php

namespace App\Http\Controllers;

use App\Models\siteinfo;
use Illuminate\Http\Request;

class SiteinfoController extends Controller
{

function sitedetails(){

 $data['site_details'] =siteinfo::all();
 if(!empty( $data['site_details'])){
         $data['id'] = $data['site_details'][0]->id;
         $data['title'] = $data['site_details'][0]->title;
         $data['subtitle'] = $data['site_details'][0]->subtitle;
         $data['website_name'] = $data['site_details'][0]->website_name;
         $data['favicon'] = $data['site_details'][0]->favicon;
         $data['logo'] = $data['site_details'][0]->logo;
         $data['email_id'] = $data['site_details'][0]->email_id;
         $data['phonenumber'] = $data['site_details'][0]->phonenumber;
         $data['landlinenumber'] = $data['site_details'][0]->landlinenumber;
         $data['address_line_one'] = $data['site_details'][0]->address_line_one;
         $data['address_line_two'] = $data['site_details'][0]->address_line_two;
         $data['address_line_three'] = $data['site_details'][0]->address_line_three;
         $data['youtube_link'] = $data['site_details'][0]->youtube_link;
         $data['facebook_link'] = $data['site_details'][0]->facebook_link;
         $data['twitter_link'] = $data['site_details'][0]->twitter_link;
         $data['instagram_link'] = $data['site_details'][0]->instagram_link;
         $data['map_link'] = $data['site_details'][0]->map_link;
         $data['about_site_description'] = $data['site_details'][0]->about_site_description;
         $data['map_short_link'] = $data['site_details'][0]->map_short_link;
         $data['linksind_link'] = $data['site_details'][0]->linksind_link;





 }else{


    $data['id'] = '';
    $data['title'] = '';
    $data['subtitle'] = '';
    $data['website_name'] = '';
    $data['favicon'] ='';
    $data['logo'] = '';
    $data['email_id'] = '';
    $data['phonenumber'] = '';
    $data['landlinenumber'] = '';
    $data['address_line_one'] = '';
    $data['address_line_two'] = '';
    $data['address_line_three'] = '';
    $data['youtube_link'] = '';
    $data['facebook_link'] = '';
    $data['twitter_link'] = '';
    $data['instagram_link'] = '';
    $data['map_link'] = '';
    $data['about_site_description'] = '';
    $data['map_short_link'] = '';
    $data['linksind_link'] = '';





 }





    return view('liteadmin.sitedetails',$data);
}



function sitedetails_mannege(Request $request){



    $id = $request->post('id');
     $title = $request->post('title');
    $subtitle = $request->post('subtitle');
    $website_name = $request->post('website_name');
    $email_id = $request->post('email_id');
    $phonenumber = $request->post('phonenumber');
    $landlinenumber = $request->post('landlinenumber');
    $address_line_one = $request->post('address_line_one');
    $address_line_two = $request->post('address_line_two');
    $address_line_three = $request->post('address_line_three');
    $youtube_link = $request->post('youtube_link');
    $facebook_link = $request->post('facebook_link');
    $twitter_link = $request->post('twitter_link');
    $instagram_link = $request->post('instagram_link');
    $linksind_link = $request->post('linksind_link');

    $map_link = $request->post('map_link');
    $about_site_description = $request->post('about_site_description');

    $map_short_link = $request->post('map_short_link');





    if(!empty($id)){
        $mannage_sitedetails = siteinfo::find($id);

    }else{

        $mannage_sitedetails = new siteinfo;

    }
    $mannage_sitedetails->title = $title;
    $mannage_sitedetails->subtitle = $subtitle;
    $mannage_sitedetails->website_name = $website_name;
    $mannage_sitedetails->email_id = $email_id;
    $mannage_sitedetails->phonenumber = $phonenumber;
    $mannage_sitedetails->landlinenumber = $landlinenumber;
    $mannage_sitedetails->address_line_one = $address_line_one;
    $mannage_sitedetails->address_line_two = $address_line_two;
    $mannage_sitedetails->address_line_three = $address_line_three;
    $mannage_sitedetails->youtube_link = $youtube_link;
    $mannage_sitedetails->facebook_link = $facebook_link;
    $mannage_sitedetails->twitter_link = $twitter_link;
    $mannage_sitedetails->instagram_link = $instagram_link;
    $mannage_sitedetails->map_link = $map_link;
    $mannage_sitedetails->linksind_link = $linksind_link;

    $mannage_sitedetails->about_site_description = $about_site_description;
    $mannage_sitedetails->map_short_link = $map_short_link;

    if($request->hasFile('favicon')){
        $oamege = $request->file('favicon');
        $iamage_ext = $oamege->extension();
        $filename = date('dmY').time().'.'.$iamage_ext;
        $dastorage_name = 'siteinfo/'.$filename;
        $oamege->storeAs('public/media/siteinfo/',$filename);
        $mannage_sitedetails->favicon = $dastorage_name;

    }


    if($request->hasFile('logo')){
        $oamege = $request->file('logo');
        $iamage_ext = $oamege->extension();
        $filename = date('dmY').time().'.'.$iamage_ext;
        $dastorage_name = 'siteinfo/'.$filename;
        $oamege->storeAs('public/media/siteinfo/',$filename);
        $mannage_sitedetails->logo = $dastorage_name;


    }

    if ($mannage_sitedetails->save()) {
        return response()->json(array('sucess'=>'data Saved'));
    }



}




}
