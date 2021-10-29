<?php

namespace App\Http\Controllers;

use App\Models\frondend;
use Illuminate\Http\Request;
use App\Models\menu;
use App\Models\cmsdata;
use App\Models\banner;
use App\Models\siteinfo;
use App\Models\gallery;
use App\Models\news;
use App\Models\event;
use App\Models\contactUs;
use App\Models\modelbox;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\schoolManagement;
use App\Models\topper;
use App\Rules\PhoneNumber;
use App\Models\part_one_product_image;
use App\Models\product_part_one;
use App\Models\prpduct_bg;
use App\Models\part_three_kay_feature;
use App\Models\part_three_kay_images;
use App\Models\part_two;
use App\Models\part_two_main_title;
use App\Models\module;
use App\Models\moduleFeature;
use App\Models\homeproduct;

use App\Mail\OfferMail;
use Illuminate\Support\Facades\Mail;

class FrondendController extends Controller
{


    function home()
    {

        $data['banner'] = banner::where(['status' => 1])->get();
        $data['gallerycat'] = menu::where(['status' => 1, 'menu_type' => 'image_gallery', 'is_home_page' => 1])->get();

        $galid = [];
        foreach ($data['gallerycat'] as  $galimages) {
            $galid[] =  $galimages->id;
        }
        foreach ($galid as $val) {

            $data['images'][] = gallery::where(['menu_id' => $val])->get();
        }



        $data['homeproducts'] = homeproduct::where(['status'=>1])->get();




        //module section


        //get number of pages 
        // $data['modules'] = module::where(['status' => 1])
        //     ->where(['show_in_home_page' => 1])->get();
        // $total_records  = $data['modules']->count();
        // $no_of_records_per_page = 3;
        // $total_pages =  ceil($total_records /  $no_of_records_per_page);
        // $data['total_pages'] = $total_pages;

        // for ($i = 1; $i <= $total_pages; $i++) {
        //     $page_number = $i;
        //     $offset = ($page_number - 1) * $no_of_records_per_page;

        //     $data['modules_Limit'][$i] = module::where(['status' => 1])
        //         ->where(['show_in_home_page' => 1])->skip($offset)->take($no_of_records_per_page)->get();
        // }

        // foreach ($data['modules'] as $module_data) {
        //     $data['module_features'][$module_data->id] = moduleFeature::where(['module_features.status' => 1])
        //         ->where(['module_id' => $module_data->id])
        //         ->limit(9)->get();
        // }


        $data['get_menu_module'] =  menu::where(['menu_type'=>'modules'])->where(['status'=>1])->where(['is_home_page'=>1])->get();
        $menuid = $data['get_menu_module'][0]->id;
        $data['modules'] = module::join('menus','modules.menu_id','menus.id')
        ->select(['modules.id as module_id','modules.menu_id','modules.title','modules.mudule_main_image','modules.module_description','modules.module_small_description','modules.module_small_description'
        ,'menus.id as menu_id_of_main','menus.menu','menus.menu_slug','menus.menu_parent_id','menus.menu_image','menus.menu_type'
        ,'menus.is_home_page'   ,'menus.dont_show_in_nav_bar'
                  
        ])
    ->where(['modules.status' => 1])
        ->where(['modules.menu_id' => $menuid, 'menus.status' => 1])
        ->where(['show_in_home_page' => 1])->get();
    $total_records  = $data['modules']->count();

    $no_of_records_per_page = 3;
    $total_pages =  ceil($total_records /  $no_of_records_per_page);
    $data['total_pages'] = $total_pages;

    for ($i = 1; $i <= $total_pages; $i++) {
        $page_number = $i;
        $offset = ($page_number - 1) * $no_of_records_per_page;

        $data['modules_Limit'][$i] = module::where(['status' => 1])
            ->where(['show_in_home_page' => 1])->skip($offset)->take($no_of_records_per_page)->get();
    }

    foreach ($data['modules'] as $module_data) {
        

        $data['module_features'][$module_data->module_id] = moduleFeature::where(['module_features.status' => 1])
            ->where(['module_id' => $module_data->module_id])
            ->limit(9)->get();
    }


















        $data['home_section_one'] = DB::table('admin_home_controllers_sectionone')->where(['status' => 1])->get();

        $data['news_is_home'] = news::where(['is_home' => 1, 'status' => 1])->get();
        $data['is_home_top_news'] = news::where(['news.is_home_top' => 1, 'news.status' => 1])->get();

        $data['event_is_home'] = event::where(['is_home' => 1, 'status' => 1])->get();
        $data['is_home_top_event'] = event::where(['is_home_top' => 1, 'status' => 1])->get();

        $data['schoolManagement'] = schoolManagement::where(['status' => 1])->get();
        $data['section_one'] = DB::table('admin_home_controllers_sectionone')
            ->rightJoin('menus', 'menus.id', '=', 'admin_home_controllers_sectionone.menu_id')
            ->where(['admin_home_controllers_sectionone.status' => 1])->get();

        $data['topper'] = topper::where(['status' => 1])->orderBy('alignment', 'ASC')->get();

        $data['topperrs_heading'] = DB::table('topperrs_heading')->where(['status' => 1])->get();


        $data['get_gome_galery'] = menu::where(['menu_type' => 'image_gallery', 'status' => 1, 'is_home_page' => 1])->get();





        return view('web.home', $data);
    }




