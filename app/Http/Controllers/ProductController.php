<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use App\Models\menu;
use App\Models\product_part_one;
use App\Models\part_one_product_image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\prpduct_bg;
use App\Models\part_three_kay_feature;
use App\Models\part_three_kay_image;
use App\Models\part_two;
use App\Models\part_two_main_title;
use App\Models\homeproduct;






class ProductController extends Controller
{


    function part_one()
    {
        $data['product_part_one'] = product_part_one::all();

        return view('liteadmin.part_one', $data);
    }



    function mannage_Product_partone($id = '')
    {
        $data['menu'] =  menu::where(['menu_type' => 'product', 'status' => 1])->get();
        if (!empty($id)) {
            $data['product_part_ones'] = product_part_one::where(['product_part_ones.id' => $id])->get();

            $data['menu_id'] =  $data['product_part_ones'][0]->menu_id;
            $data['part_one_title'] =  $data['product_part_ones'][0]->part_one_title;
            $data['part_one_product_image_id'] =  $data['product_part_ones'][0]->part_one_product_image_id;
            $data['part_one_description'] =  $data['product_part_ones'][0]->part_one_description;
            $data['product_image'] =  $data['product_part_ones'][0]->product_image;
            $data['id'] = $data['product_part_ones'][0]->id;
            $data['alignment'] = $data['product_part_ones'][0]->alignment;
            $data['meta_title'] = $data['product_part_ones'][0]->meta_title;
            $data['meta_description'] = $data['product_part_ones'][0]->meta_description;
            $data['keywords'] = $data['product_part_ones'][0]->keywords;
            $data['meta_image'] = $data['product_part_ones'][0]->meta_image;
            $data['link_display_text'] = $data['product_part_ones'][0]->link_display_text;
            $data['link'] = $data['product_part_ones'][0]->link;

        } else {
            $data['menu_id'] =  '';
            $data['part_one_title'] = '';
            $data['part_one_product_image_id'] =  '';
            $data['part_one_description'] = '';
            $data['product_image'] = '';
            $data['id'] = '';
            $data['alignment'] = '';
            $data['meta_title'] =  '';
            $data['meta_description'] =  '';
            $data['keywords'] =  '';
            $data['meta_image'] = '';
            $data['link_display_text'] = '';
            $data['link'] = '';

        }


        return view('liteadmin.mannage_Product_partone', $data);
    }


