
$("#mannagement_school_form_data").submit(function (e) {
    e.preventDefault();
    var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
        <div class="overlay-wrapper">
          <div class="overlay">
              <i class="fas fa-3x fa-sync-alt fa-spin"></i>
              <div class="text-bold pt-2">Loading...</div></div>
        </div>
      </div>`;
    $(".pagloader").html(pageloader)

    var mannagement = new FormData($(this)[0])
    $.ajax({
        type: "post",
        Headers: {
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        },
        url: '/myadm/school-management-Section/manage/save',
        data: mannagement,
        success: function (data) {
            $(".pagloader").html(' ')
            if (data.sucess) {
                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'site details',
                    body: data.sucess + ' successful'
                })
                window.location = '/myadm/school-management-Section'
            } else {
                if (data.errors) {
                    $.each(data, function (errorkay, errorval) {
                        $.each(errorval, function (k, v) {

                            $(document).Toasts('create', {
                                class: 'bg-danger',
                                title: 'School management',
                                body: v
                            })


                        })

                    })
                }
            }

        },
        contentType: false,
        processData: false,
        cache: false,

    });

})





function school_management_delete(id) {
    var con = confirm("Are you sure want to delete ?");
    if (con == true) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/myadm/school-management-Section/Delete',
            data: 'id=' + id,
            success: function (data) {
                if (data.sucess == 'deleted') {
                    $('table#management_school tr#' + id).remove();


                }
            }

        })



    }

}


CKEDITOR.replace('title_toppers')




$("#toppers_title_msg_submit").submit(function (e) {
    e.preventDefault();
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
    <div class="overlay-wrapper">
      <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          <div class="text-bold pt-2">Loading...</div></div>
    </div>
  </div>`;
    $(".pagloader").html(pageloader)

    var news_toppers_title = new FormData($(this)[0])
    $.ajax({
        type: "post",
        Headers: {
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        },
        url: '/myadm/addtitle/save',
        data: news_toppers_title,
        success: function (data) {
            $(".pagloader").html(' ')
            if (data.stetus == 'updated') {
                location.reload()
            }

            if (data.sucess) {
                $('#menuidnews').val('');

                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Menu data',
                    body: data.sucess + ' successful'
                })
            } else {
                if (data.errors) {
                    $.each(data, function (errorkay, errorval) {
                        $.each(errorval, function (k, v) {

                            $(document).Toasts('create', {
                                class: 'bg-danger',
                                title: 'Menu data',
                                body: v
                            })


                        })

                    })
                }
            }

        },
        contentType: false,
        processData: false,
        cache: false,

    });

})




$("#toppers_school_form_data").submit(function (e) {
    e.preventDefault();
    var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
    <div class="overlay-wrapper">
      <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          <div class="text-bold pt-2">Loading...</div></div>
    </div>
  </div>`;
    $(".pagloader").html(pageloader)

    var mannagement = new FormData($(this)[0])
    $.ajax({
        type: "post",
        Headers: {
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        },
        url: '/myadm/school-toppers-Section/manage/save',
        data: mannagement,
        success: function (data) {
            $(".pagloader").html(' ')
            if (data.sucess) {
                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'site details',
                    body: data.sucess + ' successful'
                })
                window.location = '/myadm/toppers-section'
            } else {
                if (data.errors) {
                    $.each(data, function (errorkay, errorval) {
                        $.each(errorval, function (k, v) {

                            $(document).Toasts('create', {
                                class: 'bg-danger',
                                title: 'School management',
                                body: v
                            })


                        })

                    })
                }
            }

        },
        contentType: false,
        processData: false,
        cache: false,

    });

})





function school_toppers_delete(id) {
    var con = confirm("Are you sure want to delete ?");
    if (con == true) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/myadm/school-toppers-Section/Delete',
            data: 'id=' + id,
            success: function (data) {
                if (data.sucess == 'deleted') {
                    $('table#toppers_table tr#' + id).remove();


                }
            }

        })



    }

}








$("#mannage_part_one_data").submit(function (e) {
    e.preventDefault();
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
    <div class="overlay-wrapper">
      <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          <div class="text-bold pt-2">Loading...</div></div>
    </div>
  </div>`;
    $(".pagloader").html(pageloader)

    var news_toppers_title = new FormData($(this)[0])
    $.ajax({
        type: "post",
        Headers: {
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        },
        url: '/myadm/mannage_Product_partone/save',
        data: news_toppers_title,
        success: function (data) {
            $(".pagloader").html(' ')
            if (data.stetus == 'updated') {
                location.reload()
            }

            if (data.sucess) {
                $('#menuidnews').val('');

                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Menu data',
                    body: data.sucess + ' successful'
                })
            } else {
                if (data.errors) {
                    $.each(data, function (errorkay, errorval) {
                        $.each(errorval, function (k, v) {

                            $(document).Toasts('create', {
                                class: 'bg-danger',
                                title: 'Menu data',
                                body: v
                            })


                        })

                    })
                }
            }

        },
        contentType: false,
        processData: false,
        cache: false,

    });

})





