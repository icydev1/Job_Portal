const base_url = $('meta[name="base-url"]').attr("content");
const token = $('meta[name="csrf-token"]').attr("content");

$(document).on("click", ".userLogin", function (e) {
    e.preventDefault();

    let name = $("#name").val();
    let email = $("#email").val();
    let password = $("#password").val();

    let path = $("#namePath").data("path");

    let url = `${base_url}${path}/RegisterUser`;

    $.ajax({
        type: "POST",
        url: url,

        data: {
            name: name,
            email: email,
            password: password,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            if (response == "login") {
                $("#loginModal").hide();
                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
                document.getElementById("registerForm").reset();
                $("#ajaxRefresh").load(" #ajaxRefresh > *");
                $("#ajaxRefreshLogout").load(" #ajaxRefreshLogout > *");
                $("#ajaxRef").load(" #ajaxRef > *");
                $("#ajaxFavList").load(" #ajaxFavList > *");
            } else {
                alert("Login Failed");
            }
        },
    });
});

// login function

$(document).on("click", "#login_btn", function (e) {
    e.preventDefault();

    let data = $("#loginForm").serialize();

    let path = $("#namePath").data("path");

    let url = `${base_url}${path}/LoginUser`;

    $.ajax({
        type: "POST",
        url: url,

        data: data,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            if (response == "1") {
                $("#loginModal").hide();
                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();

                document.getElementById("loginForm").reset();
                $("#ajaxRefresh").load(" #ajaxRefresh > *");
                $("#ajaxRefreshLogout").load(" #ajaxRefreshLogout > *");
                $("#ajaxRef").load(" #ajaxRef > *");
                $("#ajaxFavList").load(" #ajaxFavList > *");
            } else {
                alert("Login Failed");
            }
        },
    });
});

// logout function with ajax

$(document).on("click", "#logout", function (e) {
    e.preventDefault();

    let path = $("#namePath").data("path");

    let url = `${base_url}${path}/Logout`;

    $.ajax({
        type: "POST",
        url: url,

        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            if (response == "logout") {
                $("#logoutModal").hide();
                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
                $("#ajaxRefresh").load(" #ajaxRefresh > *");
                $("#ajaxRefreshLogout").load(" #ajaxRefreshLogout > *");
                $("#ajaxRef").load(" #ajaxRef > *");
                $("#ajaxFavList").load(" #ajaxFavList > *");
            } else {
                alert("Logout Failed");
            }
        },
    });
});

//add to wishlist function

function addWishList($id) {
    let favId = $id;

    let jobID = $("#job" + favId).val();
    let cat = $("#cat" + favId).val();
    let shiftId = $("#shiftId" + favId).val();
    let path = $("#namePath").data("path");
    let url = `${base_url}${path}/StoreFavJob`;

    // console.log(jobID,cat,shiftId);

    // return false;
    $.ajax({
        type: "POST",
        url: url,
        data: {
            jobID: jobID,
            cat: cat,
            shiftId: shiftId,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            $("#ajaxFavList").load(" #ajaxFavList > *");

            // alert(response.data);
            $('#countJob').html(response.data);

            if (response.message == "Saved") {

                $('#changeIcon'+favId).removeClass('far fa-heart');

                $('#changeIcon'+favId).addClass('fa fa-heart');




            } else {

            }
        },
    });
}

//add to wishlist function

//remove to wishlist function

function removeList($id) {
    let removeId = $id;
    // let removeId = $('#removeList'+id).val();

    let path = $("#namePath").data("path");
    let url = `${base_url}${path}/RemoveFavList`;

    $.ajax({
        type: "POST",
        url: url,
        data: {
            removeId: removeId,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            $("#ajaxFavList").load(" #ajaxFavList > *");

            $('#countJob').html(response.data);
            if (response.message == "delete") {
                // alert("Removed from list");
            } else {
                alert("not deleted");
            }
        },
    });
}

//remove to wishlist function
