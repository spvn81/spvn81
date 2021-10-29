<?php

namespace App\Http\Controllers;

use App\Models\AdminHomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\menu;
use Illuminate\Support\Facades\Storage;
use App\Models\homeproduct;
use Illuminate\Http\File;
use App\Models\footerbanner;


class AdminHomeControllerController extends Controller
{

    function viewsectionone()
    {

        $data['homesecone'] = DB::table('admin_home_controllers_sectionone')->get();

        return view('liteadmin.viewsectionone', $data);
    }



    function mannage($id = '')
    {

        $data['menu'] = menu::where(['status' => 1])->get();

        if (!empty($id)) {
            $data['section_of_home'] = DB::table('admin_home_controllers_sectionone')->where(['id' => $id])->get();
            $data['id']  =  $data['section_of_home'][0]->id;
            $data['title']  =  $data['section_of_home'][0]->title;
            $data['background_img']  =  $data['section_of_home'][0]->background_img;
            $data['brand_image']  =  $data['section_of_home'][0]->brand_image;

            $data['content']  =  $data['section_of_home'][0]->content;
            $data['menu_id']  =  $data['section_of_home'][0]->menu_id;
            $data['align']  =  $data['section_of_home'][0]->align;
            $data['ab']  =  $data['section_of_home'][0]->ab;
            $data['is_msg_box']  =  $data['section_of_home'][0]->is_msg_box;
            $data['is_samll_smg_box']  =  $data['section_of_home'][0]->is_samll_smg_box;
        } else {
            $data['id']  =  '';
            $data['title']  =   '';
            $data['background_img']  =   '';
            $data['brand_image']  =   '';

            $data['content']  =   '';
            $data['menu_id']  = '';
            $data['align']  = '';
            $data['ab']  = '';
            $data['is_msg_box']  = '';
            $data['is_samll_smg_box']  = '';
        }
        return view('liteadmin.mannageHomesectionOne',  $data);
    }