function part_one_delete(id) {
    var con = confirm("Are you sure want to delete ?");
    if (con == true) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/myadm/part_one/Delete',
            data: 'id=' + id,
            success: function (data) {
                if (data.sucess == 'deleted') {
                    $('table#part_one_table tr#' + id).remove();


                }
            }

        })



    }

}






$("#mannage_product_banners_form_data").submit(function (e) {
    e.preventDefault();

    var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
    <div class="overlay-wrapper">
      <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          <div class="text-bold pt-2">Loading...</div></div>
    </div>
  </div>`;
    $(".pagloader").html(pageloader)

    var mannage_bannder_form_data = new FormData($(this)[0])
    $.ajax({
        type: "post",
        Headers: {
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        },
        url: '/myadm/mannage_banner_product/procss',
        data: mannage_bannder_form_data,
        success: function (data) {
            $(".pagloader").html(' ')
            if (data.errors) {
                $.each(data, function (errorkay, errorval) {
                    $.each(errorval, function (k, v) {

                        $(document).Toasts('create', {
                            class: 'bg-danger',
                            title: 'banner data',
                            body: v
                        })


                    })

                })
            }


            else {
                $("#menu_slugerr").html('')
                $("#menuerr").html('')
                $("#errorval_bannder_image").html('')
                $("#menutypeerr").html('')
                var sucess = data.sucess;

                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'banner data',
                    body: 'data update success'
                })

                $("#banner_image_prew").html(' ')
                var url = "{{url('storage/media/')}}";
                var bannerimg = `<img src="` + url + `/` + data.sucess.banner_image + `" width="150" >`;
                $("#banner_image_prew").html(bannerimg)



                $("#background_img_prwe").html(' ')
                var url = "{{url('storage/media/')}}";
                var background = `<img src="` + url + `/` + data.sucess.background_img + `" width="150" >`;
                $("#background_img_prwe").html(background)


            }
        },
        contentType: false,
        processData: false,
        cache: false,

    });

})












$("#mannage_features_image_n_title_form_data").submit(function (e) {
    e.preventDefault();

    var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
    <div class="overlay-wrapper">
      <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          <div class="text-bold pt-2">Loading...</div></div>
    </div>
  </div>`;
    $(".pagloader").html(pageloader)

    var mannage_bannder_form_data = new FormData($(this)[0])
    $.ajax({
        type: "post",
        Headers: {
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        },
        url: '/myadm/mannage_features_image_n_title/procss',
        data: mannage_bannder_form_data,
        success: function (data) {
            $(".pagloader").html(' ')
            if (data.errors) {
                $.each(data, function (errorkay, errorval) {
                    $.each(errorval, function (k, v) {

                        $(document).Toasts('create', {
                            class: 'bg-danger',
                            title: 'banner data',
                            body: v
                        })


                    })

                })
            }


            else {
                $("#menu_slugerr").html('')
                $("#menuerr").html('')
                $("#errorval_bannder_image").html('')
                $("#menutypeerr").html('')
                var sucess = data.sucess;

                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'banner data',
                    body: 'data update success'
                })

                $("#banner_image_prew").html(' ')
                var url = "{{url('storage/media/')}}";
                var bannerimg = `<img src="` + url + `/` + data.sucess.banner_image + `" width="150" >`;
                $("#banner_image_prew").html(bannerimg)



                $("#background_img_prwe").html(' ')
                var url = "{{url('storage/media/')}}";
                var background = `<img src="` + url + `/` + data.sucess.background_img + `" width="150" >`;
                $("#background_img_prwe").html(background)


            }
        },
        contentType: false,
        processData: false,
        cache: false,

    });

})

















