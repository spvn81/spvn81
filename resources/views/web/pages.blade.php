@extends('web.layout')


@section('container')


    @if (!empty($product[0]))
   


    @if(!empty($product_banner[0]))
        

        <div id="fws_617394a19b1cb" data-midnight="dark" data-bg-mobile-hidden=""
            class="wpb_row vc_row-fluid vc_row top-level full-width-section standard_section margin0"
            style="padding-top: 0px; padding-bottom: 0px; ">
            <div class="row-bg-wrap" data-bg-animation="none">
                <div class="inner-wrap">
                    <div class="row-bg using-bg-color" style="background-color:{{ $product_banner[0]->product_bg_color }}; ">
                    </div>
                </div>
                <div class="row-bg-overlay">
                </div>
            </div>
            <div class="nectar-shape-divider-wrap " style=" height:300px;" data-front="" data-style="straight_section"
                data-position="bottom">
                <svg class="nectar-shape-divider" fill="#ebebeb" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10"
                    preserveAspectRatio="none">
                    <polygon points="104 10, 104 0, 0 0, 0 10">
                </svg>
            </div>
            <div class="col span_12 dark left">
                <div class="vc_col-sm-12 wpb_column column_container vc_column_container col padding-2-percent"
                    data-t-w-inherits="default" data-border-radius="none" data-shadow="none" data-border-animation=""
                    data-border-animation-delay="" data-border-width="none" data-border-style="solid" data-border-color=""
                    data-bg-cover="" data-padding-pos="all" data-has-bg-color="false" data-bg-color="" data-bg-opacity="1"
                    data-hover-bg="" data-hover-bg-opacity="1" data-animation="" data-delay="0">
                    <div class="column-bg-overlay"></div>
                    <div class="vc_column-inner">
                        <div class="wpb_wrapper">

                            <div class="wpb_text_column wpb_content_element  vc_custom_1594107342128">
                                <div class="wpb_wrapper">
                                    {!! $product_banner[0]->title !!}
                                </div>
                            </div>



                            <div class="img-with-aniamtion-wrap center" data-max-width="100%" data-border-radius="none">
                                <div class="inner">
                                    <img class="img-with-animation skip-lazy " data-shadow="none"
                                        data-shadow-direction="middle" data-delay="0" height="611" width="1097"
                                        data-animation="grow-in" src="{{ url('storage/media/'.$product_banner[0]->product_bg) }}"
                                        alt="{{ $product_banner[0]->title }}"
                                        srcset="{{ url('storage/media/'.$product_banner[0]->product_bg) }} 1097w, {{ url('storage/media/'.$product_banner[0]->product_bg) }} 300w, {{ url('storage/media/'.$product_banner[0]->product_bg) }} 1024w, {{ url('storage/media/'.$product_banner[0]->product_bg) }} 768w"
                                        sizes="100vw" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif



        @foreach ($product as $product_data)

            @if ($product_data->alignment == 'right')


                <div id="fws_617394a19c73c" data-midnight="dark" data-bg-mobile-hidden=""
                    class="wpb_row vc_row-fluid vc_row full-width-section standard_section "
                    style="padding-top: 0px; padding-bottom: 0px; ">
                    <div class="row-bg-wrap" data-bg-animation="none">
                        <div class="inner-wrap">
                            <div class="row-bg" style=""></div>
                        </div>
                        <div class="row-bg-overlay"></div>
                    </div>
                    <div class="col span_12 dark left">
                        <div class="vc_col-sm-12 wpb_column column_container vc_column_container col padding-2-percent"
                            data-t-w-inherits="default" data-border-radius="none" data-shadow="none"
                            data-border-animation="" data-border-animation-delay="" data-border-width="none"
                            data-border-style="solid" data-border-color="" data-bg-cover="" data-padding-pos="all"
                            data-has-bg-color="false" data-bg-color="" data-bg-opacity="1" data-hover-bg=""
                            data-hover-bg-opacity="1" data-animation="" data-delay="0">
                            <div class="column-bg-overlay"></div>
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">

                                    <div class="wpb_text_column wpb_content_element ">
                                        <div class="wpb_wrapper">

                                            <div class="row-bg-wrap" data-bg-animation="none">

                                                {!! $product_data->part_one_title !!}
                                            </div>

                                        </div>
                                    </div>



                                    <div id="fws_617394a19cec2" data-midnight="" data-column-margin="default"
                                        data-bg-mobile-hidden=""
                                        class="wpb_row vc_row-fluid vc_row inner_row standard_section    "
                                        style="padding-top: 5%; padding-bottom: 0px; ">
                                        <div class="row-bg-wrap">
                                            <div class="row-bg   " style=""></div>
                                        </div>
                                        <div class="col span_12  left">
                                            <div class="vc_col-sm-6 wpb_column column_container vc_column_container col no-extra-padding"
                                                data-t-w-inherits="default" data-shadow="none" data-border-radius="none"
                                                data-border-animation="" data-border-animation-delay=""
                                                data-border-width="none" data-border-style="solid" data-border-color=""
                                                data-bg-cover="" data-padding-pos="all" data-has-bg-color="false"
                                                data-bg-color="" data-bg-opacity="1" data-hover-bg=""
                                                data-hover-bg-opacity="1" data-animation="" data-delay="0">
                                                <div class="column-bg-overlay"></div>
                                                <div class="vc_column-inner">
                                                    <div class="wpb_wrapper">
                                                        <div
                                                            class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_fadeInLeft fadeInLeft vc_custom_1594107524264">
                                                            <div class="wpb_wrapper">
                                                                <div
                                                                    class="wpb_text_column wpb_content_element wpb_animate_when_almost_visible wpb_fadeInLeft fadeInLeft vc_custom_1590911931609 animated wpb_start_animation">
                                                                    <div class="wpb_wrapper">
                                                                        {!! $product_data->part_one_description !!}

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        @if (!empty($product_data->link))

                                                            <a class="nectar-button small see-through-2  has-icon" style=""
                                                                href="{{ $product_data->link }}"
                                                                data-color-override="false"
                                                                data-hover-color-override="false"
                                                                data-hover-text-color-override="#ffffff">
                                                                <span
                                                                    style="text-transform: uppercase">{{ $product_data->link_display_text }}</span>
                                                                <i class="icon-button-arrow"></i></a>
                                                        @endif


                                                    </div>
                                                </div>
                                            </div>

                                            <div class="vc_col-sm-6 wpb_column column_container vc_column_container col no-extra-padding"
                                                data-t-w-inherits="default" data-shadow="none" data-border-radius="none"
                                                data-border-animation="" data-border-animation-delay=""
                                                data-border-width="none" data-border-style="solid" data-border-color=""
                                                data-bg-cover="" data-padding-pos="all" data-has-bg-color="false"
                                                data-bg-color="" data-bg-opacity="1" data-hover-bg=""
                                                data-hover-bg-opacity="1" data-animation="" data-delay="0">
                                                <div class="column-bg-overlay"></div>
                                                <div class="vc_column-inner">
                                                    <div class="wpb_wrapper">
                                                        <div class="img-with-aniamtion-wrap " data-max-width="100%"
                                                            data-border-radius="none">
                                                            <div class="inner">
                                                                <img class="img-with-animation skip-lazy "
                                                                    data-shadow="medium_depth"
                                                                    data-shadow-direction="middle" data-delay="0"
                                                                    height="1708" width="2560"
                                                                    data-animation="fade-in-from-right"
                                                                    src="{{ url('storage/media/' . $product_data->product_image) }}"
                                                                    alt=""
                                                                    srcset="{{ url('storage/media/' . $product_data->product_image) }} 2560w, {{ url('storage/media/' . $product_data->product_image) }} 300w, {{ url('storage/media/' . $product_data->product_image) }} 1024w, {{ url('storage/media/' . $product_data->product_image) }} 768w, {{ url('storage/media/' . $product_data->product_image) }} 1536w, {{ url('storage/media/' . $product_data->product_image) }} 2048w, {{ url('storage/media/' . $product_data->product_image) }} 900w"
                                                                    sizes="100vw" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif






            @if ($product_data->alignment == 'left')



                <div id="fws_617394a19e31f" data-midnight="dark" data-bg-mobile-hidden=""
                    class="wpb_row vc_row-fluid vc_row full-width-section standard_section "
                    style="padding-top: 0px; padding-bottom: 0px; ">
                    <div class="row-bg-wrap" data-bg-animation="none">
                        <div class="inner-wrap">
                            <div class="row-bg" style=""></div>
                        </div>
                        <div class="row-bg-overlay"></div>
                    </div>
                    <div class="col span_12 dark left">
                        <div class="vc_col-sm-12 wpb_column column_container vc_column_container col padding-2-percent"
                            data-t-w-inherits="default" data-border-radius="none" data-shadow="none"
                            data-border-animation="" data-border-animation-delay="" data-border-width="none"
                            data-border-style="solid" data-border-color="" data-bg-cover="" data-padding-pos="all"
                            data-has-bg-color="false" data-bg-color="" data-bg-opacity="1" data-hover-bg=""
                            data-hover-bg-opacity="1" data-animation="" data-delay="0">
                            <div class="column-bg-overlay"></div>
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">

                                    <div class="wpb_text_column wpb_content_element ">
                                        <div class="wpb_wrapper">
                                            {!! $product_data->part_one_title !!}

                                        </div>
                                    </div>



                                    <div id="fws_617394a19e83d" data-midnight="" data-column-margin="default"
                                        data-bg-mobile-hidden=""
                                        class="wpb_row vc_row-fluid vc_row inner_row standard_section    "
                                        style="padding-top: 5%; padding-bottom: 0px; ">
                                        <div class="row-bg-wrap">
                                            <div class="row-bg   " style=""></div>
                                        </div>
                                        <div class="col span_12  left">
                                            <div class="vc_col-sm-8 wpb_column column_container vc_column_container col no-extra-padding"
                                                data-t-w-inherits="default" data-shadow="none" data-border-radius="none"
                                                data-border-animation="" data-border-animation-delay=""
                                                data-border-width="none" data-border-style="solid" data-border-color=""
                                                data-bg-cover="" data-padding-pos="all" data-has-bg-color="false"
                                                data-bg-color="" data-bg-opacity="1" data-hover-bg=""
                                                data-hover-bg-opacity="1" data-animation="" data-delay="0">
                                                <div class="column-bg-overlay"></div>
                                                <div class="vc_column-inner">
                                                    <div class="wpb_wrapper">
                                                        <div class="img-with-aniamtion-wrap " data-max-width="100%"
                                                            data-border-radius="none">
                                                            <div class="inner">
                                                                <img class="img-with-animation skip-lazy "
                                                                    data-shadow="medium_depth"
                                                                    data-shadow-direction="middle" data-delay="0"
                                                                    height="1708" width="2560"
                                                                    data-animation="fade-in-from-right"
                                                                    src="{{ url('storage/media/' . $product_data->product_image) }}"
                                                                    alt=""
                                                                    srcset="{{ url('storage/media/' . $product_data->product_image) }} 2560w, {{ url('storage/media/' . $product_data->product_image) }} 300w, {{ url('storage/media/' . $product_data->product_image) }} 1024w, {{ url('storage/media/' . $product_data->product_image) }} 768w, {{ url('storage/media/' . $product_data->product_image) }} 1536w, {{ url('storage/media/' . $product_data->product_image) }} 2048w, {{ url('storage/media/' . $product_data->product_image) }} 900w"
                                                                    sizes="100vw" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="vc_col-sm-4 wpb_column column_container vc_column_container col no-extra-padding"
                                                data-t-w-inherits="default" data-shadow="none" data-border-radius="none"
                                                data-border-animation="" data-border-animation-delay=""
                                                data-border-width="none" data-border-style="solid" data-border-color=""
                                                data-bg-cover="" data-padding-pos="all" data-has-bg-color="false"
                                                data-bg-color="" data-bg-opacity="1" data-hover-bg=""
                                                data-hover-bg-opacity="1" data-animation="" data-delay="0">
                                                <div class="column-bg-overlay"></div>
                                                <div class="vc_column-inner">
                                                    <div class="wpb_wrapper">

                                                        <div
                                                            class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_fadeInRight fadeInRight vc_custom_1594107621307">
                                                            <div class="wpb_wrapper">
                                                                {!! $product_data->part_one_description !!}

                                                            </div>
                                                        </div>







                                                        @if (!empty($product_data->link))

                                                            <a class="nectar-button small see-through-2  has-icon" style=""
                                                                href="{{ $product_data->link }}"
                                                                data-color-override="false"
                                                                data-hover-color-override="false"
                                                                data-hover-text-color-override="#ffffff">
                                                                <span
                                                                    style="text-transform: uppercase">{{ $product_data->link_display_text }}</span>
                                                                <i class="icon-button-arrow"></i></a>
                                                        @endif












                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        @endforeach
    @endif



