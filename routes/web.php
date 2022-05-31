<?php


use App\Http\Controllers\job\AboutController;
use App\Http\Controllers\job\ContactController;
use App\Http\Controllers\job\IndexController;
use App\Http\Controllers\job\JobController;
use App\Http\Controllers\register\RegisterController;
use App\Http\Controllers\Register\SignUPController;
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

Auth::routes();

Route::prefix('JobPortal')
     ->as('JobPortal.')
     ->controller(IndexController::class)
     ->group(function(){

        Route::get('/','index')->name('Index');

     });


Route::prefix('JobPortal')
     ->as('JobPortal.')
     ->controller(AboutController::class)
     ->group(function(){

        Route::get('/about','about')->name('About');

     });

Route::prefix('JobPortal')
     ->as('JobPortal.')
     ->controller(JobController::class)
     ->group(function(){

        Route::get('/Job','job')->name('Job');
        Route::get('/PostJob','postJob')->name('PostJob');
        Route::get('/GetJobDetail/{job_id}','getJobDetail')->name('GetJobDetail');
        Route::post('/StoreJobPost','storeJobPost')->name('StoreJobPost');
        Route::get('/EditJobPost/{job_id}','editJobPost')->name('EditJobPost');
        Route::post('/UpdateJobPost/{job_id}','updateJobPost')->name('UpdateJobPost');
        Route::get('/FavJobList','favJobList')->name('FavJobList');
        Route::post('/StoreFavJob','storeFavJob')->name('StoreFavJob');
        Route::post('/RemoveFavList','removeFavList')->name('RemoveFavList');
        Route::post('/ApplyForJob','applyForJob')->name('ApplyForJob');
        Route::get('/GetJobList','getJobList')->name('GetJobList');
        Route::get('/GetJobUserList/{job_id}','getJobUserList')->name('GetJobUserList');
        Route::get('/DeleteJob/{delete_job_id}','deleteJob')->name('DeleteJob');


     });
Route::prefix('JobPortal')
     ->as('JobPortal.')
     ->controller(ContactController::class)
     ->group(function(){

        Route::get('/contact','contact')->name('Contact');

     });

Route::prefix('JobPortal')
     ->as('JobPortal.')
     ->controller(RegisterController::class)
     ->group(function(){

        Route::post('/RegisterUser','registerUser')->name('RegisterUser');
        Route::post('/Logout','logout')->name('Logout');

        Route::get('/google','redirectToGoogle')->name('Google');
        Route::get('/callback','loginWithGoogle');

        Route::get('/facebook','redirectToFacebook')->name('Facebook');
        Route::get('/fbcallback','loginWithFacebook');

        Route::get('EditProfile/{user_id}','editProfile')->name('EditProfile');
        Route::get('MyProfile/{profile_id}','myProfile')->name('MyProfile');
        Route::post('UpdateProfile/{user_id}','updateProfile')->name('UpdateProfile');
        Route::post('AddExp','addExp')->name('AddExp');


     });
    //  Route::get('/auth/google/callback',[RegisterController::class,'loginWithGoogle']);
Route::prefix('JobPortal')
     ->as('JobPortal.')
     ->controller(SignUPController::class)
     ->group(function(){

        Route::post('/LoginUser','loginUser')->name('LoginUser');


     });