$("#mannage_features_form_data").submit(function (e) {
    e.preventDefault();

    var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
    <div class="overlay-wrapper">
      <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          <div class="text-bold pt-2">Loading...</div></div>
    </div>
  </div>`;
    $(".pagloader").html(pageloader)

    var mannage_bannder_form_data = new FormData($(this)[0])
    $.ajax({
        type: "post",
        Headers: {
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        },
        url: '/myadm/mannage_features/procss',
        data: mannage_bannder_form_data,
        success: function (data) {
            $(".pagloader").html(' ')
            if (data.errors) {
                $.each(data, function (errorkay, errorval) {
                    $.each(errorval, function (k, v) {

                        $(document).Toasts('create', {
                            class: 'bg-danger',
                            title: 'banner data',
                            body: v
                        })


                    })

                })
            }


            else {
                $("#menu_slugerr").html('')
                $("#menuerr").html('')
                $("#errorval_bannder_image").html('')
                $("#menutypeerr").html('')
                var sucess = data.sucess;

                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'banner data',
                    body: 'data update success'
                })

            }

            $('#mannage_features_form_data')[0].reset()


        },
        contentType: false,
        processData: false,
        cache: false,

    });

})






function part_three_delete_kay_feature(id) {
    var con = confirm("Are you sure want to delete ?");
    if (con == true) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/myadm/part_three_kay_f/Delete',
            data: 'inc_id=' + id,
            success: function (data) {
                if (data.sucess == 'deleted') {
                    $('table#part_three_kay_features_table tr#' + id).remove();


                }
            }

        })



    }

}










function mannage_features_image_n_title_delete(id) {
    var con = confirm("Are you sure want to delete ?");
    if (con == true) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/myadm/mannage_features_image_n_title_delete/Delete',
            data: 'inc_id=' + id,
            success: function (data) {
                if (data.sucess == 'deleted') {
                    $('table#part_one_table tr#' + id).remove();


                }
            }

        })



    }

}



$("#mannage_part_two_title_form_data").submit(function (e) {
    e.preventDefault();

    var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
    <div class="overlay-wrapper">
      <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          <div class="text-bold pt-2">Loading...</div></div>
    </div>
  </div>`;
    $(".pagloader").html(pageloader)

    var mannage_bannder_form_data = new FormData($(this)[0])
    $.ajax({
        type: "post",
        Headers: {
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        },
        url: '/myadm/mannage_part_two_title_process',
        data: mannage_bannder_form_data,
        success: function (data) {
            $('#mannage_part_two_title_form_data')[0].reset()
            $(".pagloader").html(' ')
            if (data.errors) {
                $.each(data, function (errorkay, errorval) {
                    $.each(errorval, function (k, v) {

                        $(document).Toasts('create', {
                            class: 'bg-danger',
                            title: 'banner data',
                            body: v
                        })


                    })

                })
            }


            else {

                var sucess = data.sucess;

                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'banner data',
                    body: 'data update success'
                })

            }
        },
        contentType: false,
        processData: false,
        cache: false,

    });

})





function mannage_part_two_title_delete(id) {
    var con = confirm("Are you sure want to delete ?");
    if (con == true) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/myadm/mannage_part_two_title/Delete',
            data: 'inc_id=' + id,
            success: function (data) {
                if (data.sucess == 'deleted') {
                    $('table#part_two_table tr#' + id).remove();


                }
            }

        })



    }

}








$("#mannage_part_two_content_form_data").submit(function (e) {
    e.preventDefault();
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
    <div class="overlay-wrapper">
      <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          <div class="text-bold pt-2">Loading...</div></div>
    </div>
  </div>`;
    $(".pagloader").html(pageloader)

    var news_toppers_title = new FormData($(this)[0])
    $.ajax({
        type: "post",
        Headers: {
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        },
        url: '/myadm/mannage_part_two_content/save',
        data: news_toppers_title,
        success: function (data) {
            $(".pagloader").html(' ')
            if (data.stetus == 'updated') {
                location.reload()
            }

            if (data.sucess) {

                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Menu data',
                    body: data.sucess + ' successful'
                })
            } else {
                if (data.errors) {
                    $.each(data, function (errorkay, errorval) {
                        $.each(errorval, function (k, v) {

                            $(document).Toasts('create', {
                                class: 'bg-danger',
                                title: 'Menu data',
                                body: v
                            })


                        })

                    })
                }
            }

        },
        contentType: false,
        processData: false,
        cache: false,

    });

})










function mannage_part_two_content_delete(id) {
    var con = confirm("Are you sure want to delete ?");
    if (con == true) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/myadm/mannage_part_two_content/Delete',
            data: 'inc_id=' + id,
            success: function (data) {
                if (data.sucess == 'deleted') {
                    $('table#mannage_part_two_content_table tr#' + id).remove();


                }
            }

        })



    }

}








$(document).ready(function () {
    $('#part_three_kay_features_table').DataTable();
    $('#part_one_table').DataTable();
    $('#part_two_table').DataTable();
    $('#mannage_part_two_content_table').DataTable();


});





$("#mannage_footer_address_form_data").submit(function (e) {
    e.preventDefault();

    var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
    <div class="overlay-wrapper">
      <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          <div class="text-bold pt-2">Loading...</div></div>
    </div>
  </div>`;
    $(".pagloader").html(pageloader)

    var mannage_bannder_form_data = new FormData($(this)[0])
    $.ajax({
        type: "post",
        Headers: {
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        },
        url: '/myadm/mannage_footer_address_process',
        data: mannage_bannder_form_data,
        success: function (data) {
            $('#mannage_footer_address_form_data')[0].reset()
            $(".pagloader").html(' ')
            if (data.errors) {
                $.each(data, function (errorkay, errorval) {
                    $.each(errorval, function (k, v) {

                        $(document).Toasts('create', {
                            class: 'bg-danger',
                            title: 'banner data',
                            body: v
                        })


                    })

                })
            }


            else {

                var sucess = data.sucess;

                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'banner data',
                    body: 'data update success'
                })

            }
        },
        contentType: false,
        processData: false,
        cache: false,

    });

})






