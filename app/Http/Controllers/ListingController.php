<?php

namespace App\Http\Controllers;

use App\Repositories\Listings\ListingContract;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $listing_repo;

    public function __construct(ListingContract $listingContract)
    {
        $this->listing_repo = $listingContract;
    }

    public function index()
    {
        //
        $listings = $this->listing_repo->displayAll();

        return view("index", $listings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->listing_repo->create($request);
        return redirect()->route('index')->with('success', 'Listing has been successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function singleListing($id)
    {
        //
        $listing = $this->listing_repo->findID($id);
        if ($listing) {     // if listing exist ? show
            return view('single', ['listing' => $listing]);
        } else {
            abort('404');   // else, render 404
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $listing = $this->listing_repo->findID($id);
        return view('edit', ["listing" => $listing]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $listing = $this->listing_repo->update($request, $id);
        return redirect('listing/' . $listing->id)->with('success', 'Listing was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $listing = $this->listing_repo->findID($id);
        $listing->delete();
        return redirect()->route('index')->with("success", "Listing was Deleted successfully");
    }
}