    function mannage_part_one_process(Request $request)
    {
        $menu_id = $request->post('menu_id');
        $part_one_title = $request->post('part_one_title');
        $part_one_description = $request->post('part_one_description');
        $id = $request->post('id');
        $alignment = $request->post('alignment');
        $link_display_text = $request->post('link_display_text');
        $link = $request->post('link');


        $meta_title = $request->post('meta_title');
        $meta_description = $request->post('meta_description');
        $keywords = $request->post('keywords');




        $status = 1;
        $validator = Validator::make($request->all(), [
            'menu_id' => 'required',
            'part_one_title' => 'required',
            'part_one_description' => 'required',
            'image_file' => 'mimes:png,jpg,jpeg,gif',

        ]);


        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->errors()));
        } else {

            $is_data = 1;
            $update_is_data = menu::find($menu_id);
            $update_is_data->is_data = $is_data;
            $update_is_data->save();



            if (!empty($id)) {

                $product_part_one = product_part_one::find($id);
                $msg = "Details Saved";
            } else {

                $product_part_one = new product_part_one();
                $msg = "Details updated";
            }

            $product_part_one->menu_id = $menu_id;
            $product_part_one->part_one_title = $part_one_title;
            $product_part_one->part_one_description = $part_one_description;

            $product_part_one->link_display_text = $link_display_text;
            $product_part_one->link = $link;


            $product_part_one->status = $status;

            $product_part_one->alignment =  $alignment;

            $product_part_one->meta_title =  $meta_title;
            $product_part_one->meta_description =  $meta_description;
            $product_part_one->keywords =  $keywords;


            if ($request->hasFile('image_file')) {
                $request_image = $request->file('image_file');
                $image = Image::make($request_image);

                $image_path = public_path('/storage/media/product/');

                if (!File::exists($image_path)) {
                    File::makeDirectory($image_path);
                }
                $date =  date('dmY');
                $time = microtime();
                $fnm = $date . $time;
                $image_name = $fnm . '.' . $request_image->getClientOriginalExtension();


                $image->resize(509, 570);

                $image->save($image_path . $image_name);
                $dastorage_name = 'product/' . $image_name;
                $sizes = 'laptop-image';
                $product_part_one->product_image =  $dastorage_name;
            }



            if ($request->hasFile('meta_image')) {


                $validator = Validator::make($request->all(), [
                    'meta_title' => 'required',

                ]);
                if ($validator->fails()) {
                    return response()->json(array('errors' => $validator->errors()));
                } else {
                    $image = $request->file('meta_image')->getClientOriginalExtension();
                    $ew_fileNmae = time() . '_' . date('dmY') . '_' . $meta_title . '.' . $image;
                    $path = public_path('/storage/media/seo/');
                    $request->file('meta_image')->move($path, $ew_fileNmae);
                    $dastorage_name = 'seo/' . $ew_fileNmae;
                    $product_part_one->meta_image =  $dastorage_name;
                }
            }




            $product_part_one->save();

            return response()->json(array('sucess' => $msg));
        }
    }








    function Delete(Request $request)
    {
        $id = $request->post('id');
        $getimage  = product_part_one::find($id);
        $file_name = $getimage->image;
        $dlt_file = 'public/media/' . $file_name;
        Storage::delete($dlt_file);
        $delete_data = product_part_one::where(['id' => $id])->delete();
        if ($delete_data) {
            return response()->json(array('sucess' => 'deleted'));
        } else {
            return response()->json(array('errors' => 'sorry'));
        }
    }


    function stetus_part_one($currentstetus, $id)
    {
        $stetus = product_part_one::find($id);
        $stetus->status = $currentstetus;
        $stetus->save();
        session()->flash('msg', 'status update done');
        return redirect('myadm/part_one');
    }





    function banner_section()
    {


        $data['prpduct_bgs'] = prpduct_bg::all();

        return view('liteadmin.banner_section', $data);
    }




    function mannage_product_banner($id = '')
    {

        $data['menu'] = menu::where(['menu_type' => 'product', 'status' => 1])->get();

        if (!empty($id)) {

            $data['product_banner_get'] = prpduct_bg::find($id);
            $data['menu_id'] =  $data['product_banner_get']->menu_id;
            $data['product_bg'] =  $data['product_banner_get']->product_bg;
            $data['title'] =  $data['product_banner_get']->title;
            $data['id'] =  $data['product_banner_get']->id;
            $data['product_bg_color'] =  $data['product_banner_get']->product_bg_color;
        } else {

            $data['menu_id'] =  '';
            $data['product_bg'] =  '';
            $data['title'] =  '';
            $data['id'] =  '';
            $data['product_bg_color'] = '';
        }

        return view('liteadmin.mannage_product_banner', $data);
    }









    function process_banner_product(Request $request)
    {

        $menu_id = $request->post('menu_id');
        $title = $request->post('title');
        $product_bg_color = $request->post('product_bg_color');



        $status = 1;
        $banner_id = $request->post('id');
        if (!empty($banner_id)) {
            $banner_image_validate = 'mimes:png,jpg,jpeg';
        } else {
            $banner_image_validate = 'required|mimes:png,jpg,jpeg';
        }

        $validator = Validator::make($request->all(), [
            'product_bg' => $banner_image_validate,
            'menu_id' => 'required',
            'product_bg_color' => 'required'

        ]);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->errors()));
        } else {

            $is_data = 1;
            $update_is_data = menu::find($menu_id);
            $update_is_data->is_data = $is_data;
            $update_is_data->save();

            if (!empty($banner_id)) {
                $banner_img  = prpduct_bg::find($banner_id);
            } else {
                $banner_img = new prpduct_bg();
            }


            if ($request->hasFile('product_bg')) {
                $oamege = $request->file('product_bg');
                $iamage_ext = $oamege->extension();
                $filename = date('dmY') . time() . '.' . $iamage_ext;
                $dastorage_name = 'banner/' . $filename;
                $oamege->storeAs('public/media/banner/', $filename);
                $banner_img->product_bg = $dastorage_name;
            }



            $banner_img->title = $title;
            $banner_img->menu_id = $menu_id;
            $banner_img->product_bg_color = $product_bg_color;

            $banner_img->status = $status;
            if ($banner_img->save()) {
                return response()->json(array('sucess' => $banner_img));
            }
        }
    }




    function stetus($changestetsu, $id)
    {

        $stetus = prpduct_bg::find($id);
        $stetus->status = $changestetsu;
        $stetus->save();
        session()->flash('msg', 'status update done');
        return redirect('myadm/product/banner_section');
    }


    function delete_banner(Request $request)
    {
        $bannerid = $request->post('inc_id');
        $getdata = prpduct_bg::find($bannerid);
        $banner_image =  $getdata->banner_image;
        $background_img =  $getdata->background_img;
        $bannerimg = 'public/media/' . $banner_image;
        $backimgg = 'public/media/' . $background_img;
        Storage::delete([$bannerimg, $backimgg]);
        $delete_banner = prpduct_bg::where(['id' => $bannerid])->delete();
        if ($delete_banner) {
            return response()->json(array('sucess' => 'data successfully detected'));
        } else {
            return response()->json(array('errors' => 'query cannot be deleted please try again'));
        }
    }





    function part_three()
    {

        $data['part_three'] = part_three_kay_image::all();
        $data['part_three_kay_features'] = part_three_kay_feature::all();


        return view('liteadmin.part_three', $data);
    }




    function mannage_features_image_n_title($id = '')
    {

        $data['menu'] = menu::where(['menu_type' => 'product', 'status' => 1])->get();

        if (!empty($id)) {
            $data['part_three_kay_images'] = part_three_kay_image::find($id);
            $data['menu_id'] = $data['part_three_kay_images']->menu_id;
            $data['title'] = $data['part_three_kay_images']->title;
            $data['center_image'] = $data['part_three_kay_images']->center_image;
            $data['id'] = $data['part_three_kay_images']->id;
            $data['button_name'] = $data['part_three_kay_images']->button_name;
            $data['link'] = $data['part_three_kay_images']->link;
            $data['bg_color'] = $data['part_three_kay_images']->bg_color;
            $data['light_blue_image'] = $data['part_three_kay_images']->light_blue_image;
        } else {

            $data['menu_id'] = '';
            $data['title'] = '';
            $data['center_image'] = '';
            $data['id'] = '';
            $data['button_name'] = '';
            $data['link'] = '';
            $data['bg_color'] = '';
            $data['light_blue_image'] = '';
        }

        return view('liteadmin.mannage_features_image_n_title', $data);
    }




    function mannage_features_image_n_title_process(Request $request)
    {

        $menu_id = $request->post('menu_id');
        $title = $request->post('title');
        $bg_color = $request->post('bg_color');

        $status = 1;
        $button_name = $request->post('button_name');
        $link = $request->post('link');

        $banner_id = $request->post('id');
        if (!empty($banner_id)) {
            $banner_image_validate = 'mimes:png,jpg,jpeg,gif';
            $light_blue_image_validate =  'mimes:png,jpg,jpeg,svg,gif';
        } else {
            $banner_image_validate = 'required|mimes:png,jpg,jpeg,gif';
            $light_blue_image_validate =  'mimes:png,jpg,jpeg,svg,gif';
        }

        $validator = Validator::make($request->all(), [
            'center_image' => $banner_image_validate,
            'menu_id' => 'required',
            'title' => 'required',
            'bg_color' => 'required',
            'light_blue_image' => $light_blue_image_validate

        ]);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->errors()));
        } else {

            $is_data = 1;
            $update_is_data = menu::find($menu_id);
            $update_is_data->is_data = $is_data;
            $update_is_data->save();



            if (!empty($banner_id)) {
                $banner_img  = part_three_kay_image::find($banner_id);
            } else {
                $banner_img = new part_three_kay_image();
            }


            if ($request->hasFile('center_image')) {
                $oamege = $request->file('center_image');
                $iamage_ext = $oamege->extension();
                $filename = date('dmY') . time() . '.' . $iamage_ext;
                $dastorage_name = 'banner/' . $filename;
                $oamege->storeAs('public/media/banner/', $filename);
                $banner_img->center_image = $dastorage_name;
            }

            if ($request->hasFile('light_blue_image')) {
                $oamege = $request->file('light_blue_image');
                $iamage_ext = $oamege->extension();
                $filename = date('dmY') . time() . '.' . $iamage_ext;
                $dastorage_name = 'banner/' . $filename;
                $oamege->storeAs('public/media/banner/', $filename);
                $banner_img->light_blue_image = $dastorage_name;
            }



            $banner_img->title = $title;
            $banner_img->menu_id = $menu_id;
            $banner_img->status = $status;
            $banner_img->button_name = $button_name;
            $banner_img->link = $link;
            $banner_img->bg_color = $bg_color;


            if ($banner_img->save()) {
                return response()->json(array('sucess' => $banner_img));
            }
        }
    }




    function mannage_features($id = '')
    {
        $data['part_three_kay_titles'] = part_three_kay_image::where(['status' => 1])->get();

        if (!empty($id)) {
            $data['part_three_kay_features_data'] = part_three_kay_feature::find($id);
            $data['title_id'] = $data['part_three_kay_features_data']->title_id;
            $data['kay_feature'] = $data['part_three_kay_features_data']->kay_feature;
            $data['id'] = $data['part_three_kay_features_data']->id;
            $data['alignment'] = $data['part_three_kay_features_data']->alignment;
        } else {
            $data['title_id'] = '';
            $data['kay_feature'] = '';
            $data['id'] = '';
            $data['alignment'] = '';
        }


        return view('liteadmin.mannage_features', $data);
    }





    function mannage_features_process(Request $request)
    {

        $title_id = $request->post('title_id');
        $kay_feature = $request->post('kay_feature');
        $alignment = $request->post('alignment');

        $status = 1;
        $banner_id = $request->post('id');


        $validator = Validator::make($request->all(), [

            'title_id' => 'required',
            'kay_feature' => 'required',
            'alignment' => 'required',


        ]);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->errors()));
        } else {




            if (!empty($banner_id)) {
                $kay_feature_process  = part_three_kay_feature::find($banner_id);
            } else {
                $kay_feature_process = new part_three_kay_feature();
            }


            $kay_feature_process->title_id = $title_id;
            $kay_feature_process->kay_feature = $kay_feature;
            $kay_feature_process->alignment = $alignment;

            $kay_feature_process->status = $status;
            if ($kay_feature_process->save()) {
                return response()->json(array('sucess' => $kay_feature_process));
            }
        }
    }








    function Delete_kay_fetature(Request $request)
    {
        $id = $request->post('inc_id');
        $Delete_kay_fetature_del = part_three_kay_feature::where(['id' => $id])->delete();
        if ($Delete_kay_fetature_del) {
            return response()->json(array('sucess' => 'deleted'));
        } else {
            return response()->json(array('errors' => 'query cannot be deleted please try again'));
        }
    }




    function mannage_features_image_n_title_stetus($changestetsu, $id)
    {
        $stetus = part_three_kay_image::find($id);
        $stetus->status = $changestetsu;
        $stetus->save();
        session()->flash('msg', 'status update done');
        return redirect('myadm/part_three');
    }





    function mannage_features_image_n_title_delete(Request $request)
    {
        $id = $request->post('inc_id');
        $Delete_kay_fetature_del = part_three_kay_image::where(['id' => $id])->delete();
        if ($Delete_kay_fetature_del) {
            return response()->json(array('sucess' => 'deleted'));
        } else {
            return response()->json(array('errors' => 'query cannot be deleted please try again'));
        }
    }



    function part_three_status($changestetsu, $id)
    {
        $stetus = part_three_kay_feature::find($id);
        $stetus->status = $changestetsu;
        $stetus->save();
        session()->flash('msg', 'status update done');
        return redirect('myadm/part_three');
    }



    function part_two()
    {
        $data['part_two_main_titles'] = part_two_main_title::all();
        $data['part_two_data'] = part_two::all();


        return view('liteadmin.part_two', $data);
    }






    function mannage_part_two_title($id = '')
    {

        $data['menu'] = menu::where(['menu_type' => 'product', 'status' => 1])->get();

        if (!empty($id)) {
            $data['part_two_main_title_data'] = part_two_main_title::find($id);
            $data['menu_id'] = $data['part_two_main_title_data']->menu_id;
            $data['main_title'] = $data['part_two_main_title_data']->main_title;
            $data['id'] = $data['part_two_main_title_data']->id;
            $data['bg_color'] = $data['part_two_main_title_data']->bg_color;
            $data['part_two_top_image'] = $data['part_two_main_title_data']->part_two_top_image;
        } else {
            $data['menu_id'] = '';
            $data['main_title'] = '';
            $data['id'] = '';
            $data['bg_color'] = '';
            $data['part_two_top_image'] = '';
        }

        return view('liteadmin.mannage_part_two_title', $data);
    }








    function mannage_part_two_title_process(Request $request)
    {

        $menu_id = $request->post('menu_id');
        $main_title = $request->post('main_title');
        $bg_color = $request->post('bg_color');

        $status = 1;


        $banner_id = $request->post('id');

        $validator = Validator::make($request->all(), [
            'menu_id' => 'required',
            'main_title' => 'required',
            'bg_color' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->errors()));
        } else {

            $is_data = 1;
            $update_is_data = menu::find($menu_id);
            $update_is_data->is_data = $is_data;
            $update_is_data->save();



            if (!empty($banner_id)) {
                $banner_img  = part_two_main_title::find($banner_id);
            } else {
                $banner_img = new part_two_main_title();
            }

            if ($request->hasFile('part_two_top_image')) {
                $oamege = $request->file('part_two_top_image');
                $iamage_ext = $oamege->extension();
                $filename = date('dmY') . time() . '.' . $iamage_ext;
                $dastorage_name = 'product/' . $filename;
                $oamege->storeAs('public/media/product/', $filename);
                $banner_img->part_two_top_image = $dastorage_name;
            }



            $banner_img->menu_id = $menu_id;
            $banner_img->main_title = $main_title;
            $banner_img->bg_color = $bg_color;
            $banner_img->status = $status;

            if ($banner_img->save()) {
                return response()->json(array('sucess' => $banner_img));
            }
        }
    }


    function part_two_status($changestetsu, $id)
    {
        $stetus = part_two_main_title::find($id);
        $stetus->status = $changestetsu;
        $stetus->save();
        session()->flash('msg', 'status update done');
        return redirect('myadm/part_two');
    }





    function mannage_part_two_title_delete(Request $request)
    {
        $id = $request->post('inc_id');
        $Delete_kay_fetature_del = part_two_main_title::where(['id' => $id])->delete();
        if ($Delete_kay_fetature_del) {
            return response()->json(array('sucess' => 'deleted'));
        } else {
            return response()->json(array('errors' => 'query cannot be deleted please try again'));
        }
    }










    function mannage_part_two_content($id = '')
    {

        $data['main_title_ids'] = part_two_main_title::where(['status' => 1])->get();

        if (!empty($id)) {
            $data['mannage_part_two_content_data'] = part_two::find($id);
            $data['main_title_id_check'] = $data['mannage_part_two_content_data']->main_title_id;
            $data['ref_title'] = $data['mannage_part_two_content_data']->ref_title;
            $data['part_two_image'] = $data['mannage_part_two_content_data']->part_two_image;
            $data['part_two_descreption'] = $data['mannage_part_two_content_data']->part_two_descreption;
            $data['alinement'] = $data['mannage_part_two_content_data']->alinement;

            $data['id'] = $data['mannage_part_two_content_data']->id;
        } else {
            $data['main_title_id_check'] = '';
            $data['ref_title'] = '';
            $data['part_two_image'] = '';
            $data['part_two_descreption'] = '';
            $data['id'] = '';
            $data['alinement'] = '';
        }

        return view('liteadmin.mannage_part_two_content', $data);
    }





    function mannage_part_two_content_process(Request $request)
    {
        $main_title_id = $request->post('main_title_id');
        $id = $request->post('id');
        $ref_title = $request->post('ref_title');
        $alinement = $request->post('alinement');

        $part_two_descreption = $request->post('part_two_descreption');

        $status = 1;
        if (!empty($id)) {
            $image_validate =  'mimes:png,jpg,jpeg,svg';
        } else {
            $image_validate = 'mimes:png,jpg,jpeg,svg';
        }


        $validator = Validator::make($request->all(), [
            'main_title_id' => 'required',
            'ref_title' => 'required',
            'alinement' => 'required',
            'part_two_image' => $image_validate,
            'part_two_descreption' => 'required',
        ]);




        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->errors()));
        } else {

            if (!empty($id)) {

                $mannahe_data = part_two::find($id);
            } else {
                $mannahe_data = new part_two();
            }
            $mannahe_data->main_title_id = $main_title_id;
            $mannahe_data->ref_title = $ref_title;
            $mannahe_data->part_two_descreption = $part_two_descreption;
            $mannahe_data->status = $status;
            $mannahe_data->alinement = $alinement;

            if ($request->hasFile('part_two_image')) {
                $oamege = $request->file('part_two_image');
                $iamage_ext = $oamege->extension();
                $filename = date('dmY') . time() . '.' . $iamage_ext;
                $dastorage_name = 'product/' . $filename;
                $oamege->storeAs('public/media/product/', $filename);
                $mannahe_data->part_two_image = $dastorage_name;
            }

            $mannahe_data->save();
            return response()->json(array('sucess' => 'done', 'data' => $mannahe_data));
        }
    }





    function mannage_part_two_content_ststus($changestetsu, $id)
    {
        $stetus = part_two::find($id);
        $stetus->status = $changestetsu;
        $stetus->save();
        session()->flash('msg', 'status update done');
        return redirect('myadm/part_two');
    }




    function mannage_part_two_content_delete(Request $request)
    {
        $id = $request->post('inc_id');
        $Delete_kay_fetature_del = part_two::where(['id' => $id])->delete();
        if ($Delete_kay_fetature_del) {
            return response()->json(array('sucess' => 'deleted'));
        } else {
            return response()->json(array('errors' => 'query cannot be deleted please try again'));
        }
    }
}