    function pages($pagename)
    {

        $get_currentpage_data = array();


        $urlstrre = str_replace('-', ' ', $pagename);
        $data = menu::where(['menus.menu_slug' => $urlstrre, 'menus.status' => 1])->get();
        if (!empty($data[0]->id)) {
            $menuid = $data[0]->id;
            $menu_type = $data[0]->menu_type;
            if ($menu_type == 'pages') {
                $get_currentpage_data['pages'] = menu::join('cmsdatas', 'cmsdatas.menu_id', '=', 'menus.id')
                    ->where(['cmsdatas.menu_id' => $menuid, 'menus.status' => 1])->get();
                $get_currentpage_data['schoolManagement'] = schoolManagement::where(['status' => 1])->get();
            }

            if ($menu_type == 'product') {
                $get_currentpage_data['product'] = menu::join('product_part_ones', 'product_part_ones.menu_id', '=', 'menus.id')
                    ->where(['product_part_ones.menu_id' => $menuid, 'menus.status' => 1])->get();

                $get_currentpage_data['product_banner'] = menu::join('prpduct_bgs', 'prpduct_bgs.menu_id', '=', 'menus.id')
                    ->where(['prpduct_bgs.menu_id' => $menuid, 'menus.status' => 1, 'prpduct_bgs.status' => 1])->get();



                $get_currentpage_data['part_three_kay_features_data'] = menu::join('part_three_kay_images', 'part_three_kay_images.menu_id', '=', 'menus.id')
                    ->join('part_three_kay_features', 'part_three_kay_features.title_id', '=', 'part_three_kay_images.id')
                    ->where(['part_three_kay_images.menu_id' => $menuid, 'menus.status' => 1, 'part_three_kay_images.status' => 1])->get();



                $get_currentpage_data['part_two_data'] = menu::join('part_two_main_titles', 'part_two_main_titles.menu_id', '=', 'menus.id')
                    ->join('part_twos', 'part_twos.main_title_id', '=', 'part_two_main_titles.id')
                    ->where(['part_two_main_titles.menu_id' => $menuid, 'menus.status' => 1, 'part_two_main_titles.status' => 1])->get();
            }


            if ($menu_type == 'image_gallery') {
                $get_currentpage_data['image_gallery'] = menu::join('galleries', 'galleries.menu_id', '=', 'menus.id')
                    ->where(['galleries.menu_id' => $menuid, 'menus.status' => 1])->get();
            }


            if ($menu_type == 'image_gallery') {
                $get_currentpage_data['image_gallery'] = menu::join('galleries', 'galleries.menu_id', '=', 'menus.id')
                    ->where(['galleries.menu_id' => $menuid, 'menus.status' => 1])->get();
            }



            if ($menu_type == 'modules') {

            $get_currentpage_data['modules'] = module::join('menus','modules.menu_id','menus.id')
                ->select(['modules.id as module_id','modules.menu_id','modules.title','modules.mudule_main_image','modules.module_description','modules.module_small_description','modules.module_small_description'
                ,'menus.id as menu_id_of_main','menus.menu','menus.menu_slug','menus.menu_parent_id','menus.menu_image','menus.menu_type'
                ,'menus.is_home_page'   ,'menus.dont_show_in_nav_bar'
                          
                ])
            ->where(['modules.status' => 1])
                ->where(['modules.menu_id' => $menuid, 'menus.status' => 1])
                ->where(['show_in_home_page' => 1])->get();
            $total_records  = $get_currentpage_data['modules']->count();

            $no_of_records_per_page = 3;
            $total_pages =  ceil($total_records /  $no_of_records_per_page);
            $get_currentpage_data['total_pages'] = $total_pages;
    
            for ($i = 1; $i <= $total_pages; $i++) {
                $page_number = $i;
                $offset = ($page_number - 1) * $no_of_records_per_page;
    
                $get_currentpage_data['modules_Limit'][$i] = module::where(['status' => 1])
                    ->where(['show_in_home_page' => 1])->skip($offset)->take($no_of_records_per_page)->get();
            }
    
            foreach ($get_currentpage_data['modules'] as $module_data) {
                

                $get_currentpage_data['module_features'][$module_data->module_id] = moduleFeature::where(['module_features.status' => 1])
                    ->where(['module_id' => $module_data->module_id])
                    ->get();
            }

       
           
            




            }






            if ($menu_type == 'video_gallery') {
                $get_currentpage_data['video_gallery'] = menu::join('videogagalleries', 'videogagalleries.menu_id', '=', 'menus.id')
                    ->where(['videogagalleries.menu_id' => $menuid, 'menus.status' => 1])->get();
            }

            if ($menu_type == 'contact') {
                $get_currentpage_data['contact'] = menu::join('cmsdatas', 'cmsdatas.menu_id', '=', 'menus.id')
                    ->where(['cmsdatas.menu_id' => $menuid, 'menus.status' => 1])->get();
            }


            if ($menu_type == 'events') {
                $get_currentpage_data['events']  = menu::join('events', 'events.menu_id', '=', 'menus.id')
                    ->where(['events.menu_id' => $menuid, 'menus.status' => 1, 'events.status' => 1])
                    ->get();
            }

            if ($menu_type == 'news') {
                $get_currentpage_data['news']  = menu::join('news', 'news.menu_id', '=', 'menus.id')
                    ->where(['news.menu_id' => $menuid, 'menus.status' => 1, 'news.status' => 1])
                    ->get();
            }
        } else {
            return redirect('/');
        }


        if ($menu_type == 'home') {

            return redirect('/');
        }

        return view('web.pages', $get_currentpage_data);
    }





