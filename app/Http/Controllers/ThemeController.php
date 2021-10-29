<?php

namespace App\Http\Controllers;

use App\Models\theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ThemeController extends Controller
{


    function theme()
    {
        $data['colors'] = theme::all();

        if (!empty($data['colors'][0])) {
            $data['nav_background_color'] =  $data['colors'][0]->nav_background_color;
            $data['font_color'] = $data['colors'][0]->font_color;
            $data['navbar_on_mouser_hover'] =  $data['colors'][0]->navbar_on_mouser_hover;
            $data['footer_part_one'] =  $data['colors'][0]->footer_part_one;
            $data['footer_part_one_font'] =  $data['colors'][0]->footer_part_one_font;
            $data['footer_part_two'] =  $data['colors'][0]->footer_part_two;
            $data['footer_part_two_fount'] =  $data['colors'][0]->footer_part_two_fount;
            $data['footer_part_three'] =  $data['colors'][0]->footer_part_three;
            $data['footer_part_three_fount'] =  $data['colors'][0]->footer_part_three_fount;
            $data['id'] =  $data['colors'][0]->id;
        }else{

            $data['nav_background_color'] =   '';
            $data['font_color'] =  '';
            $data['navbar_on_mouser_hover'] =  '';
            $data['footer_part_one'] =  '';
            $data['footer_part_one_font'] =   '';
            $data['footer_part_two'] =   '';
            $data['footer_part_two_fount'] =  '';
            $data['footer_part_three'] =   '';
            $data['footer_part_three_fount'] =  '';
            $data['id'] = '';

        }

        return view('liteadmin.theme', $data);
    }



    function theme_process(Request $request)
    {

        $nav_background_color = $request->post('nav_background_color');
        $font_color = $request->post('font_color');
        $navbar_on_mouser_hover = $request->post('navbar_on_mouser_hover');
        $footer_part_one = $request->post('footer_part_one');
        $footer_part_one_font = $request->post('footer_part_one_font');
        $footer_part_two = $request->post('footer_part_two');
        $footer_part_two_fount = $request->post('footer_part_two_fount');
        $footer_part_three = $request->post('footer_part_three');
        $footer_part_three_fount = $request->post('footer_part_three_fount');
        $id = $request->post('id');



        $validator = Validator::make($request->all(), [
            'nav_background_color' => 'required',
            'font_color' => 'required',
            'navbar_on_mouser_hover' => 'required',
            'footer_part_one' => 'required',
            'footer_part_one_font' => 'required',
            'footer_part_two' => 'required',
            'footer_part_two_fount' => 'required',
            'footer_part_three' => 'required',
            'footer_part_three_fount' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->errors()));
        } else {


            if (!empty($id)) {

                $save_data = theme::find($id);
            } else {

                $save_data = new theme();
            }

            $save_data->nav_background_color = $nav_background_color;
            $save_data->font_color = $font_color;
            $save_data->navbar_on_mouser_hover = $navbar_on_mouser_hover;
            $save_data->footer_part_one = $footer_part_one;
            $save_data->footer_part_one_font = $footer_part_one_font;
            $save_data->footer_part_two = $footer_part_two;
            $save_data->footer_part_two_fount = $footer_part_two_fount;
            $save_data->footer_part_three = $footer_part_three;
            $save_data->footer_part_three_fount = $footer_part_three_fount;
        }
        $save_data->save();


        
$msg = "Details Saved";
return response()->json(array('sucess'=> $msg));



    }
}
