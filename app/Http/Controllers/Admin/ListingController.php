<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ListingStoreRequest;
use App\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except('index');
    }

    public function index(){
        $listings = Listing::all();
        return view('admin.dashboard',compact('listings'));
    }

    public function create(){
        return view('admin.create');
    }

    public function store(ListingStoreRequest $request){
        //validate data
        $validated = $request->validated();

        //create new listing
        $listing = Listing::create([
            'name' => $request->name,
            'latitude' => $request->latitude,
            'longitude' => $request ->longitude,
            'user_id' => auth()->user()->id
        ]);

        return redirect($listing->path());
    }

    public function show(Listing $listing){
        return view('admin.show',compact('listing'));
    }

    public function edit(Listing $listing){
        return view('admin.edit',compact('listing'));
    }

    public function update(Listing $listing, ListingStoreRequest $request){
        
        $validated = $request->validated();


        $listing->update([
            'name' => $request->name,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        return view('admin.show',compact('listing'));
    }

    public function destroy(Listing $listing){
        $listing->delete();

        return redirect('/dashboard');
    }
}
