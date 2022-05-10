

$(document).ready(function(){
	$(document).on('click','.signup-tab',function(e){
		e.preventDefault();
	    $('#signup-taba').tab('show');
	});

	$(document).on('click','.signin-tab',function(e){
	   	e.preventDefault();
	    $('#signin-taba').tab('show');
	});

	$(document).on('click','.forgetpass-tab',function(e){
	 	e.preventDefault();
	   	$('#forgetpass-taba').tab('show');
	});

});


var base_url = $('meta[name="base-url"]').attr("content");
var  token  = $('meta[name="csrf-token"]').attr("content");




$(document).on('click','.userLogin',function(e){

    e.preventDefault();

    alert('hello')

    let name = $('#name').val();
    let email = $('#email').val();
    let password = $('#password').val();

    let path = $('#namePath').data('path');

    let url = `${base_url}${path}/RegisterUser`;


    $.ajax({
        type: "POST",
        url: url,

        data: {

            name:name,
            email:email,
            password:password,

        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {

        }
    });

})
