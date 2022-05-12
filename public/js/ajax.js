
const base_url = $('meta[name="base-url"]').attr("content");
const  token  = $('meta[name="csrf-token"]').attr("content");

$(document).on('click','.userLogin',function(e){

    e.preventDefault();

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
            if(response=="login"){

                $('#loginModal').hide();
                $('body').removeClass('modal-open');
                   $('.modal-backdrop').remove();
                   $("#ajaxRefresh").load(" #ajaxRefresh > *");
                   $("#ajaxRefreshLogout").load(" #ajaxRefreshLogout > *");
                }
               else{
                  alert('Login Failed')
               }
        }
    });

})


// login function

$(document).on('click','#login_btn',function(e){

    e.preventDefault();


    let email = $('#login_email').val();
    let password = $('#login_password').val();

    let data = $("#loginForm").serialize();

    let path = $('#namePath').data('path');

    let url = `${base_url}${path}/LoginUser`;


    $.ajax({
        type: "POST",
        url: url,

        data: data,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            if(response=="1"){

                $('#loginModal').hide();
                $('body').removeClass('modal-open');
                   $('.modal-backdrop').remove();

                   $("#ajaxRefresh").load(" #ajaxRefresh > *");
                   $("#ajaxRefreshLogout").load(" #ajaxRefreshLogout > *");

                }
               else{
                  alert('Login Failed')
               }
        }
    });

})



// logout function with ajax

$(document).on('click','#logout',function(e){

    e.preventDefault();


    let path = $('#namePath').data('path');

    let url = `${base_url}${path}/Logout`;



    $.ajax({
        type: "POST",
        url: url,

        // data: data,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            if(response=="logout"){

                $("#ajaxRefresh").load(" #ajaxRefresh > *");
                $("#ajaxRefreshLogout").load(" #ajaxRefreshLogout > *");

                }
               else{
                  alert('Logout Failed')
               }
        }
    });

})
