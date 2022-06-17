<?php


// use App\Http\Controllers\job\AboutController;
// use App\Http\Controllers\job\ContactController;
// use App\Http\Controllers\job\IndexController;
// use App\Http\Controllers\job\JobController;
// use App\Http\Controllers\payment\PaymentController;
// use App\Http\Controllers\register\RegisterController;
// use App\Http\Controllers\register\SignUPController;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::
prefix('JobPortal')
    ->as('JobPortal.')
    ->controller(Job\IndexController::class)
    ->group(function () {

        Route::get('/', 'index')->name('Index');
    });


Route::prefix('JobPortal')
    ->as('JobPortal.')

    ->controller(Job\AboutController::class)
    ->group(function () {

        Route::get('/about', 'about')->name('About');
    });


    Route::prefix('JobPortal')
    ->as('JobPortal.')
    ->middleware('is_user')
    ->controller(Job\JobController::class)
    ->group(function () {

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
    });
Route::prefix('JobPortal')
    ->as('JobPortal.')
    ->controller(Job\ContactController::class)
    ->group(function () {

        Route::get('/contact', 'contact')->name('Contact');
    });

Route::prefix('JobPortal')
    ->as('JobPortal.')
    ->controller(register\RegisterController::class)
    ->group(function () {

        Route::post('/RegisterUser', 'registerUser')->name('RegisterUser');
        Route::get('/google', 'redirectToGoogle')->name('Google');
        Route::get('/callback', 'loginWithGoogle');
        Route::get('/facebook', 'redirectToFacebook')->name('Facebook');
        Route::get('/fbcallback', 'loginWithFacebook');
        Route::get('SearchUser','searchUser')->name('SearchUser');

    });

        Route::prefix('JobPortal')
        ->as('JobPortal.')
        ->middleware('is_user')
        ->controller(register\RegisterController::class)
        ->group(function () {
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

Route::prefix('JobPortal')
    ->as('JobPortal.')
    ->controller(register\SignUPController::class)
    ->group(function () {

        Route::post('/LoginUser', 'loginUser')->name('LoginUser');
    });

Route::prefix('JobPortal')
    ->as('JobPortal.')
    ->middleware('is_user')
    ->controller(payment\PaymentController::class)
    ->group(function () {

        Route::get('PaymentPage', 'paymentPage')->name('PaymentPage');
        Route::post('PaymentSuccess', 'paymentSuccess')->name('PaymentSuccess');
    });