    function single_news_view($id, $currentnews = '')
    {

        if (!$id) {
            return redirect('/');
        } else {
            $news_data['get_news'] = news::find($id);
            $menuid = $news_data['get_news']->menu_id;
            $news_data['news_menu'] = menu::find($menuid);

            if ($news_data['get_news']) {
                return view('web.single_news_view', $news_data);
            } else {
                return redirect('/');
            }
        }
    }






    function single_event_view($id, $eventname = '')
    {

        $event_data['get_events'] = event::find($id);

        return view('web.singleevents', $event_data);
    }










    function send_details(Request $request)
    {


        $email = $request->post('email');
        $fullname = $request->post('fullname');
        $mobile = $request->post('mobile');
        $msg = $request->post('msg');
        $subject = $request->post('subject');


        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'mobile' => ['required', new PhoneNumber],
            'msg' => 'required',


        ]);


        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->errors()));
        } else {


            $dave_contactUs = new contactUs();
            $dave_contactUs->email  = $email;
            $dave_contactUs->fullname  = $fullname;
            $dave_contactUs->mobile  = $mobile;
            $dave_contactUs->msg  = $msg;
            $dave_contactUs->subject  = $subject;
            if ($dave_contactUs->save()) {
                return response()->json(array('sucess' => 'Saved'));
            }
        }
    }




    function view_gallery_page($slug, $id)
    {

        $data['image_gallery'] = gallery::join('menus', 'menus.id', '=', 'galleries.menu_id')->where(['galleries.menu_id' => $id])->get();

        return view('web.gallery', $data);
    }



    function school_enquery_form_email(Request $request)
    {


        $School = $request->post('School');
        $best_time_from_call = $request->post('best_time_from_call');
        $best_time_to_call = $request->post('best_time_to_call');
        $city = $request->post('city');
        $email = $request->post('email');
        $messages = $request->post('message');
        $mobile = $request->post('mobile');
        $name = $request->post('name');
        $state = $request->post('state');
        $country = $request->post('country');


        $validator = Validator::make($request->all(), [
            'School' => 'required',
            'best_time_from_call' => 'required',
            'best_time_to_call' => 'required',
            'city' => 'required',
            'email' => 'required',
            'message' => 'required',
            'name' => 'required',
            'state' => 'required',
            'mobile' => ['required', new PhoneNumber],
            'city' => 'required',
            'country' => 'required'


        ]);


        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->errors()));
        } else {

            $data = [
                'School' => $School,
                'best_time_from_call' => $best_time_from_call,
                'best_time_to_call' => $best_time_to_call,
                'city' => $city,
                'email' => $email,
                'messages' => $messages,
                'name' => $name,
                'state' => $state,
                'mobile' => $mobile,
                'country' => $country,


            ];
            $user['to'] = 'srinivas.kyc@gmail.com';
            $user['subject'] = 'School Enquiry';

            $sent_mail =   Mail::send('emails.offerSendMail', $data, function ($message) use ($user) {
                $message->to($user['to']);
                $message->subject($user['subject']);
            });
            return response()->json(array('sucess' => 'Thank You your details sent successfully'));
        }
    }


















    function student_enquery_email(Request $request)
    {


        $School = $request->post('School');
        $best_time_from_call = $request->post('best_time_from_call');
        $best_time_to_call = $request->post('best_time_to_call');
        $city = $request->post('city');
        $email = $request->post('email');
        $messages = $request->post('message');
        $mobile = $request->post('mobile');
        $name = $request->post('name');
        $state = $request->post('state');
        $country = $request->post('country');


        $validator = Validator::make($request->all(), [
            'School' => 'required',
            'best_time_from_call' => 'required',
            'best_time_to_call' => 'required',
            'city' => 'required',
            'email' => 'required',
            'message' => 'required',
            'name' => 'required',
            'state' => 'required',
            'mobile' => ['required', new PhoneNumber],
            'city' => 'required',
            'country' => 'required'


        ]);


        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->errors()));
        } else {

            $data = [
                'name' => $name,
                'School' => $School,
                'email' => $email,
                'country' => $country,
                'state' => $state,
                'city' => $city,
                'mobile' => $mobile,
                'best_time_from_call' => $best_time_from_call,
                'best_time_to_call' => $best_time_to_call,
                'messages' => $messages,





            ];
            $user['to'] = 'srinivas.kyc@gmail.com';
            $user['subject'] = 'STUDENT ENQUERY';

            $sent_mail =   Mail::send('emails.offerSendMail', $data, function ($message) use ($user) {
                $message->to($user['to']);
                $message->subject($user['subject']);
            });
            return response()->json(array('sucess' => 'Thank You your details sent successfully'));
        }
    }









    function franchase_enquery_email(Request $request)
    {


        $name = $request->post('name');

        $type = $request->post('type');
        $email = $request->post('email');
        $country = $request->post('country');
        $state = $request->post('state');
        $city = $request->post('city');
        $mobile = $request->post('mobile');
        $best_time_from_call = $request->post('best_time_from_call');
        $best_time_to_call = $request->post('best_time_to_call');
        $messages = $request->post('message');



        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'best_time_from_call' => 'required',
            'best_time_to_call' => 'required',
            'city' => 'required',
            'email' => 'required',
            'message' => 'required',
            'name' => 'required',
            'state' => 'required',
            'mobile' => ['required', new PhoneNumber],
            'city' => 'required',
            'country' => 'required'


        ]);


        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->errors()));
        } else {

            $data = [
                'name' => $name,
                'type' => $type,
                'email' => $email,
                'country' => $country,
                'state' => $state,
                'city' => $city,
                'mobile' => $mobile,
                'best_time_from_call' => $best_time_from_call,
                'best_time_to_call' => $best_time_to_call,
                'messages' => $messages,





            ];
            $user['to'] = 'srinivas.kyc@gmail.com';
            $user['subject'] = 'FRANCHASE ENQUERY';

            $sent_mail =   Mail::send('emails.offerSendMail', $data, function ($message) use ($user) {
                $message->to($user['to']);
                $message->subject($user['subject']);
            });
            return response()->json(array('sucess' => 'Thank You your details sent successfully'));
        }
    }




    function modules_page()
    {



        //module section


        //get number of pages 
        $data['modules'] = module::where(['status' => 1])
            ->where(['show_in_home_page' => 1])->get();
        $total_records  = $data['modules']->count();
        $no_of_records_per_page = 3;
        $total_pages =  ceil($total_records /  $no_of_records_per_page);
        $data['total_pages'] = $total_pages;

        for ($i = 1; $i <= $total_pages; $i++) {
            $page_number = $i;
            $offset = ($page_number - 1) * $no_of_records_per_page;

            $data['modules_Limit'][$i] = module::where(['status' => 1])
                ->where(['show_in_home_page' => 1])->skip($offset)->take($no_of_records_per_page)->get();
        }

        foreach ($data['modules'] as $module_data) {
            $data['module_features'][$module_data->id] = moduleFeature::where(['module_features.status' => 1])
                ->where(['module_id' => $module_data->id])
                ->get();
        }





        return view('web.module', $data);
    }
}
