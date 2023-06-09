<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Compare;
use Auth;
use Illuminate\Support\Carbon;

class CompareController extends Controller
{
    // Añadir a tabla 'compares'
    public function AddToCompare(Request $request, $property_id){

        // User must be login
        if (Auth::check()) {
            $exists = Compare::where('user_id', Auth::id())->where('property_id', $property_id)->first();

            if (!$exists) {
                Compare::insert([
                    'user_id' => Auth::id(),
                    'property_id' => $property_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Se añadió con éxito a tu lista de comparativos!']);
            }
            else{
                return response()->json(['error' => 'Esta propiedad ya esta en tu lista de comparativos!']);
            }

        }else{
            return response()->json(['error' => 'Primero inicie sesión!']);
        }

    }

    // UserCompare - compara propiedades
    public function UserCompare(){

        return view('frontend.dashboard.compare');

    }

    // GetCompareProperty
    public function GetCompareProperty(){

        $compare = Compare::with('property')->where('user_id', Auth::id())->latest()->get();

        return response()->json($compare);

    }

    // CompareRemove - Remover registro de la tabla 'compares'
    public function CompareRemove($id){
        Compare::where('user_id', Auth::id())->where('id', $id)->delete();
        return response()->json(['success' => 'Propiedad removida con éxito!']);
    }

}
