<?php
use Illuminate\Support\Facades\DB;



function getTopNavCat(){
    $result=DB::table('menus')
            ->where(['status'=>1])
            ->where(['dont_show_in_nav_bar'=>null])
            ->orderBy('alinement','ASC')
            ->get();
            $arr=[];
    foreach($result as $row){
        $arr[$row->id]['menu']=$row->menu;
        $arr[$row->id]['parent_id']=$row->menu_parent_id;
        $arr[$row->id]['url']=$row->menu_slug;
         $arr[$row->id]['is_data']=$row->is_data;


    }
    $str=buildTreeView($arr,0);
    return $str;
}


$html='';
function buildTreeView($arr,$parent,$level=0,$prelevel= -1){
	global $html;
	foreach($arr as $id=>$data){



		if($parent==$data['parent_id']){

            $encurl = urlencode($data['url']);

            $urlstrre = str_replace('+','-',$encurl);
                if($data['is_data']==null){
                    $urldata  = '#';
                }else{
                    $urldata  = 'href="'.'/'.$urlstrre.'"';

                }

                
			if($level>$prelevel){

				if($html==''){
					$html.='<ul class="sf-menu">';

				}else{
					$html.='<ul class="dropdown-menu" >';


				}

			}
			if($level==$prelevel){
				$html.='</li>';
			}
       


			$html.='<li class="dropdown submenu">
            <a '.$urldata.'>'.$data['menu'].'</a>';
			if($level>$prelevel){
				$prelevel=$level;
			}
			$level++;
			buildTreeView($arr,$id,$level,$prelevel);
			$level--;
		}
	}
	if($level==$prelevel){
		$html.='</li></ul>';
	}
	return $html;
}





function getTopNavCat2(){
    $result=DB::table('menus')
            ->where(['status'=>1])
            ->where(['dont_show_in_nav_bar'=>null])
            ->orderBy('alinement','ASC')
            ->get();
            $arr=[];
    foreach($result as $row){
        $arr[$row->id]['menu']=$row->menu;
        $arr[$row->id]['parent_id']=$row->menu_parent_id;
        $arr[$row->id]['url']=$row->menu_slug;
         $arr[$row->id]['is_data']=$row->is_data;


    }
    $str=buildTreeView2($arr,0);
    return $str;
}




$html='';
function buildTreeView2($arr,$parent,$level=0,$prelevel= -1){
	global $html;
	foreach($arr as $id=>$data){



		if($parent==$data['parent_id']){

            $encurl = urlencode($data['url']);

            $urlstrre = str_replace('+','-',$encurl);
                if($data['is_data']==null){
                    $urldata  = '#';
                }else{
                    $urldata  = 'href="'.'/'.$urlstrre.'"';

                }

                
			if($level>$prelevel){

				if($html==''){
					$html.='<ul class="menu">';

				}else{
					$html.='<ul class="dropdown-menu" >';


				}

			}
			if($level==$prelevel){
				$html.='</li>';
			}
       


			$html.='<li class="dropdown submenu">
            <a '.$urldata.'>'.$data['menu'].'</a>';
			if($level>$prelevel){
				$prelevel=$level;
			}
			$level++;
			buildTreeView($arr,$id,$level,$prelevel);
			$level--;
		}
	}
	if($level==$prelevel){
		$html.='</li></ul>';
	}
	return $html;
}



function url_friend($var){
    $encurl = urlencode($var);

 return   $urlstrre = str_replace('+','-',$encurl);
}



























function getcuttenturl(){
  $geturl =   url()->current();
   return $urlstrre = str_replace('-',' ',$geturl);
    }



    function getslugname(){

        $url =  getcuttenturl();

        $arr = explode('/',$url);

     return   $slugebd = end($arr);

    }







function getcuttent_page_name(){
        $url =  getcuttenturl();
        $arr = explode('/',$url);
        return   $slugebd = end($arr);
        }

function convert_frindly_url($str){
    $encurl = urlencode($str);
return $var =  str_replace(array('+', '%','&','.',',','/','*','#','@','!','(',')','+','^'), array('-'), $encurl);
}







?>