@if(!empty($modules[0]))






<div id="fws_6173949fd61da" data-midnight="dark" data-top-percent="5%" data-bottom-percent="1%" data-bg-mobile-hidden=""
class="wpb_row vc_row-fluid vc_row top-level full-width-section standard_section "
style="padding-top: calc(100vw * 0.05); padding-bottom: calc(100vw * 0.01); ">
<div class="row-bg-wrap" data-bg-animation="none">
    <div class="inner-wrap">
        <div class="row-bg using-bg-color" style="background-color: #ffffff; "></div>
    </div>
    <div class="row-bg-overlay"></div>
</div>
<div class="col span_12 dark left">
    <div class="vc_col-sm-12 wpb_column column_container vc_column_container col no-extra-padding"
        data-t-w-inherits="default" data-border-radius="none" data-shadow="none" data-border-animation=""
        data-border-animation-delay="" data-border-width="none" data-border-style="solid" data-border-color=""
        data-bg-cover="" data-padding-pos="all" data-has-bg-color="false" data-bg-color="" data-bg-opacity="1"
        data-hover-bg="" data-hover-bg-opacity="1" data-animation="" data-delay="0">
        <div class="column-bg-overlay"></div>
        <div class="vc_column-inner">


            <div class="wpb_wrapper">
   


                <div id="fws_6173949fd7575" data-midnight="" data-column-margin="default" data-bg-mobile-hidden=""
                    class="wpb_row vc_row-fluid vc_row inner_row standard_section    "
                    style="padding-top: 0px; padding-bottom: 0px; ">
                    <div class="row-bg-wrap">
                        <div class="row-bg" style=""></div>
                    </div>
                    <div class="col span_12  left">
                        <div class="vc_col-sm-2 wpb_column column_container vc_column_container col no-extra-padding"
                            data-t-w-inherits="default" data-shadow="none" data-border-radius="none"
                            data-border-animation="" data-border-animation-delay="" data-border-width="none"
                            data-border-style="solid" data-border-color="" data-bg-cover="" data-padding-pos="all"
                            data-has-bg-color="false" data-bg-color="" data-bg-opacity="1" data-hover-bg=""
                            data-hover-bg-opacity="1" data-animation="" data-delay="0">
                            <div class="column-bg-overlay"></div>
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">

                                </div>
                            </div>
                        </div>

                        <div class="vc_col-sm-8 wpb_column column_container vc_column_container col has-animation no-extra-padding"
                            data-t-w-inherits="default" data-shadow="none" data-border-radius="none"
                            data-border-animation="" data-border-animation-delay="" data-border-width="none"
                            data-border-style="solid" data-border-color="" data-bg-cover="" data-padding-pos="all"
                            data-has-bg-color="false" data-bg-color="" data-bg-opacity="1" data-hover-bg=""
                            data-hover-bg-opacity="1" data-animation="fade-in-from-bottom" data-delay="50">
                            <div class="column-bg-overlay"></div>
                            <div class="vc_column-inner">


                                <div class="wpb_wrapper">


                                    <p style="color: rgba(10,10,10,0.65);text-align: center"
                                        class="vc_custom_heading"><a href="../index.html"
                                            title="School Management Software">Edmatix is the most comprehensive
                                            &amp; powerful School Management Software that streamlines all aspects
                                            of school/college management right from enrolment to graduation in one
                                            single database, skipping every manual and obsolete process youve been
                                            struggling with. Check out all our cool features, that make life easier
                                            for you and your customers.</a></p>
                                            















                                            
                                    <div class="divider-wrap" data-alignment="center">
                                        <div style="margin-top: 12px; width: 20%px; height: 1px; margin-bottom: 12px;"
                                            data-width="20%" data-animate="yes" data-animation-delay=""
                                            data-color="extra-color-1" class="divider-small-border"></div>
                                    </div>



                                </div>


                            </div>
                        </div>



                        <div class="vc_col-sm-2 wpb_column column_container vc_column_container col no-extra-padding"
                            data-t-w-inherits="default" data-shadow="none" data-border-radius="none"
                            data-border-animation="" data-border-animation-delay="" data-border-width="none"
                            data-border-style="solid" data-border-color="" data-bg-cover="" data-padding-pos="all"
                            data-has-bg-color="false" data-bg-color="" data-bg-opacity="1" data-hover-bg=""
                            data-hover-bg-opacity="1" data-animation="" data-delay="0">
                            <div class="column-bg-overlay"></div>
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div  data-column-margin="default" data-bg-mobile-hidden=""
                    class="wpb_row vc_row-fluid vc_row inner_row standard_section"
                    style="padding-top: 20px; padding-bottom: 0px; ">
                    <div class="row-bg-wrap">
                        <div class="row-bg" style=""></div>
                    </div>


                    @for ($i = 1; $i <= $total_pages; $i++)


                        <div class="row">

                            @foreach ($modules_Limit[$i] as $modules_Limit_of_data)
                                <div class="vc_col-sm-4 wpb_column column_container vc_column_container col centered-text has-animation padding-3-percent"
                                    data-t-w-inherits="default" data-shadow="small_depth" data-border-radius="15px"
                                    data-border-animation="" data-border-animation-delay="" data-border-width="none"
                                    data-border-style="solid" data-border-color="" data-bg-cover=""
                                    data-padding-pos="all" data-has-bg-color="false" data-bg-color=""
                                    data-bg-opacity="1" data-hover-bg="" data-hover-bg-opacity="1"
                                    data-animation="fade-in-from-bottom" data-delay="0">
                                    <div class="column-bg-overlay"></div>
                                    <div class="vc_column-inner">
                                        <div class="wpb_wrapper">
                                            <div class="img-with-aniamtion-wrap center" data-max-width="100%"
                                                data-border-radius="none">
                                                <div class="inner">
                                                    <img class="img-with-animation skip-lazy " data-shadow="none"
                                                        data-shadow-direction="middle" data-delay="0" height="58"
                                                        width="63" data-animation="fade-in"
                                                        src="{{ url('storage/media/' . $modules_Limit_of_data->home_img) }}"
                                                        alt="{{ $modules_Limit_of_data->title }}"
                                                        style="margin-bottom: 20px; margin-top: 20px; " />
                                                </div>
                                            </div>
                                            <div
                                                class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_fadeInUp fadeInUp vc_custom_1600948572337">
                                                <div class="wpb_wrapper">
                                                    <h4>{{ $modules_Limit_of_data->title }}</h4>
                                                </div>
                                            </div>



                                            <div class="nectar-fancy-ul" data-list-icon="icon-ok"
                                                data-animation="true" data-animation-delay="0"
                                                data-color="accent-color" data-alignment="left">
                                                <ul style="text-align: left;">
                                                    @if(!empty($module_features[$modules_Limit_of_data->id]))
                                                        
                                                    @foreach ($module_features[$modules_Limit_of_data->id] as $module_features_data)

                                                        <li>{!! $module_features_data->feature !!}</li>


                                                    @endforeach
                                                    @endif


                                                </ul>
                                            </div>

                                            <div class="nectar-cta learn-more" data-style="material"
                                                data-alignment="center" data-text-color="custom"
                                                style="margin-top: 10px; ">
                                                <h5> <span class="text"> </span><span
                                                        class="link_wrap" style="color: #37b5de;"><a
                                                            class="link_text"
                                                            href="../academic/index.html">Learn More<span
                                                                class="circle"
                                                                style="background-color: #37b5de;"></span><span
                                                                class="arrow"></span></a></span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>

                    @endfor

                </div>
            </div>
        </div>
    </div>
</div>
</div>





@endif

@endsection
