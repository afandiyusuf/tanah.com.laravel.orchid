<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\OfferType;
use App\Models\PropertyType;

class ListingController extends Controller
{
    public function index(Request $request){
        // To use pagination, add ?page=1&per_page=10 to the URL
        // Example: /api/listings?page=1&per_page=10
        $perPage = $request->input('per_page', 10); // Default 10 items per page
        $listings = Listing::with('propertyType', 'offerType')->paginate($perPage);
        return response()->json($listings);
    }

    public function create(Request $request){
        $user = \App\Models\AppUser::where('token', $request->input('token'))->first();

        $validated = $request->validate([
            'property_type_id' => 'required|string|max:100',
            'offer_type_id' => 'required|string|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'contact_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'area' => 'required|string|max:255',
        ]);

        $listing = new Listing();
        $listing->property_type_id = $validated['property_type_id'];
        $listing->offer_type_id = $validated['offer_type_id'];
        $listing->description = $validated['description'];
        $listing->price = $validated['price'];
        $listing->contact_name = $validated['contact_name'];
        $listing->phone = $validated['phone'];
        $listing->area = $validated['area'];
        $listing->created_by = $user->id;
        $listing->save();

        return response()->json([
            'message' => 'Listing created successfully',
            'listing' => $listing
        ], 201);
    }

    public function listingMe(Request $request){
        // To use pagination, add ?page=1&per_page=10 to the URL
        // Example: /api/me/listings?page=1&per_page=10
        $perPage = $request->input('per_page', 10); // Default 10 items per page
        $user = \App\Models\AppUser::where('token', $request->input('token'))->first();
        $listings = Listing::where('created_by', $user->id)->paginate($perPage);
        return response()->json($listings);
    }

    public function offerTypes(){
        $offerTypes = OfferType::all();
        return response()->json($offerTypes);
    }

    public function propertyTypes(){
        $propertyTypes = PropertyType::all();
        return response()->json($propertyTypes);
    }
}