$("#mannage_theme_section").submit(function (e) {
    e.preventDefault();
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
    <div class="overlay-wrapper">
      <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          <div class="text-bold pt-2">Loading...</div></div>
    </div>
  </div>`;
    $(".pagloader").html(pageloader)

    var mannage_home_form_data = new FormData($(this)[0])
    $.ajax({
        type: "post",
        Headers: {
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        },
        url: '/myadm/theme/save',
        data: mannage_home_form_data,
        success: function (data) {
            $(".pagloader").html(' ')


            if (data.errors) {

                var errors = data.errors;
                $.each(errors, function (kay, val) {

                    $(document).Toasts('create', {
                        class: 'bg-danger',
                        title: 'Theme',
                        body: val

                    })



                })

            } else {

                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Theme',
                    body: data.sucess
                })


            }

        },
        contentType: false,
        processData: false,
        cache: false,

    });

})











$("#mannage_module_form_data").submit(function (e) {
    e.preventDefault();

    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
    <div class="overlay-wrapper">
      <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          <div class="text-bold pt-2">Loading...</div></div>
    </div>
  </div>`;
    $(".pagloader").html(pageloader)

    var mannage_bannder_form_data = new FormData($(this)[0])
    $.ajax({
        type: "post",
        Headers: {
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        },
        url: '/myadm/mannage_module/save',
        data: mannage_bannder_form_data,
        success: function (data) {
            $(".pagloader").html(' ')
            if (data.errors) {
                $.each(data, function (errorkay, errorval) {
                    $.each(errorval, function (k, v) {

                        $(document).Toasts('create', {
                            class: 'bg-danger',
                            title: 'mannage module form',
                            body: v
                        })


                    })

                })
            }


            else {
                $("#menu_slugerr").html('')
                $("#menuerr").html('')
                $("#errorval_bannder_image").html('')
                $("#menutypeerr").html('')
                var sucess = data.sucess;

                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'mannage module form',
                    body: 'data update success'
                })

                $("#banner_image_prew").html(' ')
                var url = "{{url('storage/media/')}}";
                var bannerimg = `<img src="` + url + `/` + data.sucess.banner_image + `" width="150" >`;
                $("#banner_image_prew").html(bannerimg)



                $("#background_img_prwe").html(' ')
                var url = "{{url('storage/media/')}}";
                var background = `<img src="` + url + `/` + data.sucess.background_img + `" width="150" >`;
                $("#background_img_prwe").html(background)


            }
        },
        contentType: false,
        processData: false,
        cache: false,

    });

})



function mannage_module_delete(id) {
    var con = confirm("Are you sure want to delete ?");
    if (con == true) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/myadm/modules/Delete',
            data: 'id=' + id,
            success: function (data) {
                if (data.sucess == 'deleted') {
                    $('table#mannage_module_table tr#' + id).remove();


                }
            }

        })



    }

}















