<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{

    public function getListing(Request $request){

        $listings = Listing::where('user_id',$request->user_id)->get();

        if($listings->isEmpty()){
            return response(['error' => 'No records found']);
        }

        return response([
            'status' => 200,
            'message' => 'success',
            'result' => [
                'data' => $listings,          
            ],
            ]);
    }
}
