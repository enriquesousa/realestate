<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Property;
use App\Models\MultiImage;
use App\Models\Facility;
use App\Models\Amenities;
use App\Models\PropertyType;
use App\Models\User;
use App\Models\Wishlist;
use Auth;
use Illuminate\Support\Carbon;

class WishlistController extends Controller
{
    // Añadir a Lista de Deseos
    public function AddToWishList(Request $request, $property_id){

        if (Auth::check()) {
            $exists = Wishlist::where('user_id', Auth::id())->where('property_id', $property_id)->first();

            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'property_id' => $property_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Se añadió con éxito a tu lista de deseos!']);
            }
            else{
                return response()->json(['error' => 'Esta propiedad ya esta en tu lista de deseos!']);
            }

        }else{
            return response()->json(['error' => 'Primero inicie sesión!']);
        }

    }


}
