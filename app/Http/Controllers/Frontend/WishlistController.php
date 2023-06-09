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

        // User must be login
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

    // User Wishlist se manda llamar desde el panel de control de user en resources/views/frontend/dashboard/dashboard_sidebar.blade.php
    public function UserWishlist(){

        $id = Auth::user()->id;
        $userData = User::find($id);

        return view('frontend.dashboard.wishlist', compact('userData'));
    }

    // Get Wishlist con respuesta json para la petición de JS
    public function GetWishlistProperty(){

        // mandamos llamar primero a la relación que le llamamos 'property' en app/Models/Wishlist.php
        // después aplicamos el filtro que vea solo al user que esta login
        $wishlist = Wishlist::with('property')->where('user_id', Auth::id())->latest()->get();
        $wishQty = wishlist::count();

        return response()->json([
            'wishlist' => $wishlist,
            'wishQty' => $wishQty
        ]);
    }

    // WishlistRemove - Remover registro del wishlist table
    public function WishlistRemove($id){
        Wishlist::where('user_id', Auth::id())->where('id', $id)->delete();
        return response()->json(['success' => 'Propiedad removida con éxito!']);
    }

}
