<?php
use App\Models\siteinfo;
use App\Models\modelbox;
use Illuminate\Support\Facades\DB;
use App\Models\addres;
use App\Models\theme;





     function getsiteinformetion()
    {
      return  $siteinfo = siteinfo::all();
    }


function getmodelbox(){
    return  $model_box = modelbox::All();

}

function get_ttheme_colors(){
  return $tddata = theme::All();
  
  }
  



function get_footerlinks(){

  $footer_categories = DB::table('footer_categories')->where(['status'=>1])->get();
  $html = array();
  foreach(  $footer_categories as $cat_data){

    $get_catlinks = DB::table('footers')->join('menus','menus.id','=','footers.menu_id')->where(['footers.catgory_id'=>$cat_data->id])
    ->orderBy('footers.menu_order','ASC')
    ->get();

  $html[] = '<div class="col-xs-12 col-sm-12 col-sm-offset-0 col-md-3 col-md-offset-0 col-lg-2 col-lg-offset-0">
     <div class="footer-tools">
  <h3>'.$cat_data->category.'</h3>';


      $html[] .=  '<ul class="list angle-double-right list-border">';

      foreach($get_catlinks as $links){

        $encurl = urlencode($links->menu_slug);

        $urlstrre = str_replace('+','-',$encurl);
        $url = '/'.$urlstrre;


        $html[] .= '<li><a href="'.$url.'">'.$links->menu.'</a></li>';


      }



      $html[] .= '</ul>
    </div>
</div>';
}


foreach($html as $data){
  echo $data;
}

}



function get_footer_addrsss(){
return $addres = addres::where(['status'=>1])->get();

}




