<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserExp;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Laravel\Socialite\Facades\Socialite;

class RegisterController extends Controller
{
    public function registerUser(Request $request)
    {

        $request->validate([

            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',

        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $saveData = new User([

            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),

        ]);

        $saveData->save();

        if (Auth::attempt(array('email' => $email, 'password' => $password)))
        {

           return "login";

        }
        else
        {
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
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->password = bcrypt('123456');
            $user->save();
        }

        Auth::login($user);
    }


    public function editProfile($user_id){

        $decrypted = Crypt::decrypt($user_id);

        $editProfiles  = User::where('users.id',$decrypted)->first();

        $exps =  User::join('user_exps as exp','exp.profile_id','=','users.id')
        ->where('users.id',$decrypted)->get();

        return view('userprofile.userProfile',['editProfiles' => $editProfiles,'exps'=>$exps]);

    }


    public function updateProfile(Request $request,$user_id){







        if (!empty($request->hasfile('user_avatar'))) {
            $image    = request()->file('user_avatar');
            $new_name =  $request->file('user_avatar')->getClientOriginalName();
            $image->move(public_path('/uploads/user_profile'), $new_name);
            $resume = $new_name;
        } else if(!empty($request->hidden_avatar)){
            $avatar = $request->hidden_avatar;

        }else{
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

        $updateUser = [

            'name' => $name,
            'education' => $education,
            'position' => $position,
            'short_bio' => $bio,
            'country' => $country,
            'state' => $state,
            'address'  => $address,
            'image'   => $user_image ?? '',
            'avatar' => $avatar ?? '',

        ];

        User::where('id',$user_id)->update($updateUser);

        return back();

    }

      public function addExp(Request $request){

        // dd($request->all());


        if ($request->hasFile('company_logo')) {
            $image    = request()->file('company_logo');
            $new_name =  $request->file('company_logo')->getClientOriginalName();
            $image->move(public_path('/uploads/company_logo'), $new_name);
            $company_logo = $new_name;
        } else {
            $company_logo = "";
        }

        $storeExp = new UserExp([

            'company_image' => $company_logo,
            'company_name' => $request->get('company_name'),
            'company_position' => $request->get('company_designation'),
            'company_from' => $request->get('start_date'),
            'company_to' => $request->get('end_date'),
            'profile_id' => $request->get('profile_id'),
            'user_id' => Auth::id(),

        ]);

        $storeExp->save();

        return response()->json(['storeExp'=>$storeExp,'message' => 'Saved'], 200);


    }

    public function myProfile($profile_id){


        $decrypted = Crypt::decrypt($profile_id);

        $editProfiles  = User::where('users.id',$decrypted)->first();

        $exps =  User::join('user_exps as exp','exp.profile_id','=','users.id')
        ->where('users.id',$decrypted)->get();

        return view('userprofile.myProfile',['editProfiles' => $editProfiles,'exps'=>$exps]);

        // return view('userprofile.myProfile');

    }


    }


