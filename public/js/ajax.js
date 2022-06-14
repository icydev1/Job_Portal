const base_url = $('meta[name="base-url"]').attr("content");
const token = $('meta[name="csrf-token"]').attr("content");

$(document).on("click", ".userLogin", function (e) {
    e.preventDefault();

    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

    let name = $("#name").val();
    let email = $("#email").val();
    let password = $("#password").val();

    let path = $("#namePath").data("path");

    let url = `${base_url}${path}/RegisterUser`;

    if ($("#name").val() == "") {
        $("#usernameError").text("name field is required");
        let nameVal = "";
        nameVal = document.getElementById("name");

        nameVal.addEventListener("keypress", function () {
            document.getElementById("usernameError").remove("usernameError");
        });

        let nameVal2 = document.getElementById("register_btn");

        nameVal2.addEventListener("click", function () {
            document.getElementById("err").innerHTML =
                '<span class="help-block has-error" style="color: red" data-error="0" id="usernameError"></span>';
        });
    } else if ($("#email").val() == "") {
        $("#remail-error").text("email field is required");
        let nameVal = "";
        nameVal = document.getElementById("email");

        nameVal.addEventListener("keypress", function () {
            document.getElementById("remail-error").remove("remail-error");
        });

        let nameVal2 = document.getElementById("register_btn");

        nameVal2.addEventListener("click", function () {
            document.getElementById("errEmail").innerHTML =
                '<span class="help-block has-error" data-error="0" style="color: red" id="remail-error"></span>';
        });
    } else if (!emailReg.test(email)) {
        $("#remail-error").text("please use valid email");
        let nameVal = "";
        nameVal = document.getElementById("email");

        nameVal.addEventListener("keypress", function () {
            document.getElementById("remail-error").remove("remail-error");
        });

        let nameVal2 = document.getElementById("register_btn");

        nameVal2.addEventListener("click", function () {
            document.getElementById("errEmail").innerHTML =
                '<span class="help-block has-error" data-error="0" style="color: red" id="remail-error"></span>';
        });
    } else if ($("#password").val() == "") {
        $("#password-error").text("Password field is required");
        let nameVal = "";
        nameVal = document.getElementById("password");

        nameVal.addEventListener("keypress", function () {
            document.getElementById("password-error").remove("password-error");
        });

        let nameVal2 = document.getElementById("register_btn");

        nameVal2.addEventListener("click", function () {
            document.getElementById("errPass").innerHTML =
                '<span class="help-block has-error" style="color: red" data-error="0" id="password-error"></span>';
        });
    } else {
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
                    $("#ajaxPros").load(" #ajaxPros > *");
                    $("#ajaxJob").load(" #ajaxJob > *");
                } else {
                    alert("Login Failed");
                }
            },
            error: function (error) {
                console.log(error);
            },
        });
    }
});

// login function

$(document).on("click", "#login_btn", function (e) {
    e.preventDefault();

    if ($("#login_email").val() == "") {
        $("#emailError").text("Email field is required");
    } else if ($("#login_password").val() == "") {
        $("#passwordError").text("Password field is required");
    } else {
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
                if (response == 1) {
                    $("#loginModal").hide();
                    $("body").removeClass("modal-open");
                    $(".modal-backdrop").remove();

                    document.getElementById("loginForm").reset();
                    $("#ajaxRefresh").load(" #ajaxRefresh > *");
                    $("#ajaxRefreshLogout").load(" #ajaxRefreshLogout > *");
                    $("#ajaxRef").load(" #ajaxRef > *");
                    $("#ajaxFavList").load(" #ajaxFavList > *");
                    $("#ajaxPros").load(" #ajaxPros > *");
                    $("#ajaxJob").load(" #ajaxJob > *");
                } else {
                    alert("Login Failed");
                }
            },
            error: function (error) {
                if (error.status == 422) {
                    alert("Login Failed");
                }
            },
        });
    }
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
            let home = `${base_url}${path}`;

            if (response == "logout") {
                $("#logoutModal").hide();
                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
                $("#ajaxRefresh").load(" #ajaxRefresh > *");
                $("#ajaxRefreshLogout").load(" #ajaxRefreshLogout > *");
                $("#ajaxRef").load(" #ajaxRef > *");
                $("#ajaxFavList").load(" #ajaxFavList > *");
                $("#ajaxPros").load(" #ajaxPros > *");
                $("#ajaxJob").load(" #ajaxJob > *");

                window.location.href = home;
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
            $("#countJob").html(response.data);

            if (response.message == "Saved") {
                $("#changeIcon" + favId).removeClass("far fa-heart");

                $("#changeIcon" + favId).addClass("fa fa-heart");
            } else {
            }
        },
    });
}

