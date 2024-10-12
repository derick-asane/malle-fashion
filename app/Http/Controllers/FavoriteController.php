<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    //

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
