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
use App\Models\PackagePlan;
use Redirect;

class IndexController extends Controller
{

    // PropertyDetails - Detalle de la Propiedad
    public function PropertyDetails($id, $slug){

        $property = Property::findOrFail($id);

        $amenities = $property->amenities_id;
        $property_amenities = explode(',',$amenities);

        $multiImage = MultiImage::where('property_id',$id)->get();
        $facility = Facility::where('property_id',$id)->get();

        $type_id = $property->ptype_id;
        $relatedProperty = Property::where('ptype_id',$type_id)->where('id','!=',$id)->orderBy('id','DESC')->limit(3)->get();

        return view('frontend.property.property_details', compact('property', 'multiImage', 'property_amenities', 'facility','relatedProperty'));
    }

    // Ver en Google Maps
    // "http://maps.google.com/?q=[lat],[long]"
    // "http://maps.google.com/?q=32.524690,-117.120030"
    // por vinculo: https://goo.gl/maps/eK8L7DbqUzmnqcbw9
    public function VerEnGoogleMaps(Request $request){

        // return Redirect::to('https://goo.gl/maps/eK8L7DbqUzmnqcbw9');
        // $mapa1 = 'https://goo.gl/maps/eK8L7DbqUzmnqcbw9';
        // $mapa = 'http://maps.google.com/?q='.$latitude.','.$longitude;

        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $google_map = $request->google_map;
        // dd($latitude,$longitude,$google_map);

        // $mapa = 'http://maps.google.com/?q='.$latitude.','.$longitude;
        // return Redirect::to($mapa);

        if ($google_map == Null) {
            $mapa = 'http://maps.google.com/?q='.$latitude.','.$longitude;
            return Redirect::away($mapa);
        } else {
            return Redirect::away($google_map);
        }
    }

    /**
     * Summary of VerEnGoogleMapsConLatitude
     * @param mixed $latitude
     * @param mixed $longitude
     * @return \Illuminate\Http\RedirectResponse
     */
    public function VerEnGoogleMapsConLatitude($latitude, $longitude){
        $mapa = 'http://maps.google.com/?q='.$latitude.','.$longitude;
        return Redirect::to($mapa);
    }

}
