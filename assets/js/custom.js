jQuery(function($){
    $('#ajax_form').on('submit',function(el){
        el.preventDefault();
        $.post(ajaxurl,
            {action:'my_ajax_action' , fbs_name:el.target.fbs_dev_name.value },
            function(val){
                alert(val);
            }
        )
    })

    var data = {
        action : 'my_front_ajax_action',
        value : ajax_object.num1,
    }

    $.post(ajax_object.ajaxurl , data, function(val){
        alert(val);
    })
})