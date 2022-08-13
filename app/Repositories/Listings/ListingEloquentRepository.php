<?php

namespace App\Repositories\Listings;


use App\Models\Listing;
use App\Models\PreVerify;
use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ListingEloquentRepository implements ListingContract
{

    // display all listings
    public function displayAll()
    {
        // get request, filter from list of existing entities from DB
        $listings["listings"] = Listing::latest()->filter(request(['tag', 'search']))->paginate(5);

        // dd(request());
        // dd(request('tag'));  // get value from tag search parameter "?tag="
        return $listings;
    }

    // get ID for a particular Listing
    public function findID($id)
    {
        $listing = Listing::find($id);
        return $listing;
    }

    // create a gig
    public function create($request)
    {
        // dd($request->file("company_image")); //check if form captures image
        $formData = $request->validate([
            "title" => "required",
            "tags" => "required",
            "company" => "required|unique:listings",
            "location" => "required",
            "email" => "required|email",
            "website" => "required",
            "company_image" => "required",
            "description" => "required",
        ]);

        $listing = new Listing();
        // if the image field has an image
        if ($request->hasFile('company_image')) {
            // save the file to 'company_image' field in Db, create a folder in public called companyImages & store images
            $listing->company_image = $request->file('company_image')->store('companyImages', 'public');
        }
        $listing->title = $request->title;
        $listing->tags = $request->tags;
        $listing->company = $request->company;
        $listing->location = $request->location;
        $listing->email = $request->email;
        $listing->website = $request->website;
        $listing->description = $request->description;
        $listing->user_id = auth()->user()->id;  // ID of current user should be stored in 'user_id' column
        $listing->save();

        // $listing = Listing::create($formData);


        return $listing;
    }

    // ------------------ update a gig ----------------------
    public function update($request, $id)
    {
        $formData = $request->validate([
            "title" => "required",
            "tags" => "required",
            "company" => "required",
            "location" => "required",
            "email" => "required|email",
            "website" => "required",
            // "company_image" => " required",       
            "description" => "required",
        ]);



        // if the image field has an image
        if ($request->hasFile('company_image')) {
            // save the file to 'company_image' field in Db, create a folder in public called companyImages & store images
            $formData['company_image'] = $request->file('company_image')->store('companyImages', 'public');
        }
        $listing = Listing::find($id);  //get id of listing
        $listing->update($formData);    // update form data

        return $listing;
    }

    // ================== post registration/verification process ==============
    public function postRegistration($request)
    {
        $formFields = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        // create user details in user table
        $createUser = new User();
        $createUser->name = $request->name;
        $createUser->email = $request->email;
        $createUser->password = Hash::make($request->password);
        $createUser->save();

        $token = Str::random(64);   // generate 64bit token for verification


        // seeed into user_verifies table
        $verifyDetails = UserVerify::create([
            'user_id' => $createUser->id,   // create/save user_id
            'token' => $token   // save generated token
        ]);


        return $verifyDetails;
    }

    // =========================== verification process =====================
    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
        return $verifyUser;
    }


    //storing user data to database
    public function createUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);
    }

    public function dashboardDetails()
    {
        // identifying posts by its user
        $user_id = auth()->user()->id;      // get user id
        $user = User::find($user_id);       // find user

        return $user;
    }
}
