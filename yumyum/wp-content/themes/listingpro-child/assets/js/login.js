jQuery(document).ready(function($) {


    // Perform AJAX login on form submit
    $('form#login').on('submit', function(e){
		$('form#login p.status').show().html(ajax_login_object.loadingmessage);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_login_object.ajaxurl,
            data: { 
                'action': 'ajaxlogin', //calls wp_ajax_nopriv_ajaxlogin
                'username': $('form#login #username').val(), 
                'password': $('form#login #password').val(), 
                'security': $('form#login #security').val() },
            success: function(data){
				$('form#login p.status').html(data.message);
                if (data.loggedin == true){
					document.location.href = data.redirect;
                }
            }
        });
        e.preventDefault();
    });
	
	// Perform AJAX login on form submit
    $('form#register').on('submit', function(e){
		$('form#register p.status').show().html(ajax_login_object.loadingmessage);
		$.ajax({
			type: 'POST',
            dataType: 'json',
            url: ajax_login_object.ajaxurl,
            data: { 
                'action': 'ajax_register', //calls wp_ajax_nopriv_ajaxregister
                'username': $('form#register #username2').val(), 
                'email': $('form#register #email').val(),
				'firstname': $('form#register #firstname').val(),
				'gender': $('form#register #gender').val(),
				'usertype': $('form#register #usertype').val(),
				'country': $('form#register #autocomplete').val(),
                'security': $('form#register #security2').val() },
			success: function(data){
				//alert(data.message);return;
                $('form#register p.status').html(data.message);
            }
        });
        e.preventDefault();
    });

});