    function mannage_process(Request $request)
    {
        $title = $request->post('title_of_home_section');
        $content = $request->post('homesectionone');
        $section_one_id = $request->post('section_one_id');
        $menu_id = $request->post('menu_id');
        $align = $request->post('align');
        $ab = $request->post('ab');
        $is_msg_box = $request->post('is_msg_box');
        $is_samll_smg_box = $request->post('is_samll_smg_box');




        $status = 1;
        $validator = Validator::make($request->all(), [
            'title_of_home_section' => 'required',
            'homesectionone' => 'required',
            'background_img' => 'mimes:png,jpg,jpeg,gif',

        ]);


        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->errors()));
        } else {




            if (!empty($section_one_id)) {


                if ($request->hasFile('background_img')) {
                    $oamege = $request->file('background_img');
                    $iamage_ext = $oamege->extension();
                    $filename = date('dmY') . time() . '.' . $iamage_ext;
                    $dastorage_name = 'homesectoneone/' . $filename;
                    $oamege->storeAs('public/media/homesectoneone/', $filename);
                    $imageupdate = ' background_img =>' . $dastorage_name;
                    DB::table('admin_home_controllers_sectionone')->where('id', $section_one_id)->update(array('title' => $title, 'is_samll_smg_box' => $is_samll_smg_box, 'is_msg_box' => $is_msg_box, 'menu_id' => $menu_id, 'align' => $align, 'content' => $content, 'ab' => $ab, 'background_img' => $dastorage_name));
                    $msg = "Details updated";
                    return response()->json(array('sucess' => $msg));
                } elseif ($request->hasFile('brand_image')) {


                    $oamege = $request->file('brand_image');
                    $iamage_ext = $oamege->extension();
                    $filename = date('dmY') . time() . '.' . $iamage_ext;
                    $dastorage_name = 'homesectoneone/' . $filename;
                    $oamege->storeAs('public/media/homesectoneone/', $filename);
                    $imageupdate = ' brand_image =>' . $dastorage_name;
                    DB::table('admin_home_controllers_sectionone')->where('id', $section_one_id)->update(array('title' => $title, 'is_samll_smg_box' => $is_samll_smg_box, 'is_msg_box' => $is_msg_box, 'menu_id' => $menu_id, 'align' => $align, 'content' => $content, 'ab' => $ab, 'brand_image' => $dastorage_name));
                    $msg = "Details updated";
                    return response()->json(array('sucess' => $msg));
                } else {

                    DB::table('admin_home_controllers_sectionone')->where('id', $section_one_id)->update(array('title' => $title, 'is_samll_smg_box' => $is_samll_smg_box, 'is_msg_box' => $is_msg_box, 'menu_id' => $menu_id, 'align' => $align, 'ab' => $ab, 'content' => $content));
                    $msg = "Details updated";
                    return response()->json(array('sucess' => $msg));
                }
            } else {

                if ($request->hasFile('background_img')) {
                    $oamege = $request->file('background_img');
                    $iamage_ext = $oamege->extension();
                    $filename = date('dmY') . time() . '.' . $iamage_ext;
                    $dastorage_name = 'homesectoneone/' . $filename;
                    $oamege->storeAs('public/media/homesectoneone/', $filename);
                } else {
                    $dastorage_name = '';
                }

                $update_home_sec_one = DB::insert(
                    'insert into admin_home_controllers_sectionone (title,menu_id,align,background_img,content,is_msg_box,ab,is_samll_smg_box,status) values (?, ?, ?, ?,?, ? ,? ,?, ?)',
                    [$title, $menu_id, $align, $dastorage_name, $content, $is_msg_box, $ab, $is_samll_smg_box, $status]
                );

                $msg = "Details Inserted";
                return response()->json(array('sucess' => $msg));
            }






            $msg = "Details Saved";
            return response()->json(array('sucess' => $msg));
        }
    }





    function Delete(Request $request)
    {
        $id = $request->post('id');
        $delete_homesection_one = DB::table('admin_home_controllers_sectionone')->where(['id' => $id])->delete();

        if ($delete_homesection_one) {
            return response()->json(array('sucess' => 'deleted'));
        } else {
            return response()->json(array('errors' => 'sorry'));
        }
    }



    function stetus($currentstetus, $id)
    {


        DB::table('admin_home_controllers_sectionone')->where('id', $id)->update(array('status' => $currentstetus));


        session()->flash('msg', 'status update done');
        return redirect('myadm/Section-one');
    }



    function main_image_delete(Request $request)
    {

        $id = $request->post('id');
        $delete_img = DB::table('admin_home_controllers_sectionone')->where(['id' => $id])->get();

        $image_filepath = 'public/media/' . $delete_img[0]->background_img;
        Storage::delete([$image_filepath]);

        DB::table('admin_home_controllers_sectionone')->where('id', $id)->update(array('background_img' => ''));
        return response()->json(array('sucess' => 'deleted', $delete_img));
    }



    function main_image_brand_delete(Request $request)
    {

        $id = $request->post('id');
        $delete_img = DB::table('admin_home_controllers_sectionone')->where(['id' => $id])->get();

        $image_filepath = 'public/media/' . $delete_img[0]->brand_image;
        Storage::delete([$image_filepath]);

        DB::table('admin_home_controllers_sectionone')->where('id', $id)->update(array('brand_image' => ''));
        return response()->json(array('sucess' => 'deleted', $delete_img));
    }






    function home_product_link()
    {

        $data['homeproduct'] = homeproduct::all();

        return view('liteadmin.home_product_link', $data);
    }




    function home_product_link_mannage($id = '')
    {

        if (!empty($id)) {
            $data['homeproducts'] = homeproduct::find($id);
            $data['product_iamge'] = $data['homeproducts']->product_iamge;
            $data['title'] = $data['homeproducts']->title;
            $data['external_link'] = $data['homeproducts']->external_link;
            $data['id'] = $data['homeproducts']->id;
        } else {


            $data['product_iamge'] = '';
            $data['title'] = '';
            $data['external_link'] = '';
            $data['id'] = '';
        }


        return view('liteadmin.home_product_link_mannage', $data);
    }



    function home_product_link_mannage_process(Request $request)
    {
        $title = $request->post('title');
        $external_link = $request->post('external_link');

        $status = 1;
        $id = $request->post('id');

        if (!empty($id)) {
            $iamgevalidate = 'mimes:png,jpg,png,gif';
        } else {
            $iamgevalidate = 'required|mimes:png,jpg,png,gif';
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'external_link' => 'required',
            'product_iamge' => $iamgevalidate,


        ]);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->errors()));
        } else {


            if (!empty($id)) {
                $save_data  = homeproduct::find($id);
            } else {
                $save_data = new homeproduct();
            }

            if ($request->hasFile('product_iamge')) {


                $path = $request->file('product_iamge')->store('public/media/homeproduct/');

                $data_storage_name = 'homeproduct/' . pathinfo($path)['basename'];

                $save_data->product_iamge = $data_storage_name;
            }






            $save_data->title = $title;
            $save_data->external_link = $external_link;
            $save_data->status = $status;

            if ($save_data->save()) {
                return response()->json(array('sucess' => $save_data));
            }
        }
    }






    function stetus_link($changestetsu, $id)
    {

        $stetus = homeproduct::find($id);
        $stetus->status = $changestetsu;
        $stetus->save();
        session()->flash('msg', 'status update done');
        return redirect('myadm/home-product-link');
    }




    function home_product_link_mannage_image_del(Request $request)
    {

        $id = $request->post('id');
        $delete_img = DB::table('homeproducts')->where(['id' => $id])->get();

        $image_filepath = 'public/media/' . $delete_img[0]->product_iamge;
        Storage::delete([$image_filepath]);

        DB::table('homeproducts')->where('id', $id)->update(array('product_iamge' => ''));
        return response()->json(array('sucess' => 'deleted', $delete_img));
    }





    function homeproduct_data_delete(Request $request)
    {
        $id = $request->post('id');
        $delete_homesection_one = DB::table('homeproducts')->where(['id' => $id])->delete();

        if ($delete_homesection_one) {
            return response()->json(array('sucess' => 'deleted'));
        } else {
            return response()->json(array('errors' => 'sorry'));
        }
    }




    function footer_widget_one()
    {
        $data['footerbanner'] = footerbanner::all();
        return view('liteadmin.footer_widget_one',$data);
    }




    function footer_widget_one_mannage($id='')
    {
        if(!empty($id)){
            $data['footerbanners']  = footerbanner::find($id);
            $data['bg_image'] =  $data['footerbanners']->bg_image;
            $data['bg_link'] =  $data['footerbanners']->bg_link;
            $data['bg_color'] =  $data['footerbanners']->bg_color;
            $data['bg_gradient_color_one'] =  $data['footerbanners']->bg_gradient_color_one;
            $data['bg_gradient_color_two'] =  $data['footerbanners']->bg_gradient_color_two;
            $data['main_title'] =  $data['footerbanners']->main_title;
            $data['main_description'] =  $data['footerbanners']->main_description;
            $data['button_link'] =  $data['footerbanners']->button_link;
            $data['button_name'] =  $data['footerbanners']->button_name;
            $data['id'] =  $data['footerbanners']->id;

        }else{
            $data['bg_image'] =   '';
            $data['bg_link'] =   '';
            $data['bg_color'] =   '';
            $data['bg_gradient_color_one'] =   '';
            $data['bg_gradient_color_two'] =   '';
            $data['main_title'] =  '';
            $data['main_description'] =   '';
            $data['button_link'] =   '';
            $data['button_name'] =  '';
            $data['id'] = '';

        }

        return view('liteadmin.footer_widget_one_mannage',$data);
    }




    
    function footer_widget_one_mannage_process(Request $request)
    {
        $bg_link = $request->post('bg_link');
        $bg_color = $request->post('bg_color');
        $bg_gradient_color_one = $request->post('bg_gradient_color_one');
        $bg_gradient_color_two = $request->post('bg_gradient_color_two');
        $main_title = $request->post('main_title');
        $main_description = $request->post('main_description');
        $button_link = $request->post('button_link');
        $button_name = $request->post('button_name');
        $status = 1;
        $id = $request->post('id');

        if (!empty($id)) {
            $iamgevalidate = 'mimes:png,jpg,png,gif';
        } else {
            $iamgevalidate = 'required|mimes:png,jpg,png,gif';
        }

        $validator = Validator::make($request->all(), [
            'bg_color' => 'required',
            'bg_gradient_color_one' => 'required',
            'bg_gradient_color_two' => 'required',
            'main_title' => 'required',
            'main_description' => 'required',
            'bg_image' => $iamgevalidate,


        ]);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->errors()));
        } else {


            if (!empty($id)) {
                $save_data  = footerbanner::find($id);
            } else {
                $save_data = new footerbanner();
            }

            if ($request->hasFile('bg_image')) {


                $path = $request->file('bg_image')->store('public/media/bg_image_footer/');

                $data_storage_name = 'bg_image_footer/' . pathinfo($path)['basename'];

                $save_data->bg_image = $data_storage_name;
            }


            $save_data->bg_link = $bg_link;
            $save_data->bg_link = $bg_link;
            $save_data->bg_gradient_color_one = $bg_gradient_color_one;
            $save_data->bg_gradient_color_two = $bg_gradient_color_two;
            $save_data->main_title = $main_title;
            $save_data->main_description = $main_description;
            $save_data->button_link = $button_link;
            $save_data->button_name = $button_name;
            $save_data->bg_color = $bg_color;
            $save_data->status = $status;


            
            



            if ($save_data->save()) {
                return response()->json(array('sucess' => $save_data));
            }
        }
    }










    
    function footer_widget_one_mannage_process_image_del(Request $request)
    {

        $id = $request->post('id');
        $delete_img = DB::table('footerbanners')->where(['id' => $id])->get();

        $image_filepath = 'public/media/' . $delete_img[0]->bg_image;
        Storage::delete([$image_filepath]);

        DB::table('footerbanners')->where('id', $id)->update(array('bg_image' => ''));
        return response()->json(array('sucess' => 'deleted', $delete_img));
    }




    function footer_widget_one_mannage_status($changestetsu, $id)
    {

        $stetus = footerbanner::find($id);
        $stetus->status = $changestetsu;
        $stetus->save();
        session()->flash('msg', 'status update done');
        return redirect('myadm/footer-widget-one');
    }






    
    function footer_widget_one_delete(Request $request)
    {
        $id = $request->post('id');
        $delete_homesection_one = DB::table('footerbanners')->where(['id' => $id])->delete();

        if ($delete_homesection_one) {
            return response()->json(array('sucess' => 'deleted'));
        } else {
            return response()->json(array('errors' => 'sorry'));
        }
    }





}
