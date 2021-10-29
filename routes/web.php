<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiteinfoController;
use App\Http\Controllers\gallerycontroller;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\FrondendController;
use App\Http\Controllers\AdminHomeControllerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\pagecontroller;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\ModelboxController;
use App\Http\Controllers\SchoolManagementController;
use App\Http\Controllers\TopperController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AddresController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ModuleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('myadm/foo', function () {
//     Artisan::call('storage:link');
// });

Route::get('myadm', [UserController::class, 'login']);
Route::post('login', [UserController::class, 'login_auth'])->name('login');
Route::group(["middleware" => "user_auth"], function () {
    Route::get('myadm/dashboard', [dashboard::class, 'dashboard']);
    Route::get('myadm/addmenu', [MenuController::class, 'menupage']);
    Route::get('myadm/addmenu/mannagemenu', [MenuController::class, 'mannagemenu']);
    Route::get('myadm/addmenu/mannagemenu/{id}', [MenuController::class, 'mannagemenu']);
    Route::post('myadm/addmenu/mannagemenuorm', [MenuController::class, 'mannagemenuorm'])->name('mannagemenuorm');
    Route::get('myadm/addmenu/stetus/{currentstetus}/{id}', [MenuController::class, 'stetus']);
    Route::get('myadm/cms', [MenuController::class, 'cms']);
    Route::post('myadm/mannage/cmsdata', [MenuController::class, 'cmsdata']);
    Route::post('myadm/addmenu/Delete', [MenuController::class, 'menu_delete']);
    Route::post('myadm/mannagecontent/menudata_get', [MenuController::class, 'mannagecontent_get']);
    Route::post('myadm/cms/imageupload/{id}/{menu}', [MenuController::class, 'imageupload']);
    Route::post('myadm/cms', [MenuController::class, 'uploadckeditorimage'])->name('uploadckeditorimage');
    Route::post('myadm/cms/videoupload/{id}/{menu}', [MenuController::class, 'videoupload']);
    Route::get('myadm/sitedetails', [SiteinfoController::class, 'sitedetails']);
    Route::post('myadm/sitedetails/save', [SiteinfoController::class, 'sitedetails_mannege']);
    Route::get('myadm/Image', [gallerycontroller::class, 'Image']);
    Route::post('myadm/Image/delete', [gallerycontroller::class, 'delete_galley_group']);
    Route::get('myadm/addmenu/viewimages/{id}', [gallerycontroller::class, 'viewimages']);
    Route::post('myadm/Image/deletesingle', [gallerycontroller::class, 'delete_deletesingle']);
    Route::get('myadm/addmenu/edit_img/{id}', [gallerycontroller::class, 'edit_img']);
    Route::post('myadm/addmenu/edit_img/save/{id}', [gallerycontroller::class, 'edit_img_save']);
    Route::get('myadm/video', [gallerycontroller::class, 'video']);
    Route::post('myadm/video/delete', [gallerycontroller::class, 'delete_galley_video_group']);
    Route::get('myadm/addmenu/viewvideo/{id}', [gallerycontroller::class, 'viewvideo']);
    Route::post('myadm/video/deletesingle', [gallerycontroller::class, 'delete_deletesingle_video']);
    Route::get('myadm/addmenu/edit_vod/{id}', [gallerycontroller::class, 'edit_vod']);
    Route::post('myadm/addmenu/edit_vod/save/{id}', [gallerycontroller::class, 'edit_vod_save']);
    Route::get('myadm/ContactUs', [ContactUsController::class, 'contact']);
    Route::post('myadm/ContactUs/readstatus', [ContactUsController::class, 'readstatus']);
    Route::post('myadm/contactus/delete', [ContactUsController::class, 'delete_deletesingle_contcat']);
    Route::get('myadm/addnews', [NewsController::class, 'addnews']);
    Route::post('myadm/addnews/add', [NewsController::class, 'newsdata']);
    Route::post('myadm/addnews', [NewsController::class, 'uploadckeditorimagefornews'])->name('uploadckeditorimagefornews');
    Route::get('myadm/managenews', [NewsController::class, 'managenews']);
    Route::get('myadm/managenews/edit/{newsid}', [NewsController::class, 'edit_news']);
    Route::post('myadm/managenews/stetus/{ste}', [NewsController::class, 'stetus']);
    Route::post('myadm/managenews/delete', [NewsController::class, 'deletenewsdata']);
    Route::get('myadm/Banners', [BannerController::class, 'Banners']);
    Route::get('myadm/mannagebanner', [BannerController::class, 'mannagebanner']);
    Route::get('myadm/mannagebanner/{id}', [BannerController::class, 'mannagebanner']);
    Route::post('myadm/mannagebanner/procss', [BannerController::class, 'processbanner'])->name('mannagebanners');
    Route::get('myadm/mannagebanner/stetus/{changesteus}/{id}', [BannerController::class, 'stetus']);
    Route::post('myadm/Banners/delete', [BannerController::class, 'delete_banner']);
    Route::get('myadm/arrange-menus', [MenuController::class, 'mannagemenu_arrange']);
    Route::post('myadm/arrange-menus/data', [MenuController::class, 'arrange_menus_save']);
    Route::get('myadm/Section-one', [AdminHomeControllerController::class, 'viewsectionone']);
    Route::get('myadm/Section-one/mannage', [AdminHomeControllerController::class, 'mannage']);
    Route::get('myadm/Section-one/mannage/{id}', [AdminHomeControllerController::class, 'mannage']);
    Route::post('myadm/Section-one/mannage/main_image/delete', [AdminHomeControllerController::class, 'main_image_delete']);
    Route::post('myadm/Section-one-brand/mannage/main_image/delete', [AdminHomeControllerController::class, 'main_image_brand_delete']);


    Route::get('/myadm/home-product-link', [AdminHomeControllerController::class, 'home_product_link']);
    Route::get('myadm/home-product-link-mannage', [AdminHomeControllerController::class, 'home_product_link_mannage']);
    Route::get('myadm/home-product-link-mannage/{id}', [AdminHomeControllerController::class, 'home_product_link_mannage']);
    Route::post('myadm/home-product-link-mannage/save', [AdminHomeControllerController::class, 'home_product_link_mannage_process']);
    Route::get('myadm/home-product-link-mannage/stetus/{changesteus}/{id}', [AdminHomeControllerController::class, 'stetus_link']);
    Route::post('myadm/home-product-link-mannage-image/delete', [AdminHomeControllerController::class, 'home_product_link_mannage_image_del']);
    Route::post('myadm/homeproduct_data_delete/Delete', [AdminHomeControllerController::class, 'homeproduct_data_delete']);



    Route::get('/myadm/footer-widget-one', [AdminHomeControllerController::class, 'footer_widget_one']);

    Route::get('/myadm/footer-widget-one-mannage', [AdminHomeControllerController::class, 'footer_widget_one_mannage']);
    Route::get('/myadm/footer-widget-one-mannage/{id}', [AdminHomeControllerController::class, 'footer_widget_one_mannage']);
    Route::post('/myadm/footer-widget-one-mannage/save', [AdminHomeControllerController::class, 'footer_widget_one_mannage_process']);
    Route::post('myadm/footer-widget-one-mannage-image/delete', [AdminHomeControllerController::class, 'footer_widget_one_mannage_process_image_del']);
    Route::get('myadm/footer-widget-one-mannage/stetus/{changesteus}/{id}', [AdminHomeControllerController::class, 'footer_widget_one_mannage_status']);
    Route::post('myadm/footer_widget_one_delete/Delete', [AdminHomeControllerController::class, 'footer_widget_one_delete']);



















    Route::post('myadm/Section-one/mannage/save', [AdminHomeControllerController::class, 'mannage_process']);
    Route::post('myadm/Section-one/Delete', [AdminHomeControllerController::class, 'Delete']);
    Route::get('myadm/Section-one/stetus/{currentstetus}/{id}', [AdminHomeControllerController::class, 'stetus']);
    Route::get('myadm/pages', [pagecontroller::class, 'viewallpages']);
    Route::post('myadm/pages/Delete', [pagecontroller::class, 'delete_page']);
    Route::get('myadm/Model-Box', [ModelboxController::class, 'Model_box']);

    Route::post('myadm/Model-Box/save', [ModelboxController::class, 'model_box_mannege']);
    Route::get('myadm/school-management-Section', [SchoolManagementController::class, 'management_data_table']);
    Route::get('myadm/school-management-Section/manage', [SchoolManagementController::class, 'school_management']);
    Route::get('myadm/school-management-Section/manage/edit/{id}', [SchoolManagementController::class, 'school_management']);
    Route::post('myadm/school-management-Section/manage/save', [SchoolManagementController::class, 'process_school_mannagement']);
    Route::post('myadm/school-management-Section/Delete', [SchoolManagementController::class, 'Delete']);
    Route::get('myadm/school-management-Section/stetus/{currentstetus}/{id}', [SchoolManagementController::class, 'stetus']);


    Route::get('myadm/toppers-section', [TopperController::class, 'toppers_section']);
    Route::get('myadm/addtitle', [TopperController::class, 'addtitle']);
    Route::post('myadm/addtitle/save', [TopperController::class, 'addtitle_process']);
    Route::get('myadm/manage-toppers', [TopperController::class, 'manage_toppers']);
    Route::post('myadm/school-toppers-Section/manage/save', [TopperController::class, 'process_school_topers']);
    Route::post('myadm/school-toppers-Section/Delete', [TopperController::class, 'Delete']);
    Route::get('myadm/school-toppers-Section/manage/edit/{id}', [TopperController::class, 'manage_toppers']);
    Route::get('myadm/school-toppers-Section/stetus/{currentstetus}/{id}', [TopperController::class, 'stetus']);



    Route::get('myadm/footer-address', [AddresController::class, 'footer_address']);
    Route::get('myadm/footer-address/mannage-footer-address', [AddresController::class, 'mannage_footer_address']);
    Route::get('myadm/footer-address/mannage-footer-address/{id}', [AddresController::class, 'mannage_footer_address']);
    Route::post('myadm/mannage_footer_address_process', [AddresController::class, 'mannage_footer_address_process']);
    Route::post('myadm/footer-address/detete_table', [AddresController::class, 'detete_table_tr']);











    Route::get('myadm/part_one', [ProductController::class, 'part_one']);
    Route::get('myadm/mannage_Product_partone', [ProductController::class, 'mannage_Product_partone']);
    Route::get('myadm/mannage_Product_partone/{id}', [ProductController::class, 'mannage_Product_partone']);
    Route::post('myadm/mannage_Product_partone/save', [ProductController::class, 'mannage_part_one_process']);
    Route::post('myadm/part_one/Delete', [ProductController::class, 'Delete']);
    Route::get('myadm/product/banner_section', [ProductController::class, 'banner_section']);
    Route::get('myadm/mannage_product_banner', [ProductController::class, 'mannage_product_banner']);
    Route::get('myadm/mannage_product_banner/{id}', [ProductController::class, 'mannage_product_banner']);
    Route::get('myadm/mannage_product_banner/stetus/{changesteus}/{id}', [ProductController::class, 'stetus']);
    Route::post('myadm/mannage_product_banner/delete', [ProductController::class, 'delete_banner']);
    Route::post('/myadm/mannage_banner_product/procss', [ProductController::class, 'process_banner_product']);
    Route::get('myadm/mannage_Product_partone/stetus/{currentstetus}/{id}', [ProductController::class, 'stetus_part_one']);
    Route::get('myadm/part_three', [ProductController::class, 'part_three']);
    Route::get('myadm/mannage_features_image_n_title', [ProductController::class, 'mannage_features_image_n_title']);
    Route::get('myadm/mannage_features_image_n_title/{id}', [ProductController::class, 'mannage_features_image_n_title']);
    Route::post('myadm/mannage_features_image_n_title/procss', [ProductController::class, 'mannage_features_image_n_title_process']);
    Route::get('myadm/mannage_features_image_n_title/stetus/{changesteus}/{id}', [ProductController::class, 'mannage_features_image_n_title_stetus']);
    Route::post('myadm/mannage_features_image_n_title_delete/Delete', [ProductController::class, 'mannage_features_image_n_title_delete']);
    Route::get('myadm/part_three/stetus/{currentstetus}/{id}', [ProductController::class, 'part_three_status']);
    Route::get('myadm/mannage_features', [ProductController::class, 'mannage_features']);
    Route::get('myadm/mannage_features/{id}', [ProductController::class, 'mannage_features']);
    Route::post('myadm/mannage_features/procss', [ProductController::class, 'mannage_features_process']);
    Route::post('myadm/part_three_kay_f/Delete', [ProductController::class, 'Delete_kay_fetature']);
    Route::get('myadm/part_two', [ProductController::class, 'part_two']);
    Route::get('myadm/mannage_part_two_title', [ProductController::class, 'mannage_part_two_title']);
    Route::get('myadm/mannage_part_two_title/{id}', [ProductController::class, 'mannage_part_two_title']);
    Route::post('myadm/mannage_part_two_title_process', [ProductController::class, 'mannage_part_two_title_process']);
    Route::get('myadm/mannage_part_two_title/stetus/{currentstetus}/{id}', [ProductController::class, 'part_two_status']);
    Route::post('myadm/mannage_part_two_title/Delete', [ProductController::class, 'mannage_part_two_title_delete']);
    Route::get('myadm/mannage_part_two_content', [ProductController::class, 'mannage_part_two_content']);
    Route::get('myadm/mannage_part_two_content/{id}', [ProductController::class, 'mannage_part_two_content']);
    Route::post('/myadm/mannage_part_two_content/save', [ProductController::class, 'mannage_part_two_content_process']);
    Route::get('myadm/mannage_part_two_content/stetus/{currentstetus}/{id}', [ProductController::class, 'mannage_part_two_content_ststus']);
    Route::post('myadm/mannage_part_two_content/Delete', [ProductController::class, 'mannage_part_two_content_delete']);








    Route::get('myadm/theme', [ThemeController::class, 'theme']);
    Route::post('myadm/theme/save', [ThemeController::class, 'theme_process']);





    Route::get('myadm/addevents', [EventController::class, 'addevents']);
    Route::get('myadm/addevent/mannagevent', [EventController::class, 'manageevents']);
    Route::get('myadm/addevent/mannagevent/edit/{id}', [EventController::class, 'manageevents']);
    Route::post('myadm/addevent/mannagevent/delete', [EventController::class, 'delete_img']);
    Route::post('myadm/addevents/detete_table', [EventController::class, 'detete_table_tr']);
    Route::post('myadm/addevents/detete_table', [EventController::class, 'detete_table_tr']);
    Route::post('myadm/addevents/stetus/{now}', [EventController::class, 'stetus']);
    Route::post('myadm/addevent/mannagevent/save', [EventController::class, 'process_evenmt_data']);
    Route::get('myadm/Footer-controller', [FooterController::class, 'category']);
    Route::get('myadm/Footer-controller/mannagecategory', [FooterController::class, 'mannagecategory']);
    Route::get('myadm/Footer-controller/mannagecategory/{id}', [FooterController::class, 'mannagecategory']);
    Route::post('myadm/Footer-controller/mannagecategory/save', [FooterController::class, 'process_data']);
    Route::get('myadm/Footer-controller/configfooter', [FooterController::class, 'mannagefooterlinks']);
    Route::post('myadm/Footer-controller/configfooter/save', [FooterController::class, 'process_data_footrlinks']);
    Route::post('myadm/arrange-footer/data', [FooterController::class, 'arrange_configfooter_save']);
    Route::post('myadm/Footer-controller/delete', [FooterController::class, 'delete_cat']);
    Route::post('myadm/Footer-controller/configfooter/delete', [FooterController::class, 'configfooter_del']);



    Route::get('myadm/modules', [ModuleController::class, 'modules']);
    Route::get('myadm/mannage_module', [ModuleController::class, 'mannage_module']);
    Route::get('myadm/mannage_module/{id}', [ModuleController::class, 'mannage_module']);

    Route::post('myadm/mannage_module/save', [ModuleController::class, 'mannage_module_process']);
    Route::get('myadm/mannage_module/stetus/{now}/{id}', [ModuleController::class, 'stetus']);
    Route::post('myadm/modules/Delete', [ModuleController::class, 'modules_delete']);
    Route::get('myadm/module_config', [ModuleController::class, 'module_config']);
    Route::get('myadm/config_module_mannage', [ModuleController::class, 'config_module_mannage']);
    Route::get('myadm/config_module_mannage/{id}', [ModuleController::class, 'config_module_mannage']);

    Route::post('myadm/config_module_mannage_form_data/save', [ModuleController::class, 'config_module_mannage_form_data_process']);
    Route::get('myadm/config_module_mannage/stetus/{now}/{id}', [ModuleController::class, 'stetus_cong']);
    Route::post('myadm/module_config/Delete', [ModuleController::class, 'config_modules_delete']);








    Route::get('Logout', function () {
        session()->forget(['USER_TYPE', 'USER_LOGIN', 'USER_NAME']);
        return redirect('myadm');
    });
});


Route::get('/', [FrondendController::class, 'home']);

Route::get('/{menu}', [FrondendController::class, 'pages']);

Route::get('news/{id}/{currentnews}', [FrondendController::class, 'single_news_view']);

Route::get('gallery/{slug}/{id}', [FrondendController::class, 'view_gallery_page']);

Route::get('modules/all', [FrondendController::class, 'modules_page']);



Route::get('events/{id}/{eventname}', [FrondendController::class, 'single_event_view']);
Route::post('Contact-Us/send', [FrondendController::class, 'send_details']);

Route::post('school_enquery_form/send', [FrondendController::class, 'school_enquery_form_email']);

Route::post('student_enquery/send', [FrondendController::class, 'student_enquery_email']);
Route::post('franchase_enquery/send', [FrondendController::class, 'franchase_enquery_email']);