//add to wishlist function

//remove to wishlist function

function removeList($id) {
    let removeId = $id;

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

            $("#countJob").html(response.data);
            if (response.message == "delete") {
                // alert("Removed from list");
            } else {
                alert("not deleted");
            }
        },
    });
}

//remove to wishlist function

// add experience in profile

function addExp() {
    let formData = new FormData($("#storeForm")[0]);

    let path = $("#namePath").data("path");
    let url = `${base_url}${path}/AddExp`;

    $.ajax({
        type: "POST",
        url: url,
        data: formData,

        contentType: false,
        processData: false,
        dataType: "json",

        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            if ((response.messge = "Saved")) {
                $("#storeForm")[0].reset();
                $("#expModal").hide();
                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
                $("#refreshExp").load(" #refreshExp > *");
                $("#refreshExpModal").load(" #refreshExpModal > *");
            } else {
                alert("Not saved");
            }
        },
    });
}

// end experience in profile
// update experience in profile

function updateExp($id) {
    let updateID = $id;

    let formData = new FormData($("#updateForm" + updateID)[0]);

    let path = $("#namePath").data("path");
    let url = `${base_url}${path}/UpdateExp`;

    $.ajax({
        type: "POST",
        url: url,
        data: formData,

        contentType: false,
        processData: false,
        dataType: "json",

        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            if ((response.messge = "Saved")) {
                // $("#storeForm")[0].reset();
                $("#editExpModal" + updateID).hide();
                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
                $("#refreshExp").load(" #refreshExp > *");
                $("#refreshExpModal").load(" #refreshExpModal > *");
            } else {
                alert("Not saved");
            }
        },
    });
}

// end update experience in profile

//remove resp

function deleteResp($id) {
    let removeRespId = $id;

    let path = $("#namePath").data("path");
    let url = `${base_url}${path}/DeleteResp`;

    $.ajax({
        type: "POST",
        url: url,
        data: {
            removeRespId: removeRespId,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            if (response.message == "delete") {
                $("#clearResp" + removeRespId).remove();
            } else {
                alert("not deleted");
            }
        },
    });
}

//end remove resp

//remove Qual

function deleteQual($id) {
    let removeQualId = $id;

    let path = $("#namePath").data("path");
    let url = `${base_url}${path}/DeleteQual`;

    $.ajax({
        type: "POST",
        url: url,
        data: {
            removeQualId: removeQualId,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            if (response.message == "delete") {
                $("#clearQual" + removeQualId).remove();
            } else {
                alert("not deleted");
            }
        },
    });
}

//end remove Qual

//remove benefit

function deleteBenefit($id) {
    let removeBenefitId = $id;

    let path = $("#namePath").data("path");
    let url = `${base_url}${path}/DeleteBenefit`;

    $.ajax({
        type: "POST",
        url: url,
        data: {
            removeBenefitId: removeBenefitId,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            if (response.message == "delete") {
                $("#clearBenefit" + removeBenefitId).remove();
            } else {
                alert("not deleted");
            }
        },
    });
}

//end remove benefit

//remove benefit

function deleteExp($id) {
    let removeExpId = $id;

    let path = $("#namePath").data("path");
    let url = `${base_url}${path}/DeleteExp`;

    $.ajax({
        type: "POST",
        url: url,
        data: {
            removeExpId: removeExpId,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            if (response.message == "delete") {
                $("#deleteExpModal" + removeExpId).hide();
                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
                $("#clearExp" + removeExpId).fadeOut(2000);

            } else {
                alert("not deleted");
            }
        },
    });
}

