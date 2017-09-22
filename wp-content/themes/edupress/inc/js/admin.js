jQuery(function() {
    window.ajaxUrl = "http://" + window.location.host +"/wp-admin/admin-ajax.php";
})

function addNew() {
    var form = jQuery('form.add-form');
    var redirect = jQuery('input[name="_redirect"]').val();

    jQuery.ajax({
        url: window.ajaxUrl,
        data: {
            'action':'add_teacher',
            'teacher' : {
                'age'         : jQuery(form).find('input[name="age"]').val(),
                'image'       : jQuery(form).find('input[name="image"]').val(),
                'img_id'      : jQuery(form).find('input[name="img_id"]').val(),
                'information' : jQuery(form).find('textarea[name="information"]').val(),
                'level'       : jQuery(form).find('input[name="level"]').val(),
                'name'        : jQuery(form).find('input[name="name"]').val(),
            },
            'redirect' : redirect
        },
        success:function(response) {
            console.log(response)
            if(response.success){
                window.location = response.data
            }
        },
        error: function(errorThrown){
            console.log(errorThrown);
        }
    });
}

function show(id) {
    window.location = 'http://' + window.location.host + '/wp-admin/admin.php?page=teacher%2Fadd&id=' + id;
}

function destroy(id) {
    var redirect = jQuery('input[name="_redirect"]').val();
    jQuery.ajax({
        url: window.ajaxUrl,
        data: {
            'action':'delete_teacher',
            'id' : {
                'id': id
            },
            'redirect' : redirect
        },
        success:function(response) {
            if(response.success){
                window.location = response.data
            }
        },
        error: function(errorThrown){
            console.log(errorThrown);
        }
    });
}

function update(id) {
    var redirect = jQuery('input[name="redirect"]').val();
    var form = jQuery('form.add-form');
    jQuery.ajax({
        url: window.ajaxUrl,
        data: {
            'action':'update_teacher',
            'id' : {
                'id': id
            },
            'teacher' : {
                'age'         : jQuery(form).find('input[name="age"]').val(),
                'image'       : jQuery(form).find('input[name="image"]').val(),
                'img_id'      : jQuery(form).find('input[name="img_id"]').val(),
                'information' : jQuery(form).find('textarea[name="information"]').val(),
                'level'       : jQuery(form).find('input[name="level"]').val(),
                'name'        : jQuery(form).find('input[name="name"]').val(),
            },
            'redirect' : redirect
        },
        success:function(response) {
            if(response.success){
                window.location = response.data
            }
        },
        error: function(errorThrown){
            console.log(errorThrown);
        }
    });
}
