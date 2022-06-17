<?php

namespace App\Http\Controllers;

use App\Events\RegisterUserEvent;
use App\Http\Controllers\Controller;
use App\Mail\HiringMail;
use App\Mail\RegisterMail;
use App\Models\FollowUnfollow;
use App\Models\User;
use App\Models\UserExp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller

{

    public function loginUser(Request $request){



        $request->validate([

            'login_email' => 'required',
            'login_password' => 'required',

        ]);

        $email = $request->login_email;
        $pass  = $request->login_password;

        if (auth()->attempt(array('email' => $email, 'password' => $pass)))
        {
            return response()->json([ [1] ]);
        }
        else
         {
            return response()->json([ [2] ]);
         }
    }


    public function registerUser(Request $request)
    {

        $request->validate([

            'name'     => 'required',
            'email'    => 'required|unique:users',
            'password' => 'required',

        ]);

        $name     = $request->input('name');
        $email    = $request->input('email');
        $password = $request->input('password');

        $saveData = new User([

            'name'     => $name,
            'email'    => $email,
            'password' => bcrypt($password),

        ]);

        $saveData->save();

        $user = $saveData;

        // event(new RegisterUserEvent($user));

        if (Auth::attempt(array('email' => $email, 'password' => $password))) {

            return "login";
        } else {
            return "fail";
        }
    }



    public function logout()
    {

        Auth::logout();

        return "logout";
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }


    // Google callback
    public function loginWithGoogle()
    {


        $user = Socialite::driver('google')->stateless()->user();

        $this->_registerOrLoginUser($user);

        return redirect()->route('JobPortal.Index');
    }

    // Google callback
    public function loginWithFacebook()
    {


        $user = Socialite::driver('facebook')->stateless()->user();

        $this->_registerOrLoginUser($user);

        return redirect()->route('JobPortal.Index');
    }



    protected function _registerOrLoginUser($data)
    {

        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name        = $data->name;
            $user->email       = $data->email;
            $user->provider_id = $data->id;
            $user->avatar      = $data->avatar;
            $user->password    = bcrypt('123456');
            $user->save();
        }

        // $email =  $data->email;

        // event(new RegisterUserEvent($user));

        Auth::login($user);
    }


    public function editProfile($user_id)
    {

        $decrypted     = Crypt::decrypt($user_id);

        $editProfiles  = User::where('users.id', $decrypted)->first();

        $exps          = User::join('user_exps as exp', 'exp.profile_id', '=', 'users.id')
            ->where('users.id', $decrypted)->get();

        return view('userprofile.userProfile', ['editProfiles' => $editProfiles, 'exps' => $exps]);
    }


    public function updateProfile(Request $request, $user_id)
    {


        if (!empty($request->hasfile('user_avatar'))) {
            $image    = request()->file('user_avatar');
            $new_name =  $request->file('user_avatar')->getClientOriginalName();
            $image->move(public_path('/uploads/user_profile'), $new_name);
            $resume = $new_name;
        } else if (!empty($request->hidden_avatar)) {
            $avatar = $request->hidden_avatar;
        } else {
            $resume = $request->hidden_image;
        }

        $name       = $request->name;
        $user_image = $resume ?? '';
        $education  = $request->education;
        $position   = $request->position;
        $bio        = $request->short_bio;
        $country    = $request->country;
        $state      = $request->state;
        $address    = $request->address;
        $website    = $request->website_link;
        $fb         = $request->fb_link;
        $insta      = $request->insta_link;
        $github     = $request->github_link;
        $twitter    = $request->twitter_link;
        $phone_num  = $request->contact_number;
        $working    = $request->currently_working;

        $updateUser = [

            'name'              => $name,
            'education'         => $education,
            'position'          => $position,
            'short_bio'         => $bio,
            'country'           => $country,
            'state'             => $state,
            'address'           => $address,
            'website_link'      => $website,
            'fb_link'           => $fb,
            'insta_link'        => $insta,
            'github_link'       => $github,
            'twitter_link'      => $twitter,
            'image'             => $user_image ?? '',
            'avatar'            => $avatar ?? '',
            'contact_number'    => $phone_num,
            'currently_working' => $working,

        ];

        User::where('id', $user_id)->update($updateUser);

        return back();
    }

    public function addExp(Request $request)
    {



        if ($request->hasFile('company_logo')) {
            $image    = request()->file('company_logo');
            $new_name =  $request->file('company_logo')->getClientOriginalName();
            $image->move(public_path('/uploads/company_logo'), $new_name);
            $company_logo = $new_name;
        } else {
            $company_logo = "";
        }

        if (!empty($request->end_date)) {

            $date = $request->get('end_date');
        } else {
            $date = $request->get('end_till_date');
        }

        $storeExp = new UserExp([

            'company_image'    => $company_logo,
            'company_name'     => $request->get('company_name'),
            'company_position' => $request->get('company_designation'),
            'company_from'     => $request->get('start_date'),
            'company_to'       => $date,
            'profile_id'       => $request->get('profile_id'),
            'user_id'          => Auth::id(),

        ]);

        $storeExp->save();

        return response()->json(['storeExp' => $storeExp, 'message' => 'Saved'], 200);
    }

    public function updateExp(Request $request)
    {


        if (!empty($request->hasFile('company_logo'))) {
            $image    = request()->file('company_logo');
            $new_name =  $request->file('company_logo')->getClientOriginalName();
            $image->move(public_path('/uploads/company_logo'), $new_name);
            $company_logo = $new_name;
        } else {
            $company_logo = $request->get('hidden_company_logo');
        }


        $updateExp = [

            'company_image'    => $company_logo,
            'company_name'     => $request->get('company_name'),
            'company_position' => $request->get('company_designation'),
            'company_from'     => $request->get('start_date'),
            'company_to'       => $request->get('end_date'),

        ];

        UserExp::where('id', $request->get('exp_id'))->update($updateExp);

        return response()->json(['message' => 'Saved'], 200);
    }

    public function myProfile($profile_id)
    {


        $decrypted = Crypt::decrypt($profile_id);

        $editProfile  = User::where('id', $decrypted)->first();

        $exps =  User::join('user_exps as exp', 'exp.profile_id', '=', 'users.id')
            ->where('users.id', $decrypted)->get();


        // not used yet
        $portfolios =  User::join('apply_job_posts as job', 'job.user_id', '=', 'users.id')
            ->where('users.id', $decrypted)
            ->select('job.portfolio_website_link')
            ->distinct()
            ->get();

        $follow_lists = User::
          join('follow_unfollows', 'follow_unfollows.follow_id', '=', 'users.id')
            ->where(['user_id'=> $decrypted,'is_accept' => 1,'is_block' => 0,'follow_unfollows.status' => 0])
            ->orderBy('follow_unfollows.id', 'DESC')
            ->select('users.image', 'users.avatar', 'users.name', 'users.id', 'follow_unfollows.follow_id', 'follow_unfollows.user_id')
            ->get();

        $follow_sum = User::
          join('follow_unfollows', 'follow_unfollows.follow_id', '=', 'users.id')
          ->where(['user_id'=> $decrypted,'is_accept' => 1,'is_block' => 0,'follow_unfollows.status' => 0])
            ->count();

        $following_lists = User::
         join('follow_unfollows', 'follow_unfollows.user_id', '=', 'users.id')
            ->where(['follow_id'=> $decrypted,'is_accept' => 1,'is_block' => 0,'follow_unfollows.status' => 0])
            ->orderBy('follow_unfollows.id', 'DESC')
            ->select('users.image', 'users.avatar', 'users.name', 'users.id', 'follow_unfollows.follow_id', 'follow_unfollows.user_id')
            ->get();

        $following_sum = User::
         join('follow_unfollows', 'follow_unfollows.user_id', '=', 'users.id')
         ->where(['follow_id'=> $decrypted,'is_accept' => 1,'is_block' => 0,'follow_unfollows.status' => 0])
            ->count();

        $request_sum = User::
         join('follow_unfollows', 'follow_unfollows.user_id', '=', 'users.id')
         ->where(['follow_id'=> $decrypted,'is_accept' => 0,'is_block' => 0])
            ->count();


            $requests = User::
         join('follow_unfollows', 'follow_unfollows.user_id', '=', 'users.id')
            ->where(['follow_id'=> $decrypted,'is_accept' => 0,'is_block' => 0])
            ->orderBy('follow_unfollows.id', 'DESC')
            ->select('users.image', 'users.avatar', 'users.name', 'users.id', 'follow_unfollows.*')
            ->get();

            $blocklists = User::
         join('follow_unfollows', 'follow_unfollows.user_id', '=', 'users.id')
            ->where(['follow_id'=> $decrypted,'is_block' => 1])
            ->orderBy('follow_unfollows.id', 'DESC')
            ->select('users.image', 'users.avatar', 'users.name', 'users.id', 'follow_unfollows.*')
            ->get();




            Session::put(['decrypt'=>$decrypted]);


        return view('userprofile.myProfile', ['blocklists' => $blocklists,'request_sum' => $request_sum,'requests' => $requests,'follow_sum' => $follow_sum, 'following_sum' => $following_sum, 'following_lists' => $following_lists, 'editProfile' => $editProfile, 'exps' => $exps, 'portfolios' => $portfolios, 'follow_lists' => $follow_lists]);
    }

    public function deleteExp(Request $request)
    {

        $id = $request->get('removeExpId');

        UserExp::where('id', $id)->delete();

        return response()->json(['message' => 'delete'], 200);
    }


    public function followUser(Request $request)
    {

        $follow_id = $request->get('follow_id');

        $follow = new FollowUnfollow([

            'follow_id' => $follow_id,
            'user_id' => Auth::id(),

        ]);

        $follow->save();

        return response()->json(['message' => 'follow'], 200);
    }

    public function confirmRequest(Request $request){

        $confrimRequest = $request->input('conRequest');

        FollowUnfollow::where('id',$confrimRequest)->update(['is_accept' => 1]);

        $decrypted =  Session::get('decrypt');

        $request_sum = User::
        join('follow_unfollows', 'follow_unfollows.user_id', '=', 'users.id')
        ->where(['follow_id'=> $decrypted,'is_accept' => 0])
        ->count();

        return response()->json(['message' => 'confirm','data'=>$request_sum], 200);

    }

    public function deleteRequest(Request $request){

        $deleteRequest = $request->input('delRequest');

        FollowUnfollow::where('id',$deleteRequest)->update(['is_accept' => 2]);


        $decrypted =  Session::get('decrypt');

        $request_sum = User::
        join('follow_unfollows', 'follow_unfollows.user_id', '=', 'users.id')
        ->where(['follow_id'=> $decrypted,'is_accept' => 0])
        ->count();


        return response()->json(['message' => 'delete','data' => $request_sum ], 200);

    }


    public function unBlockUser(Request $request){

        $unBlockUser = $request->input('unblock_id');

        FollowUnfollow::where('id',$unBlockUser)->update(['is_accept' => 2,'is_block' => 0,'status' => 1]);


        $decrypted =  Session::get('decrypt');

        $block_sum = User::
        join('follow_unfollows', 'follow_unfollows.user_id', '=', 'users.id')
        ->where(['follow_id'=> $decrypted,'is_block' => 1])
        ->count();


        return response()->json(['message' => 'unblock','data' => $block_sum ], 200);

    }

    public function unFollowUser(Request $request)
    {

        $unfollow_id = $request->get('unfollow_id');

        FollowUnfollow::where('id',$unfollow_id)->update(['status' => 1]);

        return response()->json(['message' => 'unfollow'], 200);

    }



    public function searchUser(Request $request){


    $products = DB::table('users')->limit(0)->get();

    return view('userprofile.searchUser',compact('products'));

    }
    public function searchAllUser(Request $request){

    $search = $request->input('search');

    $products = DB::table('users')->where('name','LIKE','%'.$search."%")->get();


      return view('userprofile.searchAllUser',compact('products'));



    }





}
