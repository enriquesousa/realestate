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
use Illuminate\Support\Carbon;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\PropertyMessage;

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

    /** VerEnGoogleMapsConLatitude
     * Summary of VerEnGoogleMapsConLatitude
     * @param mixed $latitude
     * @param mixed $longitude
     * @return \Illuminate\Http\RedirectResponse
     */
    public function VerEnGoogleMapsConLatitude($latitude, $longitude){
        $mapa = 'http://maps.google.com/?q='.$latitude.','.$longitude;
        return Redirect::to($mapa);
    }

    // PropertyMessage
    public function PropertyMessage(Request $request){

        $pid = $request->property_id;
        $aid = $request->agent_id;

        // check si el user esta login
        if (Auth::check()) {

            // insertar datos a DB
            PropertyMessage::insert([
                'user_id' => Auth::user()->id,
                'agent_id' => $aid,
                'property_id' => $pid,
                'msg_name' => $request->msg_name,
                'msg_email' => $request->msg_email,
                'msg_phone' => $request->msg_phone,
                'message' => $request->message,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Mensaje enviado con éxito!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }else{

            $notification = array(
                'message' => 'Favor primero iniciar sesión!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);

        }

    }

    // Ver los detalles del Agente desde el frontend
    public function AgentDetails($id){

        $agent = User::findOrFail($id);
        $property = Property::where('agent_id', $id)->get();
        $featured = Property::where('featured', '1')->limit(3)->get(); //sin importar de que agente es
        $rentaProperty = Property::where('property_status', 'renta')->get();
        $compraProperty = Property::where('property_status', 'compra')->get();

        return view('frontend.agent.agent_details', compact('agent', 'property', 'featured', 'rentaProperty', 'compraProperty'));
    }

     // Agent Details Message - almacenar mensaje para Agent desde formulario send de resources/views/frontend/agent/agent_details.blade.php
     public function AgentDetailsMessage(Request $request){

        $aid = $request->agent_id;

        // check si el user esta login
        if (Auth::check()) {

            // insertar datos a DB
            PropertyMessage::insert([
                'user_id' => Auth::user()->id,
                'agent_id' => $aid,
                'msg_name' => $request->msg_name,
                'msg_email' => $request->msg_email,
                'msg_phone' => $request->msg_phone,
                'message' => $request->message,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Mensaje enviado con éxito!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }else{

            $notification = array(
                'message' => 'Favor primero iniciar sesión!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);

        }

    }

    // RentListProperty - para listar todas las propiedades para renta
    public function RentListProperty(){

        // filtrar propiedades que estén activas (status='1') y que estén para renta (property_status='renta')
        $property = Property::where('status', '1')->where('property_status', 'renta')->get();

        return view('frontend.property.rent_property', compact('property'));
    }

}
