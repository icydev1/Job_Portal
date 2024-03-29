<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\AdminDataController;
use App\Http\Controllers\job\AboutController;
use App\Http\Controllers\job\ContactController;
use App\Http\Controllers\job\IndexController;
use App\Http\Controllers\job\JobController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\payment\PaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::prefix('Admin')
    ->as('Admin.')
    ->controller(AdminLoginController::class)
    ->group(function () {

        Route::get('Login', 'adminLoginView')->name('Admin');
        Route::post('AdminLogin', 'adminLogin')->name('AdminLogin');

    });

Route::prefix('Admin')
    ->as('Admin.')
    ->middleware('is_admin')
    ->controller(AdminDataController::class)
    ->group(function () {

        Route::get('/Dashboard', 'adminDashboard')->name('Dashboard');

    });



Route::prefix('JobPortal')
    ->as('JobPortal.')
    ->controller(IndexController::class)
    ->group(function () {

        Route::get('/', 'index')->name('Index');
    });


Route::prefix('JobPortal')
    ->as('JobPortal.')
    ->controller(AboutController::class)
    ->group(function () {

        Route::get('/about', 'about')->name('About');
    });


Route::prefix('JobPortal')
    ->as('JobPortal.')
    ->middleware('is_user')
    ->controller(JobController::class)
    ->group(function () {
        Route::get('/SearchJobFilter', 'searchJobFilter')->name('SearchJobFilter')->withoutMiddleware('is_user');
        Route::get('/Job', 'job')->name('Job')->withoutMiddleware('is_user');
        Route::get('/PostJob', 'postJob')->name('PostJob')->middleware('check_balance');
        Route::get('/GetJobDetail/{job_id}', 'getJobDetail')->name('GetJobDetail')->withoutMiddleware('is_user');
        Route::post('/StoreJobPost', 'storeJobPost')->name('StoreJobPost');
        Route::get('/EditJobPost/{job_id}', 'editJobPost')->name('EditJobPost');
        Route::post('/UpdateJobPost/{job_id}', 'updateJobPost')->name('UpdateJobPost');
        Route::get('/FavJobList', 'favJobList')->name('FavJobList');
        Route::post('/StoreFavJob', 'storeFavJob')->name('StoreFavJob');
        Route::post('/RemoveFavList', 'removeFavList')->name('RemoveFavList');
        Route::post('/ApplyForJob', 'applyForJob')->name('ApplyForJob');
        Route::get('/GetJobList', 'getJobList')->name('GetJobList');
        Route::get('/GetJobUserList/{job_id}', 'getJobUserList')->name('GetJobUserList');
        Route::get('/DeleteJob/{delete_job_id}', 'deleteJob')->name('DeleteJob');

        Route::post('/DeleteResp', 'deleteResp')->name('DeleteResp');
        Route::post('/DeleteQual', 'deleteQual')->name('DeleteQual');
        Route::post('/DeleteBenefit', 'deleteBenefit')->name('DeleteBenefit');
        Route::post('/RejectApp', 'rejectApp')->name('RejectApp');
        Route::post('/AcceptApp', 'acceptApp')->name('AcceptApp');

        Route::post('/GetJobFilter', 'getJobFilter')->name('GetJobFilter');
    });
Route::prefix('JobPortal')
    ->as('JobPortal.')
    ->controller(ContactController::class)
    ->group(function () {

        Route::get('/contact', 'contact')->name('Contact');
    });




Route::prefix('JobPortal')
    ->as('JobPortal.')
    ->middleware('is_user')
    ->controller(LoginController::class)
    ->group(function () {
        Route::post('/LoginUser', 'loginUser')->name('LoginUser')->withoutMiddleware('is_user');
        Route::post('/RegisterUser', 'registerUser')->name('RegisterUser')->withoutMiddleware('is_user');
        Route::get('/google', 'redirectToGoogle')->name('Google')->withoutMiddleware('is_user');
        Route::get('/callback', 'loginWithGoogle')->withoutMiddleware('is_user');
        Route::get('/facebook', 'redirectToFacebook')->name('Facebook')->withoutMiddleware('is_user');
        Route::get('/fbcallback', 'loginWithFacebook')->withoutMiddleware('is_user');
        Route::get('SearchUser', 'searchUser')->name('SearchUser')->withoutMiddleware('is_user');
        Route::post('SearchAllUser', 'searchAllUser')->name('SearchAllUser')->withoutMiddleware('is_user');
        Route::any('ResultSearch', 'resultSearch')->name('ResultSearch')->withoutMiddleware('is_user');
        Route::post('/Logout', 'logout')->name('Logout');
        Route::get('EditProfile/{user_id}', 'editProfile')->name('EditProfile');
        Route::get('MyProfile/{profile_id}', 'myProfile')->name('MyProfile');
        Route::post('UpdateProfile/{user_id}', 'updateProfile')->name('UpdateProfile');
        Route::post('AddExp', 'addExp')->name('AddExp');
        Route::post('UpdateExp', 'updateExp')->name('UpdateExp');
        Route::post('DeleteExp', 'deleteExp')->name('DeleteExp');
        Route::post('FollowUser', 'followUser')->name('FollowUser');
        Route::post('ConfirmRequest', 'confirmRequest')->name('ConfirmRequest');
        Route::post('DeleteRequest', 'deleteRequest')->name('DeleteRequest');
        Route::post('UnBlockUser', 'unBlockUser')->name('UnBlockUser');
        Route::post('UnFollowUser', 'unFollowUser')->name('UnFollowUser');
    });


//  Route::get('/auth/google/callback',[RegisterController::class,'loginWithGoogle']);




Route::prefix('JobPortal')
    ->as('JobPortal.')
    ->middleware('is_user')
    ->controller(PaymentController::class)
    ->group(function () {

        Route::get('PaymentPage', 'paymentPage')->name('PaymentPage');
        Route::post('PaymentSuccess', 'paymentSuccess')->name('PaymentSuccess');
    });