$("#config_module_mannage_form_data").submit(function (e) {
    e.preventDefault();

    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
    <div class="overlay-wrapper">
      <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          <div class="text-bold pt-2">Loading...</div></div>
    </div>
  </div>`;
    $(".pagloader").html(pageloader)

    var mannage_bannder_form_data = new FormData($(this)[0])
    $.ajax({
        type: "post",
        Headers: {
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        },
        url: '/myadm/config_module_mannage_form_data/save',
        data: mannage_bannder_form_data,
        success: function (data) {
            $(".pagloader").html(' ')
            if (data.errors) {
                $.each(data, function (errorkay, errorval) {
                    $.each(errorval, function (k, v) {

                        $(document).Toasts('create', {
                            class: 'bg-danger',
                            title: 'mannage module form',
                            body: v
                        })


                    })

                })
            }


            else {
                $("#menu_slugerr").html('')
                $("#menuerr").html('')
                $("#errorval_bannder_image").html('')
                $("#menutypeerr").html('')
                var sucess = data.sucess;

                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'mannage module form',
                    body: 'data update success'
                })

                $("#banner_image_prew").html(' ')
                var url = "{{url('storage/media/')}}";
                var bannerimg = `<img src="` + url + `/` + data.sucess.banner_image + `" width="150" >`;
                $("#banner_image_prew").html(bannerimg)



                $('#config_module_mannage_form_data')[0].reset()


            }
        },
        contentType: false,
        processData: false,
        cache: false,

    });

})



function module_config_delete(id) {
    var con = confirm("Are you sure want to delete ?");
    if (con == true) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/myadm/module_config/Delete',
            data: 'id=' + id,
            success: function (data) {
                if (data.sucess == 'deleted') {
                    $('table#mannage_module_table_config tr#' + id).remove();


                }
            }

        })



    }

}











// config_module_mannage_form_data




$("#home_product_link_mannage_form_data").submit(function (e) {
    e.preventDefault();

    


    var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
    <div class="overlay-wrapper">
      <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          <div class="text-bold pt-2">Loading...</div></div>
    </div>
  </div>`;
    $(".pagloader").html(pageloader)

    var mannage_bannder_form_data = new FormData($(this)[0])
    $.ajax({
        type: "post",
        Headers: {
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        },
        url: '/myadm/home-product-link-mannage/save',
        data: mannage_bannder_form_data,
        success: function (data) {
            $(".pagloader").html(' ')
            if (data.errors) {
                $.each(data, function (errorkay, errorval) {
                    $.each(errorval, function (k, v) {

                        $(document).Toasts('create', {
                            class: 'bg-danger',
                            title: 'mannage module form',
                            body: v
                        })


                    })

                })
            }


            else {
                $("#menu_slugerr").html('')
                $("#menuerr").html('')
                $("#errorval_bannder_image").html('')
                $("#menutypeerr").html('')
                var sucess = data.sucess;

                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'mannage module form',
                    body: 'data update success'
                })

                $("#banner_image_prew").html(' ')
                var url = "{{url('storage/media/')}}";
                var bannerimg = `<img src="` + url + `/` + data.sucess.banner_image + `" width="150" >`;
                $("#banner_image_prew").html(bannerimg)



                $('#home_product_link_mannage_form_data')[0].reset()


            }
        },
        contentType: false,
        processData: false,
        cache: false,

    });

})


















$("#footer_widget_one_mannage_form_data").submit(function (e) {
    e.preventDefault();

    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
    <div class="overlay-wrapper">
      <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          <div class="text-bold pt-2">Loading...</div></div>
    </div>
  </div>`;
    $(".pagloader").html(pageloader)

    var mannage_bannder_form_data = new FormData($(this)[0])
    $.ajax({
        type: "post",
        Headers: {
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        },
        url: '/myadm/footer-widget-one-mannage/save',
        data: mannage_bannder_form_data,
        success: function (data) {
            $(".pagloader").html(' ')
            if (data.errors) {
                $.each(data, function (errorkay, errorval) {
                    $.each(errorval, function (k, v) {

                        $(document).Toasts('create', {
                            class: 'bg-danger',
                            title: 'mannage module form',
                            body: v
                        })


                    })

                })
            }


            else {
                $("#menu_slugerr").html('')
                $("#menuerr").html('')
                $("#errorval_bannder_image").html('')
                $("#menutypeerr").html('')
                var sucess = data.sucess;

                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'mannage module form',
                    body: 'data update success'
                })

                $("#banner_image_prew").html(' ')
                var url = "{{url('storage/media/')}}";
                var bannerimg = `<img src="` + url + `/` + data.sucess.banner_image + `" width="150" >`;
                $("#banner_image_prew").html(bannerimg)


                location.reload();

                $('#home_product_link_mannage_form_data')[0].reset()


            }
        },
        contentType: false,
        processData: false,
        cache: false,

    });

})