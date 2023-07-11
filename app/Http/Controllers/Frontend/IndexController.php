<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;

use App\Models\Property;
use App\Models\MultiImage;
use App\Models\Facility;
use App\Models\Amenities;
use App\Models\PropertyType;
use App\Models\User;
use App\Models\PackagePlan;
use App\Models\PropertyMessage;
use App\Models\Schedule;

use Illuminate\Support\Carbon;
use Redirect;
use Illuminate\Support\Facades\Auth;
use WithPagination;

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

    // RentListProperty - para listar todas las propiedades solo para renta
    public function RentListProperty(){

        // filtrar propiedades que estén activas (status='1') y que estén para renta (property_status='renta')
        $property = Property::where('status', '1')->where('property_status', 'renta')->paginate(3);
        $rentaProperty = Property::where('property_status', 'renta')->get();
        $compraProperty = Property::where('property_status', 'compra')->get();

        return view('frontend.property.rent_property', compact('property','rentaProperty','compraProperty'));
    }

    // RentListProperty - para listar todas las propiedades solo para compra
    public function BuyListProperty(){

        $property = Property::where('status', '1')->where('property_status', 'compra')->paginate(3);
        $rentaProperty = Property::where('property_status', 'renta')->get();
        $compraProperty = Property::where('property_status', 'compra')->get();

        return view('frontend.property.buy_property', compact('property','rentaProperty','compraProperty'));
    }

     // ListAllProperty - para listar todas las propiedades
     public function ListAllProperty(){

        $property = Property::where('status', '1')->paginate(3);
        $rentaProperty = Property::where('property_status', 'renta')->get();
        $compraProperty = Property::where('property_status', 'compra')->get();

        return view('frontend.property.all_property', compact('property','rentaProperty','compraProperty'));
    }

    /* PropertyType: Lista todas las propiedades por categoría
    * Para listar todas las propiedades por categoría.
    * llamado de resources/views/frontend/home/category_todas.blade.php
    */
    public function PropertyType($id){

        $property = Property::where('status', '1')->where('ptype_id', $id)->paginate(3);
        $rentaProperty = Property::where('property_status', 'renta')->get();
        $compraProperty = Property::where('property_status', 'compra')->get();
        $categoryType = PropertyType::where('id', $id)->first();

        return view('frontend.property.property_type', compact('property','rentaProperty','compraProperty', 'categoryType'));
    }

    /* StateDetails
    *  Para listar todas las propiedades de un estado si dan click en frontend.
    *  llamado de resources/views/frontend/home/place.blade.php
    */
    public function StateDetails($id){

        $property = Property::where('status','1')->where('state',$id)->get();
        $estado = State::where('id',$id)->first(); //para poder desplegar el nombre del estado en la vista
        $rentaProperty = Property::where('property_status', 'renta')->get();
        $compraProperty = Property::where('property_status', 'compra')->get();

        return view('frontend.property.state_property', compact('property', 'estado', 'rentaProperty', 'compraProperty'));
    }

    /* BuyPropertySearch
    * En pagina de inicio para formulario en resources/views/frontend/home/banner.blade.php
    * para búsqueda de propiedades solo para compra
    */
    public function BuyPropertySearch(Request $request){

        $request->validate([
            'search' => 'required'
        ]);

        // Tomar las tres variables de la búsqueda
        $item_search = $request->search;
        $item_state = $request->state;
        $item_ptype_id = $request->ptype_id;

        // dd($item_state, $item_ptype_id);

        if ($item_state == Null && $item_ptype_id == Null) {
            // Búsqueda solo por nombre
            $property = Property::where('status','1')->where('property_name', 'like', '%' . $item_search . '%')->where('property_status', 'compra')->get();
        }elseif ($item_state == Null && $item_ptype_id != Null){
            $property = Property::where('status','1')->where('property_name', 'like', '%' . $item_search . '%')
                        ->where('property_status', 'compra')
                        ->with('type')
                        ->whereHas('type', function($q) use($item_ptype_id){
                                    $q->where('type_name', 'like', '%' . $item_ptype_id . '%');
                                    })
                        ->get();
        }elseif ($item_state != Null && $item_ptype_id == Null){
            $property = Property::where('status','1')->where('property_name', 'like', '%' . $item_search . '%')
                        ->where('property_status', 'compra')
                        ->with('r_estado')
                        ->whereHas('r_estado', function($q) use($item_state){
                                    $q->where('state_name', 'like', '%' . $item_state . '%');
                                    })
                        ->get();
        }else{
            // Búsqueda por los tres parámetros
            $property = Property::where('status','1')->where('property_name', 'like', '%' . $item_search . '%')
                        ->where('property_status', 'compra')
                        ->with('type', 'r_estado')
                        ->whereHas('r_estado', function($q) use($item_state){
                                    $q->where('state_name', 'like', '%' . $item_state . '%');
                                    })
                        ->whereHas('type', function($q) use($item_ptype_id){
                                    $q->where('type_name', 'like', '%' . $item_ptype_id . '%');
                                    })
                        ->get();
        }

        $rentaProperty = Property::where('property_status', 'renta')->get();
        $compraProperty = Property::where('property_status', 'compra')->get();

        return view('frontend.property.property_search', compact('property', 'rentaProperty', 'compraProperty'));
    }

    /* RentPropertySearch
    *  En pagina de inicio para formulario en resources/views/frontend/home/banner.blade.php
    *  para búsqueda de propiedades solo para renta
    */
    public function RentPropertySearch(Request $request){

        $request->validate([
            'search' => 'required'
        ]);

        // Tomar las tres variables de la búsqueda
        $item_search = $request->search;
        $item_state = $request->state;
        $item_ptype_id = $request->ptype_id;

        // dd($item_state, $item_ptype_id);

        if ($item_state == Null && $item_ptype_id == Null) {
            // Búsqueda solo por nombre
            $property = Property::where('status','1')->where('property_name', 'like', '%' . $item_search . '%')->where('property_status', 'renta')->get();
        }elseif ($item_state == Null && $item_ptype_id != Null){
            $property = Property::where('status','1')->where('property_name', 'like', '%' . $item_search . '%')
                        ->where('property_status', 'renta')
                        ->with('type')
                        ->whereHas('type', function($q) use($item_ptype_id){
                                    $q->where('type_name', 'like', '%' . $item_ptype_id . '%');
                                    })
                        ->get();
        }elseif ($item_state != Null && $item_ptype_id == Null){
            $property = Property::where('status','1')->where('property_name', 'like', '%' . $item_search . '%')
                        ->where('property_status', 'renta')
                        ->with('r_estado')
                        ->whereHas('r_estado', function($q) use($item_state){
                                    $q->where('state_name', 'like', '%' . $item_state . '%');
                                    })
                        ->get();
        }else{
            // Búsqueda por los tres parámetros
            $property = Property::where('status','1')->where('property_name', 'like', '%' . $item_search . '%')
                        ->where('property_status', 'renta')
                        ->with('type', 'r_estado')
                        ->whereHas('r_estado', function($q) use($item_state){
                                    $q->where('state_name', 'like', '%' . $item_state . '%');
                                    })
                        ->whereHas('type', function($q) use($item_ptype_id){
                                    $q->where('type_name', 'like', '%' . $item_ptype_id . '%');
                                    })
                        ->get();
        }

        $rentaProperty = Property::where('property_status', 'renta')->get();
        $compraProperty = Property::where('property_status', 'compra')->get();

        return view('frontend.property.property_search', compact('property', 'rentaProperty', 'compraProperty'));
    }

    /* AllPropertySearch
    *  All Property Search Option para formulario en resources/views/frontend/property/rent_property.blade.php
    *  para buscar propiedades
    */
    public function AllPropertySearch(Request $request){

        // Tomar los parámetros de la forma
        $property_status = $request->property_status;
        $stype = $request->ptype_id;
        $sstate = $request->state;
        $bedrooms = $request->bedrooms;
        $bathrooms = $request->bathrooms;

        // Seleccionar propiedad(activa,)
        // Como lo hace el maestro kazi solo te despliega la propiedad con todos los datos exactos
        $property = Property::where('status','1')->where('bedrooms', $bedrooms)
                    ->where('bathrooms', 'like', '%' . $bathrooms . '%')
                    ->where('property_status', $property_status)
                    ->with('type', 'r_estado')
                    ->whereHas('r_estado', function($q) use($sstate){
                                $q->where('state_name', 'like', '%' . $sstate . '%');
                                })
                    ->whereHas('type', function($q) use($stype){
                                $q->where('type_name', 'like', '%' . $stype . '%');
                                })
                    ->get();

        $rentaProperty = Property::where('property_status', 'renta')->get();
        $compraProperty = Property::where('property_status', 'compra')->get();

        return view('frontend.property.property_search', compact('property', 'rentaProperty', 'compraProperty'));
    }


    // StoreSchedule
    public function StoreSchedule(Request $request){

        $agent_id = $request->agent_id;
        $property_id = $request->property_id;

        if (Auth::check()) {

            Schedule::insert([

                'user_id' => Auth::user()->id,
                'property_id' => $property_id,
                'agent_id' => $agent_id,
                'tour_date' => $request->tour_date,
                'tour_time' => $request->tour_time,
                'message' => $request->message,
                'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Mensaje enviado con éxito!',
                'alert-type' => 'success',
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

}
