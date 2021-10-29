<?php

namespace App\Http\Controllers;

use App\Models\module;
use App\Models\moduleFeature;
use Illuminate\Http\Request;
use App\Models\menu;
use  Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;



class ModuleController extends Controller
{


    function modules()
    {
        $data['modules'] = module::All();


        return view('liteadmin.modules', $data);
    }



    function mannage_module($id = '')
    {
        $data['menu'] = menu::where(['status' => 1])
            ->where(['menu_type' => 'modules'])->get();

        if (!empty($id)) {
            $data['modules'] = module::find($id);
            $data['menu_id'] = $data['modules']->menu_id;
            $data['title'] = $data['modules']->title;
            $data['home_img'] = $data['modules']->home_img;
            $data['mudule_main_image'] = $data['modules']->mudule_main_image;
            $data['module_description'] = $data['modules']->module_description;
            $data['module_small_description'] = $data['modules']->module_small_description;
            $data['show_in_home_page'] = $data['modules']->show_in_home_page;
            $data['meta_description'] = $data['modules']->meta_description;
            $data['meta_tags'] = $data['modules']->meta_tags;
            $data['id'] = $data['modules']->id;
        } else {


            $data['menu_id'] = '';
            $data['title'] = '';
            $data['home_img'] = '';
            $data['mudule_main_image'] = '';
            $data['module_description'] = '';
            $data['module_small_description'] = '';
            $data['show_in_home_page'] = '';
            $data['meta_description'] =  '';
            $data['meta_tags'] = '';
            $data['id'] = '';
        }

        return view('liteadmin.mannage_module', $data);
    }








    function mannage_module_process(Request $request)
    {
        $menu_id = $request->post('menu_id');
        $title = $request->post('title');
        $module_description = $request->post('module_description');
        $module_small_description = $request->post('module_small_description');
        $meta_description = $request->post('meta_description');
        $meta_tags = $request->post('meta_tags');
        $show_in_home_page = $request->post('show_in_home_page');
        $status = 1;
        $id = $request->post('id');

        if (!empty($id)) {
            $light_blue_image_validate =  'mimes:png,jpg,jpeg,svg,gif';
        } else {
            $light_blue_image_validate =  'required|mimes:png,jpg,jpeg,svg,gif';
        }

        $validator = Validator::make($request->all(), [
            'menu_id' => 'required',
            'module_description' => 'required',
            'module_small_description' => 'required',
            'home_img' => $light_blue_image_validate,
            'mudule_main_image' => $light_blue_image_validate


        ]);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->errors()));
        } else {





            if (!empty($id)) {
                $save_data  = module::find($id);
            } else {
                $save_data = new module();
            }


            if ($request->hasFile('mudule_main_image')) {
                $oamege = $request->file('mudule_main_image');
                $iamage_ext = $oamege->extension();
                $path = $request->file('mudule_main_image')->store('/public/media/modules');
                $fileName = pathinfo($path)['basename'];
                $dastorage_names = 'modules/' . $fileName;
                $save_data->mudule_main_image = $dastorage_names;
            }

            if ($request->hasFile('home_img')) {
                $oamege = $request->file('home_img');
                $iamage_ext = $oamege->extension();
                $filename = date('dmY') . time() . '.' . $iamage_ext;


                $path = $request->file('home_img')->store('/public/media/modules');

                $fileName = pathinfo($path)['basename'];
                $dastorage_names = 'modules/' . $fileName;
                $save_data->home_img = $dastorage_names;
            }


            $save_data->menu_id = $menu_id;
            $save_data->title = $title;
            $save_data->module_description = $module_description;
            $save_data->module_small_description = $module_small_description;
            $save_data->meta_description = $meta_description;
            $save_data->meta_tags = $meta_tags;
            $save_data->show_in_home_page = $show_in_home_page;
            $save_data->status = $status;



            if ($save_data->save()) {
                return response()->json(array('sucess' => $save_data));
            }
        }
    }




    function stetus($currentstetus, $id)
    {

        $stetus = module::find($id);
        $stetus->status = $currentstetus;
        $stetus->save();
        session()->flash('msg', 'status update done');
        return redirect('myadm/modules');
    }



    function modules_delete(Request $request)
    {
        $id = $request->post('id');
        $delete_menu = module::where(['id' => $id])->delete();
        if ($delete_menu) {
            return response()->json(array('sucess' => 'deleted'));
        } else {
            return response()->json(array('errors' => 'sorry'));
        }
    }






    function module_config()
    {
        $data['module_config'] = moduleFeature::all();

        return view('liteadmin.module_config',$data);
    }



    function config_module_mannage($id = '')
    {

        $data['modules'] = module::where(['status' => 1])->get();
        $data['moduleFeature'] = moduleFeature::all();
        if (!empty($id)) {
            $data['moduleFeature'] = moduleFeature::find($id);
            $data['module_id'] = $data['moduleFeature']->module_id;
            $data['feature'] = $data['moduleFeature']->feature;
            $data['id'] = $data['moduleFeature']->id;
        } else {

            $data['moduleFeature'] = '';
            $data['module_id'] = '';
            $data['feature'] = '';
            $data['id'] = '';
        }


        return view('liteadmin.config_module_mannage', $data);
    }





    function config_module_mannage_form_data_process(Request $request)
    {
        $module_id = $request->post('module_id');
        $feature = $request->post('feature');

        $status = 1;
        $id = $request->post('id');



        $validator = Validator::make($request->all(), [
            'module_id' => 'required',
            'feature' => 'required',




        ]);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->errors()));
        } else {





            if (!empty($id)) {
                $save_data  = modulefeature::find($id);
            } else {
                $save_data = new modulefeature();
            }



            $save_data->module_id = $module_id;
            $save_data->feature = $feature;
            $save_data->status = $status;

            if ($save_data->save()) {
                return response()->json(array('sucess' => $save_data));
            }
        }
    }


    

    function stetus_cong($currentstetus, $id)
    {

        $stetus = modulefeature::find($id);
        $stetus->status = $currentstetus;
        $stetus->save();
        session()->flash('msg', 'status update done');
        return redirect('myadm/module_config');
    }


    function config_modules_delete(Request $request)
    {
        $id = $request->post('id');
        $delete_menu = modulefeature::where(['id' => $id])->delete();
        if ($delete_menu) {
            return response()->json(array('sucess' => 'deleted'));
        } else {
            return response()->json(array('errors' => 'sorry'));
        }
    }




}
