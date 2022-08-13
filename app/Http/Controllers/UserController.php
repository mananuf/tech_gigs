<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Listings\ListingContract;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    protected $listing_repo;

    public function __construct(ListingContract $listingContract)
    {
        $this->listing_repo = $listingContract;
    }

    public function register()
    {
        return view('users.register');
    }

    // public function passCreate()
    // {
    //     return view('users.regComplete');
    // }

    // post registration
    public function postRegistration(Request $request)
    {

        $user = $this->listing_repo->postRegistration($request);    // get user verify details

        //  send mail with token and message
        Mail::send('email.emailVerification', ['token' => $user->token], function ($message) use ($request) {

            $message->to($request->email);

            $message->subject('Email Verification Mail');
        });

        return view("email.preVerification", ['email' => $request->email])->with('info', 'A verification mail has been sent to your email.');
    }

    // verification
    public function verification($token)
    {
        $verify = $this->listing_repo->verifyAccount($token);
        $verify->user->is_email_verified = 1;
        $verify->user->save();
        return;
    }

    // creating user
    public function createUser(array $data)
    {
        $data = $this->listing_repo->createUser($data);
        return $data;
    }


    // verify Account
    public function verifyAccount($token)
    {
        $verifyUser = $this->listing_repo->verifyAccount($token);
        $message = 'Sorry your email cannot be identified.';

        if (!is_null($verifyUser)) {

            $user = $verifyUser->user;

            if (!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now cLogin your account.";

                return redirect()->route('login', ['user' => $user])->with('success', $message);
            } else {
                $message = "Your e-mail is already verified. You can now login.";
                return redirect()->route('login')->with('info', $message);
            }
        }

        return redirect()->route('login')->with('error', $message);
    }

    // -------------------------- LOGIN ---------------------------
    public function login()
    {
        return view('users.login');
    }

    // post login
    public function postLogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return redirect()->intended('dashboard')->with('success', 'Logged in successfully. Welcome ' . $request->email);
        }

        return redirect("login")->with('error', 'Oops! You have entered invalid credentials');
    }



    // dashboard login
    public function dashboard()
    {
        if (Auth::check()) {
            // dd(auth()->user());
            $user = $this->listing_repo->dashboardDetails();
            return view('users.dashboard', ['listings' => $user->listings]);
        }

        return redirect("login")->withErrors('Opps! You do not have access');
    }


    // logout
    public function logout(Request $request)
    {
        Auth::logout();      // this removes authentication from user session

        $request->session()->invalidate();    // invalidate user session
        $request->session()->regenerateToken(); // regenerate CSRF

        return redirect('/')->with('info', 'You\'re now logged out');
    }
}
