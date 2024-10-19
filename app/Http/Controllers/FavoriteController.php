<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    //

    public function locateShop()
    {
        // Hardcoded shop coordinates (replace with actual shop latitude and longitude)
        $coordinates = [
            'lat' => 40.7128, // Example latitude for New York City
            'lng' => -74.0060, // Example longitude for New York City
        ];

        return view('client.location', compact('coordinates'));
    }

    public function toggleFavorite(Request $request, Product $product)
    {
        
            if ($request->user()->hasFavorite($product)) {
                $request->user()->favorites()->detach($product);
               
            } else {
                $request->user()->favorites()->attach($product);
                

            }
            $request->user()->refresh();
        
        return back();
    }

    public function getUserFavorite()
    {
        $favoriteProducts = Auth::user()->favorites;

        return view('client.favorite', compact('favoriteProducts'));
    }
}