//end remove benefit

//reject application

function rejectApp($id) {
    let reject = $id;

    let path = $("#namePath").data("path");
    let url = `${base_url}${path}/RejectApp`;

    $.ajax({
        type: "POST",
        url: url,
        data: {
            reject: reject,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },

        success: function (resp) {
            if (resp.message == "reject") {
                $("#removeUser" + reject).fadeOut(1000);
            }
        },
    });
}

//end reject application
//accept application

function acceptApp($id) {
    let accept = $id;

    let path = $("#namePath").data("path");
    let url = `${base_url}${path}/AcceptApp`;

    $.ajax({
        type: "POST",
        url: url,
        data: {
            accept: accept,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },

        success: function (resp) {
            if (resp.message == "accept") {
                $("#userStatus" + accept).html("Accepted");
                $("#userStatus" + accept).attr('disabled',true);
            }
        },
    });
}

//end accept application

//follow user

function followUser($id) {
    let follow_id = $id;

    let path = $("#namePath").data("path");
    let url = `${base_url}${path}/FollowUser`;

    $.ajax({
        type: "POST",
        url: url,
        data: {
            follow_id: follow_id,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },

        success: function (resp) {
            if (resp.message == "follow") {
                $("#userFollow" + follow_id).html("Requested");
                ("#userFollow" + follow_id).attr("disabled", true);

            }
        },
    });
}

//end follow user

// for confirmRequest

function confirmRequest($id) {
    let conRequest = $id;

    let path = $("#namePath").data("path");
    let url = `${base_url}${path}/ConfirmRequest`;

    $.ajax({
        type: "POST",
        url: url,
        data: {
            conRequest: conRequest,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },

        success: function (resp) {
            if (resp.message == "confirm") {
                $("#acceptReq" + conRequest).attr("disabled", true);
                $("#acceptReq" + conRequest).html(
                    '<span><i class="fa fa-check" aria-hidden="true"></i></span>'
                );
                $("#requestDiv" + conRequest).fadeOut(2000);
                $("#deleteReq" + conRequest).attr("disabled", true);
                $('#refreshReq').load(" #refreshReq > *")
                $('#refreshFollowSum').load(" #refreshFollowSum > *")
                $('#refreshFollower').load(" #refreshFollower > *")
            }

            if(resp.data === 0){
                $("#PendingReqModal").fadeOut(3000);
                    $("body").removeClass("modal-open");
                    $(".modal-backdrop").fadeOut(3000);
            }

        },
    });
}

//end for confirmRequest

// for deleteRequest

function deleteRequest($id) {
    let delRequest = $id;

    let path = $("#namePath").data("path");
    let url = `${base_url}${path}/DeleteRequest`;

    $.ajax({
        type: "POST",
        url: url,
        data: {
            delRequest: delRequest,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },

        success: function (resp) {



            if (resp.message == "delete") {
                $("#acceptReq" + delRequest).attr("disabled", true);
                $("#requestDiv" + delRequest).fadeOut(2000);
                $('#refreshReq').load(" #refreshReq > *")


            }

             if(resp.data === 0){
                $("#PendingReqModal").fadeOut(3000);
                    $("body").removeClass("modal-open");
                    $(".modal-backdrop").fadeOut(3000);
            }



        },
    });
}

//end for deleteRequest

// for unBlock Modal

function unBlockUser($id) {
    let unblock_id = $id;

    let path = $("#namePath").data("path");
    let url = `${base_url}${path}/UnBlockUser`;

    $.ajax({
        type: "POST",
        url: url,
        data: {
            unblock_id: unblock_id,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },

        success: function (resp) {



            if (resp.message == "unblock") {
                $("#unBlockUser" + unblock_id).attr("disabled", true);
                $("#blockList" + unblock_id).fadeOut(2000);
                // $('#refreshReq').load(" #refreshReq > *")


            }

             if(resp.data === 0){
                $("#BlockModal").fadeOut(3000);
                    $("body").removeClass("modal-open");
                    $(".modal-backdrop").fadeOut(3000);
            }



        },
    });
}

//end for unBlock Modal

